<?php require_once 'app/views/templates/header.php'; ?>

<main class="container mt-5">
    <h2 class="mb-4">Admin Reports</h2>

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
                            <th>Subject</th>
                            <th>Created At</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($data['all_reminders'] as $reminder): ?>
                            <tr>
                                <td><?= htmlspecialchars($reminder['user_id']) ?></td>
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

<?php require_once 'app/views/templates/footer.php'; ?>
