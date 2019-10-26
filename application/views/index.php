<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>BNN - Kab. Gorontalo Utara</title>
    <!-- Font Awesome Icons -->
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic' rel='stylesheet' type='text/css'>
    <!-- Theme CSS - Includes Bootstrap -->
    <link href=<?php echo base_url("assets/main/css/creative.css")?> rel="stylesheet">
</head>
<body id="main">
    <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
        <div class="container">
            <a class="navbar-brand js-scroll-trigger" href="JavaScript:;"><img style="width:60%" src="<?php echo base_url("assets/main/img/logo.png")?>"><a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse " id="navbarResponsive">
                <ul class="navbar-nav ml-auto my-2 my-lg-0">
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger " href="<?php echo site_url("operation/tentang")?>">Tentang</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="<?php echo site_url("operation/hubungikami")?>">Hubungi Kami</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="<?php echo site_url("admin")?>">Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <header class="masthead">
        <div class="container ">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-12 align-self-end">
                    <h1 class="text-uppercase text-black font-weight-bold">ANDA MELIHAT DAN MENGETAHUI
                        <BR>TINDAK PIDANA PENYALAHGUNAAN
                        <BR>
                    </h1>
                    <h1 class="text-uppercase text-white font-weight-bold">DAN PEREDARAN GELAP
                        <BR>NARKOTIKA?</h1>
                </div>
            </div>
            <div class="lapor-sekarang">
                <a class="btn btn-warning btn-sm js-scroll-trigger" id="lapor-button" href="<?php echo site_url("operation/pengaduan") ?>"><b>BUAT LAPORAN</b></a>
                <p> <img class="text-laport" src="<?php echo base_url("assets/main/img/laporsekarang.png")?>"> </p>
            </div>
            
        </div>
    </header>
    <footer>
        <div style="position: relative; text-align: center">
            <p style="position: fixed; bottom: 0; width:100%;">Hidup Sehat Tanpa Narkoba</p>
        </div>
    </footer>
    <!-- Bootstrap core JavaScript -->
    <script src="<?php echo base_url("assets/main/vendor/jquery/jquery.min.js")?>"></script>
    <script src="<?php echo base_url("assets/main/vendor/bootstrap/js/bootstrap.bundle.min.js")?>"></script>
    <!-- lugin JavaScript -->
    <script src="<?php echo base_urk("assets/main/vendor/jquery-easing/jquery.easing.min.js")?>"></script>
    <script src="<?php echo base_url("assets/main/vendor/magnific-popup/jquery.magnific-popup.min.js")?>"></script>
    <!-- Custom scripts for this template -->
    <script src="<?php echo base_url("assets/main/js/creative.min.js")?>"></script>
</body>
</html>