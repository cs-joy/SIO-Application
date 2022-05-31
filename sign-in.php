<?php

session_start();

if(isset($_SESSION['user-sign_in'])) {
    header("Location: index.php");
}

?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="SIO Sign in Template">
    <meta name="author" content="csjoy, cs, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.98.0">
    <title>Sign In | SIO</title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.2/examples/sign-in/">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }

        .b-example-divider {
            height: 3rem;
            background-color: rgba(0, 0, 0, .1);
            border: solid rgba(0, 0, 0, .15);
            border-width: 1px 0;
            box-shadow: inset 0 .5em 1.5em rgba(0, 0, 0, .1), inset 0 .125em .5em rgba(0, 0, 0, .15);
        }

        .b-example-vr {
            flex-shrink: 0;
            width: 1.5rem;
            height: 100vh;
        }

        .bi {
            vertical-align: -.125em;
            fill: currentColor;
        }

        .nav-scroller {
            position: relative;
            z-index: 2;
            height: 2.75rem;
            overflow-y: hidden;
        }

        .nav-scroller .nav {
            display: flex;
            flex-wrap: nowrap;
            padding-bottom: 1rem;
            margin-top: -1px;
            overflow-x: auto;
            text-align: center;
            white-space: nowrap;
            -webkit-overflow-scrolling: touch;
        }
    </style>


    <!-- Custom styles for this template -->
    <link tyoe="text/css" href="./css/style.css" rel="stylesheet">
</head>

<body class="text-center">

    <main class="form-signin w-100 m-auto">
        <form>
            <img class="mb-4" src="./img/sio.png" alt="" width="125" height="125">
            <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

            <div class="form-floating">
                <input type="email" class="form-control" id="floatingInput" placeholder="name@example.com">
                <label for="floatingInput">Email address</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password">
                <label for="floatingPassword">Password</label>
            </div>

            <div class="checkbox mb-3">
                <label>
                    <input type="checkbox" value="remember-me"> Remember me
                </label>
            </div>
            <button class="w-100 btn btn-lg btn-primary" id="signin" type="submit">Sign in</button>
            <p>Create New Account ||> <a href="sign-up.php">Sign Up</a></p>
            <p class="mt-5 mb-3 text-muted">&copy; 2017–2022</p>
        </form>
    </main>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>
    <script type="text/javascript">
        $(function() {
            $('#signin').click(function(e) {
                var valid = this.form.checkValidity();
                if(valid){
                    var username = $('#floatingInput').val();
                    var password = $('#floatingPassword').val();

                    e.preventDefault();

                    $.ajax({
                        type: 'POST',
                        url: 'in-action.php',
                        data: {
                            user: username,
                            password: password
                        },
                        success: function(data){
                            Swal.fire({
                                'title': 'Successfully Sign In',
                                'text': data,
                                'type': 'success'
                            })
                            if($.trim(data) == "1"){
                                setTimeout('window.location.href="index.php"', 2000);
                            }
                        },
                        error: function(data){
                            Swal.fire({
                                'title': 'Error',
                                'text': 'Password does not match',
                                'type': 'error'
                            })
                        }
                    });
                }
            })
        })
    </script>
</body>

</html>