<?php
class Reports extends Controller {
    public function index() {
        if (!isset($_SESSION['auth']) || $_SESSION['is_admin'] != 1) {
            header("Location: /home");
            exit;
        }

        $reminder = $this->model('Reminder');
        $user = $this->model('User');

        $data = [
            'all_reminders' => $reminder->get_all_reminders(),
            'top_user' => $reminder->user_with_most_reminders(),
            'login_counts' => $user->get_login_counts()
        ];

        $this->view('reports/index', $data);
    }
}
