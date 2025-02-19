<form action="{{ route('payment.success') }}" method="POST">
    @csrf
    <label>Amount:</label>
    <input type="number" name="amount" required>

    <label>Mobile Number:</label>
    <input type="text" name="mobile_number" required>

    <label>Email:</label>
    <input type="email" name="email" required>

    <button type="submit">Pay with Easypaisa</button>
</form>
