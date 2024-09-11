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
 * Template Name: News List Template
 */

global $wpdb;

$news = $wpdb->get_results("
    SELECT news.*, newtype.title AS category_name FROM {$wpdb->prefix}news news
    JOIN {$wpdb->prefix}newtype newtype
    ON newtype.id = news.new_id
    ORDER BY news.id ASC
");
?>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<div style="display: flex; justify-content: space-between; align-items: center">
    <h1>Danh sách tin tức</h1>
    <a href="add-new.php" style="border: 1px solid; padding: 10px">Tạo tin tức</a>
</div>
<table class="table">
    <thead>
        <tr>
            <th>Tiêu đề</th>
            <th>Nội dung</th>
            <th>Danh mục</th>
            <th>Ngày tạo</th>
            <th>Hành động</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($news as $new): ?>
            <tr>
                <td><?= esc_html($new->title) ?></td>
                <td><?= esc_html($new->content) ?></td>
                <td><?= esc_html($new->category_name) ?></td>
                <td><?= esc_html($new->created_at) ?></td>
                <td style="display: flex; gap: 10px; align-items: center;">
                    <a href="edit-new.php?new_id=<?= $new->id ?>">Chỉnh sửa</a>
                    <span>|</span>
                    <a style="color: red" href="">Xoá</a>
                </td>
            </tr>
        <?php endforeach; ?>

    </tbody>
</table>


<?php
require_once ABSPATH . 'wp-admin/admin-footer.php';
