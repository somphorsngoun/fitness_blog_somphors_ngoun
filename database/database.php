<?php
/**
 * Connect to database
 */
function db() {
    return new mysqli('localhost', 'root', '', 'fitness_blog');
}

/**
 * Create new student record
 */
function createNewPost($value, $image) {
    $title = $value['title'];
    $description = $value['description'];
    $datePlace = date_default_timezone_set('Asia/Phnom_Penh');
    $date = date('Y-m-d h:i:s');
    $type = $value['type'];
    // db()->QUERY("INSERT INTO posts(title, date, image, view, description, userID, cetegoryID) VALUES ('$title', '$date', '$image', '0', '$description', '1', '$type')");
    db()->QUERY("INSERT INTO posts(title, date, image, view, description, userID, categoryID) VALUES('$title','$date','$image',0,'$description',1,'$type')");
    header("Location: ../index.php?page=home");
    // include_once('../index.php');
}



function shouldRead(){
    return db()->QUERY("SELECT * FROM posts INNER JOIN categories ON posts.categoryID=categories.categoryID ORDER BY posts.title ASC LIMIT 3");
}

function getLatestPost() {
    return db()->QUERY("SELECT * FROM posts INNER JOIN categories ON posts.categoryID=categories.categoryID ORDER BY postID DESC LIMIT 3");

}

/**
 * Get only one on record by id 
 */
function selectOnePost($id) {
    return db()->query("SELECT * FROM posts INNER JOIN categories ON posts.categoryID=categories.categoryID WHERE postid = $id");

}

// /**
//  * Delete student by id
//  */
function deletePost($id, $location) {
    db()->QUERY("DELETE FROM posts WHERE postID = $id");

    header("Location: ../index.php?page=$location");
}


// /**
//  * Update students
//  */
function updatePost($value, $image ,$location) {
    $id = $value['id'];
    $title = $value['title'];
    $description = $value['description'];
    $datePlace = date_default_timezone_set('Asia/Phnom_Penh');
    $date = date('Y-m-d h:i:s');
    $type = $value['type'];
    db()->query("UPDATE posts SET title= '$title', description= '$description', date='$date', image='$image', categoryID='$type' WHERE postid = $id");
    header("Location: ../index.php?page=$location");
}


function getPopularPost(){
    return db()->QUERY("SELECT * FROM posts INNER JOIN categories ON posts.categoryID=categories.categoryID ORDER BY posts.view DESC LIMIT 6");
    
}

// Substring .......................................................................................................................................................................................................
function readMore($text, $number){
    return substr($text, 0, $number);
}

function totalPost($allPost){
    $totalPost = mysqli_num_rows($allPost);

    $totalPost = ceil($totalPost/4);
    return $totalPost;
}


function selectAllTraining(){
    $post = db()->QUERY("SELECT * FROM posts INNER JOIN categories ON posts.categoryID=categories.categoryID WHERE categories.categoryName='Training' ORDER BY posts.postID DESC");
    return totalPost($post);
}
function selectAllNurition(){
    $post = db()->QUERY("SELECT * FROM posts INNER JOIN categories ON posts.categoryID=categories.categoryID WHERE categories.categoryName='Nutrition' ORDER BY posts.postID DESC");
    return totalPost($post);

}
function selectAllLifestyle(){
    $post = db()->QUERY("SELECT * FROM posts INNER JOIN categories ON posts.categoryID=categories.categoryID WHERE categories.categoryName='Lifestyle' ORDER BY posts.postID DESC");
    return totalPost($post);

}
function selectAllHealth(){
    $post = db()->QUERY("SELECT * FROM posts INNER JOIN categories ON posts.categoryID=categories.categoryID WHERE categories.categoryName='Health' ORDER BY posts.postID DESC");
    return totalPost($post);

}
function selectAllEquipment(){
    $post = db()->QUERY("SELECT * FROM posts INNER JOIN categories ON posts.categoryID=categories.categoryID WHERE categories.categoryName='Equipment' ORDER BY posts.postID DESC");
    return totalPost($post);

}


function gethealth($number){
    if ($number == 1){
        $number =0;
        $end = 4;
    }else{
        $number = $number+3;
        $end = 4;
    }
    return db()->QUERY("SELECT * FROM posts INNER JOIN categories ON posts.categoryID=categories.categoryID WHERE categories.categoryName='Health' ORDER BY posts.postID DESC LIMIT $number, $end");
}
function getTraining($number){
    if ($number == 1){
        $number =0;
        $end = 4;
    }else{
        $number = $number+3;
        $end = 4;
    }
    return db()->QUERY("SELECT * FROM posts INNER JOIN categories ON posts.categoryID=categories.categoryID WHERE categories.categoryName='Training' ORDER BY posts.postID LIMIT $number, $end");
}


function getNutrition($number){
    if ($number == 1){
        $number =0;
        $end = 4;
    }else{
        $number = $number+3;
        $end = 4;
    }
    return db()->QUERY("SELECT * FROM posts INNER JOIN categories ON posts.categoryID=categories.categoryID WHERE categories.categoryName='Nutrition' ORDER BY posts.postID LIMIT $number, $end");
}
function getLifestyle($number){
    if ($number == 1){
        $number =0;
        $end = 4;
    }else{
        $number = $number+3;
        $end = 4;
    }
    return db()->QUERY("SELECT * FROM posts INNER JOIN categories ON posts.categoryID=categories.categoryID WHERE categories.categoryName='Lifestyle' ORDER BY posts.postID LIMIT $number, $end");
}
function getEquipment($number){
    if ($number == 1){
        $number =0;
        $end = 4;
    }else{
        $number = $number+3;
        $end = 4;
    }
    return db()->QUERY("SELECT * FROM posts INNER JOIN categories ON posts.categoryID=categories.categoryID WHERE categories.categoryName='Equipment' ORDER BY posts.postID LIMIT $number, $end");
}

function gethealthPopular(){
    return db()->QUERY("SELECT * FROM posts INNER JOIN categories ON posts.categoryID=categories.categoryID WHERE categories.categoryName='Health' ORDER BY posts.view DESC");
}
function getTrainingPopular(){
    return db()->QUERY("SELECT * FROM posts INNER JOIN categories ON posts.categoryID=categories.categoryID WHERE categories.categoryName='Training' ORDER BY posts.view DESC");
}
function getNutritionPopular(){
    return db()->QUERY("SELECT * FROM posts INNER JOIN categories ON posts.categoryID=categories.categoryID WHERE categories.categoryName='Nutrition' ORDER BY posts.view DESC");
}
function getLifestylePopular(){
    return db()->QUERY("SELECT * FROM posts INNER JOIN categories ON posts.categoryID=categories.categoryID WHERE categories.categoryName='Lifestyle' ORDER BY posts.view DESC");
}
function getEquipmentPopular(){
    return db()->QUERY("SELECT * FROM posts INNER JOIN categories ON posts.categoryID=categories.categoryID WHERE categories.categoryName='Equipment' ORDER BY posts.view DESC");
}

function getOnelatest($condition){
    if ($condition === "nurition"){
        return db()->QUERY("SELECT * FROM posts INNER JOIN categories ON posts.categoryID=categories.categoryID WHERE categories.categoryName='Nutrition' ORDER BY categories.categoryID DESC LIMIT 1");

    }elseif ($condition === "health"){
        return db()->QUERY("SELECT * FROM posts INNER JOIN categories ON posts.categoryID=categories.categoryID WHERE categories.categoryName='Health' ORDER BY categories.categoryID DESC LIMIT 1");

    }elseif ($condition === "training"){
        return db()->QUERY("SELECT * FROM posts INNER JOIN categories ON posts.categoryID=categories.categoryID WHERE categories.categoryName='Training' ORDER BY categories.categoryID DESC LIMIT 1");

    }elseif ($condition === "lifestyle"){
        return db()->QUERY("SELECT * FROM posts INNER JOIN categories ON posts.categoryID=categories.categoryID WHERE categories.categoryName='Lifestyle' ORDER BY categories.categoryID DESC LIMIT 1");

    }else {
        return db()->QUERY("SELECT * FROM posts INNER JOIN categories ON posts.categoryID=categories.categoryID WHERE categories.categoryName='Equipment' ORDER BY categories.categoryID DESC LIMIT 1");
    }
}


function increaseView($id){
    return db()->QUERY("UPDATE posts SET view = view+1 WHERE postID=$id");
}

function searchByTitle($value){
    $title = $value['search'];
    if ($title === ""){
        return getAllPost();
    }else {
        return db()->QUERY("SELECT * FROM posts INNER JOIN categories ON posts.categoryID=categories.categoryID WHERE title LIKE '%$title%' ORDER BY posts.postID");
    }
}

function userLogin($value){
    $user = $value['username'];
    $password = trim($value['password']);
    // echo $user . $password;
    $array = db()->QUERY("SELECT * FROM users WHERE userName='$user'");

    foreach($array as $result){
        if (password_verify($password, $result['password'])){
            SESSION_START();
            
            $_SESSION['user'] = $result['userName'];
            $_SESSION['passWD'] = $result['password'];
            $_SESSION['profile'] = $result['profile'];
            $_SESSION['role'] = $result['type'];
            $_SESSION['id'] = $result['userID'];
            
            header("Location: ../index.php?page=home");
        }else{
            echo "Password Not Exist";
        }
        
    }

}

function registerUser($value, $image){
    $username = $value['username'];
    $password = password_hash($value['password'], PASSWORD_DEFAULT);
    $email = $value['email'];
    // $username = $vaule['username'];
    db()->QUERY("INSERT INTO users(userName,password,profile,email,type) VALUES('$username', '$password','$image','$email','normal')");
    SESSION_START();
    $_SESSION['user'] = $value['username'];
    $_SESSION['passWD'] = $value['password'];
    $_SESSION['profile'] = $image;
    $_SESSION['role'] = 'normal';
    $array = db()->QUERY("SELECT * FROM users WHERE userName=$username");
    foreach($array as $result){
        $_SESSION['id'] = $result['userID'];
    }
    header("Location: ../index.php?page=home");
}

function checkName($user){

    $array = db()->QUERY("SELECT * FROM users WHERE userName='$user'");

    foreach($array as $value){
        return 'false';
    }
    return 'true';
}

function countComment($id){
    $result = db()->QUERY("SELECT COUNT(commentID) as 'quantity' FROM comment WHERE commentID=$id");

    foreach($result as $row){
        $quantity = $row['quantity'];
    }

    return $quantity;
}
function newComment($value, $postId){
    // SESSION_START();
    $userId = $_SESSION['id'];
    $comment = $value['comment'];
    $datePlace = date_default_timezone_set('Asia/Phnom_Penh');
    $date = date('Y-m-d h:i:s');
    db()->QUERY("INSERT INTO comment(comment, date, userID, postID) VALUES('$comment', '$date', '$userId', '$postId')");
}
function getAllComment($id){
    return db()->QUERY("SELECT * FROM comment INNER JOIN users ON comment.userID=users.userID WHERE postID=$id");
}

function selectAllPost(){
    $allPost = db()->QUERY("SELECT * FROM posts");

    $totalPost = mysqli_num_rows($allPost);

    $totalPost = ceil($totalPost/12);
    return $totalPost;
}

function getPaginationPost($number){
    $start = $number;
    if ($start == 1){
        $start = 0;
        $end = 12;
    }else{
        $start = ($number*12)-12;
        $end = 12;
    }

    return db()->QUERY("SELECT * FROM posts INNER JOIN categories ON posts.categoryID=categories.categoryID ORDER BY posts.title ASC LIMIT $start ,$end");

}

