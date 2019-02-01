<?php  
		session_start();
		include_once 'dbconfig.php';
		if (isset($_SESSION['user']) != "") {
			header("Location: home.php");
		}
		if (isset($_POST['login_btn'])) {
			$email = $_POST['email'];
			$password = $_POST['password'];

		$row = $crud->getUser($email);

			if ($row['password'] == $password) {
				$_SESSION['user'] = $row['nama'];
				header("Location: home.php");
				} else {
					echo("Terjadi kesalahan");
				}
		}
?> 


<?php
	include_once 'dbconfig.php';
	if(isset($_POST['simpan'])) {
		$nama = $_POST['nama'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$tgl_lhr = $_POST['tgl_lhr'];
		$gambar=$_FILES["gambar"]["name"];
    	$no_telp = $_POST['no_telp'];
		$alamat = $_POST['alamat'];
		$tmp=$_FILES["gambar"]["tmp_name"];
    	$type=$_FILES["gambar"]["type"]; 
		$path="perusahaan/gambar_pelamar/".$gambar;
	
     if($crud->insertPDO($nama,$email,$password,$tgl_lhr,$gambar, $no_telp,$alamat)){
	 	move_uploaded_file($tmp,$path);
	  	echo "<script>alert('SUKSES MENDAFTAR')</script>";
     	}else{
     		echo "<script>alert('Gagal mendaftar')</script>";
     	}
	}
?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SILoker</title>

    <!-- Bootstrap Core CSS -->
    <link href="perusahaan/asset/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome CSS -->
    <link href="perusahaan/css/font-awesome.min.css" rel="stylesheet">
    
    
    <!-- Animate CSS -->
    <link href="perusahaan/css/animate.css" rel="stylesheet" >
    
    <!-- Owl-Carousel -->
    <link rel="stylesheet" href="perusahaan/css/owl.carousel.css" >
    <link rel="stylesheet" href="perusahaan/css/owl.theme.css" >
    <link rel="stylesheet" href="perusahaan/css/owl.transitions.css" >

    <!-- Custom CSS -->
    <link href="perusahaan/css/style.css" rel="stylesheet">
    <link href="perusahaan/css/responsive.css" rel="stylesheet">
    
    <!-- Colors CSS -->
    <link rel="stylesheet" type="text/css" href="perusahaan/css/color/green.css">
    
    
    
    <!-- Colors CSS -->
    <link rel="stylesheet" type="text/css" href="perusahaan/css/color/green.css" title="green">
    <link rel="stylesheet" type="text/css" href="perusahaan/css/color/light-red.css" title="light-red">
    <link rel="stylesheet" type="text/css" href="perusahaan/css/color/blue.css" title="blue">
    <link rel="stylesheet" type="text/css" href="perusahaan/css/color/light-blue.css" title="light-blue">
    <link rel="stylesheet" type="text/css" href="perusahaan/css/color/yellow.css" title="yellow">
    <link rel="stylesheet" type="text/css" href="perusahaan/css/color/light-green.css" title="light-green">

    <!-- Custom Fonts -->
    <link href='http://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    
    
    <!-- Modernizer js -->
    <script src="perusahaan/js/modernizr.custom.js"></script>

    
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body class="index">
    
    
    <!-- Styleswitcher
================================================== -->
        <div class="colors-switcher">
            <a id="show-panel" class="hide-panel"><i class="fa fa-tint"></i></a>        
                <ul class="colors-list">
                    <li><a title="Light Red" onClick="setActiveStyleSheet('light-red'); return false;" class="light-red"></a></li>
                    <li><a title="Blue" class="blue" onClick="setActiveStyleSheet('blue'); return false;"></a></li>
                    <li class="no-margin"><a title="Light Blue" onClick="setActiveStyleSheet('light-blue'); return false;" class="light-blue"></a></li>
                    <li><a title="Green" class="green" onClick="setActiveStyleSheet('green'); return false;"></a></li>
                    
                    <li class="no-margin"><a title="light-green" class="light-green" onClick="setActiveStyleSheet('light-green'); return false;"></a></li>
                    <li><a title="Yellow" class="yellow" onClick="setActiveStyleSheet('yellow'); return false;"></a></li>
                    
                    
                </ul>

        </div>  
<!-- Styleswitcher End
================================================== -->

    <!-- Navigation -->
    <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand page-scroll" style="font-size:45px" href="index.php">SILoker</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li class="hidden">
                        <a href="#page-top"></a>
                    </li>
                    
                    <li>
                        <a  style="font-size:15px;font-weight:bold" data-toggle = "modal" data-target = "#signupModal">Daftar</a>
                    </li>
                    <li>
                        <a style="font-size:15px;font-weight:bold" data-toggle = "modal" data-target = "#myModal">Masuk</a>
                    </li>
                    <li>
                        <a class="btn btn-primary animated3" style="font-size:15px;font-weight:bold" href="perusahaan">Perusahaan</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <!-- Modal for login -->
<div class = "modal fade" id = "myModal" tabindex = "-1" role = "dialog" 
   aria-labelledby = "myModalLabel" aria-hidden = "true">
   
   <div class = "modal-dialog">
      <div class = "modal-content">
         
         <div class = "modal-header">
            <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">
                  &times;
            </button>
            <div class="section-title text-center">
                        <h3>SILAHKAN LOGIN</h3>
                        
            </div>
            
         </div>
         <form class="form-signin" method="POST" style="padding:20px;" >
         
         <div class="form-group" >
                <input type="email" class="form-control" placeholder="Masukan email anda" name="email" required data-validation-required-message="Silahkan masukan email anda.">
        </div>
        <div class="form-group">
                <input type="password" class="form-control" placeholder="Masukan password anda" name="password" required data-validation-required-message="Silahkan masukan password anda.">
        </div>
         
         <div class = "modal-footer">
            
            <input type = "submit" class = "btn btn-primary" name="login_btn" value="Masuk">
               
         
			<input type = "button" class = "btn btn-default" data-dismiss = "modal" value="Batal">
              
         
            
        </form>
         </div>
         
      </div><!-- /.modal-content -->
   </div><!-- /.modal-dialog -->
  
</div><!-- /.modal -->
<!-- Modal for Signin-->
<div class = "modal fade" id = "signupModal" tabindex = "-1" role = "dialog" 
   aria-labelledby = "myModalLabel" aria-hidden = "true">
   
   <div class = "modal-dialog">
      <div class = "modal-content">
         
         <div class = "modal-header">
            <button type = "button" class = "close" data-dismiss = "modal" aria-hidden = "true">
                  &times;
            </button>
            <div class="section-title text-center">
                        <h3>SILAHKAN ISI DATA</h3>
                        
            </div>
            
         </div>
         <form method="POST" class="form-signin" enctype="multipart/form-data" style="padding:20px;" >
         
         <div class="form-group" >
                <input type="text" class="form-control" placeholder="Masukan nama anda" name="nama" required data-validation-required-message="Silahkan masukan nama anda.">
        </div>
         <div class="form-group" >
                <input type="email" class="form-control" placeholder="Masukan email anda" name="email" required data-validation-required-message="Silahkan masukan email anda.">
        </div>
        <div class="form-group">
                <input type="password" class="form-control" placeholder="Masukan password anda" name="password" required data-validation-required-message="Silahkan masukan password anda.">
        </div>

        <div class="form-group">
             <p>&nbspTanggal lahir</p>   <input type="date" class="form-control"  name="tgl_lhr" required data-validation-required-message="Silahkan masukan tanggal lahir anda.">
        </div>

        <div class="form-group">
                <input type="tel" class="form-control" placeholder="Masukan nomor telepon anda" name="no_telp" required data-validation-required-message="Silahkan masukan nomor telepon anda.">
        </div>
        <div class="form-group">
                <textarea name="alamat" class="form-control" placeholder="Masukan alamat rumah anda" required data-validation-required-message="Silahkan masukan alamat rumah anda."></textarea>
        </div>
        <div class="form-group">
            <p>&nbspPilih foto anda</p> <input type="file" name="gambar" class="form-control" required data-validation-required-message="Silahkan pilih foto anda.">
        </div>

         
         <div class = "modal-footer">
            
            <input type = "submit" class = "btn btn-primary" value="Daftar" name="simpan">
               
         
			<input type = "button" class = "btn btn-default" data-dismiss = "modal" value="Batal">
              
         
            
        </form>
         </div>
         
      </div><!-- /.modal-content -->
   </div><!-- /.modal-dialog -->
  
</div><!-- /.modal -->


    
    <!-- Start Home Page Slider -->
    <section id="page-top">
        <!-- Carousel -->
        <div id="main-slide" class="carousel slide" data-ride="carousel">

            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#main-slide" data-slide-to="0" class="active"></li>
                <li data-target="#main-slide" data-slide-to="1"></li>
                <li data-target="#main-slide" data-slide-to="2"></li>
            </ol>
            <!--/ Indicators end-->

            <!-- Carousel inner -->
            <div class="carousel-inner">
                <div class="item active">
                    <img class="img-responsive" src="perusahaan/gambar/bg1.jpg" alt="slider">
                    <div class="slider-content">
                        <div class="col-md-12 text-center">
                            <h1 class="animated3">
                                <span><strong>Selamat Datang</strong> di SILoker</span>
                            </h1>
                            <p class="animated2">Kami menyediakan lowongan kerja yang berkualitas<br> Temukan pekerjaan yang tepat dan sesuai untuk anda</p>	
                            
                        </div>
                    </div>
                </div>
                <!--/ Carousel item end -->
                
                <div class="item">
                    <img class="img-responsive" src="perusahaan/gambar/bg2.jpg" alt="slider">
                    
                    <div class="slider-content">
                        <div class="col-md-12 text-center">
                            <h1 class="animated1">
                    		  <span>Kenapa <strong>SILoker?</strong></span>
                    	    </h1>
                            <p class="animated2">Lebih mudah mencari lowongan pekerjaan<br> Daftar gaji sesuai, peta lokasi dan informasi perusahaan</p>
                            
                        </div>
                    </div>
                </div>
                <!--/ Carousel item end -->
                
                <div class="item">
                    <img class="img-responsive" src="perusahaan/gambar/bg3.jpg" alt="slider">
                    <div class="slider-content">
                        <div class="col-md-12 text-center">
                            <h1 class="animated2">
                                <span><strong>Jalan menuju </strong>Sukses</span>
                            </h1>
                            <p class="animated1">jadilah pekerja yang memiliki potensi<br> Banyak perusahaan membutuhkan anda</p>	
                             
                        </div>
                    </div>
                </div>
                <!--/ Carousel item end -->
            </div>
            <!-- Carousel inner end-->

            <!-- Controls -->
            <a class="left carousel-control" href="#main-slide" data-slide="prev">
                <span><i class="fa fa-angle-left"></i></span>
            </a>
            <a class="right carousel-control" href="#main-slide" data-slide="next">
                <span><i class="fa fa-angle-right"></i></span>
            </a>
        </div>
        <!-- /carousel -->
    </section>
    <!-- End Home Page Slider -->

    
    
    
 
    
    
    <!-- Start About Us Section -->
    <section id="about-us" class="about-us-section-1">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="section-title text-center">
                            <h3>About Us</h3>
                            <p>Duis aute irure dolor in reprehenderit in voluptate</p>
                        </div>
                </div>
            </div>
            <div class="row">
                
                <div class="col-md-4">
                    <div class="welcome-section text-center">
                        <img src="perusahaan/gambar/about-01.jpg" class="img-responsive" alt="..">
                        <h4>Office Philosophy</h4>
                        <div class="border"></div>
                        <p>Duis aute irure dolor in reprehen derit in voluptate velit essecillum dolore eu fugiat nulla pariatur. Lorem reprehenderit</p>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="welcome-section text-center">
                        <img src="perusahaan/gambar/about-02.jpg" class="img-responsive" alt="..">
                        <h4>Office Mission & Vission</h4>
                        <div class="border"></div>
                        <p>Duis aute irure dolor in reprehen derit in voluptate velit essecillum dolore eu fugiat nulla pariatur. Lorem reprehenderit</p>
                    </div>
                </div>
                
                <div class="col-md-4">
                    <div class="welcome-section text-center">
                        <img src="perusahaan/gambar/about-03.jpg" class="img-responsive" alt="..">
                        <h4>Office Value & Rules</h4>
                        <div class="border"></div>
                        <p>Duis aute irure dolor in reprehen derit in voluptate velit essecillum dolore eu fugiat nulla pariatur. Lorem reprehenderit</p>
                    </div>
                </div>
                
            </div>         
            
        </div>
    </section>
    <!-- End About Us Section -->

    
    
    
    


        
        <footer class="style-1">
            <div class="container">
                <div class="row">
                    <div class="col-md-4 col-xs-12">
                        <span class="copyright">Copyright &copy; <a href="http://guardiantheme.com">GuardinTheme</a> 2015</span>
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <div class="footer-social text-center">
                            <ul>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-4 col-xs-12">
                        <div class="footer-link">
                            <ul class="pull-right">
                                <li><a href="#">Privacy Policy</a>
                                </li>
                                <li><a href="#">Terms of Use</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
   


    <div id="loader">
        <div class="spinner">
            <div class="dot1"></div>
            <div class="dot2"></div>
        </div>
    </div>

    

    <!-- jQuery Version 2.1.1 -->
    <script src="perusahaan/js/jquery-2.1.1.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="perusahaan/asset/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="perusahaan/js/jquery.easing.1.3.js"></script>
    <script src="perusahaan/js/classie.js"></script>
    <script src="perusahaan/js/count-to.js"></script>
    <script src="perusahaan/js/jquery.appear.js"></script>
    <script src="perusahaan/js/cbpAnimatedHeader.js"></script>
    <script src="perusahaan/js/owl.carousel.min.js"></script>
	<script src="perusahaan/js/jquery.fitvids.js"></script>
	<script src="perusahaan/js/styleswitcher.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="perusahaan/js/jqBootstrapValidation.js"></script>
    <script src="perusahaan/js/contact_me.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="perusahaan/js/script.js"></script>
<script src="perusahaan/scripts/jquery-2.1.3.min.js"></script>
<script src="perusahaan/scripts/custom.js"></script>
<script src="perusahaan/scripts/jquery.superfish.js"></script>
<script src="perusahaan/scripts/jquery.themepunch.tools.min.js"></script>
<script src="perusahaan/scripts/jquery.themepunch.revolution.min.js"></script>
<script src="perusahaan/scripts/jquery.themepunch.showbizpro.min.js"></script>
<script src="perusahaan/scripts/jquery.flexslider-min.js"></script>
<script src="perusahaan/scripts/chosen.jquery.min.js"></script>
<script src="perusahaan/scripts/jquery.magnific-popup.min.js"></script>
<script src="perusahaan/scripts/waypoints.min.js"></script>
<script src="perusahaan/scripts/jquery.counterup.min.js"></script>
<script src="perusahaan/scripts/jquery.jpanelmenu.js"></script>
<script src="perusahaan/scripts/stacktable.js"></script>
<script src="perusahaan/scripts/headroom.min.js"></script>

</body>

</html>
