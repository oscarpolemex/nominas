<html>
<head>
    <style type="text/css">
        p, h1, h2 {
            text-align: justify;
            padding: 14px;
            color: #000000;
        }

        p {
            font-size: 18px;
        }

        h1, h2 {
            text-align: center;
        }

        .btn {
            color: #fff !important;
            background-color: #9D2449 !important;
            border-color: #9D2449 !important;
            box-shadow: 0 0 0 0 #9D2449 !important;
            display: inline-block;
            text-align: center;
            vertical-align: middle;
            user-select: none;
            padding: 9px .75rem;
            font-size: .75rem;
            line-height: 1.5;
            border-radius: 4px;
            text-decoration: none;
        }
    </style>
</head>
<body style="margin-top: 5%;
                margin-left: 15%;
                margin-right: 15%;
                color: #4e5c68;
                font-family: 'Montserrat', sans-serif;
                font-size: .85rem;
                font-weight: 400;
                line-height: 1.5;
                text-align: center;">
<div class="login login-v2" data-pageload-addclass="animated fadeIn" style="background: #5B1E3B; padding: 0px;">
    <!-- begin brand -->
    <div class="login-header" align="center" style="padding:10px;">
        <div class="brand">
                    <span>
                        <img src="http://nominas.safapi.com.mx/IMG/Logo.png" width="220px">
                    </span>
        </div>
    </div>
    <!-- end brand -->
    <!-- begin login-content -->
    <div class="login-content" style="background: #f2f4f5 !important;Margin:-10px;">
        <br>
        <h1>Secretaría de Administración y Finanzas</h1>
        <h2>Dirección y Administración de Desarrollo de Personal </h2>
        <p>
            Bienvenido <strong>{{$nombre}}</strong>,
            el registro ha sido completado. A continuación se le otorgará un enlace que lo reedireccionará al Sistema de Comprobantes de Pago de Nómina del Poder Legislativo.
        </p>
        <center>
            <a href="{{route('solicitud')}}" class="btn">IR AL SISTEMA</a>
        </center>
        <p>
            <small>
                En caso de no poder ver el mensaje de forma correcta Copia y pega la siguiente liga en tu navegador:
                <a href="{{route('solicitud')}}">{{route('solicitud')}}</a>
            </small>
        </p>
    </div>
    <!-- end login-content -->
</div>

</body>
</html>
