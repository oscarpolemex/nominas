<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <title>SISTEMA DE NOMINA</title>
    <style type="text/css">
        a:link {
            font-family: Gotham, "Helvetica Neue", Helvetica, Arial, sans-serif;
            font-size: 15px;
            text-align: right;
            text-decoration: none;
            text-align: right;
            color: #6d6d6d;
            padding: 5px;
        }

        /* Link no visitado*/
        a:visited {
            ext-decoration: none;
            color: #6d6d6d
        }

        /*Link visitado*/
    </style>
    <link rel="stylesheet" type="text/css" href="{{url('css/style1.css')}}"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
          integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
            integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="{{url('css/cssformatoCentral.css')}}">

</head>
<body>
<div class="login-page">
    <div class="form">

        <img src="{{url('IMG/Logo.png')}}" width="100%" alt=""/>
        <form action="{{route('solicitar')}}" method="GET" class="margin-bottom-0">
            {{csrf_field()}}
            <input type="text" placeholder="Correo electrónico" name="c_electronico" id="c_electronico"/>
            <br/>
            <button>Enviar</button>
        </form>
        @error("error")
        <div class="alert alert-danger mt-2">
            <h6 class="text-justify">{{ $message }}</h6>
        </div>
        @enderror
        @error("success")
        <div class="alert alert-success mt-2">
            <h6 class="text-justify">{{ $message }}</h6>
        </div>
        @enderror
    </div>
</div>


<footer> Plaza Hidalgo s/n, Colonia Centro, Toluca, Estado de M&eacute;xico. C.P. 5000<br/>
    Conmutador: 01(722) 279.64.00 y 279.65.00<br/>
</footer>
<script>
    $(document).ready(function () {
        window.setTimeout(function () {
            $(".alert").fadeTo(1500, 0).slideUp(800, function () {
                $(this).remove();
            });
        }, 5000);
    });
</script>
</body>
</html>
