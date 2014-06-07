<h1>Edit User</h1>
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
      <input type="submit" class="btn btn-primary" value="UPDATE">
      <button type="button" class="btn btn-default" data-dismiss="modal">CANCEL</button>
    </div>
  </div>
</form>