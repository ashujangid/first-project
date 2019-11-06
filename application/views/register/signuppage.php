<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</head>
<body>
  <div class="container">
 <form action="<?php echo site_url('register/index'); ?>" method="post">

  <?php if ($this->session->userdata('error_message')) { ?>
    <div class="alert alert-danger">
      <?php echo $this->session->userdata('error_message'); ?>
    </div>
  <?php $this->session->unset_userdata('error_message'); } ?>
  <div class="form-group">
    <label>First Name: </label>
    <input type="text" name="first_name" class="form-control" value="<?php echo set_value('first_name'); ?>">
    <?php echo form_error('first_name'); ?>
     <label>Last Name: </label>
    <input type="text" name="last_name" class="form-control" value="<?php echo set_value('last_name'); ?>">
    <?php echo form_error('last_name'); ?>
    <label for="email">Email address:</label>
    <input type="text" class="form-control" id="email" name="email" value="<?php echo set_value('email'); ?>">
    <?php echo form_error('email'); ?>
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" id="pwd" name="password" value="<?php echo set_value('password'); ?>">
    <?php echo form_error('pass'); ?>
    </div>
  <div class="form-group form-check">
    <label class="form-check-label">
      <input class="form-check-input" type="checkbox"> Remember me
    </label>
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
</form> 
</div>

</body>
</html>