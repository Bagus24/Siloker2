<?php  
	session_start();
	include_once 'dbconfig.php';
	if(!isset($_SESSION['user'])) {
		header("Location: index.php");
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
    <nav  class="navbar navbar-ku navbar-fixed-top" style="background-color:#222;padding:15px;">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" style="font-family: Kaushan Script; font-size:28px;" href="index.php">SILoker</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <form action="cari.php" method="post">
                <ul class="nav navbar-nav navbar-right">
                
                    <li>
                    <input id="kata_kunci" type="text" class="form-control" size="50" style="height:55px" placeholder="Cari pekerjaan anda" name="kata_kunci" >
                    </li>
                
                    <li>&nbsp&nbsp&nbsp<button type="submit" class="btn btn-primary" style="height:55px" name="cari" ><span class="glyphicon glyphicon-search" ></span>&nbspCari</button></li>
                    
                
                
                    
                </ul>
            </form>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>



<?php  include("list_menu.php"); ?>



					
<div class="col-lg-8 well col-lg-offset-3" style="top:150px;background:white;font-family:Helvetica">
    <div class = "modal-header">
            <h3 align="center" >
               Lowongan Pekerjaan
            </h3>
    </div>
    <br>
    <div>
        <div>
    <br>
    <div>
        <?php
            $query = "SELECT * FROM company";
            $crud->tampilLowongan($query);
        ?>
    </div>
    
    </div>

    
        
</div>

 	    

		<!--content -->

    
    

    
    


 


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
    <script src="perusahaan/js/jquery.autocomplete.min.js"></script>
    <script type="text/javascript">
            $(document).ready(function() {

                // Selector input yang akan menampilkan autocomplete.
                $( "#kata_kunci" ).autocomplete({
                    serviceUrl: "source.php",   // Kode php untuk prosesing data.
                    dataType: "JSON",           // Tipe data JSON.
                    onSelect: function (suggestion) {
                        $( "#kata_kunci" ).val("" + suggestion.kata_kunci);
                    }
                });
            })
        </script>

    <!-- Contact Form JavaScript -->
    <script src="perusahaan/js/jqBootstrapValidation.js"></script>
    <script src="perusahaan/js/contact_me.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="perusahaan/js/script.js"></script>

</body>

</html>
