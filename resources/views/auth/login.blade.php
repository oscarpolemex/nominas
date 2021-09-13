<html>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<style>
    body {
        font-size: 1rem !important;
        font-family: "Helvetica Neue", Roboto, Helvetica, Arial;
        background-color: #ffffff;
        background-image: url(IMG/background1.svg);
        background-attachment: fixed;
        background-size: cover;
    }

    .card0 {
        box-shadow: 0px 4px 8px 0px #757575;
        border-radius: 0px
    }

    .card2 {
        margin: 0px 40px
    }

    .logo {
        width: 300px;
        height: 100px;
        margin-top: 30px;
        margin-left: 35px
    }

    .image {
        width: 500;
        height: 200
    }

    .border-line {
        border-right: 1px solid #EEEEEE
    }

    .facebook {
        background-color: #96124b;
        color: #fff;
        font-size: 18px;
        padding-top: 5px;
        border-radius: 50%;
        width: 35px;
        height: 35px;
        cursor: pointer
    }

    .twitter {
        background-color: #c1c1c1;
        color: #fff;
        font-size: 18px;
        padding-top: 5px;
        border-radius: 50%;
        width: 35px;
        height: 35px;
        cursor: pointer
    }

    .linkedin {
        background-color: #848688;
        color: #fff;
        font-size: 18px;
        padding-top: 5px;
        border-radius: 50%;
        width: 35px;
        height: 35px;
        cursor: pointer
    }

    .line {
        height: 1px;
        width: 45%;
        background-color: #E0E0E0;
        margin-top: 10px
    }

    .or {
        width: 10%;
        font-weight: bold
    }

    .text-sm {
        font-size: 14px !important
    }

    ::placeholder {
        color: #BDBDBD;
        opacity: 1;
        font-weight: 300
    }

    :-ms-input-placeholder {
        color: #BDBDBD;
        font-weight: 300
    }

    ::-ms-input-placeholder {
        color: #BDBDBD;
        font-weight: 300
    }

    input,
    textarea {
        padding: 10px 12px 10px 12px;
        border: 1px solid lightgrey;
        border-radius: 2px;
        margin-bottom: 5px;
        margin-top: 2px;
        width: 100%;
        box-sizing: border-box;
        color: #96124b;
        font-size: 14px;
        letter-spacing: 1px
    }

    input:focus,
    textarea:focus {
        -moz-box-shadow: none !important;
        -webkit-box-shadow: none !important;
        box-shadow: none !important;
        border: 1px solid #304FFE;
        outline-width: 0
    }

    button:focus {
        -moz-box-shadow: none !important;
        -webkit-box-shadow: none !important;
        box-shadow: none !important;
        outline-width: 0
    }

    a {
        color: inherit;
        cursor: pointer
    }

    .btn-blue {
        background-color: #96124b;
        width: 150px;
        color: #fff;
        border-radius: 2px
    }

    .btn-blue:hover {
        background-color: #000;
        cursor: pointer
    }

    .bg-blue {
        color: #fff;
        background-color: #848688;
    }

    @media screen and (max-width: 991px) {
        .logo {
            margin-left: 0px
        }

        .image {
            width: 300px;
            height: 220px
        }

        .border-line {
            border-right: none
        }

        .card2 {
            border-top: 1px solid #EEEEEE !important;
            margin: 0px 15px
        }
    }

    @media (min-width: 576px) {
        .ml-sm-5, .mx-sm-5 {
            margin-left: 25% !important;
        }

    }


    .small, small {
        font-size: 80%;
        font-weight: 600;
    }
</style>
<body>
<div class="container-fluid px-1 px-md-5 px-lg-1 px-xl-5 py-5 mx-auto">
    <div class="card card0 border-0">
        <div class="row d-flex">
            <div class="col-lg-6">
                <div class="card1 pb-5">
                    <div class="row"><br><br><br><br></div>
                    <div class="row px-3 justify-content-center mt-4 mb-5 border-line"><img
                            src="{{asset("/IMG/logo_SAF_Legislatura.svg")}}" class="image"></div>
                </div>
            </div>

            <div class="col-lg-6">
                <div class="card2 card border-0 px-4 py-5">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="row mb-4 px-3">
                            <h6 class="mb-0 mr-4 mt-2"><strong>INICIO DE SESIÓN</strong></h6>
                            <div class="facebook text-center mr-3">
                                <div class="fa fa-facebook"></div>
                            </div>
                            <div class="twitter text-center mr-3">
                                <div class="fa fa-twitter"></div>
                            </div>


                            <div class="linkedin text-center mr-3">
                                <div class="fa fa-linkedin"></div>
                            </div>
                        </div>

                        <div class="row px-3 mb-4">
                            <div class="line"></div>
                            <small class="or text-center"></small>
                            <div class="line"></div>
                        </div>


                        <div class="row px-3"><label class="mb-1">
                                <h6 class="mb-0 text-sm"><strong>USUARIO:</strong></h6>
                            </label><input id="email" type="text"
                                           class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
                                           name="email"
                                           value="{{ old('email') }}" placeholder="Ej. XXX111111 " required autofocus>
                        </div>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <br>

                        <div class="row px-3"><label class="mb-1">
                                <h6 class="mb-0 text-sm"><strong>CONTRASEÑA:</strong></h6>
                            </label> <input id="password" type="password"
                                            class="form-control @error('password') is-invalid @enderror" name="password"
                                            required autocomplete="current-password"></div>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                        @enderror

                        <div class="row px-3 mb-4">
                        </div>
                        <div class="row mb-3 px-3">
                            <button type="submit" class="btn btn-blue text-center">Ingresar</button>
                        </div>
                        <!-- <div class="row mb-4 px-3"> <small class="font-weight-bold">Don't have an account? <a class="text-danger ">Register</a></small> </div> -->
                </div>
            </div>
            </form>
        </div>
        <div class="bg-blue py-4">
            <small class="ml-4 ml-sm-5 mb-2" style="text-align: center;">Av. Independencia Ote. No. 102, Col. Centro,
                C.P. 50000,
                Toluca México, Estado de México.
                Conmutador (722) 279-6400 Ext. 5185 y 5291
                WhatsApp: 722 822 77 48 <i class="fa fa-whatsapp" aria-hidden="true"></i> <a class="btn-fill btn-blue sanbg" href="https://api.whatsapp.com/send?phone=7228227748&amp;text=Hi there! I have a question :)">Send Message</a></small>


        </div>
    </div>
</div>
</div>
</body>
</html>
