<?php SESSION_START(); ?>
<?php include_once('../partial/header.php'); ?>
<?php if ($_SESSION['user'] !== ""): ?>
    <div class="container mt-4">
        <div class="d-flex flex-column justify-content-center align-items-center">
            <?php
                include_once('../database/database.php');
                $id = $_GET['id'];
                $location = $_GET['location'];
                increaseView($id);
                $posts = selectOnePost($id);
                foreach($posts as $post):
            ?>
            <a href="../index.php?page=<?= $location ?>&number=1" class="text-warning align-self-start text-left mt-4" style="font-size: 22px;"><i class="fa fa-arrow-left"></i></a>
            
            <h2 class=""><?= $post['title'] ?></h2>
            <p class="card-text"><small class="text-muted">Last updated: <?= $post['date'] ?></small></p>
            <div class="d-flex justify-content-between w-75">
                <?php if ($_SESSION['role'] === "admin"):?>
                <div class="">
                    <a href="edit.php?id=<?= $post['postID'] ?>&loaction=<?= $location ?>" class="text-success mr-1" id="icon"><i class="fa fa-pencil-square-o"></i></a>
                    <a href="delete.php?id=<?= $post['postID'] ?>&loaction=<?= $location ?>" class="text-dark ml-1" id="icon"><i class="fa fa-trash"></i></a>
                </div>
                <?php endif; ?>
                <h3 id="icon"><i class="fa fa-eye"></i> <?= $post['view'] ?></h3>
            </div>
            <img src="../images/<?= $post['image'] ?>" class="w-75 mt-4" alt="">
            <div class="w-75 mt-3">
                <p><?= $post['description'] ?></p>
            </div>

            <?php endforeach; ?>
            <hr>
        </div>

        <div class="d-flex flex-column justify-content-center align-items-center">
            <div class="d-flex flex-column w-75 mb-4">
                <h3><?= countComment($id) ?> Comments <i class="fa fa-commenting-o"></i></h3>
                <form action="" method="POST" class="">
                    <div class="d-flex w-100">
                        <img src="../images/<?= $_SESSION['profile'] ?>" style="width: 50px; height: 50px;" class="border border-light shadow mr-2 rounded-circle" alt="">
                        <textarea class="form-control" style="border-bottom: 2px solid black; background: none; outline: none; border-top: none;" name="comment" placeholder="Comment..." cols="30" rows="1" ></textarea>
                    </div>
                    <div class="d-flex w-100 justify-content-end mt-2 align-items-end">
                        <button type="submit" class="btn btn-info text-right ml-2">Submit</button>

                    </div>
                </form>
                <?php
                    if($_SERVER['REQUEST_METHOD'] == "POST"){
                        newComment($_POST, $_GET['id']);
                    }
                ?>
                <hr>
            </div>
            <?php
                $comments = getAllComment($id);
                foreach($comments as $comment):
            ?>
            <div class="d-flex w-75">
                <img src="../images/<?= $comment['profile'] ?>" style="width: 50px; height: 50px;" class="border border-light shadow rounded-circle" alt="">
                <div class=" ml-3">
                    <h5 class="font-weight-bold"><?= $_SESSION['user'] ?></h5>
                    <p><?= $comment['comment'] ?></p>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
<?php else: ?>
    <?php include_once('no_account.php'); ?>
<?php endif; ?>
 <?php   include_once('../partial/footer.php'); ?>

    