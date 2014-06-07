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
    <header class="<?php if (Session::has('user')) { ?>user<?php } ?> clearfix">
      <div class="pull-left">
        <?php if (Session::has('user')) { ?>
          <img src="/assets/images/user-logo.png" alt="" style="width: 120px; height: 40px;">
        <?php }else{ ?>
          <img src="/assets/images/logo.png" alt="" style="width: 180px; height: 60px;">
        <?php } ?>
      </div>
      <div class="pull-right">
        <ul class="nav nav-pills">
          <?php if (Session::has('user')) {
              $user = Session::get('user'); ?>
              <li><a href="#" class="btn btn-default" data-toggle="modal" data-target="#map_report"><i class="fa fa-plus-square" ></i> Add Report</a></li>
              <li><a href="#" class="dropdown-toggle" data-toggle="dropdown">Welcome <?php echo $user->name; ?>  <i class="fa fa-caret-down"></i></a>
              <ul class="dropdown-menu">
                <li><a href="#" data-toggle="modal" data-target="#profile-modal">Profile</a></li>
                <li><a href="/logout">Logout</a></li>
              </ul>
              </li>
          <?php }else{ ?>
            <li><a href="" data-toggle="modal" data-target="#contribute-modal">How Can I Contribute</a></li>
            <li><a href="#" data-toggle="modal" data-target="#signup-modal">SIGN UP</a></li>
            <li class="divider">|</li>
            <li><a href="#" data-toggle="modal" data-target="#login-modal">LOG IN</a></li>
          <?php } ?>
        </ul>
      </div>
    </header>
    <div id="main" class="<?php if (Session::has('user')) { ?>user<?php } ?> clearfix">
      <div class="sidebar col-md-3">
      <?php if (!Session::has('user')) { ?>
        <div class="date">
            <ul class="nav nav-pills pull-right">
              <li><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-bars"></i></a>
              <ul class="dropdown-menu">
                <li><a href="#">Newest</a></li>
                <li><a href="#">Trending</a></li>
              </ul>
              </li>
            </ul>
          <h4>TRENDING REPORT</h4>
          <h5>June 7, 2014</h5>
        </div>
      <?php } ?>
        <?php echo (isset($sidebar) ? $sidebar : null); ?>
      </div>
      <div class="main-content col-md-9">
        <?php echo (isset($main) ? $main : null); ?>
      </div>
    </div>

    <!-- Modals -->
    <?php if (Session::has('user')) { ?>
        <div class="modal fade" id="profile-modal" tabindex="-1" role="dialog" aria-labelledby="profile-modalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h2 class="modal-title" id="profile-modalLabel">My Profile</h2>
              </div>
              <div class="modal-body">
                <form class="form-horizontal" role="form" action="/signup" method="POST">
                   <div class="form-group">
                     <label for="name" class="col-sm-2 control-label">Name</label>
                     <div class="col-sm-10">
                       <input type="text" class="form-control" name="name" id="name" placeholder="Name" value="<?php echo $user->name; ?>">
                     </div>
                   </div>
                  <div class="form-group">
                    <label for="mobile" class="col-sm-2 control-label">Mobile</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="mobile" id="mobile" placeholder="09xxxxxxxxx" maxlength="11" value="<?php echo $user->mobile; ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="email" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-10">
                      <input type="email" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $user->email; ?>">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="password" class="col-sm-2 control-label">Password</label>
                    <div class="col-sm-10">
                      <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="confirm" class="col-sm-2 control-label">Confirm Password</label>
                    <div class="col-sm-10">
                      <input type="password" class="form-control" name="password_confirmation" id="confirm" placeholder="Confirm Password">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <input type="submit" class="btn btn-success" value="UPDATE">
                      <button type="button" class="btn btn-success" data-dismiss="modal">CANCEL</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>

            <div id="map_report" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
             <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h2 class="modal-title" id="contribute-modalLabel">Report</h2>
          </div>
          <div class="modal-body">
              <form class="form-horizontal" role="form" action="/user/<?php echo $user->name ?>/report" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                      <div class="col-sm-10 pull-right">
                        <div id="map_modal" style="width: 100%; height: 300px;"></div>
                      </div>
                    </div>
                   <div class="form-group">
                     <label for="name" class="col-sm-2 control-label">Title</label>
                     <div class="col-sm-10">
                       <input type="text" class="form-control" name="title" id="title" placeholder="Title">
                     </div>
                   </div>
                  <div class="form-group">
                    <label for="mobile" class="col-sm-2 control-label">Description</label>
                    <div class="col-sm-10">
                      <textarea type="text" class="form-control" name="description" id="description" placeholder="Description" ></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="mobile" class="col-sm-2 control-label"> Image</label>
                    <div class="col-sm-10">
                      <input name="image[]" type="file" multiple/>
                    </div>
                  </div>
                  <div class="form-group">
                     <div class="col-sm-10">
                       <input type="text" class="form-control hidden" name="long" id="long" >
                       <input type="text" class="form-control hidden" name="lat" id="lat" >
                     </div>
                  </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <input type="submit" class="btn btn-primary" value="REPORT">
                      <button type="button" class="btn btn-default" data-dismiss="modal">CANCEL</button>
                    </div>
                  </div>
                  <br> 
                  <br>
                </form>
          </div>
        </div>
      </div>
    </div>    
    
    <?php }else{ ?>
        <div class="modal fade" id="login-modal" tabindex="-1" role="dialog" aria-labelledby="login-modalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h2 class="modal-title" id="login-modalLabel">GREENADE LOGIN</h2>
              </div>
              <div class="modal-body">
                <form class="form-horizontal" role="form" action="login" method="POST">
                  <div class="form-group">
                    <label for="email" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-10">
                      <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="password" class="col-sm-2 control-label">Password</label>
                    <div class="col-sm-10">
                      <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <input type="submit" class="btn btn-success" value="LOGIN">
                      <button type="button" class="btn btn-success" data-dismiss="modal">CANCEL</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>

        <div class="modal fade" id="signup-modal" tabindex="-1" role="dialog" aria-labelledby="signup-modalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h2 class="modal-title" id="signup-modalLabel">GREENADE SIGNUP</h2>
              </div>
              <div class="modal-body">
                <form class="form-horizontal" role="form" action="/signup" method="POST">
                   <div class="form-group">
                     <label for="name" class="col-sm-2 control-label">Name</label>
                     <div class="col-sm-10">
                       <input type="text" class="form-control" name="name" id="name" placeholder="Name">
                     </div>
                   </div>
                  <div class="form-group">
                    <label for="mobile" class="col-sm-2 control-label">Mobile</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="mobile" id="mobile" placeholder="09xxxxxxxxx" maxlength="11">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="email" class="col-sm-2 control-label">Email</label>
                    <div class="col-sm-10">
                      <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="password" class="col-sm-2 control-label">Password</label>
                    <div class="col-sm-10">
                      <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="confirm" class="col-sm-2 control-label">Confirm Password</label>
                    <div class="col-sm-10">
                      <input type="password" class="form-control" name="password_confirmation" id="confirm" placeholder="Confirm Password">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <input type="submit" class="btn btn-success" value="SIGNUP">
                      <button type="button" class="btn btn-success" data-dismiss="modal">CANCEL</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
    <?php } ?>

    <div class="modal fade" id="contribute-modal" tabindex="-1" role="dialog" aria-labelledby="contribute-modalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h2 class="modal-title" id="contribute-modalLabel">How Can I Contribute</h2>
          </div>
          <div class="modal-body">
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Veniam, fugiat, sed, totam vel atque dolorem rem quidem repellat tempore obcaecati molestias incidunt consequuntur culpa sunt quam at et ut expedita!</p>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Illum, blanditiis numquam consequuntur est id libero at. Doloribus eveniet aliquid saepe ullam similique! Hic ipsum molestias nostrum amet enim dicta quod.</p>
              <p>Consectetur adipisicing elit. Illum, blanditiis numquam consequuntur est id libero at. Doloribus eveniet aliquid saepe ullam similique! Hic ipsum molestias nostrum amet enim dicta quod.</p>
              <p>Hic ipsum molestias nostrum amet enim dicta quodLorem ipsum dolor sit amet, consectetur adipisicing elit. Illum, blanditiis numquam consequuntur est id libero at. Doloribus eveniet aliquid saepe ullam similique! Hic ipsum molestias nostrum amet enim dicta quod.</p>
          </div>
        </div>
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
    <script src="/assets/js/jquery.nicescroll.min.js"></script>
  </body>
</html>