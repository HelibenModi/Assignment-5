<?php require_once 'app/views/templates/header.php'; ?>

<main class="container mt-5">
    <h2 class="mb-4">Admin Reports</h2>
    <p class="text-muted">View insights and reminders overview below.</p>

    <!-- All Reminders -->
    <div class="card mb-4">
        <div class="card-header bg-primary text-white">
            All Reminders
        </div>
        <div class="card-body">
            <?php if (!empty($data['all_reminders'])): ?>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>User ID</th>
                            <th>Username</th>
                            <th>Subject</th>
                            <th>Created At</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data['all_reminders'] as $reminder): ?>
                            <tr>
                                <td><?= htmlspecialchars($reminder['user_id']) ?></td>
                                <td><?= htmlspecialchars($reminder['username'])?></td>
                                <td><?= htmlspecialchars($reminder['subject']) ?></td>
                                <td><?= htmlspecialchars($reminder['created_at']) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p>No reminders found.</p>
            <?php endif; ?>
        </div>
    </div>
    
    <!-- Top User by Reminder Count -->
    <div class="card mb-4">
        <div class="card-header bg-success text-white">
            User with Most Reminders
        </div>
        <div class="card-body">
            <?php if (!empty($data['top_user'])): ?>
                <p><strong><?= htmlspecialchars($data['top_user']['username']) ?></strong> with <strong><?= $data['top_user']['total'] ?></strong> reminders.</p>
            <?php else: ?>
                <p>No data available.</p>
            <?php endif; ?>
        </div>
    </div>
    <!-- Total Logins by User -->
    <div class="card mb-4">
        <div class="card-header bg-info text-white">
            Total Logins by User
        </div>
        <div class="card-body">
            <?php if (!empty($data['login_counts'])): ?>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Username</th>
                            <th>Total Logins</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data['login_counts'] as $row): ?>
                            <tr>
                                <td><?= htmlspecialchars($row['username']) ?></td>
                                <td><?= $row['total'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p>No login data found.</p>
            <?php endif; ?>
        </div>
    </div>
    <!-- Chart.js Visualization -->
        <div class="card mb-4">
            <div class="card-header bg-dark text-white">
                Login Chart (Chart.js)
            </div>
            <div class="card-body">
                <canvas id="loginChart"></canvas>
            </div>
        </div>
    </main>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const ctx = document.getElementById('loginChart').getContext('2d');

    const chart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: <?= json_encode(array_column($data['login_counts'], 'username')) ?>,
            datasets: [{
                label: 'Total Logins',
                data: <?= json_encode(array_column($data['login_counts'], 'total')) ?>,
                backgroundColor: 'rgba(54, 162, 235, 0.7)',
                borderColor: 'rgba(54, 162, 235, 1)',
                borderWidth: 1
            }]
        },
        options: {
            responsive: true,
            scales: {
                y: {
                    beginAtZero: true,
                    stepSize: 1
                }
            }
        }
    });
</script>
            
<?php require_once 'app/views/templates/footer.php'; ?>
