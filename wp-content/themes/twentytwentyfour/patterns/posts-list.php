<?php

/**
 * Title: List of posts without images, 1 column
 * Slug: twentytwentyfour/posts-list
 * Categories: query, posts
 * Block Types: core/query
 * Description: A list of posts without images, 1 column.
 */
global $wpdb;
// $types = $wpdb->get_results("
//     SELECT nt.id, nt.tittle, n.tittle AS new_tittle, n.id AS new_id, n.created_at
//     FROM {$wpdb->prefix}newtype nt
//     JOIN {$wpdb->prefix}news n ON nt.id = n.new_id
// 	ORDER BY nt.id, n.id DESC
// ");

// $type_list = [];

// foreach ($types as $type) {
//     if (!isset($type_list[$type->id])) {
//         $type_list[$type->id] = [
//             'type_name' => $type->tittle,
//             'news' => []
//         ];
//     }

//     if ($type->new_id) {
//         $type_list[$type->id]['news'][] = [
//             'id' => $type->new_id,
//             'tittle' => $type->new_tittle,
// 			'created_at' => $type->created_at,
//         ];
//     }
// }

$types = $wpdb->get_results("
    SELECT id, tittle
    FROM {$wpdb->prefix}newtype
	ORDER BY id ASC
");

$query = isset($_GET['type']) ? sanitize_text_field($_GET['type']) : '';
$sql = "SELECT * FROM {$wpdb->prefix}news";
if ($query) {
	$sql .= " WHERE new_id={$query}";
}
$sql .= " ORDER BY id DESC";
$news = $wpdb->get_results($sql);
// echo "<pre>";
// print_r($news);
// exit;
?>

<div class="news">
	<div class="list-tabs">
		<ul class="tabs">
			<li class="tab-item <?= $query == 0 ? 'active' : ''; ?>">
				<a href="?type=0" class="item">Tất cả</a>
			</li>
			<?php foreach ($types as $type): ?>
				<li class="tab-item <?= $query == $type->id ? 'active' : ''; ?>">
					<a href="?type=<?= $type->id ?>" class="item"><?= esc_html($type->tittle) ?></a>
				</li>
			<?php endforeach; ?>
			<li class="all-new">
				<a href="https://draconiasaga.hhgame.vn/news/index.html" target="_blank"> Xem tất
					cả</a>
				<span></span>
			</li>
			<span class="line"></span>
		</ul>
	</div>
	<div class="line">
	</div>
	<div class="list-content">
		<div class="content">
			<?php foreach ($news as $new): ?>
				<div class="row flex">
					<a class="title"><?= $new->tittle ?></a>
					<span class="time"><?= $new->created_at ?></span>
				</div>
			<?php endforeach; ?>
		</div>
	</div>