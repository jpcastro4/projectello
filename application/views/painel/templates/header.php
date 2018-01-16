<?php

  check_session();
 
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="description" content="bootstrap material admin template">
    <meta name="viewport" content="width=device-width">
    <title><?php echo config_site("nome_site");?> | <?php echo $titulo;?></title>
    <!-- Favicons -->
    <link rel="shortcut icon" href="<?php echo base_url()?>assets/bo/assets/favicon/favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" href="<?php echo base_url()?>assets/bo/assets/favicon/apple-touch-icon.png" />
    <link rel="apple-touch-icon" sizes="57x57" href="<?php echo base_url()?>assets/bo/assets/favicon/apple-touch-icon-57x57.png" />
    <link rel="apple-touch-icon" sizes="72x72" href="<?php echo base_url()?>assets/bo/assets/favicon/apple-touch-icon-72x72.png" />
    <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url()?>assets/bo/assets/favicon/apple-touch-icon-76x76.png" />
    <link rel="apple-touch-icon" sizes="114x114" href="<?php echo base_url()?>assets/bo/assets/favicon/apple-touch-icon-114x114.png" />
    <link rel="apple-touch-icon" sizes="120x120" href="<?php echo base_url()?>assets/bo/assets/favicon/apple-touch-icon-120x120.png" />
    <link rel="apple-touch-icon" sizes="144x144" href="<?php echo base_url()?>assets/bo/assets/favicon/apple-touch-icon-144x144.png" />
    <link rel="apple-touch-icon" sizes="152x152" href="<?php echo base_url()?>assets/bo/assets/favicon/apple-touch-icon-152x152.png" />
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url()?>assets/bo/assets/favicon/apple-touch-icon-180x180.png" />
    <!-- Google Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,300%7CRaleway:400,300%7CRoboto:400,700,300%7CLato' rel='stylesheet' type='text/css' />
    <!-- Icon CSS -->
    <link rel="stylesheet" href="<?php echo base_url()?>assets/bo/assets/css/global/iconstyle.css" />
    <link rel="stylesheet" href="<?php echo base_url()?>assets/bo/assets/fonts/font-awasome/font-awesome.min.css" />
    <!-- Global plugin CSS -->
    <link rel="stylesheet" href="<?php echo base_url()?>assets/bo/assets/css/global/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo base_url()?>assets/bo/assets/css/switchery/switchery.min.css" />
    <link rel="stylesheet" href="<?php echo base_url()?>assets/bo/assets/css/global/slidePanel.min.css" />
    <link rel="stylesheet" href="<?php echo base_url()?>assets/bo/assets/css/global/waves.min.css" />
    <link rel="stylesheet" href="<?php echo base_url()?>assets/bo/assets/plugin/bootstrap-tour/css/bootstrap-tour.css" />
    <!--  Global Template CSS -->
    <link rel="stylesheet" href="<?php echo base_url()?>assets/bo/assets/css/global/style.css" />
    <link id="site-color" rel="stylesheet" href="<?php echo base_url()?>assets/bo/assets/css/colors/default.css" />
     <link id="site-color" rel="stylesheet" href="<?php echo base_url()?>assets/bo/assets/css/colors/gray.css " />

     <!--  Page CSS -->
      <link rel="stylesheet" href="<?php echo base_url()?>assets/bo/assets/css/vector-map/custom.css" />
      <link rel="stylesheet" href="<?php echo base_url()?>assets/bo/assets/css/dashboard/infobox.css" />
      <link rel="stylesheet" href="<?php echo base_url()?>assets/bo/assets/css/dashboard/dashboard.css" />
      <!--  Page plugin CSS -->
      <link rel="stylesheet" href="<?php echo base_url()?>assets/bo/assets/plugin/magnific-popup/css/magnific-popup.min.css" />
      <link href="<?php echo base_url()?>assets/bo/assets/css/vector-map//jquery-jvectormap-2.0.1.css" rel="stylesheet" type="text/css" media="screen" />
      <link rel="stylesheet" href="<?php echo base_url()?>assets/bo/assets/fonts/weather/weather-icons.min.css" />
      <link href="<?php echo base_url()?>assets/bo/assets/css/morrischarts/morris.css" rel="stylesheet" type="text/css" />
      <link href="<?php echo base_url()?>assets/bo/assets/css/rickshaw/rickshaw.min.css" rel="stylesheet" type="text/css"/>
    
    <link rel="stylesheet" href="<?php echo base_url()?>assets/bo/assets/css/global/responsive.css" />
    <link rel="stylesheet" href="<?php echo base_url()?>assets/bo/assets/css/global/site.min.css" />
    <link rel="stylesheet" href="<?php echo base_url()?>assets/bo/assets/css/rede.css" />

    <?php if( $_SERVER['HTTP_HOST'] != 'localhost'):
       if( !$this->native_session->get('superuser') ): ?>
      <script type="text/javascript">
      var _smartsupp = _smartsupp || {};
      _smartsupp.key = '4bda0b6f2e1bbbb42073c716892e42dca2b2f079';
      window.smartsupp||(function(d) {
        var s,c,o=smartsupp=function(){ o._.push(arguments)};o._=[];
        s=d.getElementsByTagName('script')[0];c=d.createElement('script');
        c.type='text/javascript';c.charset='utf-8';c.async=true;
        c.src='//www.smartsuppchat.com/loader.js?';s.parentNode.insertBefore(c,s);
      })(document);
      </script>
      <script>
            smartsupp('email', '<?php echo $this->painel_model->user('email'); ?>');
            smartsupp('name', '<?php echo $this->painel_model->user('nome'); ?>');
          </script>
          <script>
          smartsupp('variables', {
            userId: {
              label: 'ID ',
              value: '<?php echo $this->painel_model->user('id'); ?>'
            },
            login: {
              label: 'Login',
              value: '<?php echo $this->painel_model->user('login'); ?>'
            },
            ciclo: {
              label: 'Ciclo',
              value: '<?php echo $this->painel_model->user('ciclo'); ?>'
            }
          });
        </script>
    
    <?php endif; ?>
    
    <script>
      (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

      ga('create', 'UA-86823466-1', 'auto');
      ga('send', 'pageview');
      ga('set', 'userId', <?php echo $this->painel_model->user('id'); ?>); // Defina o ID de usuário usando o user_id conectado.

    </script>

    <?php endif;?>

  </head>
  <body class="dashboard site-navbar-small profile">
    <!-- Start Header Section -->
    <div class="main-header navbar navbar-default navbar-fixed-top navbar-inverse navbar-mega">
      <div class="navbar-header">
        <!--  Template Logo -->
        <a class="navbar-brand" href="../dashboard_v1.html">
        <img class="navbar-brand-logo navbar-brand-logo-normal" src="<?php echo base_url()?>assets/bo/assets/images/logo.png" title="Porish" alt="logo">
        </a>
      </div>
      <div class="navbar-container container-fluid">
        <div class="collapse navbar-collapse navbar-block navbar-collapse-toolbar" id="site-navbar-collapse">
          <!--  Menu -->
          <div class="utmenucontainer">
            <div class="overlapblackbg"></div>
            <a id="wsnavtoggle" class="animated-arrow"><span></span></a>
            <nav class="utmenu">
              <ul class="mobile-sub utmenu-list">
                <li>
                  <div class="navbar-header mobile-res-logo">
                    <a class="navbar-brand" href="javascript:void(0)">
                    <img class="navbar-brand-logo navbar-brand-logo-normal" src="<?php echo base_url()?>assets/bo/assets/images/logo.png" title="Porish" alt="logo">
                    </a>
                  </div>
                </li>
                <li>
                  <a class="waves-effect waves-light" href="javascript:void(0)"> <i class="layout-icon icon_archive_alt" aria-hidden="true"></i> Layouts <span class="arrow_carrot-down" aria-hidden="true"></span></a>
                  <ul class="utmenu-submenu">
                    <li>
                      <span class="wsmenu-click02"></span><a class="waves-effect waves-light" href="javascript:void(0)">Dashboard<span class="arrow_carrot-down" aria-hidden="true"></span></a>
                      <ul class="utmenu-submenu-sub">
                        <li><a class="waves-effect waves-light" href="../dashboard_v1.html">Dashboard 1</a></li>
                        <li><a class="waves-effect waves-light" href="../dashboard_v2.html">Dashboard 2</a></li>
                        <li><a class="waves-effect waves-light" href="../dashboard_v3.html">Dashboard 3</a></li>
                      </ul>
                    </li>
                    <li><a class="waves-effect waves-light" href="../layouts/grids.html">Grid System</a></li>
                    <li><a class="waves-effect waves-light" href="../layouts/layout-grid.html">Layout Grids</a></li>
                  </ul>
                </li>
                <li>
                  <a class="waves-effect waves-light" href="javascript:void(0)"> <i class="layout-icon icon_document_alt" aria-hidden="true"></i> Features <span class="arrow_carrot-down" aria-hidden="true"></span></a>
                  <ul class="utmenu-submenu">
                    <li>
                      <span class="wsmenu-click02"></span><a class="waves-effect waves-light" href="javascript:void(0)">General Pages<span class="arrow_carrot-down" aria-hidden="true"></span></a>
                      <ul class="utmenu-submenu-sub">
                        <li><a class="waves-effect waves-light" href="../features/faq.html">FAQ</a></li>
                        <li><a class="waves-effect waves-light" href="../features/userlist.html">User List</a></li>
                        <li><a class="waves-effect waves-light" href="../features/Invoice.html">Invoice</a></li>
                        <li><a class="waves-effect waves-light" href="../features/blank.html">Blank</a></li>
                        <li><a class="waves-effect waves-light" href="../features/profile.html">Profile</a></li>
                        <li><a class="waves-effect waves-light" href="../features/search.html">Search</a></li>
                        <li><a class="waves-effect waves-light" href="../features/gallery.html">Gallery</a></li>
                        <li><a class="waves-effect waves-light" href="../features/gallery-grid.html">Gallery Grid</a></li>
                        <li><a class="waves-effect waves-light" href="../features/maintenance.html">Maintenance</a></li>
                        <li><a class="waves-effect waves-light" href="../features/email.html">Email</a></li>
                      </ul>
                    </li>
                    <li>
                      <span class="wsmenu-click02"></span><a class="waves-effect waves-light" href="javascript:void(0)">Error Pages<span class="arrow_carrot-down" aria-hidden="true"></span></a>
                      <ul class="utmenu-submenu-sub">
                        <li><a class="waves-effect waves-light" href="../features/error-400.html">Error 400</a></li>
                        <li><a class="waves-effect waves-light" href="../features/error-403.html">Error 403</a></li>
                        <li><a class="waves-effect waves-light" href="../features/error-404.html">Error 404</a></li>
                        <li><a class="waves-effect waves-light" href="../features/error-405.html">Error 405</a></li>
                        <li><a class="waves-effect waves-light" href="../features/error-500.html">Error 500</a></li>
                        <li><a class="waves-effect waves-light" href="../features/error-503.html">Error 503</a></li>
                      </ul>
                    </li>
                    <li>
                      <span class="wsmenu-click02"></span><a class="waves-effect waves-light" href="javascript:void(0)">Maps<span class="arrow_carrot-down" aria-hidden="true"></span></a>
                      <ul class="utmenu-submenu-sub">
                        <li><a class="waves-effect waves-light" href="../features/maps.html">Google Maps</a></li>
                        <li><a class="waves-effect waves-light" href="../features/vector-map.html">Vector Map</a></li>
                      </ul>
                    </li>
                    <li>
                      <span class="wsmenu-click02"></span><a class="waves-effect waves-light" href="javascript:void(0)">Login<span class="arrow_carrot-down" aria-hidden="true"></span></a>
                      <ul class="utmenu-submenu-sub">
                        <li><a class="waves-effect waves-light" href="../features/login.html">Login Page 1</a></li>
                        <li><a class="waves-effect waves-light" href="../features/login_v2.html">Login Page 2</a></li>
                        <li><a class="waves-effect waves-light" href="../features/login_v3.html">Login Page 3</a></li>
                      </ul>
                    </li>
                    <li>
                      <span class="wsmenu-click02"></span><a class="waves-effect waves-light" href="javascript:void(0)">Register<span class="arrow_carrot-down" aria-hidden="true"></span></a>
                      <ul class="utmenu-submenu-sub">
                        <li><a class="waves-effect waves-light" href="../features/register.html">Register Page 1</a></li>
                        <li><a class="waves-effect waves-light" href="../features/register_v2.html">Register Page 2</a></li>
                        <li><a class="waves-effect waves-light" href="../features/register_v3.html">Register Page 3</a></li>
                      </ul>
                    </li>
                    <li>
                      <span class="wsmenu-click02"></span><a class="waves-effect waves-light" href="javascript:void(0)">Forgot Password<span class="arrow_carrot-down" aria-hidden="true"></span></a>
                      <ul class="utmenu-submenu-sub">
                        <li><a class="waves-effect waves-light" href="../features/forgot_password.html">Forgot Password 1</a></li>
                        <li><a class="waves-effect waves-light" href="../features/forgot_password_v2.html">Forgot Password 2</a></li>
                      </ul>
                    </li>
                    <li>
                      <span class="wsmenu-click02"></span><a class="waves-effect waves-light" href="javascript:void(0)">Lockscreen<span class="arrow_carrot-down" aria-hidden="true"></span></a>
                      <ul class="utmenu-submenu-sub">
                        <li><a class="waves-effect waves-light" href="../features/lockscreen.html">Lockscreen 1</a></li>
                        <li><a class="waves-effect waves-light" href="../features/lockscreen_v2.html">Lockscreen 2</a></li>
                      </ul>
                    </li>
                    <li>
                      <span class="wsmenu-click02"></span><a class="waves-effect waves-light" href="javascript:void(0)">Apps<span class="arrow_carrot-down" aria-hidden="true"></span></a>
                      <ul class="utmenu-submenu-sub">
                        <li><a class="waves-effect waves-light" href="../features/contacts.html">Contacts</a></li>
                        <li><a class="waves-effect waves-light" href="../features/calendar.html">Calendar</a></li>
                        <li><a class="waves-effect waves-light" href="../features/project.html">Project</a></li>
                        <li><a class="waves-effect waves-light" href="../features/mailbox.html">Mailbox</a></li>
                        <li><a class="waves-effect waves-light" href="../features/message.html">Message</a></li>
                        <li><a class="waves-effect waves-light" href="../features/media.html">Media</a></li>
                      </ul>
                    </li>
                  </ul>
                </li>
                <li>
                  <span class="wsmenu-click"></span><a class="waves-effect waves-light" href="javascript:void(0)"> <i class="layout-icon icon_ribbon_alt" aria-hidden="true"></i> Components <span class="arrow_carrot-down" aria-hidden="true"></span></a>
                  <ul class="utmenu-submenu">
                    <li>
                      <span class="wsmenu-click02"></span><a class="waves-effect waves-light" href="javascript:void(0)">Basic UI<span class="arrow_carrot-down" aria-hidden="true"></span></a>
                      <ul class="utmenu-submenu-sub">
                        <li>
                          <span class="wsmenu-click02"></span><a class="waves-effect waves-light" href="javascript:void(0)">Panel<span class="arrow_carrot-down" aria-hidden="true"></span></a>
                          <ul class="utmenu-submenu-sub-sub">
                            <li><a class="waves-effect waves-light" href="../components/panel-structure.html">Panel Structure</a></li>
                            <li><a class="waves-effect waves-light" href="../components/panel-action.html">Panel Action</a></li>
                            <li><a class="waves-effect waves-light" href="../components/panel-transition.html">Panel Transition</a></li>
                          </ul>
                        </li>
                        <li><a class="waves-effect waves-light" href="../components/buttons.html">Buttons</a></li>
                        <li><a class="waves-effect waves-light" href="../components/icons.html">Icons</a></li>
                        <li><a class="waves-effect waves-light" href="../components/list.html">List</a></li>
                        <li><a class="waves-effect waves-light" href="../components/dropdowns.html">Dropdowns</a></li>
                        <li><a class="waves-effect waves-light" href="../components/image.html">Images</a></li>
                        <li><a class="waves-effect waves-light" href="../components/modals.html">Modals</a></li>
                        <li><a class="waves-effect waves-light" href="../components/scrollable.html">Scrollable</a></li>
                        <li><a class="waves-effect waves-light" href="../components/typography.html">Typography</a></li>
                        <li><a class="waves-effect waves-light" href="../components/utilities.html">Utilities</a></li>
                        <li><a class="waves-effect waves-light" href="../components/colors.html">Colors</a></li>
                        <li><a class="waves-effect waves-light" href="../components/carousel.html">Carousel</a></li>
                        <li><a class="waves-effect waves-light" href="../components/tabs-accordions.html">Tabs & Accordions</a></li>
                        <li><a class="waves-effect waves-light" href="../components/badges-labels.html">Badges & Labels</a></li>
                        <li><a class="waves-effect waves-light" href="../components/tooltip-popover.html">Tooltip & Popover</a></li>
                        <li><a class="waves-effect waves-light" href="../components/progress_bars.html">Progress Bars</a></li>
                      </ul>
                    </li>
                    <li>
                      <span class="wsmenu-click02"></span><a class="waves-effect waves-light" href="javascript:void(0)">Advanced UI<span class="arrow_carrot-down" aria-hidden="true"></span></a>
                      <ul class="utmenu-submenu-sub">
                        <li id="demo" class="site-menu-item hidden-xs demo"><a class="waves-effect waves-light" href="javascript:void(0)">Tour</a></li>
                        <li><a class="waves-effect waves-light" href="../components/animation.html">Animation</a></li>
                        <li><a class="waves-effect waves-light" href="../components/highlight.html">Highlight</a></li>
                        <li><a class="waves-effect waves-light" href="../components/alertify.html">Alertify</a></li>
                        <li><a class="waves-effect waves-light" href="../components/masonry.html">Masonry</a></li>
                        <li><a class="waves-effect waves-light" href="../components/rating.html">Rating</a></li>
                        <li><a class="waves-effect waves-light" href="../components/context-menu.html">Context Menu</a></li>
                        <li><a class="waves-effect waves-light" href="../components/sortable-nestable.html">Sortable & Nestable</a></li>
                        <li><a class="waves-effect waves-light" href="../components/toastr.html">Toastr</a></li>
                        <li><a class="waves-effect waves-light" href="../components/lightbox.html">Lightbox</a></li>
                        <li><a class="waves-effect waves-light" href="../components/treeview.html">Treeview</a></li>
                        <li><a class="waves-effect waves-light" href="../components/google_maps.html">Google Maps</a></li>
                        <li><a class="waves-effect waves-light" href="../components/vector_maps.html">Vector Maps</a></li>
                        <li><a class="waves-effect waves-light" href="../components/bootbox_sweetalert.html">Bootbox Sweetalert</a></li>
                      </ul>
                    </li>
                    <li>
                      <span class="wsmenu-click02"></span><a class="waves-effect waves-light" href="javascript:void(0)">Elements<span class="arrow_carrot-down" aria-hidden="true"></span></a>
                      <ul class="utmenu-submenu-sub">
                        <li><a class="waves-effect waves-light" href="../components/alerts.html">Alerts</a></li>
                        <li><a class="waves-effect waves-light" href="../components/ribbon.html">Ribbon</a></li>
                        <li><a class="waves-effect waves-light" href="../components/pricing-tables.html">Pricing Table</a></li>
                        <li><a class="waves-effect waves-light" href="../components/overlay.html">Overlay</a></li>
                        <li><a class="waves-effect waves-light" href="../components/step.html">Step</a></li>
                        <li><a class="waves-effect waves-light" href="../components/cover.html">Cover</a></li>
                        <li><a class="waves-effect waves-light" href="../components/timeline-simple.html">Simple Timeline</a></li>
                        <li><a class="waves-effect waves-light" href="../components/timeline.html">Timeline</a></li>
                        <li><a class="waves-effect waves-light" href="../components/testimonials.html">Testimonials</a></li>
                        <li><a class="waves-effect waves-light" href="../components/blockquotes.html">Blockquotes</a></li>
                        <li><a class="waves-effect waves-light" href="../components/breadcrumbs.html">Breadcrumbs</a></li>
                        <li><a class="waves-effect waves-light" href="../components/comments.html">Comments</a></li>
                        <li><a class="waves-effect waves-light" href="../components/media.html">Media</a></li>
                        <li><a class="waves-effect waves-light" href="../components/chat.html">Chat</a></li>
                        <li><a class="waves-effect waves-light" href="../components/nav.html">Nav</a></li>
                        <li><a class="waves-effect waves-light" href="../components/navbars.html">Navbars</a></li>
                        <li><a class="waves-effect waves-light" href="../components/pagination.html">Pagination</a></li>
                        <li><a class="waves-effect waves-light" href="../components/headers.html">Different Headers</a></li>
                      </ul>
                    </li>
                    <li>
                      <a class="waves-effect waves-light" href="javascript:void(0)">Forms <span class="arrow_carrot-down" aria-hidden="true"></span></a>
                      <ul class="utmenu-submenu-sub">
                        <li><a class="waves-effect waves-light" href="../components/general.html">General Elements</a></li>
                        <li><a class="waves-effect waves-light" href="../components/material-element.html">Material Elements</a></li>
                        <li><a class="waves-effect waves-light" href="../components/layouts.html">Form Layouts</a></li>
                        <li><a class="waves-effect waves-light" href="../components/validation.html">Form Validation</a></li>
                        <li><a class="waves-effect waves-light" href="../components/masks.html">Form Masks</a></li>
                        <li><a class="waves-effect waves-light" href="../components/form-advanced.html">Advanced Elements</a></li>
                        <li><a class="waves-effect waves-light" href="../components/form-wizard.html">Form Wizard</a></li>
                        <li>
                          <span class="wsmenu-click02"></span><a class="waves-effect waves-light" href="javascript:void(0)">Editor<span class="arrow_carrot-down" aria-hidden="true"></span></a>
                          <ul class="utmenu-submenu-sub-sub">
                            <li><a class="waves-effect waves-light" href="../components/editor-ace.html">Ace Editor</a></li>
                            <li><a class="waves-effect waves-light" href="../components/editor-markdown.html">Markdown</a></li>
                            <li><a class="waves-effect waves-light" href="../components/editor-markdown-flav.html">Markdown Flav</a></li>
                            <li><a class="waves-effect waves-light" href="../components/code-editor.html">Code Editor</a></li>
                          </ul>
                        </li>
                        <li><a class="waves-effect waves-light" href="../components/Image-cropping.html">Image Cropping</a></li>
                      </ul>
                    </li>
                    <li>
                      <a class="waves-effect waves-light" href="javascript:void(0)">Tables <span class="arrow_carrot-down" aria-hidden="true"></span></a>
                      <ul class="utmenu-submenu-sub">
                        <li><a class="waves-effect waves-light" href="../components/basic.html">Basic Tables</a></li>
                        <li><a class="waves-effect waves-light" href="../components/bootstrap.html">Bootstrap Tables</a></li>
                        <li><a class="waves-effect waves-light" href="../components/floatthead.html">floatThead</a></li>
                        <li><a class="waves-effect waves-light" href="../components/responsive.html">Responsive Tables</a></li>
                        <li><a class="waves-effect waves-light" href="../components/editable.html">Editable Tables</a></li>
                        <li><a class="waves-effect waves-light" href="../components/datatable.html">Datatable</a></li>
                        <li><a class="waves-effect waves-light" href="../components/ajax_datatable.html">Ajax Datatable</a></li>
                        <li><a class="waves-effect waves-light" href="../components/jsgrid.html">jsGrid</a></li>
                        <li><a class="waves-effect waves-light" href="../components/footable.html">FooTable</a></li>
                      </ul>
                    </li>
                    <li>
                      <span class="wsmenu-click02"></span><a class="waves-effect waves-light" href="javascript:void(0)">Charts<span class="arrow_carrot-down" aria-hidden="true"></span></a>
                      <ul class="utmenu-submenu-sub">
                        <li><a class="waves-effect waves-light" href="../components/chart.html">Chart.js</a></li>
                        <li><a class="waves-effect waves-light" href="../components/gauges.html">Gauges</a></li>
                        <li><a class="waves-effect waves-light" href="../components/flot.html">Flot</a></li>
                        <li><a class="waves-effect waves-light" href="../components/peitycharts.html">Peity Charts</a></li>
                        <li><a class="waves-effect waves-light" href="../components/morrischarts.html">Morris Charts</a></li>
                        <li><a class="waves-effect waves-light" href="../components/chartist.html">Chartist</a></li>
                        <li><a class="waves-effect waves-light" href="../components/c3-chart.html">C3 Chart</a></li>
                        <li><a class="waves-effect waves-light" href="../components/easypiechart.html">Easy Pie Chart</a></li>
                        <li><a class="waves-effect waves-light" href="../components/echarts.html">EChart</a></li>
                        <li><a class="waves-effect waves-light" href="../components/rickshaw.html">Rickshaw</a></li>
                        <li><a class="waves-effect waves-light" href="../components/sparkline.html">Sparkline</a></li>
                      </ul>
                    </li>
                    <li>
                      <span class="wsmenu-click02"></span><a class="waves-effect waves-light" href="javascript:void(0)">Widgets<span class="arrow_carrot-down" aria-hidden="true"></span></a>
                      <ul class="utmenu-submenu-sub">
                        <li><a class="waves-effect waves-light" href="../components/static-widget.html">Static Widgets</a></li>
                        <li><a class="waves-effect waves-light" href="../components/data-widget.html">Data Widgets</a></li>
                        <li><a class="waves-effect waves-light" href="../components/blog-widget.html">Blog Widgets</a></li>
                        <li><a class="waves-effect waves-light" href="../components/social-widget.html">Social Widgets</a></li>
                        <li><a class="waves-effect waves-light" href="../components/chart-widget.html">Chart Widgets</a></li>
                      </ul>
                    </li>
                  </ul>
                </li>
              </ul>
            </nav>
          </div>
          <ul class="nav navbar-nav navbar-toolbar">
            <!--  Mega Menu -->
            <li class="dropdown dropdown-fw dropdown-mega">
              <a href="javascript:void(0)" class="dropdown-toggle waves-effect waves-light" data-hover="dropdown" data-toggle="dropdown"><i class="layout-icon icon_genius" aria-hidden="true"></i><span class="mega-text">Extra Features </span><span class="arrow_carrot-down"></span></a>
              <ul class="dropdown-menu" role="menu">
                <li>
                  <div class="mega-menu-content">
                    <div class="row">
                      <div class="col-sm-12 col-md-3 col-lg-2 col-xs-12">
                        <h5 class="mobile-megamenu waves-effect waves-light">Page Layouts <span class="icon_plus"></span> </h5>
                        <ul class="list-menu">
                          <li class="mega-menu">
                            <a href="../features/userlist.html">
                            <i class="arrow_triangle-right" aria-hidden="true"></i>
                            User List
                            </a>
                          </li>
                          <li>
                            <a href="../features/Invoice.html"><i class="arrow_triangle-right" aria-hidden="true"></i>Invoice</a>
                          </li>
                          <li>
                            <a href="../features/profile.html"><i class="arrow_triangle-right" aria-hidden="true"></i>Profile</a>
                          </li>
                          <li>
                            <a href="../features/gallery.html"><i class="arrow_triangle-right" aria-hidden="true"></i>Gallery</a>
                          </li>
                          <li>
                            <a href="../features/gallery-grid.html"><i class="arrow_triangle-right" aria-hidden="true"></i>Gallery grid</a>
                          </li>
                          <li>
                            <a href="../features/email.html"><i class="arrow_triangle-right" aria-hidden="true"></i>Email</a>
                          </li>
                        </ul>
                      </div>
                      <div class="col-sm-12 col-md-3 col-lg-2 col-xs-12">
                        <h5 class="mobile-megamenu waves-effect waves-light">Charts & Forms <span class="icon_plus"></span></h5>
                        <ul class="list-menu">
                          <li>
                            <a href="../components/flot.html"><i class="arrow_triangle-right" aria-hidden="true"></i>Flot</a>
                          </li>
                          <li>
                            <a href="../components/chartist.html"><i class="arrow_triangle-right" aria-hidden="true"></i>Chartist</a>
                          </li>
                          <li>
                            <a href="../components/validation.html"><i class="arrow_triangle-right" aria-hidden="true"></i>Form validation</a>
                          </li>
                          <li>
                            <a href="../components/layouts.html"><i class="arrow_triangle-right" aria-hidden="true"></i>Form layouts</a>
                          </li>
                          <li>
                            <a href="../components/jsgrid.html"><i class="arrow_triangle-right" aria-hidden="true"></i>JsGrid</a>
                          </li>
                          <li>
                            <a href="../components/footable.html"><i class="arrow_triangle-right" aria-hidden="true"></i>FooTable</a>
                          </li>
                        </ul>
                      </div>
                      <div class="col-sm-12 col-md-6 col-lg-4 col-xs-12">
                        <h5 class="mobile-megamenu waves-effect waves-light mobile-margin">UI & Components <span class="icon_plus"></span></h5>
                        <ul class="list-menu mega-item">
                          <li class="mega-menu">
                            <ul>
                              <li>
                                <a href="../components/animation.html">
                                <i class="arrow_triangle-right" aria-hidden="true"></i>
                                Animation
                                </a>
                              </li>
                              <li>
                                <a href="../components/buttons.html"><i class="arrow_triangle-right" aria-hidden="true"></i>Buttons</a>
                              </li>
                              <li>
                                <a href="../components/colors.html"><i class="arrow_triangle-right" aria-hidden="true"></i>Colors</a>
                              </li>
                              <li>
                                <a href="../components/dropdowns.html"><i class="arrow_triangle-right" aria-hidden="true"></i>Dropdowns</a>
                              </li>
                              <li>
                                <a href="../components/icons.html"><i class="arrow_triangle-right" aria-hidden="true"></i>Icons</a>
                              </li>
                              <li>
                                <a href="../components/lightbox.html"><i class="arrow_triangle-right" aria-hidden="true"></i>Lightbox</a>
                              </li>
                            </ul>
                          </li>
                          <li class="mega-menu">
                            <ul>
                              <li>
                                <a href="../components/tooltip-popover.html"><i class="arrow_triangle-right" aria-hidden="true"></i>Tooltip &amp; popover</a>
                              </li>
                              <li>
                                <a href="../components/progress_bars.html"><i class="arrow_triangle-right" aria-hidden="true"></i>Progress bars</a>
                              </li>
                              <li>
                                <a href="../components/sortable-nestable.html"><i class="arrow_triangle-right" aria-hidden="true"></i>Sortable nestable</a>
                              </li>
                              <li>
                                <a href="../components/bootbox_sweetalert.html"><i class="arrow_triangle-right" aria-hidden="true"></i>Bootbox &amp; sweetalert</a>
                              </li>
                              <li>
                                <a href="../components/ribbon.html"><i class="arrow_triangle-right" aria-hidden="true"></i>Ribbon</a>
                              </li>
                              <li>
                                <a href="../components/pricing-tables.html"><i class="arrow_triangle-right" aria-hidden="true"></i>Pricing tables</a>
                              </li>
                            </ul>
                          </li>
                        </ul>
                      </div>
                      <div class="col-sm-12 col-lg-4 col-xs-12 mobile-image-mega">
                        <h5>Image</h5>
                        <ul class="list-menu">
                          <li class="mega-menu">
                            <a href="javascript:void(0)">
                            <img src="<?php echo base_url()?>assets/bo/assets/images/global/img_470x160.png" alt="features-img"/>
                            </a>
                          </li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </li>
              </ul>
            </li>
          </ul>
          <ul class="nav navbar-nav navbar-toolbar navbar-right">
            <li id="search-icon">
              <!--  Toggle Search -->
              <a class="icon icon_search waves-effect waves-light" href="javascript:void(0)" role="button">
              <span class="sr-only">Toggle Search</span>
              </a>
            </li>
            <li class="dropdown">
              <!--  Profile Section -->
              <a class="navbar-avatar dropdown-toggle waves-effect waves-light" data-toggle="dropdown" href="javascript:void(0)" data-animation="scale-up" role="button">
              <span class="avatar avatar-online">
              <img src="<?php echo base_url()?>assets/bo/assets/images/global/img_240x265.png" alt="Profile Image">
              <i></i>
              </span>
              </a>
              <ul class="dropdown-menu position-absolute" role="menu">
                <li role="presentation">
                  <a href="javascript:void(0)" role="menuitem"><i class="icon icon_profile" aria-hidden="true"></i> Profile</a>
                </li>
                <li role="presentation">
                  <a href="javascript:void(0)" role="menuitem"><i class="icon icon_balance" aria-hidden="true"></i> Billing</a>
                </li>
                <li role="presentation">
                  <a href="javascript:void(0)" role="menuitem"><i class="icon icon_cog" aria-hidden="true"></i> Settings</a>
                </li>
                <li class="divider" role="presentation"></li>
                <li role="presentation">
                  <a href="javascript:void(0)" role="menuitem"><i class="icon icon_lock_alt" aria-hidden="true"></i> Logout</a>
                </li>
              </ul>
            </li>
            <li id="toggleFullscreen">
              <!--  Full Screen -->
              <a class="icon icon-fullscreen waves-effect waves-light" id="toggle" data-toggle="fullscreen" href="javascript:void(0)" role="button">
              <i aria-hidden="true" class="arrow_expand"></i>
              </a>
            </li>
            <li class="dropdown">
              <!--  Notification Box -->
              <a class="waves-effect waves-light" data-toggle="dropdown" href="javascript:void(0)" title="Notifications" data-animation="scale-up" role="button">
              <i class="icon icon_document_alt" aria-hidden="true"></i>
              <span class="badge badge-danger up">5</span>
              </a>
              <ul class="dropdown-menu dropdown-menu-right dropdown-menu-media position-absolute" role="menu">
                <li class="dropdown-menu-header" role="presentation">
                  <h5>NEW UPDATES
                    <a class="dropdown-menu-noti-btn" href="javascript:void(0)" role="button">
                    <i class="icon icon_cog" aria-hidden="true"></i>
                    </a>
                  </h5>
                  <span class="label label-round label-danger">New 5</span>
                </li>
                <li class="list-group hover-item" role="presentation">
                  <div data-role="container">
                    <div data-role="content">
                      <a class="list-group-item" href="javascript:void(0)" role="menuitem">
                        <div class="media">
                          <div class="media-left padding-right-10">
                            <i class="icon icon_documents_alt bg-red white icon-circle" aria-hidden="true"></i>
                          </div>
                          <div class="media-body">
                            <h6 class="media-heading">New tasks needs to be done</h6>
                            <time class="media-meta" datetime="2015-06-12T20:50:48+08:00">2 min ago</time>
                          </div>
                          <div class="media-right">
                            <div class="btn-group">
                              <span class="btn btn-info btn-sm waves-effect waves-dark"><i class="icon_check"></i></span>
                              <span class="btn btn-default btn-sm waves-effect waves-dark">
                              <i class="icon_cog"></i>
                              </span>
                            </div>
                          </div>
                        </div>
                      </a>
                      <a class="list-group-item" href="javascript:void(0)" role="menuitem">
                        <div class="media">
                          <div class="media-left padding-right-10">
                            <i class="icon icon_gift_alt bg-green white icon-circle" aria-hidden="true"></i>
                          </div>
                          <div class="media-body">
                            <h6 class="media-heading">New feature added</h6>
                            <time class="media-meta" datetime="2015-06-11T18:29:20+08:00">1 hours ago</time>
                          </div>
                          <div class="media-right">
                            <div class="btn-group">
                              <span class="btn btn-info btn-sm waves-effect waves-dark">
                              <i class="icon_check"></i>
                              </span>
                              <span class="btn btn-default btn-sm waves-effect waves-dark">
                              <i class="icon_pencil"></i>
                              </span>
                            </div>
                          </div>
                        </div>
                      </a>
                      <a class="list-group-item" href="javascript:void(0)" role="menuitem">
                        <div class="media">
                          <div class="media-left padding-right-10">
                            <i class="icon  icon_adjust-vert bg-red white icon-circle" aria-hidden="true"></i>
                          </div>
                          <div class="media-body">
                            <h6 class="media-heading">Change your password</h6>
                            <time class="media-meta" datetime="2015-06-11T14:05:00+08:00">2 days ago</time>
                          </div>
                          <div class="media-right">
                            <div class="btn-group">
                              <span class="btn btn-info btn-sm waves-effect waves-dark">
                              <i class="icon_check"></i>
                              </span>
                              <span class="btn btn-default btn-sm waves-effect waves-dark">
                              <i class="icon_key_alt"></i>
                              </span>
                            </div>
                          </div>
                        </div>
                      </a>
                      <a class="list-group-item" href="javascript:void(0)" role="menuitem">
                        <div class="media">
                          <div class="media-left padding-right-10">
                            <i class="icon icon_calendar bg-blue white icon-circle" aria-hidden="true"></i>
                          </div>
                          <div class="media-body">
                            <h6 class="media-heading">New Product order</h6>
                            <time class="media-meta" datetime="2015-06-10T13:50:18+08:00">3 days ago</time>
                          </div>
                          <div class="media-right">
                            <div class="btn-group">
                              <span class="btn btn-info btn-sm waves-effect waves-dark">
                              <i class="icon_check"></i>
                              </span>
                              <span class="btn btn-default btn-sm waves-effect waves-dark">
                              <i class="icon_cart_alt"></i>
                              </span>
                            </div>
                          </div>
                        </div>
                      </a>
                      <a class="list-group-item" href="javascript:void(0)" role="menuitem">
                        <div class="media">
                          <div class="media-left padding-right-10">
                            <i class="icon icon_comment bg-orange white icon-circle" aria-hidden="true"></i>
                          </div>
                          <div class="media-body">
                            <h6 class="media-heading">New User review</h6>
                            <time class="media-meta" datetime="2015-06-10T12:34:48+08:00">3 days ago</time>
                          </div>
                          <div class="media-right">
                            <div class="btn-group">
                              <span class="btn btn-info btn-sm waves-effect waves-dark">
                              <i class="icon_check"></i>
                              </span>
                              <span class="btn btn-default btn-sm waves-effect waves-dark">
                              <i class="icon_cog"></i>
                              </span>
                            </div>
                          </div>
                        </div>
                      </a>
                    </div>
                  </div>
                </li>
                <li class="dropdown-menu-footer" role="presentation">
                  <a href="javascript:void(0)" role="menuitem">
                  All notifications
                  </a>
                </li>
              </ul>
            </li>
            <li id="chatbox">
              <!--  Chat Box -->
              <a class="waves-effect waves-light" data-toggle="site-sidebar" href="javascript:void(0)" title="Chat" data-url="../include/site-sidebar.tpl">
              <i class="icon icon_comment_alt" aria-hidden="true"></i>
              </a>
            </li>
            <li class="dropdown">
              <!-- Flag Box -->
              <a class="icon flag-avtar dropdown-toggle waves-effect waves-light" data-animation="scale-up" data-toggle="dropdown" href="javascript:void(0)" role="button">
              <span aria-hidden="true" class="flag-icon flag-icon-background flag-icon-us"></span>
              </a>
              <ul class="dropdown-menu position-absolute language-box" role="menu">
                <li class="active" role="presentation">
                  <a class="waves-effect waves-light" href="javascript:void(0)" role="menuitem"><span aria-hidden="true" class="icon flag-icon flag-icon-background flag-icon-us"></span><span class="flag-country" data-country='us'>US</span></a>
                </li>
                <li role="presentation">
                  <a class="waves-effect waves-light" href="javascript:void(0)" role="menuitem"><span aria-hidden="true" class="icon flag-icon flag-icon-background flag-icon-au"></span><span class="flag-country" data-country='au'>AU</span></a>
                </li>
                <li role="presentation">
                  <a class="waves-effect waves-light" href="javascript:void(0)" role="menuitem"><span aria-hidden="true" class="icon flag-icon flag-icon-background flag-icon-in"></span><span class="flag-country" data-country='in'>IN</span></a>
                </li>
                <li role="presentation">
                  <a class="waves-effect waves-light" href="javascript:void(0)" role="menuitem"><span aria-hidden="true" class="icon flag-icon flag-icon-background flag-icon-pt"></span><span class="flag-country" data-country='pt'>PT</span></a>
                </li>
                <li role="presentation">
                  <a class="waves-effect waves-light" href="javascript:void(0)" role="menuitem"><span aria-hidden="true" class="icon flag-icon flag-icon-background flag-icon-de"></span><span class="flag-country" data-country='de'>DE</span></a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
        <div class="navbar-search-overlap" id="site-navbar-search">
          <form role="search">
            <div class="form-group">
              <!--  Search Box -->
              <div class="input-search">
                <i class="input-search-icon icon_search" aria-hidden="true"></i>
                <input type="text" class="form-control" name="site-search" placeholder="Search...">
                <button type="button" class="input-search-close icon icon_close" aria-label="Close"></button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- End Header Section -->