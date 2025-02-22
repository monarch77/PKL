<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script
        src="https://kit.fontawesome.com/64d58efce2.js"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('css/login/style.css') }}">
    <title>Welcome to Insura</title>
</head>

<body class="{{ session('showRegister') ? 'sign-up-mode' : '' }}">
    <div class="container {{ session('showRegister') ? 'sign-up-mode' : '' }}">
        <div class="forms-container">
            <div class="signin-signup">
                <form action="{{ route('login')}}" class="sign-in-form" method="POST">
                    @csrf
                    <div class="logo">
                        <img src="images/login/logo.png" alt="logo">
                    </div>
                    <h2 class="title">Sign in</h2>
                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input type="email" value="{{ old('email') }}" name="email" placeholder="Email" />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="password" id="password" placeholder="Password" />
                        <i class="fas fa-eye toggle-password" onclick="togglePasswordVisibility('password')"></i>

                    </div>
                    <input type="submit" value="Login" class="btn solid" />
                    @if ($errors->has('email'))
                    <div class="alert danger-alert">
                        <ul>
                            <li>{{ $errors->first('email') }}</li>
                        </ul>
                    </div>
                    @endif
                    @if ($errors->has('password'))
                    <div class="alert danger-alert">
                        <ul>
                            <li>{{ $errors->first('password') }}</li>
                        </ul>
                    </div>
                    @endif

                    @if ($errors->has('login'))
                    <div class="alert danger-alert">
                        <ul>
                            @foreach ($errors->get('login') as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                </form>
                <form action="{{ route('signup') }}" class="sign-up-form" method="POST">
                    @csrf
                    <div class="logo">
                        <img src="images/login/logo.png" alt="logo">
                    </div>
                    <h2 class="title">Sign up</h2>
                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input type="email" name="email" value="{{ old('email') }}" placeholder="Email" />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" name="username" value="{{ old('username') }}" placeholder="Username" />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="password" placeholder="Password" />
                    </div>
                    <input type="submit" value="Sign up" class="btn solid" />
                    @if ($errors->register->any())
                    <div class="alert danger-alert">
                        <ul>
                            @foreach ($errors->register->all() as $item)
                            <li>{{ $item }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif
                </form>
            </div>
        </div>

        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>New here?</h3>
                    <p>Explore new opportunities with us. Dive into a world of possibilities and take your first step!</p>
                    <button class="btn transparent" id="sign-up-btn">Sign up</button>
                </div>

                <img src="images/login/img-log.svg" class="image" alt="">
            </div>

            <div class="panel right-panel">
                <div class="content">
                    <h3>One of Us?</h3>
                    <p>Join us in shaping the future together. Overcome challenges and achieve great things</p>
                    <button class="btn transparent" id="sign-in-btn">Sign in</button>
                </div>

                <img src="images/login/img-register.svg" class="image" alt="">
            </div>
        </div>
    </div>

    <script src="js/login/app.js"></script>
</body>

</html>