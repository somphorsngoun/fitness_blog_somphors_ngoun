        
<?php SESSION_START(); 
?>
<nav class="navbar navbar-expand-lg navbar-dark position-sticky" style="background: rgba(182, 240, 235, 0.568); top: 0; z-index: 1111;">
  <div class="container-fluid">
    <a class="navbar-brand text-dark pr-1 border-right" href="#">Fitness Blog</a>
    <a href="index.php?page=search&number=1" class="text-dark" data-toggle="tooltip" data-placement="bottom" title="Search Posts"><i class="fa fa-search"></i></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active text-dark" aria-current="page" href="index.php?page=home">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark" href="index.php?page=training&number=1">Training</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark" href="index.php?page=nurition&number=1">Nutrition</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark" href="index.php?page=health&number=1">Health</a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-dark" href="index.php?page=lifestyle&number=1">Lifestyle</a>
        </li>
        <li class="nav-item border-right">
          <a class="nav-link text-dark" href="index.php?page=equipment&number=1">Equipment</a>
        </li>
        <?php if ($_SESSION['role'] === "admin"):?>
          <li class="nav-item border-right">
            <a class="nav-link text-dark" href="process/create.php"><i class="fa fa-plus-square"></i></a>
          </li>
        <?php endif; ?>
        <?php if ($_SESSION['user'] === ""): ?>
          
          <li class="nav-item">
            <a class="nav-link text-dark" href="process/login.php">Login</a>
          </li>
        <?php else: ?>
          <li class="nav-item mr-2 ml-2">
            <!-- <img class="$_SESSION[]" alt=""> -->
            <img src="images/<?= $_SESSION['profile'] ?>" style="width: 40px; height: 40px;" class="rounded-circle" alt="">
          </li>
          <li class="nav-item">
            <a class="nav-link text-dark" href="process/logout.php">Logout</a>
          </li>
        <?php endif ?>
      </ul>
    </div>
  </div>
</nav>

