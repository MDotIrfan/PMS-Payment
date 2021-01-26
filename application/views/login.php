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
<body style="background-image: linear-gradient(rgba(0, 0, 0, 0.7), rgba(0, 0, 0, 0.7)), url('./images/bg_login.jpg'); height: 100%;
  background-size: cover;">

<div class="wrapper fadeInDown">
<div id="formContent2">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first">
      <h3 style="color: #fff;">Login Page</h3>
      <h1 style="margin-bottom: 160px;">Project Management System</h1>
    </div>

    <div style="color: #fff;">
    Jln. Kenanga No.126B, Jombor Kidul, Sinduadi, Kec. Mlati <br> Kabupaten Sleman, Daerah Istimewa Yogyakarta<br>
    +62274 623 971 <br>
    sales@star-indonesia.co.id <br>
  </div>
    

  </div>

  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first">
      <img src="./images/sslogostar.PNG" alt="">
      <h1 style="margin-bottom: 20px;">Log In</h1>
    </div>

    <!-- Login Form -->
        <?php echo form_open('welcome/ceklogin'); ?>
      <input type="text" id="login" class="fadeIn second" name="username" value="<?php echo set_value('username')?>">
      <?php echo form_error('username');?>
      <input type="password" id="password" class="fadeIn third" name="password">
      <?php echo form_error('password');?>
      <input type="submit" class="fadeIn fourth" value="Log In" name="login">
        <?php echo form_close(); ?>

  </div>
</div>
</body>
</html>