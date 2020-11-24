<?php 
    require_once './php/usuaris.php'; ///NOTE CONSTANTS ARRAY USUARIS I CONTRASENYA REQUERIDAS
    if($_SERVER["REQUEST_METHOD"]=="POST"){
        if(isset($_POST["email_hidde"]) && isset($_POST["pwd_hidde"])){
            if(!empty($_POST["email_hidde"]) || !empty($_POST["pwd_hidde"])){
                $email_Decod = base64_decode($_POST["email_hidde"]);
                $contra_Decod = base64_decode($_POST["pwd_hidde"]);
                //NOTE Miro que el correo sigui correcte ja que per inspeccionar elemento es pot colar cambiant a text
                if(!filter_var($email_Decod,FILTER_VALIDATE_EMAIL)){
                    $errors="ERROR:CORREO NO VALID!";
                }else{
                    ///NOTE Faig un foreach ja que és més ràpid que el for i faig una iteració sobre dades existents
                    foreach(USUARIS as $vector){
                        if($vector['email']===$email_Decod && password_verify($contra_Decod,$vector['password'])){
                            header("location: http://www.educem.com");
                            exit();
                        }
                    }
                    //NOTE En cas de que no coincideixi ninguna, sortira un alert amb el correo incorrecte i al log in   
                    echo "<script language='javascript'> alert('El CORREO $email_Decod I CONTRASENYA SÓN INCORRECTES'); </script>";
                    $errors = "ERROR:TORNA A INTRODUIR CORREO I CONTRASENYA!";
                }
            }else{
                $errors = "Els camps estan buits";
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="ca">
    <head>
        <meta charset="UTF-8">
        <meta name="author" content="Wail El Achiri Naimi">
        <meta name="description" content="Pràctica PHP Log In">
        <title>Formulari Login PHP</title>
        <link href="./style/style.css" rel="stylesheet" type="text/css">
        <link rel="icon" type="image/png" href="./src/arbre.png">
    </head>
    <body>
    <form onsubmit="return codificarBTOA()" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="POST">
        <h1>Login</h1>
        <div class="row">
            <label for="email">Email</label>
            <input id="email" type="email" name="email" placeholder="email@exemple.com">
            <input id="email_hidde" type="hidden" name="email_hidde">
        </div>
        <div class="row">
            <label for="password">Password</label>
            <input id="pwd" type="password" name="password">
            <input id="pwd_hidde" type="hidden" name="pwd_hidde">
        </div>
        <button type="submit">Enviar</button>
        <p class="oblidat">T'has oblidat la contrasenya?<a href="https://educem.net/moodle/login/forgot_password.php"> Recuperar</a></p>
        <?php echo "<p class='alerta'>$errors</p>"///NOTE mostrem els errors al login?>
    </form>
        <script src="./js/codificar.js"></script>
    </body>
</html>