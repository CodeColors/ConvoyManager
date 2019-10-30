<?php
session_start();
if(!(isset($_SESSION['id']))){
        header('Location: index.php');
}
?>
<html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>
        <header>
            <ul class="nav">
                
            </ul>
            <ul class="nav justify-content-center">
              <li class="nav-item">
                <a class="nav-link active" href="#">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="admin_signin.php">Account</a>
              </li>
              <li class="nav-item">
              <li class="nav-item">
                    <h3>Admin Page</h3>
              </li>
                <a class="nav-link" href="admin_convoy.php">Convoy</a>
              </li>
              </li>
                <a class="nav-link" href="admin_links.php">Links</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="index.php">Return to home</a>
              </li>
            </ul>
        </header>
        <div class="jumbotron">
          <h1 class="display-4">Welcome <?php echo $_SESSION['user']; ?>!</h1>
          <p class="lead">Please select the page you want in the navbar.</p>
          <hr class="my-4">
          <p>You can return to home page by clicking on the bottom button.</p>
          <a class="btn btn-primary btn-lg" href="index.php" role="button">Return to home</a>
        </div>

    </body>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>