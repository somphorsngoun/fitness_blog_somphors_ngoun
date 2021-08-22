<footer class="mt-4">
    <hr> 
    <div class="row">
        <div class="col-5">
            <h1 class="m-4 font-weight-bold">Fitness Blog</h1>
            <p class="w-75 m-4"><small class="text-muted">Charged News Environment Powering Marketing Engagement: CNN’s Andrew Morse. We offer a fun and fast way to unleash the athlete within you. Supporting health by all means necessary, with valuable information and dedicated programs.</small></p>
            <p class="w-75 m-4 mt-2"><strong>Email: </strong>somphorsngoun292@gmail.com</p>
            <div class="m-4 d-flex justify-content-around w-50" >
                
                <h3><i class="fa fa-facebook-square"></i></h3>
                <h3><i class="fa fa-instagram"></i></h3>
                <h3><i class="fa fa-skype"></i></h3>
                <h3><i class="fa fa-github"></i></h3>

            </div>
        </div>
        <div class="col-3">
            <h4 class="m-4">Quick Acesses</h4>
            <ul class="list-unstyled ml-4 font-weight-bold">
                <li>
                    <a href="?page=home" class="text-dark">Home</a>
                </li>
                <li>
                    <a href="?page=training" class="text-dark">Training</a>
                </li>
                <li>
                    <a href="?page=nurition" class="text-dark">Nutrition</a>
                </li>
                <li>
                    <a href="?page=health" class="text-dark">Health</a>
                </li>
                <li>
                    <a href="?page=lifestyle" class="text-dark">Lifestyle</a>
                </li>
                <li>
                    <a href="equipment" class="text-dark">Equipment</a>
                </li>
            </ul>
            
        </div>
        <div class="col-4">
            <h4 class="m-4">Latest Articles</h4>
            <?php
                require_once('database/database.php');
                $posts = getLatestPost();
                foreach($posts as $post):
            ?>
            <div class="ml-3 mt-4 border-0" style="max-width: 400px;">
                <a href="process/detail.php?id=<?= $post['postID']?>&location=home" class="row no-gutters text-dark">
                    <div class="col-md-3 rounded">
                        <img src="images/<?= $post['image'] ?>" style="height: 60px;" class="card-img" alt="...">
                    </div>
                    <div class="col-md-6 ml-1">
                        <p class="card-title"><?= $post['title'] ?></p>
                    </div>
                </a>                
            </div>
            <?php endforeach; ?>
            
        </div>
    </div>
</footer>