<div class="main d-flex flex-column justify-content-between ">
    <div class="container">
        <div class="detail-title pt-4">
            <h1 class="text-center"><?= $new['title'] ?></h1>
        </div>
        <div class="detail-time ">
            <p class=" lead text-center">
                <?php
                $dateTime = new DateTime($new['created_at']);
                $created_at = $dateTime->format('Y/m/d');
                echo $created_at;
                ?>
            </p>
        </div>
        <div class="detail-line ">
            <img src="./public/img/body/title_bg.png" alt="" class="w-100">
        </div>
        <div class="detail-content py-4 px-5">
            <p>
                <?= $new['content']  ?>
            </p>
            <p class="detail-content-author text-end"><?= $new['author']  ?></p>
        </div>
    </div>
</div>