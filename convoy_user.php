<?php
    session_start();
    if(!(isset($_GET['id'])) OR !(isset($_GET['action']))){
        header('Location: index.php');
    }

    $bdd = new PDO('mysql:host=localhost;dbname=convoyManager;charset=utf8', 'root', '');
    $search = $bdd->query("SELECT * FROM convoy WHERE id=".$_GET['id']);
    $convoy = $search->fetch();
    
    if(!$convoy){
        header('Location: index.php');
    }

    if(isset($_POST['part_private'])){
      if($_POST['pass'] == $convoy['pass']){
        $req = $bdd->prepare('INSERT INTO convoy_part (name, user_convoy, date) VALUES (:name, :convoy, :date)');
        $req->execute(array(
          'name' => $_POST['name'],
          'convoy' => $_GET['id'],
          'date' => date("Y-m-d H:i:s")
        ));
      }

    }
    if(isset($_POST['part_public'])){
        $req = $bdd->prepare('INSERT INTO convoy_part (name, user_convoy, date) VALUES (:name, :convoy, :date)');
        $req->execute(array(
          'name' => $_POST['name'],
          'convoy' => $_GET['id'],
          'date' => date("Y-m-d H:i:s")
        ));
    }

?>
<html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>
        <div class="jumbotron">
          <h1 class="display-4"><?php echo $convoy['name']; ?></h1>
          <p><b>From</b> : <?php echo $convoy['origin']; ?>   <b>To</b> : <?php echo $convoy['destination']; ?></p>
          <p class="lead"><b>Date</b> : <?php echo $convoy['date']; ?>.</p>
          <?php if($convoy['type'] == "1"){ ?>
            <p><b>Convoy type</b>: Public</p>
          <?php }else{ ?>
            <p><b>Convoy type</b>: Private</p>
          <?php }?>
          <p class="lead">
            <?php if($convoy['type'] == "2"){ ?>
              <form method="post">
                <div class="form-group">
                  <label for="inputName">Name</label>
                  <input type="text" class="form-control" id="inputName" name="name" required />
                </div>
                <div class="form-group">
                  <label for="inputPass">Password</label>
                  <input type="password" class="form-control" id="inputPass" name="pass" required />
                </div>
                <button type="submit" name="part_private" class="btn btn-primary">Submit</button>
              </form>
            <?php }else{ ?>
              <form method="post">
                <div class="form-group">
                  <label for="inputName">Name</label>
                  <input type="text" class="form-control" id="inputName" name="name">
                </div>
                <button type="submit" name="part_public" class="btn btn-primary">Submit</button>
              </form>
            <?php } ?>
          </p>
        </div>
    </body>
</html>    
