<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Razorpay\Api\Api;
use Illuminate\Support\Facades\Auth;
use Razorpay\Api\Errors\SignatureVerificationError;
use App\Models\Order;

class PaymentController extends Controller
{
    //
    public function payment(Order $order){
        $amount = $order->amount;
         $transaction = \App\Models\Transaction::create([
            'order_id' => $order->id,
            ]);
        $keyId = env('KEY_ID');
        $keySecret = env('KEY_SECRET');
        $displayCurrency = env('DISPLAY_CURRENCY');
        $api = new Api($keyId, $keySecret);


        // We create an razorpay order using orders api
        // Docs: https://docs.razorpay.com/docs/orders
        //
        $orderData = [
            'receipt'         => $transaction->id,
            'amount'          => $amount * 100, // 2000 rupees in paise
            'currency'        => 'INR',
            'payment_capture' => 1 // auto capture
        ];


        $razorpayOrder = $api->order->create($orderData);

        $razorpayOrderId = $razorpayOrder['id'];


        //$_SESSION['razorpay_order_id'] = $razorpayOrderId;
        session(['razorpay_order_id' => $razorpayOrderId]);


        $displayAmount = $amount = $orderData['amount'];

        if ($displayCurrency !== 'INR')
        {
            $url = "https://api.fixer.io/latest?symbols=$displayCurrency&base=INR";
            $exchange = json_decode(file_get_contents($url), true);

            $displayAmount = $exchange['rates'][$displayCurrency] * $amount / 100;
        }

        $checkout = 'automatic';

        if (isset($_GET['checkout']) and in_array($_GET['checkout'], ['automatic', 'manual'], true))
        {
            $checkout = $_GET['checkout'];
        }

        $data = [
            "key"               => $keyId,
            "amount"            => $amount,
            "name"              => "EcomCart",
            "description"       => "Order id- ".$order->id,
            "image"             => asset('storage/images/JywePhXzlQ2ojBCZWwRpeT94rrM7D1IEAYCPFHkR.jpg'),
            "prefill"           => [
            "name"              => Auth::user()->name,
            "email"             => Auth::user()->email,
            "contact"           => "9082871111",
            ],
            "notes"             => [
                "name" => Auth::user()->name,
                "email" => Auth::user()->email,
                "contact" => $order->billing_contact,
            "merchant_order_id" => $transaction->id,
            ],
            "theme"             => [
            "color"             => "#F37254"
            ],
            "order_id"          => $razorpayOrderId,
        ];

        if ($displayCurrency !== 'INR')
        {
            $data['display_currency']  = $displayCurrency;
            $data['display_amount']    = $displayAmount;
        }

        $json = json_encode($data);
        return view('payment.razorpay', compact('data', 'displayCurrency', 'json')); // 'transaction',

    }

    public function verify(){
        $success = true;
        $error = "Payment Failed";
        if (empty($_POST['razorpay_payment_id']) === false)
        {
         $keyId = env('KEY_ID');
         $keySecret = env('KEY_SECRET');
         $api = new Api($keyId, $keySecret);
            try
            {
                // Please note that the razorpay order ID must
                // come from a trusted source (session here, but
                // could be database or something else)
                $attributes = array(
                    'razorpay_order_id' => session('razorpay_order_id'),
                    'razorpay_payment_id' => $_POST['razorpay_payment_id'],
                    'razorpay_signature' => $_POST['razorpay_signature']
                );

                $api->utility->verifyPaymentSignature($attributes);
            }
            catch(SignatureVerificationError $e)
            {
                $success = false;
                $error = 'Razorpay Error : ' . $e->getMessage();
            }
                }

                if ($success === true)
                {
                    $message = "Thank you! payment transaction was successfull";
                    $transaction = \App\Models\Transaction::where('id', $_POST["transaction_id"])->first();
                    $transaction->response= json_encode($_POST);
                    $transaction->status = "Success";
                    $transaction->save();
                    //update order

                   /*  $order = \App\Models\Order::where("id",$transaction->order_id);
                    $order->status="paid";
                    $order->save(); */
                    // $html = "<p>Your payment was successful</p>
                    //         <p>Payment ID: {$_POST['razorpay_payment_id']}</p>";
                }else{
                    $transaction = \App\Models\Transaction::where('id', $_POST["txnid"])->first();
                    $transaction->response= json_encode($_POST);
                    $transaction->status = $status;
                    $transaction->save();
                    $message = "Oops! payment transaction was not successfull";
                    // $html = "<p>Your payment failed</p>
                    //         <p>{$error}</p>";
                }

                return view("payment.response", compact('transaction', 'message'));

                    }
                }
