<!DOCTYPE html>
<html lang="en">
<head>
  <title>Stripe Payment</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    @php
        $stripe_key = 'put your publishable key here';
    @endphp
    <div class="container" style="margin-top:10%;margin-bottom:10%">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="">
                    <p>You will be charged rs 100</p>
                </div>
                <div class="card">
                    <form action="{{route('payments.store', [$paymentId,1,1])}}"  method="post" id="payment-form">
                        @csrf

                            <script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                    data-key="pk_test_51InU3DLE2gDi5g6ClT52alUBX2xqRWufzTY9GW0rxJNxk0dNflmhEPI1vLq6mzavXriEfdXxAwPdFhgH6SsJt3jP00xGMnEb4y"
                                    data-description="Access for a year"
                                    data-amount="5000"
                                    data-locale="auto"></script>

                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://js.stripe.com/v3/"></script>

</body>
</html>
