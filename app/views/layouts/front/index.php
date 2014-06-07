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
    <header class="clearfix">
      <div class="pull-left">
        <img src="/assets/images/logo.png" alt="" style="width: 180px; height: 60px;">
      </div>
      <div class="pull-right">
        <ul class="nav nav-pills">
          <?php if (Session::has('user')) {
              $user = Session::get('user'); ?>
              <li><a href="" class="btn btn-default" data-toggle="modal" data-target="#map_report">Add Report</a></li>
              <li><a href="#" class="dropdown-toggle" data-toggle="dropdown">Welcome <?php echo $user->name; ?> !</a>
              <ul class="dropdown-menu">
                <li><a href="">My Reports</a></li>
                <li><a href="#" data-toggle="modal" data-target="#profile-modal">Profile</a></li>
                <li><a href="/logout">Logout</a></li>
              </ul>
              </li>
          <?php }else{ ?>
            <li><a href="" data-toggle="modal" data-target="#contribute-modal">How Can I Contribute</a></li>
            <li><a href="#" data-toggle="modal" data-target="#signup-modal">SIGN UP</a></li>
            <li class="divider">|</li>
            <li><a href="#" data-toggle="modal" data-target="#login-modal">LOG IN</a></li>
            <fb:login-button scope="public_profile,email" onlogin="checkLoginState();">
</fb:login-button>

<div id="status">
</div>
          <?php } ?>
        </ul>
      </div>
    </header>
    <div id="main" class="clearfix">
      <div class="sidebar col-md-3">
      <?php if (!Session::has('user')) { ?>
        <div class="date">
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

    <div id="map_report" class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
             <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h2 class="modal-title" id="contribute-modalLabel">Report</h2>
          </div>
          <div class="modal-body">
              <form class="form-horizontal" role="form" action="/report" method="POST">
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
                      <input name="image" type="file" />
                    </div>
                  </div>
                  <div class="form-group">
                     <div class="col-sm-10">
                       <input type="text" class="form-control hidden" name="long" id="long" >
                       <input type="text" class="form-control hidden" name="lat" id="lat" >
                     </div>
                   </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <input type="submit" class="btn btn-primary" value="REPORT">
                      <button type="button" class="btn btn-default" data-dismiss="modal">CANCEL</button>
                    </div>
                  </div>
                </form>
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
    <script>
  // This is called with the results from from FB.getLoginStatus().
  function statusChangeCallback(response) {
    console.log('statusChangeCallback');
    console.log(response);
    // The response object is returned with a status field that lets the
    // app know the current login status of the person.
    // Full docs on the response object can be found in the documentation
    // for FB.getLoginStatus().
    if (response.status === 'connected') {
      // Logged into your app and Facebook.
      testAPI();
    } else if (response.status === 'not_authorized') {
      // The person is logged into Facebook, but not your app.
      document.getElementById('status').innerHTML = 'Please log ' +
        'into this app.';
    } else {
      // The person is not logged into Facebook, so we're not sure if
      // they are logged into this app or not.
      document.getElementById('status').innerHTML = 'Please log ' +
        'into Facebook.';
    }
  }

  // This function is called when someone finishes with the Login
  // Button.  See the onlogin handler attached to it in the sample
  // code below.
  function checkLoginState() {
    FB.getLoginStatus(function(response) {
      statusChangeCallback(response);
    });
  }

  window.fbAsyncInit = function() {
  FB.init({
    appId      : '510357489064889',
    cookie     : true,  // enable cookies to allow the server to access 
                        // the session
    xfbml      : true,  // parse social plugins on this page
    version    : 'v2.0' // use version 2.0
  });

  // Now that we've initialized the JavaScript SDK, we call 
  // FB.getLoginStatus().  This function gets the state of the
  // person visiting this page and can return one of three states to
  // the callback you provide.  They can be:
  //
  // 1. Logged into your app ('connected')
  // 2. Logged into Facebook, but not your app ('not_authorized')
  // 3. Not logged into Facebook and can't tell if they are logged into
  //    your app or not.
  //
  // These three cases are handled in the callback function.

  FB.getLoginStatus(function(response) {
    statusChangeCallback(response);
  });

  };

  // Load the SDK asynchronously
  (function(d, s, id) {
    var js, fjs = d.getElementsByTagName(s)[0];
    if (d.getElementById(id)) return;
    js = d.createElement(s); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js";
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));

  // Here we run a very simple test of the Graph API after login is
  // successful.  See statusChangeCallback() for when this call is made.
  function testAPI() {
    console.log('Welcome!  Fetching your information.... ');
    FB.api('/me', function(response) {
      console.log('Successful login for: ' + response.name);
      document.getElementById('status').innerHTML =
        'Thanks for logging in, ' + response.name + '!';
    });
  }
</script>

  </body>
</html>