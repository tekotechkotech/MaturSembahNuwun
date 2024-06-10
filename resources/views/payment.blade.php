<!DOCTYPE html>
<html>
<head>
    <title>Payment Page</title>
    <script type="text/javascript"
        src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ config('services.midtrans.client_key') }}"></script>
</head>
<body>
    <form id="payment-form" method="POST" action="/payment">
        @csrf
        <button type="submit" id="pay-button">Pay!</button>
    </form>

    @if(isset($snap_token))
        <script type="text/javascript">
            document.addEventListener('DOMContentLoaded', function() {
                window.snap.pay('{{ $snap_token }}');
            });
        </script>
    @endif
</body>
</html>
