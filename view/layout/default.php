<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content=""><!--a faire : table dans la BDD ou on associe une page (controleur) avec une description-->
	
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link href="<?=WEBROOT2;?>/webroot/img/icon.png" rel="icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR35VZc2oM/gI1w==" crossorigin="anonymous" />
	
    <title>Scrambled Cards - <?=$title?></title>
  </head>

  <body>

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="<?=WEBROOT2;?>">
      <img src="<?=WEBROOT2;?>/webroot/img/logo_v3.png" alt="" width="32" height="32" class="d-inline-block align-text-top">
      Scrambled Cards
    </a>    
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
	
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
	
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">

        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?=WEBROOT2;?>">Home</a>
        </li>

		<li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
			Moves
			</a>
			<ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
			<li><a class="dropdown-item" href="<?=WEBROOT2;?>/move_list">Move list</a></li>
			<li><a class="dropdown-item" href="<?=WEBROOT2;?>/random_move_generator">Random move generator</a></li>
			<li><a class="dropdown-item" href="<?=WEBROOT2;?>/favourites">My favourites</a></li>
			<!--dynamiser-->
			</ul>
		</li>

        <li class="nav-item">
            <a class="nav-link " href="<?=WEBROOT2;?>/articles">News</a>
        </li>
		
    
		
	  </ul>
	
      <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
		<?php
      
			if($this->session->isLogged()) {
				if($_SESSION['user']->idPermissions >= 3) {
		?>	
			<li class="nav-item">
			  <a class="nav-link " href="<?=WEBROOT2;?>/admin">Admin panel</a>
			</li>
		<?php
				}
		?>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              Account
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
              <li><a class="dropdown-item" href="<?=WEBROOT2;?>/account">Profile (<?=$_SESSION['user']->login;?>)</a></li>
              <li><a class="dropdown-item" href="<?=WEBROOT2;?>/login/logout">Log out</a></li>
              <!--dynamiser-->
            </ul>
          </li>
		  
		<?php
			} else {
		?>
		  <li class="nav-item">
          <a class="nav-link" href="<?=WEBROOT2;?>/login">Log in/Create an account</a>
		  </li>
		<?php  
			}
		?>
      </ul>
    </div>
  </div>
</nav>
<br>

<div class='container'>
    <div class='row'>
    <?php
        echo $this->session->flash();
    ?>
    </div>
</div>

<div class='container'>
    <?php
        echo $content;
    ?>
</div>

<br>

<!-- Footer -->
<footer class="bg-dark text-center text-white">
    <!-- Grid container -->
    <div class="container p-4">

    
    <!-- Section: Text -->

    <!-- Section: colonnes -->
    <section class="">
        <!--Grid row-->
        <div class="row"><!--Grid column-->
        <div class="col-6">
            <h5 class="text-uppercase">Do you want to give us feedback ?</h5>
            <p>A request, an opinion, a review, or a problem ? You can express yourself by clicking the button below, we often read your messages.
            <br><br>
            <a class="btn btn-outline-light btn-floating m-1" href="contact" role="button">
            Contact us
            </a>
            </p>
        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-6" id="socialmedia">
            <h5 class="text-uppercase">Our social media links</h5>
            <p>By staying in touch through social media, you will be able to be informed of the latest news of the website, the updates, etc. There will also
            be some events hosted in our Discord server, so feel free to join us !</p>
            <div class="container">
            
            <div class="row">
                <div class="col">
                    <a class="btn btn-outline-light btn-floating m-1" target="_blank" href="https://discord.gg/MdjKTuZ3H2" role="button" title="Our discord server !">
                    <i class="fab fa-discord"></i>
                    </a>
                </div>
                <div class="col">
                    <a class="btn btn-outline-light btn-floating m-1" target="_blank" href="https://www.patreon.com/rob_afleur" role="button" title="Our patreon if you want to support this project !">
                    <i class="fab fa-patreon"></i>
                    </a>
                </div>
            
            
            <div class="col">
                <a class="btn btn-outline-light btn-floating m-1" target="_blank" href="https://ko-fi.com/rob_afleur" role="button" title="Buy us a coffee to show your love !">
                <i class="fas fa-coffee"></i>
                </a>
            </div>
            
            </div>
        </div>
        <!--Grid column-->
        </div>
        <!--Grid row-->
    </section>
    <!-- Section: Links -->
    </div>
    <!-- Grid container -->

    <!-- Copyright -->
    <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
    © 2021 Copyright : Scrambled Cards
    </div>
    <!-- Copyright -->
</footer>
<!-- Footer -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
</body>
</html>