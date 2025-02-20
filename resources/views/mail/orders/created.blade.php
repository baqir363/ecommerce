<x-mail::message>
# Order {{ $order->id}}, Amount {{ $order->amount }} has been confirmed

Your order has been created. You will receive updated on your order on your mail.

<x-mail::button :url="'http://127.0.0.1:8000/orders'">
View Order
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
