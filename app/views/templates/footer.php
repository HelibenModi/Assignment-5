<?php if (isset($_SESSION['auth'])): ?>
    <footer class="footer mt-5 bg-light text-center py-3">
        <div class="container">
            <span class="text-muted">
                &copy <?= date('Y') ?> MyReminderApp. 
                <?php if ($_SESSION['is_admin'] == 1): ?>
                    All rights reserved.
                <?php else: ?>
                    Thank you for using our service!
                <?php endif; ?>
            </span>
        </div>
    </footer>
<?php endif; ?>
