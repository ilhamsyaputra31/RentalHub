<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Radius - Signin/Signup</title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
        integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('login/assets/CSS/style.css') }}">
</head>

<body>
    <div class="container" id="container">
        {{-- Registar --}}
        <div class="form-container sign-up-container">
            {{-- <a href="/" class="btn btn-sm btn-primary">Kembali</a> --}}
            <form action="{{route('registrasi')}}" class="login100-form validate-form" method="POST" enctype="multipart/form-data">
                <h1>Create Account</h1>
            
                @csrf
                @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif


                @if (Session::get('succsess'))
                <div class="alert alert-succsess alert-dismissble fide show">
                    <ul>
                        <li>{{Session::get('succsess')}}</li>
                    </ul>
                </div>
                @endif

                

                <div class="wrap-input100 validate-input" data-validate="Valid fullname is required: ex@abc.xyz">
                    <input class="input100" type="text" name="fullname"  placeholder="Name">
                    <span class="focus-input100"></span>

                </div>

                <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                    <input class="input100" type="text" name="email"  placeholder="Email">
                    <span class="focus-input100"></span>

                </div>



                <div class="wrap-input100 validate-input" data-validate="Password is required">
                    <input class="input100" type="password" name="password"  placeholder="Password">
                    <span class="focus-input100"></span>

                </div>

                <div style="margin : 20px 20px 40px 20px;">
                    <label for="gambar" style="margin-bottom:100 px; font-size:10pt; color:#666666; ">upload foto mu di bawah ini!</label>
                    <input class="input100" type="file" name="gambar" id="gambar"  placeholder="Gambar">
                    <span class="focus-input100"></span>
                </div>

                <div class="container-login100-form-btn">
                    <button class="login100-form-btn" type="submit">
                        Register
                    </button>
                </div>

            </form>
        </div>
        {{-- Endregister --}}


        {{-- login --}}
        <div class="form-container sign-in-container">
            
            <form action="{{route('auth')}}" class="login100-form validate-form" method="POST">
                <h1>Sign in</h1>
                @csrf
               
                @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                @if (Session::get('succsess'))
                <div class="alert alert-succsess alert-dismissble fide show">
                    <ul>
                        <li>{{Session::get('succsess')}}</li>
                    </ul>
                </div>
                @endif
                <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz">
                    <input class="input100" type="text" name="email" placeholder="Email" value="{{ old ('email')}}">
                    <span class="focus-input100"></span>
                   
                </div>
                <div class="wrap-input100 validate-input" data-validate="Password is required">
                    <input class="input100" type="password" name="password" placeholder="Password">
                    <span class="focus-input100"></span>
                </div>
                <div class="container-login100-form-btn">
                    <button class="login100-form-btn" type="submit">
                        Login
                    </button>
                </div>
                
            </form>
            
        </div>
        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Welcome Back!</h1>
                    <p>To keep connected with us please login with your personal info</p>
                    <button class="ghost" id="signIn">Sign In</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Hello, Friend!</h1>
                    <p>Enter your personal details and start journey with us</p>
                    <button class="ghost" id="signUp">Sign Up</button>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('login/assets/JS/main.js') }}"></script>
</body>

</html>