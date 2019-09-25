!DOCTYPE html>
<html lang="en">
    <head>
        <title>Report - APLIKASI PEMESANAN E-MENU</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="">
        <meta name="author" content="">
        
        <link href="Assets/Img/kedai53.png" rel='icon' type='image/x-icon'/>
       
        <link href="Assets/Css/bootstrap.min.css" rel="stylesheet">
        
        <link href="Assets/Css/business-casual.css" rel="stylesheet">
          <style>
            .brand{
                font-family: serif;
            }

            .brand-name{
                font-family: serif;
                font-size: 52px;
            }

            .brand-before{
                font-family: serif;
            }

            h2{
                font-family: serif;
                font-size: 52px;
            }

            .address-bar{
                font-family: serif;
            }
            
            footer{
                background-color: transparent;
                font-family: serif;
                font-style: italic;
                font-size: 16px;
            }
        </style>

    </head>
    <body>
        <div class="brand">KEDAI SUSU 53</div>
        <div class="address-bar">Jl.AM Sangaji No.53, Yogyakarta, Cokrodiningratan, Jetis, D.I.Y 55233</div>

       
        <nav class="navbar navbar-inverse" role="navigation">
            <div class="container">
               
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    
                    <a class="navbar-brand" href="">Kedai Susu 53</a>
                </div>
                
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                          <li>
                            <a href="halaman.admin.php"><span class="glyphicon glyphicon-home"></span> Home</a>
                        </li>
                        <li>
                           <a href="pesanan.php"><span class="glyphicon glyphicon-shopping-cart"></span> Pesanan</a>
                        </li>
                        <li>
                            <a href="report.php"><span class="glyphicon glyphicon-list-alt"></span> Report</a>
                        </li>
                        <li>
                            <a class=" btn dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> User<span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="password.php"><span class="glyphicon glyphicon-edit"></span> Change Password</a></li>
                                <li><a href="logout.php"><span class="glyphicon glyphicon-off"></span> Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>             
            </div>          
        </nav>
        <div class="container">
            <div class="row">
                <div class="box">
                    <div class="col-lg-12">
                        <hr>
                        <h2 class="intro-text text-center">
                            <strong>Laporan</strong>
                        </h2>
                        <hr>
                    </div>
                    <div class="col-lg-12 text-center">
                       
                    </div>
                </div>
            </div>

        </div>
        

        <footer>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <p>Copyright &copy; Aplikasi Pemesanan E-Menu 2019</p>
                    </div>
                </div>
            </div>
        </footer>
        
        <script src="Assets/Js/jquery.js"></script>
       
        <script src="Assets/Js/bootstrap.min.js"></script>
    </body>
</html>
