<!DOCTYPE html>

<style>
    btn:link {
        text-decoration: none !important;
        color: #5B1E3B !important;
    }

    .contact {
        height: 400px;
    }

    .contact-info {
        margin-top: 10%;
    }

    .contact-info img {
        margin-bottom: 15%;
    }

    .contact-info h2 {
        margin-bottom: 10%;
    }

    .col-md-9 {
        background: #fff;
        padding: 3%;
        border-top-right-radius: 0.5rem;
        border-bottom-right-radius: 0.5rem;
    }

    label {
        font-size: 13px
    }

    .contact-form button {
        background: #25274d;
        color: #fff;
        font-weight: 600;
        width: 25%;
    }

    .contact-form button:focus {
        box-shadow: none;
    }

    .panel-danger {
        padding: 10px;
        background-color: #E6D0D4 !important;
    }
</style>

<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Sistema de Nomina</title>
    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css"
          integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="{{url('css/sidebar/style.css')}}">
    <script type="text/javascript" src="jquery-1.8.0.min.js"></script>
    <link rel="stylesheet" type="text/css" href="{{url('css/cssformatoCentral.css')}}">
    <!-- JS, Popper.js, and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
            crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
            integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
            crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
            integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
          integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
            integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
            crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="shortcut icon" href="{{url('IMG/LXlegis.jpg')}}"/>
    <style>
        a {
            font-size: 15px !important;
            color: #BBBBBB;
            text-decoration: none;
        }

        a:link {
            color: #BBBBBB;
            text-decoration: none;
        }

        a:visited {
            color: #BBBBBB;
            text-decoration: none;
        }

        a:hover {
            color: #FFFFFF;
            text-decoration: none;
        }

        a:active {
            color: #BBBBBB;
            text-decoration: none;
        }

        .btn-action {
            background-color: transparent !important;
        }
    </style>
</head>
<body>

<div class="wrapper">
    <!-- Sidebar  -->
    <nav id="sidebar" style="background-color: #5B1E3B">
        <div class="sidebar-header" style="background-color: #5B1E3B">
            <img src="{{url('IMG/NLogo.png')}}" class="img" width="80%">
            <br>
        </div>
        <ul class="list-unstyled components">
            <h5 align="center">Sistema de Nominas</h5>
            <li class="active">
            <li>
                <a class="nav-link" style="background-color: #5B1E3B" href="{{route('ServidoresPublicos.index')}}">
                    <i class="fa fa-search"></i> &nbsp;&nbsp;Buscar Registro</a>
            </li>
            <li>
                <a class="nav-link" style="background-color: #5B1E3B" href="{{route('ServidoresPublicos.create')}}">
                    <i class="fa fa-pencil"></i> &nbsp;&nbsp;Nuevo Registro</a>
            </li>
            <li>
                <a class="nav-link" style="background-color: #5B1E3B" href="{{route('uploadFiles.create')}}">
                    <i class="fa fa-upload"></i> &nbsp;&nbsp;Cargar Documentos</a>
            </li>
        </ul>
    </nav>
    <!-- Page Content  -->
    <div id="content">
        <nav class="navbar navbar-expand-lg" style="background-color: #682244">
            <div class="container-fluid">
                <button type="button" id="sidebarCollapse" class="btn btn-info">
                    <i class="fa fa-bars"></i>
                    <span></span>
                </button>
                <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse"
                        data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <ul class="navbar-nav ml-auto nav-flex-icons">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false" style="color: #FFFFFF;">
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <ion-icon name="person"></ion-icon>
                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-default"
                                 aria-labelledby="navbarDropdownMenuLink-333" style="color: #FFFFFF;">
                                <a class="dropdown-item" href="updatepass.php">Cambio de contraseña</a>
                                <a class="dropdown-item" href="salir.php">Cerrar Sesión</a>
                            </div>
                        </li>
                    </ul>

                    <form class="form-inline my-2 my-lg-0">
                        <input type="text" class="form-control mr-sm-2" size="40" class="caja" id="valor"
                               placeholder="Buscar requisicion" aria-label="Search" onkeyup="Buscar();"/>
                    </form>
                </div>
            </div>
        </nav>    <!-- Page Content  -->
        <div class="resultados" id="resultados"></div>
        <div class="container">
            @yield('content')
        </div>
    </div>
</div>
</body>
<script type="text/javascript">
    $(document).ready(function () {
        $('#sidebarCollapse').on('click', function () {
            $('#sidebar').toggleClass('active');
        });
    });
</script>
@yield('script')
</html>
