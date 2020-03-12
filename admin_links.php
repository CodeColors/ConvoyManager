<?php
  session_start();
  require('db.php');
  if(!(isset($_SESSION['id']))){
          header('Location: index.php');
  }

  if(isset($_POST['submit'])){
      $setLinks = $bdd->prepare("UPDATE links SET trucksbook = :truck, discord = :discord WHERE id = 1");
      $setLinks->execute(array(
          'truck' => $_POST['trucksbook'],
          'discord' => $_POST['discord']
      ));
      unset($_POST['submit']);
  }

  $req = $bdd->query("SELECT * FROM links");
  $links = $req->fetch();

?>
<html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="css/login.css" >
    </head>
    <body>
        <header>
            <ul class="nav">
                
            </ul>
            <ul class="nav justify-content-center">
              <li class="nav-item">
                <a class="nav-link active" href="admin.php">Home</a>
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
                <a class="nav-link active" href="#">Links</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="index.php">Return to home</a>
              </li>
            </ul>
        </header>
        <br />
        <hr />
        <br/>
        <h4 style="text-align: center;">Usefull links</h4>
        <form method="post" class="form-signin">
            <label>Trucksbook Link :</label><input type="text" class="form-control" name="trucksbook" value="<?php echo $links['trucksbook']; ?>" required/>
            <label>Discord Link :</label><input type="text" class="form-control" name="discord" value="<?php echo $links['discord']; ?>" required/>
            <input type="submit" class="btn btn-lg btn-primary btn-block" name="submit" value="Submit" />
        </form>
    </body>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>