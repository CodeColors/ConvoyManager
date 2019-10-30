<?php
session_start();
if(!(isset($_SESSION['id']))){
    header('Location: index.php');
}else{
$bdd = new PDO('mysql:host=localhost;dbname=convoyManager;charset=utf8', 'root', '');
if(isset($_POST['logb'])){
    $pass_hache = password_hash($_POST['pass'], PASSWORD_DEFAULT);

    $req = $bdd->prepare('INSERT INTO users(user, pass) VALUES(:user, :pass)');
    $req->execute(array(
        'user' => $_POST['login'],
        'pass' => $pass_hache
    ));
    header('Location: admin_signin.php');
}

$accounts = $bdd->query('SELECT * FROM users');
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
                <a class="nav-link" href="#">Account</a>
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
        <form method="post" class="form-signin">
            <h1>Account page</h1>
            <label>Username :</label><input type="text" class="form-control" name="login" placeholder="Votre Pseudo" required autofocus/>
            <label>Password :</label><input type="password"  class="form-control" name="pass" required/>
            <input type="submit" class="btn btn-lg btn-primary btn-block" name="logb" value="Create" />
        </form>
        <hr />
        <table class="table">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Username</th>
                  <th scope="col">Action</th>
                </tr>
              </thead>
              <tbody>
        <?php
            while($data = $accounts->fetch()){
        ?>
                <tr>
                  <th scope="row"><?php echo $data['id']; ?></th>
                  <td><?php echo $data['user']; ?></td>
                  <td><a href="delete_user.php?id=<?php echo $data['id']; ?>">Delete Account</a></td>
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
<?php
    $accounts->closeCursor();
}
?>