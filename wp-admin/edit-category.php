<?php
require_once __DIR__ . '/admin.php';


require_once ABSPATH . 'wp-admin/admin-header.php';
?>
<?php
/*
 * Template Name: Category Edit Template
 */

global $wpdb;

$query = $wpdb->prepare("SELECT * FROM {$wpdb->prefix}newtype WHERE id = %d", $_GET['category_id']);
$category = $wpdb->get_row($query);
$categories = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}newtype");

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['title'])) {
    $title = $_POST['title'];

    $table_name = $wpdb->prefix . 'newtype';

    $data_to_update = array(
        'title' => $title,
    );

    $wpdb->update($table_name, $data_to_update, array('id' => $_GET['category_id']));
    $url = 'edit-category.php?category_id=' . $_GET["category_id"];
    echo "<script>alert('Cập nhật thành công');</script>";
    echo '<script type="text/javascript">window.location.href="' . admin_url($url) . '";</script>';
    exit;
}

?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<form style="margin-top: 20px" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]) . '?category_id=' . $_GET['category_id']; ?>" method="post">
    <div class="form-group" style="padding-right: 20px">
        <label for="title" style="width: 100%">Tiêu đề:</label>
        <input type="text" value="<?= $category->title ?>" class="form-control" id="title" name="title" required>
    </div>
    <button type="submit" class="btn btn-success">Sửa danh mục</button>
</form>
<?php
require_once ABSPATH . 'wp-admin/admin-footer.php';
