<?php
if (isset($_GET['pesan'])) {
    if ($_GET['pesan'] == "gagal") {
        echo "<div class='alert'>Username dan Password tidak sesuai !</div>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Login - Aplikasi Pemesanan E-Menu</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">

        <link href="Assets/Img/kedai53.png" rel='icon' type='image/x-icon'/>

        <link href="Assets/Img/kedai53.png" rel='icon' type='image/x-icon'/>

        <link href="Assets/Css/bootstrap.min.css" rel="stylesheet">

        <link href="Assets/Css/business-casual.css" rel="stylesheet">


        <style>
            .form-signin{
                max-width: 330px;
                padding: 15px;
                margin: 0 auto;
                font-family: serif;


            }

            .form-signin .form-signin-heading, .form-signin .checkbox{
                margin-bottom: 10px;


            }

            .form-signin .checkbox{     
                font-weight: normal;


            }

            .form-signin .form-control{
                position: relative;
                font-size: 16px;
                height: auto;
                padding: 10px;
                -webkit-box-sizing: border-box;
                -moz-box-sizing: border-box;
                box-sizing: border-box;

            }

            .form-signin .form-control:focus{
                z-index: 2;

            }

            .form-signin input[type="text"]{
                margin-bottom: -1px;
                font-family: serif;
                border-bottom-left-radius: 0;
                border-bottom-right-radius: 0;
            }

            .form-signin input[type="password"]{
                margin-bottom: 10px;
                font-family: serif;
                border-top-left-radius: 0;
                border-top-right-radius: 0;
            }

            .account-wall{
                margin-top: 20px;
                padding: 40px 0px 20px 0px;
                background-color: burlywood;
                -moz-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
                -webkit-box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
                box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
                text-decoration: none;
                border-radius: 10px;

            }

            .profile-img{
                width: 96px;
                height: 96px;
                margin: 0 auto 10px;
                display: block;
                -moz-border-radius: 50%;
                -webkit-border-radius: 50%;
                border-radius: 50%;
            }

            .need-help{
                margin-top: 10px;
                font-family: serif;
            }

            footer{
                background-color: transparent;
                font-family: serif;
                font-style: italic;
                font-size: 16px;
            }
            
            label{
                font-family: serif;
                font-size: 20px;
            }

            .brand{
                font-family: serif;
                font-size: 70px;
                text-shadow: 4px 3px black;
            }

        </style>
    </head>
    <body>
        <div class="brand">KEDAI SUSU 53</div>
        <!-- Form Login -->
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="account-wall">
                        <img class="profile-img" src="Assets/Img/kedai53.png" alt="">
                        <form  class="form-signin" action="cek.login.php" method="post">
                            <label>Username</label>
                            <input type="text" name="username" id="username" class="form-control" placeholder="Masukkan Username" required autofocus autocomplete="no">
                            <label>Password</label>
                            <input type="password" name="password" id="password" class="form-control" placeholder="Masukkan Password" required>
                            
                            <input type="submit" name="masuk"button class="btn btn-lg btn-primary btn-block" value="Login" >
                            
<!--                            <a href="#" class="pull-right need-help">Forgot Password? </a><span class="clearfix"></span>-->
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Form Login -->

        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <p>Copyright Mr.Dickies &copy; 2019 Aplikasi Pemesanan E-Menu Kedai Susu 53</p>
                    </div>
                </div>
            </div>
        </footer>
        <script src="Assets/Js/jquery.js"></script>

        <script src="Assets/Js/bootstrap.min.js"></script>

        <script>
            $('.carousel').carousel({
                interval: 5000 //changes the speed
            })
        </script>
    </body>
</html>
