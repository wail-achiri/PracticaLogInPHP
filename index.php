<?php 
    if(!empty($_POST)){
        if(isset($_POST['email']) && isset($_POST['pswd'])){
            if(empty($_POST['email'])){
                echo "<p class='alerta'>TENS QUE OMPLIR EL EMAIL</p>";
            }else{
                $email = $_POST['email'];
            }
            if(empty($_POST['pswd'])){
                echo "<p class='alerta'>TENS QUE OMPLIR LA CONTRASEÑA</p>";
            }
            else{
                header("Location: principal.php");
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="ca">
    <head>
        <meta charset="UTF-8">
        <title>Formulari Login PHP</title>
        <link href="style.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <form class="form-inline" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
            <label for="email">Email:</label>
            <input type="email" id="email" placeholder="Introdueix Correo" value="<?php if(isset($email)) echo $email;?>" name="email">
            <label for="pwd">Password:</label>
            <input type="password" id="pwd" placeholder="Introdueix Contrasenya" name="pswd">
            <label>
                Recordar<input type="checkbox" name="remember"> 
            </label>
            <button type="submit">Enviar</button>
            <p class="oblidat">T'has oblidat la contrasenya?<a href="https://educem.net/moodle/">Recuperarla</a></p>
        </form>
    </body>
</html>