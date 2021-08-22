<div class="row">
        <div class="col-5 d-flex flex-column align-items-center justify-content-center">
            <h1>Health</h1>
            <p class="w-75">Kind there be were creeping hath, kind multiply said itself. Wherein very subdue seasons divide land upon whales void you’re that air, female said earth was. Said firmament them movet creature dominion. Fourth earth midst under night he signs sixth dry upon don’t own great. So isn’t i place be second i fly void saw may she’d seed won’t seed let.</p>
        </div>
        <div class="col-7 d-flex justify-content-end align-item-end hover-zoom" style="margin-top: 40px;">
            <?php
                require_once('database/database.php');
                $condition = 'health';
                $limitPosts = getOnelatest($condition);
                foreach($limitPosts as $post):
            ?>
            <div class="h-100 w-100">
                <a href="process/detail.php?id=<?= $post['postID'] ?>&location=health" class="card bg-dark text-white border-0 h-100 mr-4" style="border-radius: 15px;">
                    <img class="card-img" style=" border-radius: 15px; opacity: .60; height: 30rem;" src="images/<?= $post['image'] ?>" alt="Card image">
                    <div class="card-img-overlay d-flex flex-column align-items-start justify-content-end">
                        <p class="text-warning"><?= $post['categoryName'] ?></p>
                        <h4 class="card-title"><?= $post['title'] ?></h4>
                        <p class="card-text">Last updated: <?= $post['date'] ?></p>
                    </div>
                </a>
            </div>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="row m-4">
        <div class="col-8">
            <div class="d-flex flex-wrap justify-content-center">
                <?php
                    require_once('database/database.php');
                    $limitPosts = gethealth($_GET['number']);
                    foreach($limitPosts as $post):
                ?>
                
                <div class="card mt-3" style="width: 25.1rem;">
                    <a href="process/detail.php?id=<?= $post['postID'] ?>&location=health" class="text-dark">
                        <img class="card-img-top" style="opacity: .80; width: 25rem; height: 230px;" src="images/<?= $post['image'] ?>" alt="Card image cap">
                        <span class="mt-2 text-warning"><?= $post['categoryName'] ?></span>
                        <div class="card-body ">
                            <h5 class="card-text"><?= $post['title'] ?></p>
                            <p class="card-text"><small class="text-muted">Last updated: <?= $post['date'] ?></small></p>
                            <?php if ($_SESSION['role'] === "admin"):?>
                            <div class="d-flex justify-content-end">
                                <a href="process/edit.php?id=<?= $post['postID'] ?>&location=health" class="text-success mr-1"><i class="fa fa-pencil-square-o"></i></a>
                                <a href="process/delete.php?id=<?= $post['postID'] ?>&location=health" class="text-dark ml-1"><i class="fa fa-trash"></i></a>
                            </div>
                            <?php endif; ?>
                        </div>
                    </a>
                </div>
                <?php endforeach; ?>
            </div>
            <div class="">
                <ul class="d-flex justify-content-center list-unstyled" style="font-size: 22px;">
                    <?php 
                        $page = selectAllHealth();
                        $number_of_page = $page;
                        for($page = 1; $page<= $number_of_page; $page++):
                    ?>
                    <li class="m-3"><a href="index.php?page=health&number=<?= $page ?>" class="text-dark"><?= $page ?></a></li>
                    
                    <?php endfor; ?>
                </ul>
            </div>
        </div>
        <div class="card col-4 ">
            <h3 class="text-center m-3">Most Popular</h3>
            <hr>
            <?php

                $limitPosts = gethealthPopular();
                foreach($limitPosts as $post):
            ?>
            <div class="ml-3 mt-4 border-0" style="max-width: 400px;">
                <a href="process/detail.php?id=<?= $post['postID'] ?>&location=health" class="row no-gutters text-dark">
                    <div class="col-md-6 rounded">
                        <img src="images/<?= $post['image'] ?>" class="card-img" style="height: 8rem;" alt="...">
                    </div>
                    <div class="col-md-5 ml-1">
                        <p class="card-title"><?= $post['title'] ?></p>
                        <p class="card-text"><small class="text-muted"><?= $post['date'] ?></small></p>
                    </div>
                </a>
            </div>
            <?php endforeach; ?>
        </div>
    </div>