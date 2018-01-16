<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title><?php echo config_site('nome_site');?> - Login</title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta content="width=device-width, initial-scale=1.0" name="viewport"/>
<meta http-equiv="Content-type" content="text/html; charset=utf-8">
<meta content="" name="description"/>
<meta content="" name="author"/>

<!-- NOVO DASH -->

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url();?>/assets/frontend/novo/assets/css/bootstrap.css" rel="stylesheet">
    <!--external css-->
    <link href="<?php echo base_url();?>/assets/frontend/novo/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url();?>/assets/frontend/novo/assets/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url();?>/assets/frontend/novo/assets/css/style-responsive.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->



<link rel="shortcut icon" href="<?php echo base_url('uploads/'.config_site('favicon'));?>"/>
</head>
<!-- END HEAD -->
<!-- BEGIN BODY -->


<body onload="getTime()">

      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->

	  	<div class="container">
	  		<div class="col-lg-4 col-lg-offset-4">
	  			<div class="logo" >
				<a href="<?php echo site_url();?>">
					<img style="width:100%; height:auto;" src="<?php echo base_url('uploads/'.config_site('imagem_logo'));?>" alt=""/>
				</a>
				</div>
			</div>
<!-- 			<div class="col-lg-12 col-lg-offset">
		  		<div class="clearfix" style="padding:40px 0; width:100%; height:0; padding-bottom:47.7%; position:relative;">
					<iframe style="width:100%; height:100%; position:absolute; top:0; left:0" src="https://www.youtube.com/embed/niwK6quBID0" frameborder="0" allowfullscreen></iframe>
				</div>
	  		</div> -->
	  		<div id="showtime"></div>
	  			<div class="col-lg-4 col-lg-offset-4">
		  			
	  				<div class="lock-screen">
		  				<h2><a data-toggle="modal" href="#myModal"><i class="fa fa-lock"></i></a></h2>
		  				<p style="color:#fff">SITE EM MANUTENÇÃO. AGUARDE</p>
		  				
				          <!-- Modal -->
				          <!-- <div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="myModal" class="modal fade">
				              <div class="modal-dialog">
				                  <div class="modal-content">
				                      <div class="modal-header">
				                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
				                          <h4 class="modal-title">Welcome Back</h4>
				                      </div>
				                      <div class="modal-body">
				                          <p class="centered"><img class="img-circle" width="80" src="<?php echo base_url();?>assets/frontend/novo/assets/img/ui-sam.jpg"></p>
				                          <input type="password" name="password" placeholder="Password" autocomplete="off" class="form-control placeholder-no-fix">
				
				                      </div>
				                      <div class="modal-footer centered">
				                          <button data-dismiss="modal" class="btn btn-theme04" type="button">Cancel</button>
				                          <button class="btn btn-theme03" type="button">Login</button>
				                      </div>
				                  </div>
				              </div>
				          </div> -->
				          <!-- modal -->
		  				
		  				
	  				</div><! --/lock-screen -->
	  			</div><!-- /col-lg-4 -->
	  	
	  	</div><!-- /container -->

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url();?>/assets/frontend/novo/assets/js/jquery.js"></script>
    <script src="<?php echo base_url();?>/assets/frontend/novo/assets/js/bootstrap.min.js"></script>

    <!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
    <script type="text/javascript" src="<?php echo base_url();?>/assets/frontend/novo/assets/js/jquery.backstretch.min.js"></script>
    <script>
        $.backstretch("http://dubaibuildingsforsale.com/wp-content/uploads/2015/06/dubai-at-night-hd-download-background-wallpaper-city-high-dubai-wallpaper-full-hd-1080p-2012-1920x1080-shops-iphone-5-guide-ipad-city-night.jpg", {speed: 500});
    </script>

    <script>
        function getTime()
        {
            var today=new Date();
            var h=today.getHours();
            var m=today.getMinutes();
            var s=today.getSeconds();
            // add a zero in front of numbers<10
            m=checkTime(m);
            s=checkTime(s);
            document.getElementById('showtime').innerHTML=h+":"+m+":"+s;
            t=setTimeout(function(){getTime()},500);
        }

        function checkTime(i)
        {
            if (i<10)
            {
                i="0" + i;
            }
            return i;
        }
    </script>

  </body>
</html>