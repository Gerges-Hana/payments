<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PayMob Payment</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h2 class="my-4">Checkout</h2>
        <div class="card">
            <div class="card-header">
                Payment
            </div>
            <div class="card-body">
                <form action="{{ route('checkout') }}" method="POST">
                    @csrf
                    <input type="hidden" name="total_price" id="total_price" value="1050">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">Pay Now</button>
                </form>
            </div>
        </div>  

        <h3 class="my-4">Payment iFrame</h3>
        <iframe src="https://accept.paymob.com/api/acceptance/iframes/857316?payment_token={{$token}}" width="100%" height="600"></iframe>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
