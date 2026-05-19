<!-- navbar.php -->
<?php
    use Framework\Session;
?>

<header class="site-header">
  <div class="container">
    <div class="flex items-center justify-between">
      <a href="/WS03/" class="brand">Prosple</a>
      
      <div class="nav-actions">
        <?php if (Session::has('user')) : ?>
          <span class="text-white">Welcome, <?= Session::get('user')['name'] ?></span>
          <a href="/WS03/listings/create" class="btn btn-primary">Post a Job</a>
          <form method="POST" action="/WS03/logout" style="display:inline">
            <button type="submit" class="btn btn-outline">Logout</button>
          </form>
        <?php else : ?>
          <a href="/WS03/login" class="btn btn-outline">Login</a>
          <a href="/WS03/register" class="btn btn-primary">Register</a>
        <?php endif; ?>
      </div>
    </div>
  </div>
</header>
<main class="site-main">