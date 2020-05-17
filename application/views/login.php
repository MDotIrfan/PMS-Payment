<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login</title>
    <link rel = "stylesheet" type = "text/css" href = "<?php echo base_url(); ?>css/style.css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>
<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first">
      <h1>Login Project Management System STAR</h1>
    </div>

    <!-- Login Form -->
        <?php echo form_open('welcome/ceklogin'); ?>
      <input type="text" id="login" class="fadeIn second" name="username" >
      <input type="password" id="password" class="fadeIn third" name="password">
      <input type="submit" class="fadeIn fourth" value="Log In" name="login">
        <?php echo form_close(); ?>

  </div>
</div>
</body>
</html>