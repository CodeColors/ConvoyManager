<?php
    session_start();
    require('db.php');

    $req = $bdd->query("SELECT * FROM links");
    $links = $req->fetch(); 

    $sC = $bdd->query("SELECT * FROM convoy");
?>
<html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
    <body>
        <ul class="nav justify-content-center">
            <li class="nav-item">
                <a class="nav-link active" href="#">Home</a>
            </li>
            <?php if(isset($_SESSION['id'])){ ?>
            <li class="nav-item">
                <a class="nav-link" href="admin.php">Admin Page</a> 
            </li>
            <li class="nav-item">
                <a class="nav-link" href="logout.php">Log out</a> 
            </li>
            <?php }else{ ?>
            <li class="nav-item">
                <a class="nav-link" href="login.php">Log in</a>
            </li>
            <?php } ?>
        </ul>
        <div class="jumbotron">
          <h1 class="display-4">Important links!</h1>
          <p class="lead">Here are some usefull links for you and your enterprise.</p>
          <p class="lead">
            <a class="btn btn-primary btn-lg" style="background-color:  #0070c2; border-color: #0070c2;" href="<?php echo $links['trucksbook']; ?>" role="button">Trucksbook</a>
            <a class="btn btn-primary btn-lg" style="background-color:  #7289da; border-color: #7289da;" href="<?php echo $links['discord']; ?>" role="button">Discord</a>
          </p>
        </div>
        <table class="table">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Name</th>
                  <th scope="col">Date</th>
                  <th scope="col">Origin</th>
                  <th scope="col">Destination</th>
                  <th scope="col">Type</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
        <?php
            while($data = $sC->fetch()){
        ?>
                <tr>
                  <th scope="row"><?php echo $data['id']; ?></th>
                  <td><?php echo $data['name']; ?></td>
                  <td><?php echo $data['date']; ?></td>
                  <td><?php echo $data['origin']; ?></td>
                  <td><?php echo $data['destination']; ?></td>
                  <?php if($data['type'] == "1"){ ?>
                     <td>Public</td>
                  <?php }else{ ?>
                    <td>Private</td>
                  <?php } ?>
                 
                  <td><a class="btn btn-primary btn-lg" href="convoy.php?id=<?php echo $data['id']; ?>">View More</a></td>
                </tr>
              
        <?php
            }
        ?>
                  </tbody>
            </table>
    </body>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>