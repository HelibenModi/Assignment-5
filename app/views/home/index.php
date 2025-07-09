<?php require_once 'app/views/templates/header.php' ?>
<div class="container">
    <div class="text-center my-5">
        <h1 class="text-dark">Welcome, <?= $_SESSION['username'] ?? '' ?></h1>
        <p class="lead"><?= date("F jS, Y"); ?></p>
    </div>

    <div class="text-center mb-5">
        <a href="/logout" class="btn btn-danger">Click here to logout</a>
    </div>
</div>
<?php require_once 'app/views/templates/footer.php' ?>
