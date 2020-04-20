<!DOCTYPE html>
<html lang="en">
<?php 
$base_url_js = base_url("assets/js/page/");
$base_url_css = base_url("assets/css/page/");
$base_url_mycss = base_url("assets/css/my_css/");
$base_url_img = base_url("assets/img/page/");
$base_url_img_icon = base_url("assets/icons/");
$base_url_myjs = base_url("assets/js/my_js/");
?>

<?php 
 /*Check information*/
    check_info_client();
 ?>
 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url() ?>assets/img/logo/logopage.png">
    <title>VITAFOAM MADAGASCAR</title>
    <!-- Bootstrap Core CSS -->
    <link href="<?php echo $base_url_css ?>lib/bootstrap/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?php echo $base_url_css ?>/helper.css" rel="stylesheet">
    <link href="<?php echo $base_url_css ?>style.css" rel="stylesheet">

     <link href="<?php echo $base_url_mycss ?>mon_style.css" rel="stylesheet">

      <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" rel="stylesheet">
       <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    
</head>

<body class="fix-header fix-sidebar">
    <!-- Main wrapper  -->
    <div id="main-wrapper">
        <div class="header" style="background-color: rgba(246, 225, 65, 1) !important">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <!-- Logo -->
                <div class="navbar-header" style="background-color: rgba(246, 225, 65, 1) !important ">
                    <a class="nav;bar-brand" href="<?php echo site_url("AccueilController/index") ?>">
                        <!-- Logo icon -->
                        <b><img  id="imglogo" src="<?php echo base_url() ?>assets/img/logo/logopage.png" alt="homepage" class="dark-logo" /></b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span><!--img id="imglogo_text" src="<?php echo base_url() ?>assets/img/logo/logovitafoam.png" alt="homepage" class="dark-logo" /--></span>
                    </a>
                </div>
                <!-- End Logo -->
                <div class="navbar-collapse">
                    <!-- toggle and nav items -->
                    <ul class="navbar-nav mr-auto mt-md-0">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler hidden-md-up text-muted  " href="javascript:void(0)"><i class="mdi mdi-menu"></i></a> </li>
                        <li class="nav-item m-l-10"> <a class="nav-link sidebartoggler hidden-sm-down text-muted  " href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                      
                    </ul>
                    <!-- User profile and search -->
                    <ul class="navbar-nav my-lg-0">
                        <!-- Profile -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted  " href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="font-weight: bold"><?php echo getNomPrenom(); ?> <img id="user_connected" src="<?php echo base_url() ?>assets/img/page/avatar.png" alt="user" class="profile-pic" /></a>
                            <div class="dropdown-menu dropdown-menu-right animated zoomIn">
                                <ul class="dropdown-user">
                                    <li><a  onclick="return confirm('Voulez vous vraiment vous deconnecter ? ')" href="<?php echo site_url("LoginController/deconnexion") ?>"><i class="fa fa-power-off"></i> Déconnexion</a></li>
                                    <li><a href="#" data-toggle="modal" data-target="#addMember"><i class="fa fa-user-circle"></i> Nouveau membre</a></li>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <!-- End header header -->
        <!-- Left Sidebar  -->
        <div class="left-sidebar" style="background-color: #3D5975 !important">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li class="nav-devider"></li>
                        <li> <a class="has-arrows  " href="<?php echo site_url("AccueilController/index") ?>" aria-expanded="false"><i class="fa fa-tachometer"></i><span class="hide-menu">Tableau de bord</span></a></li>
                       
                        <li> <a class="has-arrows  " href="<?php echo site_url('StatController/index') ?>" aria-expanded="false"><i class="fa fa-bar-chart"></i><span class="hide-menu">Statistique</span></a></li>
                        <li> <a class="has-arrows  " href="<?php echo site_url('AccueilController/get_all_member') ?>" aria-expanded="false"><i class="fa fa-user"></i><span class="hide-menu">Membres</span></a></li>
                        <li> <a onclick="return confirm('Voulez vous vraiment vous deconnecter ? ')" class="has-arrows  " href="<?php echo site_url('LoginController/deconnexion') ?>" aria-expanded="false"><i class="fa fa-power-off"></i><span class="hide-menu">Déconnexion</span></a></li>
                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </div>

        <!-- The Modal -->
              <div class="modal" id="addMember">
                <div class="modal-dialog">
                  <div class="modal-content">
                  
                    <!-- Modal Header -->
                    <div class="modal-header" style="align-content: center !important;">
                      <h4 class="modal-title">Ajouter un nouveau membre</h4>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    
                    <!-- Modal body -->
                    <div class="modal-body">
                      <form action="<?php echo site_url("LoginController/add_membre"); ?>" method="POST" class="was-validated">
                            <div class="form-group">
                              <label for="nom">Nom:</label>
                              <input type="text" class="form-control" id="nom" placeholder="Enter username" name="nom" required>
                              <div class="valid-feedback">Valide.</div>
                              <div class="invalid-feedback">Veuillez remplir ce champ.</div>
                            </div>
                            <div class="form-group">
                              <label for="prenom">Prenom:</label>
                              <input type="text" class="form-control" id="prenom" placeholder="Enter username" name="prenom" required>
                              <div class="valid-feedback">Valide.</div>
                              <div class="invalid-feedback">Veuillez remplir ce champ.</div>
                            </div>
                            <div class="form-group">
                              <label for="identifiant">Identifiant:</label>
                              <input type="text" class="form-control" id="identifiant" placeholder="Enter username" name="identifiant" required>
                              <div class="valid-feedback">Valide.</div>
                              <div class="invalid-feedback">Veuillez remplir ce champ.</div>
                            </div>
                            <div class="form-group">
                              <label for="mdp">Mot de passe:</label>
                              <input type="password" class="form-control" id="mdp" placeholder="Enter password" name="mdp" required>
                              <div class="valid-feedback">Valide.</div>
                              <div class="invalid-feedback">Veuillez remplir ce champ.</div>
                            </div>
                            
                            <button type="submit" class="btn btn-primary">AJOUTER</button>
                    </form>
                    </div>
                    
                    <!-- Modal footer -->
                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">FERMER</button>
                    </div>
                    
                  </div>
                </div>
              </div>


        <!-- End Left Sidebar  -->
        <!-- Page wrapper  -->
        <div class="page-wrapper" style="color: black !important">
            <!-- Bread crumb -->
            <div class="row page-titles">
                <div class="col-md-5 align-self-center">
                    <h3 class="text-primary"><?php echo $title ?></h3> </div>
               
            </div>
            <!-- End Bread crumb -->
            <!-- Container fluid  -->
            <div class="container-fluid">
                <!-- Start Page Content -->