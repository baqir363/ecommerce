<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class EasypaisaController extends Controller
{
    //
    private $merchantId;
    private $storeId;
    private $apiUsername;
    private $apiPassword;
    private $baseUrl;

    public function showPaymentPage()
    {
        // Display payment page
        return view('payment'); // or whatever Blade view you're using
    }

    public function success(){
        return view('payment.response');
    }
    public function __construct()
    {
        $this->merchantId = env('EASYPAY_MERCHANT_ID');
        $this->storeId = env('EASYPAY_STORE_ID');
        $this->apiUsername = env('EASYPAY_API_USERNAME');
        $this->apiPassword = env('EASYPAY_API_PASSWORD');
        $this->baseUrl = env('EASYPAY_BASE_URL');
    }

    /**
     * Step 1: Initiate Payment Request
     */
    // public function initiatePayment(Request $request)
    // {
    //     $client = new Client();

    //     try {
    //         $response = $client->post($this->baseUrl . 'initiate-payment', [
    //             'form_params' => [
    //                 'merchantId' => $this->merchantId,
    //                 'storeId' => $this->storeId,
    //                 'orderId' => uniqid(),
    //                 'transactionAmount' => $request->amount,
    //                 'transactionType' => 'MA', // MA = Mobile Account, CC = Credit Card
    //                 'tokenExpiry' => 3600,
    //                 'mobileAccountNo' => $request->mobile_number,
    //                 'emailAddress' => $request->email,
    //                 'password' => $this->apiPassword,
    //                 'userName' => $this->apiUsername,
    //             ]
    //         ]);

    //         $responseBody = json_decode($response->getBody(), true);

    //         if ($responseBody['status'] == 'SUCCESS') {
    //             return response()->json(['redirect_url' => $responseBody['paymentURL']]);
    //         } else {
    //             return response()->json(['error' => 'Payment initiation failed'], 400);
    //         }

    //     } catch (\Exception $e) {
    //         return response()->json(['error' => $e->getMessage()], 500);
    //     }
    // }

    public function initiatePayment(Request $request)
{
    $client = new Client();

    try {
        $response = $client->post($this->baseUrl . 'initiate-payment', [
            'headers' => [
                'Content-Type' => 'application/json'
            ],
            'json' => [ // Change from 'form_params' to 'json'
                'merchantId' => $this->merchantId,
                'storeId' => $this->storeId,
                'orderId' => uniqid(),
                'transactionAmount' => $request->amount,
                'transactionType' => 'MA', // 'MA' = Mobile Account
                'tokenExpiry' => 3600,
                'mobileAccountNo' => $request->mobile_number,
                'emailAddress' => $request->email,
                'password' => $this->apiPassword,
                'userName' => $this->apiUsername,
            ]
        ]);

        $responseBody = json_decode($response->getBody(), true);

        if (isset($responseBody['status']) && $responseBody['status'] == 'SUCCESS') {
            return response()->json(['redirect_url' => $responseBody['paymentURL']]);
        } else {
            return response()->json(['error' => 'Payment initiation failed'], 400);
        }

    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
}


    /**
     * Step 2: Handle Easypaisa Payment Response
     */
    public function paymentResponse(Request $request)
    {
        if ($request->status == '0000') { // '0000' means Success
            return response()->json(['message' => 'Payment Successful!']);
        } else {
            return response()->json(['error' => 'Payment Failed!'], 400);
        }
    }
}
