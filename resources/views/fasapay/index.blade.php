<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="css/app.css">
    <title>Faire un don à l'ANAS</title>
    <style>
        .body{
            height: 700px;
        }
        .anas-bg{
            background-color: #66d90f;
        }
        body{
            
        }
    </style>
  </head>
  <body class="body">
        <div class="container">
            <div class="row">
                
                <div class="col-lg-6 mt-5" style="">
                    <div class="card anas-bg card-form text-center">
                      <div class="card-body">
                          @include('include.form_error')
                        <h3 class="text-white">Thank you for your gesture</h3>
                        <p class="text-white">A LITTLE GESTURE, A LARGE REACH</p>
                        <p class="text-white">You are making donation for ANAS</p>
                        {!! Form::open(['method' => 'POST', 'action' => 'FasaPaydunyaController@MakePaiement']) !!}
                                <div class="form-group">
                                    {!! Form::text('nom', null, ['class' => 'form-control', 'placeholder' => 'Enter your name']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::text('prenom', null, ['class' => 'form-control', 'placeholder' => 'Enter your first name']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Enter your e-mail']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::text('numero', null, ['class' => 'form-control', 'placeholder' => 'Enter your phone number']) !!}
                                </div>

                                <div class="form-group">
                                    {!! Form::number('montant', null, ['class' => 'form-control', 'placeholder' => 'Enter the amount of your donation']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::select('pays',$pays, null, ['class' => 'form-control']) !!}
                                </div>
                                <div class="row d-flex justify-content-center">
                                    <div class="col-lg-6">
                                        {!! Form::submit('Donate', ['class' => 'btn btn-outline-light btn-block my-2']) !!}
                                    </div>
                                </div>

                            {!! Form::close() !!}
                      </div>
                    </div>
                    <div class="alert alert-success mt-2">
                        <p class="text-center ">After entering the information regarding your donation, you will be automatically redirected to a secure payment platform on which you will proceed to payment.</p>
                    </div>
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-4">
                            <a href="https://anasngo.org//" class="btn btn-primary btn-block">Return to site</a>
                        </div>
                    </div>
                  </div>

                  <div class="col-lg-6">
                    <img src="images/logo.png" alt="" class="img-fluid">
                    <img src="images/paiement.png" alt="" class="img-fluid">
                </div>
            </div>
            
        </div>

    <script src="js/app.js"></script>
  </body>
</html>