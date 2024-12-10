<!DOCTYPE html>
<html>
<head>
    <title>APARTADO DE PAGO</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Arial', sans-serif;
        }
        .container {
            margin-top: 50px;
        }
        .credit-card-box {
            background: #ffffff;
            border-radius: 10px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        .panel-heading {
            background: linear-gradient(90deg, #007bff, #0056b3);
            color: #ffffff;
            padding: 15px;
            border-radius: 10px 10px 0 0;
            text-align: center;
        }
        .panel-title {
            font-size: 24px;
            margin: 0;
            color: #ffffff;
        }
        .form-control {
            border-radius: 5px;
            margin-bottom: 10px;
        }
        .btn-primary {
            background: linear-gradient(90deg, #007bff, #0056b3);
            border: none;
            border-radius: 5px;
            padding: 10px;
            font-size: 18px;
        }
        .btn-primary:hover {
            background: linear-gradient(90deg, #0056b3, #003f7f);
        }
        .alert-danger {
            margin-top: 20px;
        }
        .text-center {
            text-align: center;
        }
        .credit-card-box .panel-body {
            padding: 20px;
        }
        .credit-card-box .form-row {
            margin-bottom: 20px;
        }
        .credit-card-box .form-group label {
            font-weight: bold;
        }
        .credit-card-box .form-group input {
            padding: 10px;
            font-size: 16px;
        }
        .title {
            font-weight: bold;
        }
        .white-text {
            color: #ffffff;
        }
    </style>
</head>
<body>
<div class="container">
    <h1 class="text-center title">APARTADO DE PAGO</h1>
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default credit-card-box">
                <div class="panel-heading display-table">
                    <h3 class="panel-title white-text">Detalles del Pago</h3>
                    <h4 class="white-text">Total a pagar S/.{{$value}}</h4>
                </div>
                <div class="panel-body">
                    @if (Session::has('success'))
                        <div class="alert alert-success text-center">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                            <p>{{ Session::get('success') }}</p>
                        </div>
                    @endif
                    <form 
                        role="form" 
                        action="{{ route('stripe.post',$value) }}" 
                        method="post" 
                        class="require-validation"
                        data-cc-on-file="false"
                        data-stripe-publishable-key="{{ env('STRIPE_KEY') }}"
                        id="payment-form">
                        @csrf
                        <div class='form-row row'>
                            <div class='col-xs-12 form-group required'>
                                <label class='control-label'>Nombre en la Tarjeta</label> 
                                <input class='form-control' size='4' type='text'>
                            </div>
                        </div>
                        <div class='form-row row'>
                            <div class='col-xs-12 form-group card required'>
                                <label class='control-label'>Número de Tarjeta</label> 
                                <input autocomplete='off' class='form-control card-number' size='20' type='text'>
                            </div>
                        </div>
                        <div class='form-row row'>
                            <div class='col-xs-12 col-md-4 form-group cvc required'>
                                <label class='control-label'>CVC</label> 
                                <input autocomplete='off' class='form-control card-cvc' placeholder='ex. 311' size='4' type='text'>
                            </div>
                            <div class='col-xs-12 col-md-4 form-group expiration required'>
                                <label class='control-label'>Mes de Expiración</label> 
                                <input class='form-control card-expiry-month' placeholder='MM' size='2' type='text'>
                            </div>
                            <div class='col-xs-12 col-md-4 form-group expiration required'>
                                <label class='control-label'>Año de Expiración</label> 
                                <input class='form-control card-expiry-year' placeholder='YYYY' size='4' type='text'>
                            </div>
                        </div>
                        <div class='form-row row'>
                            <div class='col-md-12 error form-group hide'>
                                <div class='alert-danger alert'>Por favor corrige los errores e intenta nuevamente.</div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xs-12">
                                <button class="btn btn-primary btn-lg btn-block" type="submit">Pagar Ahora</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</div>
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script type="text/javascript">
$(function() {
    var $form = $(".require-validation");
    $('form.require-validation').bind('submit', function(e) {
        var $form = $(".require-validation"),
        inputSelector = ['input[type=email]', 'input[type=password]',
                         'input[type=text]', 'input[type=file]',
                         'textarea'].join(', '),
        $inputs = $form.find('.required').find(inputSelector),
        $errorMessage = $form.find('div.error'),
        valid = true;
        $errorMessage.addClass('hide');
        $('.has-error').removeClass('has-error');
        $inputs.each(function(i, el) {
          var $input = $(el);
          if ($input.val() === '') {
            $input.parent().addClass('has-error');
            $errorMessage.removeClass('hide');
            e.preventDefault();
          }
        });
        if (!$form.data('cc-on-file')) {
          e.preventDefault();
          Stripe.setPublishableKey($form.data('stripe-publishable-key'));
          Stripe.createToken({
            number: $('.card-number').val(),
            cvc: $('.card-cvc').val(),
            exp_month: $('.card-expiry-month').val(),
            exp_year: $('.card-expiry-year').val()
          }, stripeResponseHandler);
        }
    });
    function stripeResponseHandler(status, response) {
        if (response.error) {
            $('.error')
                .removeClass('hide')
                .find('.alert')
                .text(response.error.message);
        } else {
            var token = response['id'];
            $form.find('input[type=text]').empty();
            $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
            $form.get(0).submit();
        }
    }
});
</script>
</html>