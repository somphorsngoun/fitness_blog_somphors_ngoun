    
<?php include_once('../partial/header.php'); ?>
    <div class="container p-4">
            <button class="btn btn-warning" onclick="window.history.back();">Back</button>
            <h1 class="text-center">Create New Post</h1>
            <form action="" method="POST" class="mt-4" enctype="multipart/form-data">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Title" name="title">
                </div>
                <div class="form-group">
                    <select class="form-select form-control" name="type" aria-label="Default select example">
                        <option selected>Open this select category</option>
                        <option value="1">Training</option>
                        <option value="2">Nurition</option>
                        <option value="3">Health</option>
                        <option value="4">Lifestyle</option>
                        <option value="5">Equipment</option>
                    </select>
                </div>
                <div class="form-group">
                    <textarea name="description" id="" class="form-control" placeholder="Description" rows="7"></textarea>
                    <!-- <input type="text" class="form-control" placeholder="Book date & time: EX(2021-12-21 20:12:43" name="date"> -->
                </div>
                <div class="form-group">
                    <!-- <textarea name="description" id="" cols="152" rows="7"></textarea> -->
                    <input type="file" name="file" id="file">
                </div>

                <div class="form-group">
                    <input type="submit" name="submit" class="btn btn-primary btn-block" value="Submit">
                    <!-- <input type="submit" class="btn btn-primary btn-block" name="submit" /> -->
                </div>
            </form>
            <?php
                include_once('../database/database.php');
                if (isset($_FILES["file"])){
                    if ($_FILES["file"]["error"] > 0){
                        echo "Error: " . $_FILES["file"]["error"] . "<br>";
                    }else{
                        $fileName = $_FILES["file"]["name"];
                        $fileSize = $_FILES["file"]["type"]; 
                        $fileType = $_FILES["file"]["size"];
                        $tmp_name = $_FILES["file"]["tmp_name"];
                        
                        $dir = "../images/";
                        move_uploaded_file($tmp_name, $dir.$fileName);

                        createNewPost($_POST, $fileName);

                    }
                }   
            ?>

    </div>
<?php include_once('../partial/footer.php'); ?>
