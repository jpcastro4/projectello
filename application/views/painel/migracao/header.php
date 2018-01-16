<?php

  check_session();
 
?>
<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->

<head>
<meta charset="utf-8"/>
<title><?php echo config_site("nome_site");?> | <?php echo $titulo;?></title>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" />
<meta content="" name="description"/>
<meta content="" name="author"/>
    
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/css/materialize.min.css">
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/ajuda/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?php echo base_url();?>assets/ajuda/plugins/sweetalert/sweetalert.css">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700|Quicksand:400,700" rel="stylesheet">

     <script>(function(e,t,n){var r=e.querySelectorAll("html")[0];r.className=r.className.replace(/(^|\s)no-js(\s|$)/,"$1js$2")})(document,window,0);</script>
    <!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
    <!-- Smartsupp Live Chat script -->
  
    <link rel="shortcut icon" href="<?php echo base_url("uploads/".config_site('favicon'));?>"/>
    <style type="text/css">
        *, :after, :before {
          -webkit-box-sizing: border-box;
          -moz-box-sizing: border-box;
          box-sizing: border-box;
        }
        body, html{
          font-size:13px;
          font-family: 'Open Sans', sans-serif;
        }
        h1,h2,h3,h4,h5,h6{
          font-family: 'Quicksand', sans-serif;
        }
        h2{
          font-weight: 700;
          font-size:30px;
        }
        .btn-block{
            width:100%;
        }
        .relative{
          position:relative;
        }
        pre {
             white-space: pre-wrap;       /* css-3 */
             white-space: -moz-pre-wrap;  /* Mozilla, since 1999 */
             white-space: -pre-wrap;      /* Opera 4-6 */
             white-space: -o-pre-wrap;    /* Opera 7 */
             word-wrap: break-word;       /* Internet Explorer 5.5+ */
             border:1px solid #ccc;
             border-radius: 4px;
             padding:5px;
        }
        .cf:before,
        .cf:after {
            content: " "; /* 1 */
            display: table; /* 2 */
        }

        .cf:after {
            clear: both;
        }

        /**
         * For IE 6/7 only
         * Include this rule to trigger hasLayout and contain floats.
         */
        .cf {
            *zoom: 1;
        }
        .block{
            display: block;
        }
        .card{
          box-shadow: none;
        }
        .card-title, .modal-title{
          font-family: 'Quicksand', sans-serif;
          font-weight: 700 !important;
          font-size:28px;
        }
        .chip{
          font-family: 'Quicksand', sans-serif;
          font-weight: 700 !important;
        }
        .super-user{
          position:fixed;
          bottom:8%;
          right:-180px;
          width:180px;
          height:200px;
          z-index:99999;
        }
        .labelsuperuser{
          width: 220px;
          max-width: 220px;
          padding:10px;
          font-size:12px;
          color:#fff;
          background:grey;
          transform: rotate(-90deg);
          position:absolute;
          left:-130px;
          top:0;
          margin-top: 50%;
          text-align: center;
        }
        .super-user:hover {
          right:0;
        }

        .rede{
          position:relative;
          overflow:hidden;
        }

        .tree-responsive{
            clear: both;
            width: 100%;
            position:relative;
            width: 100%;
            overflow:hidden;
        }
        .tree{
            overflow:hidden;
        }

        #draggable{
            width:100%;
            min-width: 20000px;
            clear: both;
        }
        
        .tree ul {
            padding-top: 20px;
            position: relative;
            clear:both;
            transition: all 0.5s;
            -webkit-transition: all 0.5s;
            -moz-transition: all 0.5s;
        }

        .tree li {
            float: left; text-align: center;
            list-style-type: none;
            position: relative;
            padding: 20px 2px 0 2px;
            
            transition: all 0.5s;
            -webkit-transition: all 0.5s;
            -moz-transition: all 0.5s;
        }

        /*We will use ::before and ::after to draw the connectors*/

        .tree li::before, .tree li::after{
            content: '';
            position: absolute; top: 0; right: 50%;
            border-top: 1px solid #ccc;
            width: 50%; height: 20px;
        }
        .tree li::after{
            right: auto; left: 50%;
            border-left: 1px solid #ccc;
        }

        /*We need to remove left-right connectors from elements without 
        any siblings*/
        .tree li:only-child::after, .tree li:only-child::before {
            display: none;
        }

        /*Remove space from the top of single children*/
        .tree li:only-child{ padding-top: 0; left:-5px;}

        /*Remove left connector from first child and 
        right connector from last child*/
        .tree li:first-child::before, .tree li:last-child::after{
            border: 0 none;
        }
        /*Adding back the vertical connector to the last nodes*/
        .tree li:last-child::before{
            border-right: 1px solid #ccc;
            border-radius: 0 5px 0 0;
            -webkit-border-radius: 0 5px 0 0;
            -moz-border-radius: 0 5px 0 0;
        }
        .tree li:first-child::after{
            border-radius: 5px 0 0 0;
            -webkit-border-radius: 5px 0 0 0;
            -moz-border-radius: 5px 0 0 0;
        }

        /*Time to add downward connectors from parents*/
        .tree ul ul::before{
            content: '';
            position: absolute; top: 0; left: 50%;
            border-left: 1px solid #ccc;
            width: 0; height: 20px;
        }

        .tree li a{
            border: 1px solid #ccc;
            padding: 5px 10px;
            text-decoration: none;
            color: #666;
            font-family: arial, verdana, tahoma;
            font-size: 9px;
            display: inline-block;
            
            border-radius: 5px;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            
            transition: all 0.5s;
            -webkit-transition: all 0.5s;
            -moz-transition: all 0.5s;
        }

        /*Time for some hover effects*/
        /*We will apply the hover effect the the lineage of the element also*/
        .tree li a:hover, .tree li a:hover+ul li a {
            background: #ccc !important; color: #000 !important; border-color: #fff;
        }
        /*Connector styles on hover*/
        .tree li a:hover+ul li::after, 
        .tree li a:hover+ul li::before, 
        .tree li a:hover+ul::before, 
        .tree li a:hover+ul ul::before{
            border-color:  #94a0b4;
        }

        .avatar-frame{
            border: 2px solid #c7b89e;
            text-align: center;
            width: 50px;
            height: 50px;
            -webkit-border-radius: 50%; /* Saf3+, Chrome */
            border-radius: 50%; /* Opera 10.5, IE 9 */
            /*-moz-border-radius: 30px;  Disabled for FF1+ */
            margin-left:auto;
            margin-right: auto;
            margin-bottom:5px;
        }
        .avatar-frame img{
            -webkit-border-radius: 50%; /* Saf3+, Chrome */
            border-radius: 50%; /* Opera 10.5, IE 9 */
        }
    </style>
</head>

<!-- END HEAD -->

<body>

    <div class="loader loader-default is-active"></div>
        <ul id="dropRede" class="dropdown-content">
            <li><a href="<?php echo base_url('painel/indicados');?>">Por Tabela</a></li>
            <li><a href="<?php echo base_url('painel/organograma');?>">Organograma</a></li>
        </ul>
    <nav >
        <div class="nav-wrapper light-blue darken-4">
            <a href="<?php echo base_url();?>" class="brand-logo center">
                <img width="230" src="<?php echo base_url();?>assets/ads-logo-painel.png" />
            </a>

           
            
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="<?php echo base_url('painel');?>">Painel</a></li>
                <li><a href="<?php echo base_url('painel/perfil');?>">Perfil</a></li>
                <li><a class="dropdown-button" href="#!" data-activates="dropRede">Veja sua Rede<i class="material-icons right">arrow_drop_down</i></a></li>
                <li><a href="<?php echo base_url('painel/publicador');?>">Publicador</a></li>
                <li class=" red darken-4" ><a href="<?php echo base_url('painel/sair');?>"><i class="material-icons right">power_settings_new</i> Sair</a></li>

                
            </ul>

        </div>
    </nav>

    <div class="container">
      <!-- <div class="row"> -->
            <div class="col s12 m12">
                <div class="row">
                    <div class="card-panel red darken-1">
                        <span class="white-text">I am a very simple card. I am good at containing small bits of information.
                      I am convenient because I require little markup to use effectively. I am similar to what is called a panel in other frameworks.
                            </span>
                    </div>
                </div>
            </div>
        <!-- </div> -->
    </div>