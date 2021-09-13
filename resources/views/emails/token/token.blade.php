@component('mail::message')
    <div>
        <h1>Link de acceso a comprobantes</h1>
        <strong>Apreciable: {{$servidor->nombre}}</strong>
        <br>
        <br>
        <p>
            Se le informa que el link de acceso que se envía es único, personal, confidencial e intransferibles y
            deberán
            ser utilizados única y exclusivamente para las funciones asignadas. La clave de acceso tiene una vigencia
            limitada
            para que pueda ser utilizada por el usuario y llevar a cabo sus transacciones. Su uso será bajo
            exclusiva responsabilidad del titular de estos, por lo tanto, por ningún motivo deberá hacerlos del
            conocimiento
            de otra(s) persona(s).
        </p>
    </div>
    @component('mail::button', ['url' => $liga])
        Accesar a Comprobantes P.D.
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
        {{$liga}}
        <br><br>
        <p>Consulta el aviso de privacidad <a href="https://cutt.ly/1QMbTSI">aquí</a>.</p>
    </div>
    <br>
@endcomponent
