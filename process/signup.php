<?php include_once('../partial/header.php'); ?>
<?php require_once('signup_model.php'); ?>

    <div class="container d-flex flex-column align-items-center">
        <a href="../index.php?page=home" class="align-self-start" ><i class="fa fa-arrow-left"></i></a>
        <form action="signup.php" method="POST" enctype="multipart/form-data" class="d-flex flex-column w-50 justify-content-center align-items-center " >

            <h1 class="m-4">Sign Up</h1>
            <label for="file" class="d-flex justify-content-center align-items-center"><img class="rounded-circle w-25" src="https://www.pngitem.com/pimgs/m/667-6670933_fitness-png-dumbbell-high-intensity-workout-transparent-png.png" alt=""></label>
            <input type="file" class="d-none" name="file" id='file'>
            <p class="text-danger text-center"><?= $error ?></p>
            <input class="form-control mt-4 form-control-lg" type="text" placeholder="Username" name="username" aria-label=".form-control-lg">
            <input class="form-control mt-4 form-control-lg" type="text" placeholder="Email" name="email" aria-label=".form-control-lg">
            <input class="form-control mt-4 form-control-lg" type="password" placeholder="Create Password" name="password" aria-label=".form-control-lg">
            <input class="form-control m-4 form-control-lg" type="password" placeholder="Confirm Password" name="pass" aria-label=".form-control-lg">
            <small><strong>Note:</strong> Your password should have lowercase and uppercase charater, number and symbol. EXAMPLE: Exaple@123#</small>
            <input type="submit" name="submit" class="btn btn-primary btn-block" value="Signup">

            <p class="card-text mb-4">Already Have Account: <a href="login.php">Login</a></p>

        </form>
        

    </div>

<?php include_once('../partial/footer.php'); ?>

