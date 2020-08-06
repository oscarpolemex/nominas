<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <title>SISTEMA DE NOMINA</title>
</head>
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
</head>
<body>
<div class="login-page">
    <div class="form">
        <img src="{{url('IMG/Logo.png')}}" width="100%" alt=""/>
        <br><br>
        <form class="login-form" action="login.php" method="post" id="form">

            <input type="text" placeholder="Usuario" name="username" id="usuario"/>
            <input type="password" placeholder="Contraseña" name="password" id="clave"/>
            <br/>
            <button>login</button>


        </form>
        <br/>
        <center>
            <a href="Recuperacion.php">He olvidado mi contraseña</a> <br/>
        </center>
    </div>
</div>


<footer> Plaza Hidalgo s/n, Colonia Centro, Toluca, Estado de M&eacute;xico. C.P. 5000<br/>
    Conmutador: 01(722) 279.64.00 y 279.65.00<br/>
</footer>


</body>
</html>
