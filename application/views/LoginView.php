<!DOCTYPE html>
<html>
 <?php 
   $mon_login_css = base_url("assets/css/login/login.css");
   ?>
<head>
<link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url() ?>assets/img/logo/logopage.png">
  <title>
     LOGIN VITAFOAM MADAGASCAR
  </title>
 
 <link rel="stylesheet" href="<?php echo $mon_login_css ?>">

</head>
<body style="background-color: #3D5975 !important;background: #3D5975">
  <div class="login-page">
  <div class="form">
  <div id="logo_vitafoam" style=" margin-bottom: 50px;"><img height=" 60" width="200" src="<?php echo base_url("assets/img/logo/logovitafoam.png") ?>"></div>
    <form class="login-form" method="POST" action="<?php echo site_url("LoginController/get_connexion") ?>">
      <input type="text" placeholder="Identifiant" name="username" />
      <input type="password" placeholder="Mot de passe" name="password" />
      <button type="submit" style="background-color:  rgba(246, 225, 65, 1) !important;color: #3D5975 !important;font-weight: bold;">Login</button>
    </form>

    <div id="erreur" style="color: red; font-weight: bold;margin-top: 20px"><?php echo $erreur ?></div>
  </div>
</div>
</body>
</html>
