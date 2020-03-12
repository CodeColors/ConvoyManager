<?php
    session_start();
    require('db.php');
    if(!(isset($_GET['id']))){
        header('Location: index.php');
    }

    $search = $bdd->query("SELECT * FROM convoy WHERE id=".$_GET['id']);
    $convoy = $search->fetch();
    
    $s2 = $bdd->query("SELECT * FROM convoy_part WHERE user_convoy=".$_GET['id']);
    
    if(!$convoy){
        header('Location: index.php');
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
            
            <a class="btn btn-primary btn-lg" href="convoy_user.php?id=<?php echo $convoy['id']; ?>&action=part" role="button">Participate</a>
            <a class="btn btn-primary btn-lg" href="index.php" role="button">Return to home</a>
          </p>
        </div>
        <table class="table">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">User</th>
                  <th scope="col">Date of participation</th>
                  <?php if(isset($_SESSION['id'])){ ?>
                    <th scope="col">Admin</th>
                  <?php } ?>
                </tr>
              </thead>
              <tbody>
        <?php
            while($data = $s2->fetch()){
        ?>
                <tr>
                  <th scope="row"><?php echo $data['id']; ?></th>
                  <td><?php echo $data['name']; ?></td>
                  <td><?php echo $data['date']; ?></td>
                <?php if(isset($_SESSION['id'])){ ?>
                  <td><a class="btn btn-danger btn-lg" href="convoy_user.php?id=<?php echo $data['id']; ?>&action=delete">Delete User</a></td>
                <?php } ?>
                </tr>
              
        <?php
            }
        ?>
                  </tbody>
            </table>
    </body>
</html>    
