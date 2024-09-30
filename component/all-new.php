<div class="main">
    <div class="container">
        <!-- catagory  -->
        <nav class="navbar pt-5">
            <ul class="category d-flex justify-content-between w-50">
                <li class="list-group-item <?= $query == 0 ? 'active' : ''; ?>"><a href="?type=0">Tất Cả</a></li>
                <?php foreach ($types as $type): ?>
                    <li class="list-group-item <?= $query == $type['id'] ? 'active' : ''; ?>"><a href="?type=<?= $type['id'] ?>"><?= $type['title'] ?></a></li>
                <?php endforeach; ?>
            </ul>
        </nav>
        <!-- end  -->

        <!-- title-new  -->
        <main id="main">
            <img class="w-100" src="./public/img/body/title_bg.png" alt="">
            <ul class="list-group list-group-flush gap-4 pb-5 pt-4 ">
                <?php foreach ($news as $new): ?>
                    <li class="list-group-item bg-transparent">
                        <a href="?id=<?= $new['id'] ?>" target="_blank"
                            class="d-flex justify-content-between fs-6 text-muted pe-5 ps-3">
                            <span><?= $new['title'] ?></span>
                            <span>
                                <?php
                                $dateTime = new DateTime($new['created_at']);
                                $created_at = $dateTime->format('Y/m/d');
                                echo $created_at;
                                ?>
                            </span>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </main>
        <!-- end  -->
    </div>
</div>