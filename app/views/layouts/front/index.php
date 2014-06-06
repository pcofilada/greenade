<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Greenade</title>

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
    <header class="clearfix">
      <div class="pull-left">
        <img src="/assets/images/logo.png" alt="" style="width: 180px; height: 60px;">
      </div>
      <div class="pull-right">
        <ul class="nav nav-pills">
          <li><a href="">How Can I Contribute</a></li>
          <li><a href="">SIGN UP</a></li>
          <li class="divider">|</li>
          <li><a href="">LOG IN</a></li>
        </ul>
      </div>
    </header>
    <div id="main" class="clearfix">
      <div class="sidebar col-md-3">
        <div class="date">
          <h4>TRENDING REPORT</h4>
          <h5>June 7, 2014</h5>
        </div>
        <?php echo (isset($sidebar) ? $sidebar : null); ?>
      </div>
      <div class="main-content col-md-9">
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
  </body>
</html>