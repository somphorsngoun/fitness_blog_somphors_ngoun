    
<?php include_once('../partial/header.php'); ?>
    <div class="container p-4">
        <button class="btn btn-warning" onclick="window.history.back();">Back</button>
        <h1 class="text-center">Edit Post</h1>
        <?php
            include_once('../database/database.php');
            $id = $_GET['id'];
            $posts = selectOnePost($id);
            foreach($posts as $post):
        ?>

        <form action="" method="POST" class="mt-4" enctype="multipart/form-data">
            <input type="hidden" value="<?= $post['postID'] ?>" name="id">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Title" value="<?= $post['title'] ?>" name="title">
            </div>
            <div class="form-group">
                <select class="form-select form-control" name="type" value="<?= $post['categoryName'] ?>" aria-label="Default select example">
                    <option value="<?= $post['categoryID'] ?>"><?= $post['categoryName'] ?></option>
                    <option value="1">Training</option>
                    <option value="2">Nurition</option>
                    <option value="3">Health</option>
                    <option value="4">Lifestyle</option>
                    <option value="5">Equipment</option>
                </select>
            </div>
            <div class="form-group">
                <textarea name="description" id="" cols="152" rows="7"><?= $post['description'] ?></textarea>
                <!-- <input type="text" class="form-control" placeholder="Book date & time: EX(2021-12-21 20:12:43" name="date"> -->
            </div>
            <div class="form-group">
                <!-- <textarea name="description" id="" cols="152" rows="7"></textarea> -->
                <input type="file" name="file" id="file" >
                <input type="hidden" name="oldImage" value="<?= $post['image'] ?>"/>
            </div>

            <div class="form-group">
                <input type="submit" name="submit" class="btn btn-primary btn-block" value="Edit">
                <!-- <input type="submit" class="btn btn-primary btn-block" name="submit" /> -->
            </div>
        </form>
        <?php endforeach; ?>
        <?php
            include_once('../database/database.php');

            if (isset($_FILES["file"])){
                $oldFile = $_POST['oldImage'];
                // $file = $_FILES["file"]["name"];
                if ($_FILES["file"]["name"] == ""){
                    updatePost($_POST, $oldFile);
                }else{
                    $fileName = $_FILES["file"]["name"];
                    $fileSize = $_FILES["file"]["type"];
                    $fileType = $_FILES["file"]["size"];
                    $tmp_name = $_FILES["file"]["tmp_name"];
                    
                    $dir = "../images/";
                    move_uploaded_file($tmp_name, $dir.$fileName);

                    updatePost($_POST, $fileName, $_GET['location']);

                }
            }
        ?>

    </div>
<?php include_once('../partial/footer.php'); ?>
