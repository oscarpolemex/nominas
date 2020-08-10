<html>
    <head>
        <style type="text/css">
            p{
                text-align: justify;
                padding: 14px;
            }
            .btn{
                color: #fff !important;
                background-color: #9D2449 !important;
                border-color: #9D2449 !important;
                border: 2px solid #9D2449 !important;
                box-shadow: 0 0 0 0 #9D2449 !important;
                display: inline-block;
                text-align: center;
                vertical-align: middle;
                user-select: none;
                padding: 9px .75rem;
                font-size: .75rem;
                line-height: 1.5;
                border-radius: 4px;
            }
        </style>
    </head>
    <body style="margin-top: 5%;
                margin-left: 15%;
                margin-right: 15%;
                color: #4e5c68;
                font-family: 'Montserrat', sans-serif;
                font-size: .75rem;
                font-weight: 400;
                line-height: 1.5;
                text-align: center;">
        <div class="login login-v2" data-pageload-addclass="animated fadeIn" style="background: #9d2449; padding: 0px;">
            <!-- begin brand -->
            <div class="login-header" align="center" style="padding:10px;">
                <div class="brand">
                    <span>
                        <img src="https://administracionyfinanzasplem.gob.mx/jardinN/Adds/IMG/Logo.png" width="220px">
                    </span> 
                </div>
            </div>
            <!-- end brand -->
            <!-- begin login-content -->
            <div class="login-content" style="background: #5B1E3B !important;Margin:-10px;">
                <br>
                <h1>Secretaría de Administración y Finanzas <br></h1>
                <h2>Dirección y Administración de Desarrollo de Personal </h2>
                <p>
                    Bienvenido
                    @if($parte->tipo_persona_id == 1)
                        {{$parte->nombre}} {{$parte->primer_apellido}} {{$parte->segundo_apellido}}
                    @else
                        {{$parte->nombre_comercial}}
                    @endif
                    <br><br>
                    Gracias por utilizar el servicio de confirmación de e-mail. 
                    A continuación se le otorgará un enlace que lo reedireccionará a la página de nómina.
                    <br>  Click en el boton "Confirmar".
                </p>
                <center> 
                   
                    <a href="{{$liga}}" class="nounderline"> C O N F I R M A R </a>
                   
                </center>
                <p>
                    <small>
                        En caso de no poder ver el mensaje de forma correcta Copia y pega la siguiente liga en tu navegador: 
                        <a href="{{$liga}}">{{$liga}}</a>
                    </small>
                </p>
            </div>
            <!-- end login-content -->
        </div>
        
    </body>
</html>
