<!-- resources/views/checkout_response.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout Response</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="alert alert-success mt-4" role="alert">
            العملية نجحت!
        </div>
        <div class="card mt-4">
            <div class="card-header">
                تفاصيل الطلب
            </div>
            <div class="card-body">
                {{$data}}
            <!-- <p>تفاصيل الطلب:@php {{ $data->order_id ?? 'غير متوفرة' }} @endphp </p> -->

                <h5 class="card-title">تم استلام طلبك بنجاح.</h5>
                <p class="card-text">نشكرك على استخدام خدماتنا.</p>
                <a href="/" class="btn btn-primary">العودة إلى الصفحة الرئيسية</a>
            </div>
        </div>
    </div>
</body>
</html>
