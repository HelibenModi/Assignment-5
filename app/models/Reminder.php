<?php

class Reminder {

    public function __construct() {}

    public function user_with_most_reminders() {
        $db = db_connect();
        $stmt = $db->prepare("
            SELECT username, COUNT(*) as total 
            FROM reminders 
            JOIN users ON reminders.user_id = users.ID 
            GROUP BY user_id 
            ORDER BY total DESC 
            LIMIT 1;
        ");
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function get_user_reminders($user_id) {
        $db = db_connect();
        $stmt = $db->prepare("SELECT * FROM reminders WHERE user_id = :user_id ORDER BY created_at DESC");
        $stmt->bindValue(':user_id', $user_id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_all_reminders() {
        $db = db_connect();
        $stmt = $db->prepare("
            SELECT reminders.*, users.username 
            FROM reminders 
            JOIN users ON reminders.user_id = users.ID
            ORDER BY reminders.created_at DESC
        ");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function create_reminder($subject) {
        $db = db_connect();
        $stmt = $db->prepare("INSERT INTO reminders (user_id, subject, created_at) VALUES (:user_id, :subject, NOW())");
        $stmt->bindValue(':user_id', $_SESSION['user_id']); 
        $stmt->bindValue(':subject', $subject);
        return $stmt->execute();
    }

    public function get_reminder_by_id($id) {
        $db = db_connect();
        $stmt = $db->prepare("SELECT * FROM reminders WHERE id = :id AND user_id = :user_id");
        $stmt->bindValue(':id', $id);
        $stmt->bindValue(':user_id', $_SESSION['user_id']);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function update_reminders($id, $subject) {
        $db = db_connect();
        $stmt = $db->prepare("UPDATE reminders SET subject = :subject WHERE id = :id AND user_id = :user_id");
        $stmt->bindValue(':subject', $subject);
        $stmt->bindValue(':id', $id);
        $stmt->bindValue(':user_id', $_SESSION['user_id']);
        return $stmt->execute();
    }

    public function delete_reminders($id) {
        $db = db_connect();
        $stmt = $db->prepare("DELETE FROM reminders WHERE id = :id AND user_id = :user_id");
        $stmt->bindValue(':id', $id);
        $stmt->bindValue(':user_id', $_SESSION['user_id']);
        return $stmt->execute();
    }
}