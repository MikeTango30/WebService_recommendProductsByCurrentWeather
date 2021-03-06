<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Recommended Products Service</title>
</head>
<body>
<main>
    <div class="container-fluid">
        <div class="container">
            <div class="row justify-content-center info">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <h2>Web Service</h2>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row underline">
                            <h5>Get recommended products by current weather in a city of Lithuania</h5>
                        </div>
                        <div class="row">
                            <span class="usage">How to use:</span>
                        </div>
                        <div class="row">
                            <ol>
                                <li>
                                    https://recommended-products.herokuapp.com/api/products/recommended/<span>:city</span>
                                </li>
                                <li>where <span>:city</span> enter any LT city without LT characters and with dashes
                                    instead
                                    of spaces
                                </li>
                            </ol>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <p>Data source: <a href="https://api.meteo.lt/" target="_blank">LHMT</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
        crossorigin="anonymous"></script>
</body>
</html>
