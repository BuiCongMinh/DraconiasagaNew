<?php
require_once __DIR__ . '/admin.php';

global $wpdb;

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id'])) {
    $wpdb->query($wpdb->prepare("DELETE FROM {$wpdb->prefix}news WHERE id = %d", $_POST['id']));

    wp_send_json(array(
        'message' => 'Xoá tin tức thành công',
    ));
}
?>
