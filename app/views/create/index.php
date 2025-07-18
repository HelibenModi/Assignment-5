<?php require 'app/views/templates/headerPublic.php'; ?>
<div class="text-center mt-4 mb-4">
        <h1 class="fw-semibold">My Reminders</h1>
        <p class="lead">Stay Organized. Stay Reminded.</p>
</div>

<main role="main" class="container py-5" style="max-width:540px;">
    <div class="card">
        <h2 class="mb-4 text-center fw-semibold">Create Account</h2>

        <?php if (!empty($_SESSION['success'])): ?>
            <div class="alert alert-success">
                <?= $_SESSION['success'] ?>
                <button class="btn-close" onclick="this.parentElement.style.display='none'">&times;</button>
            </div>
            <?php unset($_SESSION['success']); ?>
        <?php endif; ?>

        <?php if (!empty($_SESSION['error'])): ?>
            <div class="alert alert-danger">
                <?= $_SESSION['error'] ?>
                <button class="btn-close" onclick="this.parentElement.style.display='none'">&times;</button>
            </div>
            <?php unset($_SESSION['error']); ?>
        <?php endif; ?>

        <form action="/create/register" method="post">
            <label for="username">Username</label>
            <input required id="username" name="username" type="text">

            <label for="password">Password</label>
            <input required id="password" name="password" type="password"
                   title="Must contain upper, lower, digit and ≥ 10 chars">

            <label for="confirm_password">Confirm Password</label>
            <input required id="confirm_password" name="confirm_password" type="password">

            <button class="btn">Register</button>
        </form>
    </div>
</main>

<?php require 'app/views/templates/footer.php'; ?>
