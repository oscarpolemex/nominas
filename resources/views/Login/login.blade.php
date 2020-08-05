@extends('layout.layout')
@section('content')
    <div class="login-page">


        <div class="form">
            <label>
                <h3 class="w3-hover-text-dark-gray"> Sistema de nóminas</h3>
            </label>

            <form class="login-form" action="login.php" method="post" id="form">
                <input type="text" placeholder="Usuario" name="username" id="usuario"/>
                <input type="password" placeholder="Contraseña" name="password" id="clave"/>
                <br/>
                <button>login</button>


            </form>
            <br/>
            <a href="Recuperacion.php">He olvidado mi contraseña</a> <br/>
        </div>

    </div>
@endsection
