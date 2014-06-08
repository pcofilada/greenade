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
    <link rel="stylesheet" href="/assets/css/mobile.css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="mobile">
    <header class="clearfix">
        <div class="pull-left"><img src="/assets/images/logo.png" alt="" style="width: 180px; height: 60px;"></div>
        <div class="pull-right"><a href="#" class="btn btn-default" data-toggle="modal" data-target="#map_report"><i class="fa fa-plus-square" ></i> Add Report</a></div>
    </header>
    <?php echo (isset($main) ? $main : null); ?>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="/assets/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="//maps.googleapis.com/maps/api/js?v=3.exp&sensor=true"></script>
    <script src="/assets/js/gmaps.js"></script>
    <script src="/assets/js/app.js"></script>
    <script src="/assets/js/Chart.js"></script>
    <script src="/assets/js/date.js"></script>
    <script src="/assets/js/jquery.nicescroll.min.js"></script>
  </body>
</html>