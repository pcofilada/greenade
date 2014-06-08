<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Greenade</title>
    <link rel="shortcut icon" type="image/png" href="/assets/images/admin-logo.png"/>
    <!-- Bootstrap -->
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="/assets/css/app.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    <header class="<?php if (Session::has('admin')) { ?>user<?php } ?> clearfix">
      <div class="pull-left">
        <?php if (Session::has('admin')) { ?>
          <img src="/assets/images/user-logo.png" alt="" style="width: 120px; height: 40px;">
        <?php }else{ ?>
          <img src="/assets/images/logo.png" alt="" style="width: 180px; height: 60px;">
        <?php } ?>
      </div>
      <div class="pull-right">
        <ul class="nav nav-pills">
          <?php if (Session::has('admin')) {
              $user = Session::get('admin'); ?>
              <li><a href="/admin/logout">Logout</a></li>
          <?php }else{ ?>
          <li><a href="" data-toggle="modal" data-target="#contribute-modal">How Can I Contribute</a></li>
            <li><a href="#" data-toggle="modal" data-target="#signup-modal">SIGN UP</a></li>
            <li class="divider">|</li>
            <li><a href="#" data-toggle="modal" data-target="#login-modal">LOG IN</a></li>
          <?php } ?>
        </ul>
      </div>
    </header>
  <div id="main" class="admin clearfix">
    <div class="sidebar col-md-2 admin-sidebar">
      <ul class="nav nav-pills nav-stacked">
        <li><a href="/admin"><i class="fa fa-map-marker"></i> Dasboard</a></li>
        <li><a href="/admin/users"><i class="fa fa-file-text-o"></i> Users</a></li>
        <li><a href=""><i class="fa fa-comment-o"></i> Stats</a></li>
        <li><a href="/admin/reports"><i class="fa fa-envelope-o"></i>  Reports</a></li>
      </ul>
    </div>
    <div class="main-content col-md-10">
      <?php echo (isset($main) ? $main : null); ?>
    </div>
  </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
    <script src="/assets/js/gmaps.js"></script>
    <script src="/assets/js/app.js"></script>
    <script src="/assets/js/Chart.js"></script>
  </body>
</html>