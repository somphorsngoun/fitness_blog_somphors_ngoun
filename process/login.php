<?php include_once('../partial/header.php'); ?>

    <div class="container d-flex flex-column align-items-center mt-4" style="height: 100vh;">
        <h2 class="align-self-start" onclick="window.history.back();"><i class="fa fa-arrow-left"></i></h2>
        <form action="" method="POST" class="d-flex flex-column w-50 justify-content-center align-items-center " >
            <img src="http://pngimg.com/uploads/fitness/small/fitness_PNG150.png" alt="">
            <h1 class="m-4">Login</h1>
            <input class="form-control mt-4 form-control-lg" type="text" placeholder="Username" name="username" aria-label=".form-control-lg example">
            <input class="form-control m-4 form-control-lg" type="password" placeholder="Password" name="password" aria-label=".form-control-lg example">
            <button type="submit" class="btn btn-info w-25" name="submit">Login</button>
            <p class="card-text"><small class="text-muted">No account: <a href="signup.php">Create One</a></small></p>

        </form>
        <?php
            include_once('../database/database.php');
            if (isset($_POST['submit'])){
                // echo $_POST['username'] . ' / ' . $_POST['password'];
                userLogin($_POST);
            }
        ?>

    </div>

<?php include_once('../partial/footer.php'); ?>

