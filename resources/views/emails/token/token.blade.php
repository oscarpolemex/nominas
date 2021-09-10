@component('mail::message')
    <div>
        <h1>TOKEN DE ACCESO</h1>
        <strong>Apreciable: {{$servidor->nombre}}</strong>
        <p>
            Se le informa que el token de acceso que se envía es único, personal, confidencial e intransferibles y
            deberán
            ser utilizados única y exclusivamente para las funciones asignadas. La clave de acceso tiene una vigencia de
            5
            minutos para que pueda ser utilizada por el usuario y llevar a cabo sus transacciones. Su uso será bajo
            exclusiva responsabilidad del titular de estos, por lo tanto, por ningún motivo deberá hacerlos del
            conocimiento
            de otra(s) persona(s).
            Ver recibos de nómina
        </p>
    </div>
    @component('mail::button', ['url' => $liga])
        Ver recibos de nómina
    @endcomponent
    <div>
        <p>
            Has recibido esta notificación porque estás suscrito con la cuenta de correo
            electrónico {{$servidor->email}}.
            La presente comunicación y sus ficheros adjuntos tienen como destinatario/os las persona/as a la/s que va
            dirigida, por lo que si usted lo recibe por error debe notificarlo al remitente y eliminarlo de su bandeja,
            no
            pudiendo utilizarlo, total o parcialmente, para ningún fin. Su contenido puede tener información
            confidencial o
            protegida legalmente
        </p>
    </div>
    <br>
    {{ config('app.name') }}
@endcomponent
