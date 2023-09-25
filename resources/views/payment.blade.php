<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EazyMart Os</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/imgs/logo/os.png') }}">
</head>

<body class="BG">
    <style>
        .BG {
            background-image: url(https://img.freepik.com/free-vector/online-mobile-phone-shopping-illustration_33099-600.jpg?w=996&t=st=1692868220~exp=1692868820~hmac=f35212e3c2c36b454797dbc308553a3e104ff860fc6a1f27407a2222dd7fa4ed);
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .IM {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 10px;
            width: 700px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);

        }
    </style>
    <div class="container IM">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h2 class="mb-5 text-center text-warning">Card Payment</h2>
                        <div id="card-element" class="mb-5"></div>
                        <button class="btn btn-success btn-block" onclick="submitPayment()">Submit</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://js.stripe.com/v3/"></script>
    <script>
        const stripe = Stripe(`{{ env('STRIPE_KEY') }}`);
        const paymentIntent = {{ Js::from($paymentIntent) }};
        const client_secret = paymentIntent.client_secret;
        const elements = stripe.elements({
            clientSecret: client_secret,
        });
        const cardElement = elements.create('payment');
        cardElement.mount('#card-element');

        const submitPayment = async() => {
            stripe.confirmPayment({
                elements,
                confirmParams:{
                    return_url: 'http://127.0.0.1:8000/admin/login',
                },
                redirect: 'if_required'
            })
            .then(function(result){
                console.log(result);
                if (result.paymentIntent.status === 'succeeded') {
                alert('Payment successful! Thank you for your purchase.');
            }
            });
        }
    </script>
</body>

</html>
