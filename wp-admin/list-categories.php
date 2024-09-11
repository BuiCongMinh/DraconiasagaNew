<?php

/**
 * Edit Posts Administration Screen.
 *
 * @package WordPress
 * @subpackage Administration
 */

/** WordPress Administration Bootstrap */
require_once __DIR__ . '/admin.php';

/**
 * @global string $typenow The post type of the current screen.
 */
global $typenow;

require_once ABSPATH . 'wp-admin/admin-header.php';
?>
<?php
/*
 * Template Name: Categories List Template
 */

global $wpdb;

$categories = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}newtype");
?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<div style="display: flex; justify-content: space-between; align-items: center">
    <h1>Danh sách danh mục</h1>
    <a href="add-category.php" style="border: 1px solid; padding: 10px">Tạo danh mục</a>
</div>
<table class="table">
    <thead>
        <tr>
            <th>Tiêu đề</th>
            <th>Ngày tạo</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($categories as $category): ?>
            <tr>
                <td><?= esc_html($category->title) ?></td>
                <td><?= esc_html($category->created_at) ?></td>
                <td style="display: flex; gap: 10px; align-items: center;">
                    <a href="edit-category.php?category_id=<?= $category->id ?>">Chỉnh sửa</a>
                    <span>|</span>
                    <a style="color: red" class="deleteCategory" href="#" data-id="<?= $category->id ?>">Xoá</a>
                </td>
            </tr>
        <?php endforeach; ?>

    </tbody>
</table>

<script>
    $(".deleteCategory").click(function(event) {
        event.preventDefault();
        var evt = $(this);
        const id = evt.attr('data-id');
        const confirmDelete = confirm("Bạn có muốn xóa không?");
        if (confirmDelete) {
            $.ajax({
                url: "delete-category.php",
                method: "POST",
                dataType: 'json',
                data: {
                    id: id,
                },
                success: function(data) {
                    evt.closest('tr').remove();
                }
            })
        }
    });
</script>
<?php
require_once ABSPATH . 'wp-admin/admin-footer.php';
