<div class="container m-auto">
    <div class="row">
        <div class="col-7 mt-4">
            <?php
                require_once('database/database.php');
                $posts = getLatestPost();
                foreach($posts as $post):
            ?>
            <div class="card mb-3 mt-4" style="max-width: 550px;">
                <a href="process/detail.php?id=<?= $post['postID'] ?>&location=home" class="d-flex no-gutters text-dark">
                    <div class=" rounded bg-dark" style="height: 150px;">
                        <img src="images/<?= $post['image'] ?>" class="card-img" style="opacity: .80; height: 150px; width: 230px;" alt="...">
                    </div>
                    <div class="">
                        <div class="card-body">
                            <h5 class="card-title"><?= $post['title'] ?></h5>
                            <p class="card-text"><small class="text-muted">Last updated: <?= $post['date'] ?></small></p>
                        </div>
                    </div>   
                    <?php if ($_SESSION['role'] === "admin"):?> 
                    <div class="d-flex align-items-end justify-content-end w-100" style="margin-top: -24px;">
                        <a href="process/edit.php?id=<?= $post['postID'] ?>&location=home" class="text-success mr-1"><i class="fa fa-pencil-square-o"></i></a>
                        <a href="process/delete.php?id=<?= $post['postID'] ?>&location=home" class="text-dark ml-1"><i class="fa fa-trash"></i></a>
                    </div>
                    <?php endif; ?>
                </a>
                
            </div>    
            <?php endforeach; ?>            
        </div>

        <div class="col-5 mt-4">
            <img src="http://pngimg.com/uploads/fitness/fitness_PNG41.png" alt="">
            <div class="align-self-center card-img-overlay border border-light shadow p-4 h-25 d-flex flex-column align-items-center justify-content-center" style="margin-top: 200px; background: rgba(248, 251, 253, 0.596);">
                <h3 class="text-center">We offer a fun and fast way to unleash the athlete within 
                    you.</h3>
            </div>
        </div>
    </div>

    <h1 class="text-center m-4">Most popular</h1>
    <div class="d-flex flex-wrap justify-content-center">

        <?php
            $limitPosts = getPopularPost();
            foreach($limitPosts as $post):
        ?>
        <div class="card text-dark mt-4" style="width: 23.1rem;">
            <a href="process/detail.php?id=<?= $post['postID'] ?>&location=home" class="text-dark">
                <img class="card-img-top" style="opacity: .80; width: 23rem; height: 230px" src="images/<?= $post['image'] ?>" alt="Card image cap">
                <span class="mt-2 text-warning"><?= $post['categoryName'] ?></span>
                <div class="card-body ">
                    <h5 class="card-text"><?= $post['title'] ?></h5>
                    <p class="card-text"><?= readMore($post['description'], 100) ?> ... <a href="process/detail.php?id=<?= $post['postID'] ?>">Read More</a></p>
                    <div class=" d-flex justify-content-between w-100">
                        <p class="card-text"><small class="text-muted">Last updated: <?= $post['date'] ?></small></p>
                        <?php if ($_SESSION['role'] === "admin"):?>
                        <div class="d-flex">
                            <a href="process/edit.php?id=<?= $post['postID'] ?>&location=home" class="text-success mr-1"><i class="fa fa-pencil-square-o"></i></a>
                            <a href="process/delete.php?id=<?= $post['postID'] ?>&location=home" class="text-dark ml-1"><i class="fa fa-trash"></i></a>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </a>
        </div>
        <?php endforeach; ?>
    </div>


    <div class="row" style="margin-top: 110px;">
        <div class="col-7 d-flex justify-content-center">
            <div style="max-width: 500px; margin-top: 80px;" class="">
                <h1>Are you ready to change?</h1>
                <p>We offer a fun and fast way to unleash the athlete within 
                    you. We have been supporting people radical 
                    transformations ever since we started back in 2003 and we 
                    plan to expand even more by next year. Download the 
                    program or take part in our monthly power & fitness camp. 
                    Get ready to change your life!
                </p>
                <a href="process/signup.php" class="btn btn-warning"><strong>Sign up</strong></a>
            </div>
        </div>

        <div class="col-5">
            <img class="w-70 mt-4" src="https://pngimg.com/uploads/fitness/fitness_PNG191.png" alt="">
        </div>
    </div>


    <h1 class="text-center m-4">Should Read</h1>
    
    <div class="d-flex row m-4" style="height: 400px">
        <?php
            $limitPosts = shouldRead();
            foreach($limitPosts as $post):
        ?>
        <div class="col h-100">
            <a href="process/detail.php?id=<?= $post['postID'] ?>&location=home" class="card bg-dark text-white border-0 h-100">
                <img class="card-img h-100" style="opacity: .50" src="images/<?= $post['image'] ?>" alt="Card image">
                <div class="card-img-overlay d-flex flex-column align-items-start justify-content-end">
                    <h4 class="card-title"><?= $post['title'] ?></h4>
                    <p class="card-text">Last updated: <?= $post['date'] ?></p>
                </div>
            </a>
            <?php if ($_SESSION['role'] === "admin"):?>
            <div class="d-flex align-items-end justify-content-end w-100" style="">
                <a href="process/edit.php?id=<?= $post['postID'] ?>&location=home" class="text-success mr-1"><i class="fa fa-pencil-square-o"></i></a>
                <a href="process/delete.php?id=<?= $post['postID'] ?>&location=home" class="text-dark ml-1"><i class="fa fa-trash"></i></a>
            </div>
            <?php endif; ?>
        </div>
        <?php endforeach; ?>
    </div>

    <div class="d-flex justify-content-around" style="margin-top: 100px;">

        <a href="?page=training" class="card bg-dark text-white border-0 h-100 mt-4" style="width: 25rem; border-radius: 15px;">
            <img style="opacity: .70; width: 25rem; border-radius: 15px; height: 35rem;"  src="https://assets.vogue.in/photos/5f1eb1871d33754d11eaf69c/2:3/w_2560%2Cc_limit/fitness%252520workout%252520video.jpg" alt="">

            <div class="card-img-overlay d-flex flex-column align-items-center mt-4">
                <h2 style="margin-left: -50px;">Training</h2>
                <p class="card-title">Charged News Environment Powering Marketing Engagement: CNN’s Andrew Morse</p>
                <p class="card-text text-warning" style="margin-left: -70px; opacity: .70; font-size: 60px;"><i class="fa fa-universal-access"></i></p>
            </div>
        </a>
        <a href="?page=health" class="card bg-dark text-white border-0 h-100" style="width: 25rem; z-index: 2; margin-left: -200px; border-radius: 15px;">
            <img style="opacity: .70; width: 25rem; border-radius: 15px; height: 35rem;" src="https://i.pinimg.com/474x/83/30/96/833096f639d37b01207f2a26f418b2b2.jpg" alt="">

            <div class="card-img-overlay d-flex flex-column align-items-center mt-4">
                <h2>Health</h2>
                <p class="card-title text-center">Charged News Environment Powering Marketing Engagement: CNN’s Andrew Morse</p>
                <p class="card-text text-warning" style="opacity: .70; font-size: 60px;"><i class="fa fa-heartbeat"></i></p>
            </div>
        </a>
        <a href="?page=nurition" class="card bg-dark text-white border-0 h-100 mt-4" style="width: 25rem; margin-left: -200px; border-radius: 15px;">
            <img style="opacity: .70; width: 25rem; border-radius: 15px; height: 35rem;" src="https://innerbody.imgix.net/nutrition-main.jpg?w=480&auto=format" alt="">

            <div class="card-img-overlay d-flex flex-column align-items-end mt-4">
                <h2 style="margin-right: 70px;">Nutrition</h2>
                <p class="card-title text-right">Charged News Environment Powering Marketing Engagement: CNN’s Andrew Morse</p>
                <p class="card-text text-warning" style="opacity: .70; font-size: 50px; margin-right: 120px;"><i class="fa fa-medkit"></i></p>
            </div>
        </a>

    </div>
</div>