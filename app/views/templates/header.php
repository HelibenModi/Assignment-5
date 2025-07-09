<?php
if (!isset($_SESSION['auth'])) {
    header('Location: /login');
}
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <link rel="icon" href="/favicon.png">
        <title>COSC 4806</title>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="mobile-web-app-capable" content="yes">
    </head>
    <body>
      <nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow">
        <div class="container-fluid">
          <a class="navbar-brand fw-bold" href="/home">COSC 4806</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
          </button>

          <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <ul class="navbar-nav gap-2">

              <li class="nav-item">
                <a class="nav-link <?= $_SERVER['REQUEST_URI'] == '/home' ? 'active btn btn-primary text-white' : '' ?>" href="/home">Home</a>
              </li>

              <li class="nav-item">
                <a class="nav-link <?= $_SERVER['REQUEST_URI'] == '/reminders' ? 'active btn btn-primary text-white' : '' ?>" href="/reminders">Reminders</a>
              </li>

              <?php if (isset($_SESSION['auth']) && $_SESSION['is_admin'] == 1): ?>
              <li class="nav-item">
                <a class="nav-link <?= $_SERVER['REQUEST_URI'] == '/Reports' ? 'active btn btn-primary text-white' : '' ?>" href="/Reports">Reports</a>
              </li>
              <?php endif; ?>

              <?php if (isset($_SESSION['auth']) && $_SESSION['is_admin'] == 1 && $_SERVER['REQUEST_URI']== '/Reports'): ?>
              <li class="nav-item">
                <a class="nav-link text-danger fw-bold" href="/logout">Logout</a>
              </li>
              <?php endif; ?>

            </ul>
          </div>
        </div>
      </nav>

      </ul>
    </div>
  </div>
</nav>