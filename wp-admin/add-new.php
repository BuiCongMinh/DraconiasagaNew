<?php
require_once __DIR__ . '/admin.php';


require_once ABSPATH . 'wp-admin/admin-header.php';
?>
<?php
/*
 * Template Name: News List Template
 */

global $wpdb;

$categories = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}newtype");


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['title']) && isset($_POST['author']) && isset($_POST['content']) && isset($_POST['category_id'])) {
    $title = $_POST['title'];
    $author = $_POST['author'];
    $content = $_POST['content'];
    $category_id = $_POST['category_id'];

    if ($content == "<p>&nbsp;</p>") {
        $content = "";
    }
    if (empty(trim($content))) {
        echo '<script>alert("Nội dung không được trống!");</script>';
    }
    $table_name = $wpdb->prefix . 'news';

    $data_to_insert = array(
        'title' => $title,
        'author' => $author,
        'content' => $content,
        'new_id' => $category_id,
    );

    $wpdb->insert($table_name, $data_to_insert);
    echo '<script type="text/javascript">window.location.href="' . admin_url('list-news.php') . '";</script>';
    exit;
}

?>
<style>
    .ck-editor__editable {
        min-height: 300px;
        max-height: 500px;
        overflow-y: auto;
    }
</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.ckeditor.com/ckeditor5/10.0.1/classic/ckeditor.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
    <div class="form-group" style="padding-right: 20px">
        <label for="title" style="width: 100%">Tiêu đề:</label>
        <input type="text" value="<?= $_POST['title'] ?>" class="form-control" id="title" name="title" required>
    </div>
    <div class="form-group" style="padding-right: 20px">
        <label for="author" style="width: 100%">Tác giả:</label>
        <input type="text" value="<?= $new->author ?>" class="form-control" id="author" name="author" required>
    </div>
    <div class="form-group" style="padding-right: 20px">
        <label for="title" style="width: 100%">Danh mục:</label>
        <select name="category_id" required>
            <option value=""></option>
            <?php foreach ($categories as $category): ?>
                <option value="<?= $category->id ?>"><?= $category->title ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group" style="padding-right: 20px">
        <label for="content" style="width: 100%">Nội dung:</label>
        <textarea name="content" id="content"></textarea>
    </div>
    <button type="submit" class="btn btn-success" id="addNew">Tạo tin tức</button>

    <script>
        ClassicEditor
            .create(document.querySelector('#content'), {
                heading: {
                    options: [{
                            model: 'paragraph',
                            title: 'Paragraph',
                            class: 'ck-heading_paragraph'
                        },
                        {
                            model: 'heading1',
                            view: 'h1',
                            title: 'Heading 1',
                            class: 'ck-heading_heading1'
                        },
                        {
                            model: 'heading2',
                            view: 'h2',
                            title: 'Heading 2',
                            class: 'ck-heading_heading2'
                        },
                        {
                            model: 'heading3',
                            view: 'h3',
                            title: 'Heading 3',
                            class: 'ck-heading_heading3'
                        },
                        {
                            model: 'heading4',
                            view: 'h4',
                            title: 'Heading 4',
                            class: 'ck-heading_heading4'
                        },
                        {
                            model: 'heading5',
                            view: 'h5',
                            title: 'Heading 5',
                            class: 'ck-heading_heading5'
                        },
                        {
                            model: 'heading6',
                            view: 'h6',
                            title: 'Heading 6',
                            class: 'ck-heading_heading6'
                        }
                    ]
                }
            })
            .catch(error => {
                console.error(error);
            });
    </script>
</form>

<?php
require_once ABSPATH . 'wp-admin/admin-footer.php';
