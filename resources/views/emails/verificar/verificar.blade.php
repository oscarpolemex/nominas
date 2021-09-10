@component('mail::message')
    <div>
        <h1>Correo de registro</h1>
        <strong>Apreciable: {{$nombre}}</strong>
        <p>
            A los usuarios del Portal de Gestión Interna
            Se les informa que las credenciales de acceso, usuario y contraseña son únicos, personales, confidenciales e
            intransferibles y deberán ser utilizados única y exclusivamente para las funciones asignadas. Su uso será
            bajo exclusiva responsabilidad del titular de estos, por lo tanto, por ningún motivo deberá hacerlos del
            conocimiento de otra(s) persona(s).
        </p>
    </div>
    @component('mail::button', ['url' => asset("/")])
        Solicitar token
    @endcomponent
    <div>
        <p>
            Has recibido esta notificación porque estás suscrito con la cuenta de correo
            electrónico {{$correo}}.
            La presente comunicación y sus ficheros adjuntos tienen como destinatario/os las persona/as a la/s que va
            dirigida, por lo que si usted lo recibe por error debe notificarlo al remitente y eliminarlo de su bandeja,
            no
            pudiendo utilizarlo, total o parcialmente, para ningún fin. Su contenido puede tener información
            confidencial o
            protegida legalmente
        </p>
        Si tiene problemas para hacer clic en el botón "Ver recibos de nómina" copie y pegue la URL a continuación en su
        navegador web:
        {{asset("/")}}
        <br>
        <p>Consulta el aviso de privacidad <a href="https://cutt.ly/1QMbTSI">aquí</a>.</p>
    </div>
    <br>
@endcomponent
