<?php
// redirect if already authenticated
if (session_status() === PHP_SESSION_NONE) session_start();
if (!empty($_SESSION['auth'])) {
		header('Location: /reminders');
		exit;
}
require 'app/views/templates/headerPublic.php';
?>

<div class="text-center mt-4 mb-4">
		<h1 class="fw-semibold">My Reminders</h1>
		<p class="lead">Stay Organized. Stay Reminded.</p>
</div>

<main role="main" class="container" style="max-width:480px;">
		<div class="card">
				<h2 class="mb-4 text-center fw-semibold">Login</h2>

				<?php if (!empty($_SESSION['error'])): ?>
						<div class="alert alert-danger">
								<?= $_SESSION['error'] ?>
								<button class="btn-close" onclick="this.parentElement.style.display='none'">&times;</button>
						</div>
						<?php unset($_SESSION['error']); ?>
				<?php endif; ?>

				<form action="/login/verify" method="post">
						<label for="username">Username</label>
						<input required id="username" name="username" type="text">

						<label for="password">Password</label>
						<input required id="password" name="password" type="password">

						<button class="btn">Login</button>
				</form>

				<p class="text-center mt-4">
						Don’t have an account?
						<a href="/create">Create account</a>
				</p>
		</div>
</main>

<?php require 'app/views/templates/footer.php'; ?>
