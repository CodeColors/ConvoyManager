<?php
  session_start();
  require('db.php');
  if(!(isset($_SESSION['id']))){
          header('Location: index.php');
  }

  if($_GET['type'] == "add"){
    if(isset($_POST['add'])){
      if(isset($_POST['password'])){
        $req = $bdd->prepare('INSERT INTO convoy (name, date, origin, destination, pass) VALUES (:name, :date, :origin, :destination, :pass)');
        $req->execute(array(
          'name' => $_POST['convoy_name'],
          'date' => $_POST['date'],
          'origin' => $_POST['origin'],
          'destination' => $_POST['destination'],
          'pass' => $_POST['password']
        ));
      }else{
        $req = $bdd->prepare('INSERT INTO convoy (name, date, origin, destination) VALUES (:name, :date, :origin, :destination)');
        $req->execute(array(
          'name' => $_POST['convoy_name'],
          'date' => $_POST['date'],
          'origin' => $_POST['origin'],
          'destination' => $_POST['destination']
        ));
      }
      
    }
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
                <a class="nav-link" href="admin.php">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="admin_signin.php">Account</a>
              </li> 
              <li class="nav-item">
                <h3>Admin Page</h3>
              </li>
              <li class="nav-item">
                <a class="nav-link active" href="#">Convoy</a>
              </li>
              </li>
                <a class="nav-link" href="admin_links.php">Links</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="index.php">Return to home</a>
              </li>
            </ul>
        </header>
        <?php if (!(isset($_GET['type']))){ ?>
          <h1>Liste des convois</h1>
          <a class="btn btn-primary" href="admin_convoy.php?type=add">Add</a>
        <?php }elseif ($_GET['type'] == "add") { ?>
          <div class="container">
            <h1>Add a convoy</h1>
            <form method="post" class="form-signin">
              <label for="convoy_name">Convoy's name:</label>
              <input type="text" class="form-control" name="convoy_name" id="convoy_name" required/>
              <label for="date">Date:</label>
              <input type="date" class="form-control" name="date" id="date" required/>
              <label for="origin">Origin:</label>
              <input type="text" class="form-control" name="origin" id="origin" required/>
              <label for="destination">Destination:</label>
              <input type="text" class="form-control" name="destination" id="destination" required/>
              <label for="password">Password: (if blank => public convoy)</label>
              <input type="text" class="form-control" name="password" id="password"/>
              <input type="submit" class="btn btn-lg btn-primary btn-block" name="add" value="Submit" />
            </form>
          </div>
        <?php }elseif ($_GET['type'] == "modify"){ ?>

        <?php }else{ 
          echo "Erreur d'affichage de page, veuillez reessayer";
        } ?>
        

    </body>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>