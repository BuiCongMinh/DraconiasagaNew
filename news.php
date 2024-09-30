<?php
require_once "wp-config.php";

$conn = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$news = [];
$types = [];
if ($_GET['id']) {
    $sql = "SELECT * FROM wp_news WHERE id = " . $_GET['id'];
} else {
    $sql = "SELECT * FROM wp_news";
    $sql1 = "SELECT * FROM wp_newtype";
    $result1 = $conn->query($sql1);
}


$query = isset($_GET['type']) ? sanitize_text_field($_GET['type']) : '';
if ($query) {
    $sql .= " WHERE new_id={$query}";
}
$sql .= " ORDER BY id DESC";
$result = $conn->query($sql);

if (!$_GET['id']) {
    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $news[] = $row;
        }
    }
    if ($result1 && $result1->num_rows > 0) {
        while ($row1 = $result1->fetch_assoc()) {
            $types[] = $row1;
        }
    }
}

$new = array();
if ($_GET['id'] && $result->num_rows > 0) {
    $new = $result->fetch_assoc();
} else if ($_GET['id']) {
    header("Location: news.php?type=0");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php if (isset($_GET['id']) && $_GET['id']): ?>
        <title><?= $new['title']; ?></title>
        <link rel="stylesheet" href="./public/css/detail.css">
    <?php else: ?>
        <title><?= $new['title']; ?>Tất cả</title>
        <link rel="stylesheet" href="./public/css/allNew.css">
    <?php endif; ?>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="wrapper">
        <!-- header  -->
        <header class="header">
            <img src="./public/img/header/top.jpg" alt="" class="image-header img-fluid object-fit-cover" width="100%">
        </header>
        <!-- end  -->

        <!-- body  -->
        <?php if ($_GET['id']): ?>
            <?php include 'component/detail-new.php'; ?>
        <?php else: ?>
            <?php include 'component/all-new.php'; ?>
        <?php endif; ?>
        <!-- main  -->

        <!-- footer  -->
        <footer class="footer">
            <div class="container d-flex flex-column align-items-center position-relative py-5">
                <div class="footer-icon d-flex gap-5">
                    <img src="./public/img/footer/sugarfun.png" alt="" class="sugar-logo">
                    <img src="./public/img/footer/hhgame.png" alt="" class="hhgames-logo">
                </div>
                <p class="mt-3">Draconia Saga</p>
                <div class="footer-offer gap-3 d-flex justify-content-between">
                    <a href="">Hỗ Trợ</a>
                    <span>|</span>
                    <a href="">Cài Đặt</a>
                    <span>|</span>
                    <a href="https://funtapcorp.vn/dieu-khoan" target="_blank">Điều Khoản</a>
                    <span>|</span>
                    <a href="https://funtapcorp.vn/bao-mat" target="_blank">Bảo Mật</a>
                </div>
                <p class="footer-time">
                    Thời gian: <strong class="text-danger">9:00-18:00 thứ 2- thứ 6</strong> (GMT+7)
                </p>
                <p>Chơi quá 180 phút mỗi ngày sẽ ảnh hưởng xấu đến sức khẻo</p>
                <p>Quyết định phê duyệt nội dung kịch bản trò chơi điện tử G1 trên mạng số: </p>
                <p>QĐ số 676/QĐ-BTTTT cấp ngày 26/04/2024</p>
                <p>Người chịu trách nhiệm nội dung: Ông Hoàng Quý Dương</p>
                <p>Tầng 4 Tòa Tây Hà, 19 P. Tố Hữu, Khu đô thị Phùng Khoang, Quận Nam Từ Liêm, Hà Nội</p>
                <img src="./public/img/footer/limit_18.png" alt=""
                    class="limit-18 position-absolute top-50 end-0 translate-middle">
            </div>
        </footer>
        <!-- end  -->

    </div>

    <!-- script  -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
        integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy"
        crossorigin="anonymous"></script>
</body>

</html>