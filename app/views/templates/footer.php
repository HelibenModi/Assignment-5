<footer class="footer">    
    <?php if (isset($_SESSION['auth']) && $_SESSION['is_admin'] !== 1): ?>
    <div class="row">
        <div class="col-lg-12">
            <p>Copyright &copy; <?php echo date('Y'); ?> </p>
             <?php endif; ?>
             <?php if (isset($_SESSION['auth']) && $_SESSION['is_admin'] == 1): ?>
                <footer class="footer mt-5 bg-light text-center py-3">
                    <div class="container">
                        <span class="text-muted">© <?= date('Y') ?> MyReminderApp. All rights reserved.</span>
                    </div>
                </footer>
                <?php endif; ?>
        </div>
    </div>
</footer>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>