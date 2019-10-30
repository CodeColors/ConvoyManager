<?php 
    session_start();
    if(isset($_SESSION['id'])){
        header('Location: index.php');
    }

    if(isset($_POST['signin'])){
        $bdd = new PDO('mysql:host=localhost;dbname=convoyManager;charset=utf8', 'root', '');
        
        $search = $bdd->prepare('SELECT id, user, pass FROM users WHERE user = :user');
        $search->execute(array(
            'user' => $_POST['user']
        ));
        $result = $search->fetch();
        
        if(!$result){
            echo "Bad username or password. Please re-try !";
        }else{
            $isPasswordCorrect = password_verify($_POST['pass'], $result['pass']);
            if($isPasswordCorrect){
                $_SESSION['id'] = $result['id'];
                $_SESSION['user'] = $result['user'];
                header('Location: index.php');
            }else{
                echo "Bad username or password. Please re-try !";
            }
        }
    }
?>
<html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href="css/login.css" >
    </head>
    <body class="text-center">
        <form class="form-signin" method="post">
              <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
              <label for="inputUser" class="sr-only">Username</label>
              <input name="user" type="text" id="inputUser" class="form-control" placeholder="Username" required autofocus>
              <label for="inputPassword" class="sr-only">Password</label>
              <input name="pass" type="password" id="inputPassword" class="form-control" placeholder="Password" required>
              <button name="signin" class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
              <p class="mt-5 mb-3 text-muted">&copy; Powered by Html and CSS. Made by piaf. </p>
        </form>
    </body>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</html>