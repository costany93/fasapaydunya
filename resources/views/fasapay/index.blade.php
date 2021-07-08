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
            background-color: #f44716;
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
                        <h3 class="text-white">Merci pour votre geste</h3>
                        <p class="text-white">UN PETIT GESTE, UNE GRANDE PORTÉE</p>
                        {!! Form::open(['method' => 'POST', 'action' => 'FasaPaydunyaController@MakePaiement']) !!}
                                <div class="form-group">
                                    {!! Form::text('nom', null, ['class' => 'form-control', 'placeholder' => 'Entrez votre nom']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::text('prenom', null, ['class' => 'form-control', 'placeholder' => 'Entrez votre prénom']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Entrez votre email']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::text('numero', null, ['class' => 'form-control', 'placeholder' => 'Entrez votre numéro de téléphone']) !!}
                                </div>

                                <div class="form-group">
                                    {!! Form::number('montant', null, ['class' => 'form-control', 'placeholder' => 'Entrez le montant de votre donation']) !!}
                                </div>
                                <div class="form-group">
                                    {!! Form::select('pays',$pays, null, ['class' => 'form-control']) !!}
                                </div>
                                <div class="row d-flex justify-content-center">
                                    <div class="col-lg-6">
                                        {!! Form::submit('Faire le don', ['class' => 'btn btn-outline-light btn-block my-2']) !!}
                                    </div>
                                </div>

                            {!! Form::close() !!}
                      </div>
                    </div>
                    <div class="alert alert-success mt-2">
                        <p class="text-center ">Après avoir entrée les informations concernant votre don, vous serez automatiquement redirigé sur une plate-forme de paiement sécurisé sur laquelle vous allez procéder au paiement</p>
                    </div>
                    <div class="row d-flex justify-content-center">
                        <div class="col-lg-4">
                            <a href="https://fasafoundation.org/" class="btn btn-primary btn-block">Revenir au site</a>
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