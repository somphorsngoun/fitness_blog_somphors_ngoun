<div class="container mt-4">

    <!-- <h2 class="text-warning mt-4" onclick="window.history.back();"><i class="fa fa-arrow-left"></i></h2> -->
    <h2 class="text-center">Search Pots</h2>
</div>
<div class="container-fluid m-4 d-flex justify-content-center">
    <form class="d-flex w-50" method="POST">
      <input class="form-control me-2 " type="search" name="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success text-dark" type="submit">Search</button>
    </form>
</div>
<div class="d-flex justify-content-center">
    <div class="w-75">
        <h4 class="">Page: <?= $_GET['number'] ?></h4>
    </div>
</div>
<div class="d-flex flex-wrap justify-content-center">
    <?php
        require_once('database/database.php');
        $Posts = "";
        if($_SERVER['REQUEST_METHOD'] == "POST"){
            // Search
            $Posts = searchByTitle($_POST);
        }else{
            // select
            $Posts = getPaginationPost($_GET['number']);
        }
        foreach($Posts as $post):
    ?>
    <div class="card text-dark mt-4" style="width: 23.1rem;">
        <a href="process/detail.php?id=<?= $post['postID'] ?>&location=search" class="text-dark">
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
    <div class="mt-4 d-flex justify-content-center">
        <?php 
            $page = selectAllPost();
            $number_of_page = $page;
            // echo $result;
            for($page = 1; $page<= $number_of_page; $page++):
        ?>
        <a href="index.php?page=search&number=<?= $page ?>" class="text-dark m-2" style="font-size: 22px; "><?= $page ?></a>
        <?php endfor; ?>
    </div>

