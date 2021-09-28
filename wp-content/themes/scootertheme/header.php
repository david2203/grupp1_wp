
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Scooter Haven</title>
    <?php wp_head(); ?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=PT+Mono&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css" />
    <link
      rel="stylesheet"
      href="https://use.fontawesome.com/releases/v5.14.0/css/all.css"
      integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc"
      crossorigin="anonymous"
    />
  </head>
  <body>
    <!-- Navbar Section -->
    <nav class="navbar">
      <div class="navbar__container">
<<<<<<< HEAD
        <img class="img-logo" src="http://localhost/wordpress-grupp1/wp-content/uploads/2021/09/MicrosoftTeams-image.png" alt="Scooterbild">
=======
        <img class="img-logo" src="<?php echo get_home_url();?>/wp-content/uploads/" alt="Scooterbild">
>>>>>>> 7291f2076880919f0de77be984259829f1509c82
        <a href="#home" id="navbar__logo">Scooter Haven</a>
        <ul class="navbar__menu">
        <?php wp_nav_menu( array(
 'theme_location' => 'Huvudmeny', 'menu_class' => "menu"
) ); ?>
        </ul>
      </div>
    </nav>