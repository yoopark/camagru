<?php session_start(); ?>

<header class="header">
  <div class="header__container">
    <h1 class="header__title"><a href="/">CAMAGRU</a></h1>
    <nav>
      <ul>
        <?php if (isset($_SESSION['user_id'])) { ?>
          <li><a href="/camera"><img src="asset/camera-icon.svg" /></a></li>
          <li><a href="/settings"><img src="asset/gear-icon.svg" /></a></li>
          <li><a href="/api/logout"><img src="asset/logout-icon.svg" /></a></li>
        <?php } else { ?>
          <li><a href="/signup">Sign Up</a></li>
          <li><a href="/login">Login</a></li>
        <?php } ?>
      </ul>
    </nav>
  </div>
</header>