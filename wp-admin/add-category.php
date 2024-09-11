<?php
require_once __DIR__ . '/admin.php';


require_once ABSPATH . 'wp-admin/admin-header.php';
?>
<?php
/*
 * Template Name: News List Template
 */

global $wpdb;

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['title'])) {
    $title = $_POST['title'];
    $table_name = $wpdb->prefix . 'newtype';

    $data_to_insert = array(
        'title' => $title,
    );

    $wpdb->insert($table_name, $data_to_insert);
    echo '<script type="text/javascript">window.location.href="' . admin_url('list-categories.php') . '";</script>';
    exit;
}

?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<form style="margin-top: 20px;" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <div class="form-group" style="padding-right: 20px">
        <label for="title" style="width: 100%">Tiêu đề:</label>
        <input type="text" value="<?= $_POST['title'] ?>" class="form-control" id="title" name="title" required>
    </div>
    <button type="submit" class="btn btn-success" id="addNew">Tạo danh mục</button>
</form>

<?php
require_once ABSPATH . 'wp-admin/admin-footer.php';
