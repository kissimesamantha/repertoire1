<?php
$connect = new PDO("mysql:host=127.0.0.1;dbname=agriculture;charset=utf8","root","");
if (isset($_POST['submit'])) {
    if (isset($_POST['id'],$_POST['email'],$_POST['email2'],$_POST['password'],$_POST['password2'])) {
        if (!empty($_POST['id']) AND !empty($_POST['email']) AND !empty($_POST['email2']) AND !empty($_POST['password']) AND !empty($_POST['password2'])) {
                $pseudo = htmlspecialchars($_POST['id']);
                $email = htmlspecialchars($_POST['email']);
                $email2 = htmlspecialchars($_POST['email2']);
                $password = htmlspecialchars($_POST['password']);
                $password2 = htmlspecialchars($_POST['password2']);
                if (strlen($pseudo) < 255) {
                    if (strlen($pseudo) > 4) {
                        if (strlen($email == $email2)) {
                            if (strlen($password == $password2)) {
                                if (strlen($password) > 8 ) {
                                    if ($password) > 255 ) {
                                        $insert = $connect->prepare("INSERT INTO users VALUES (?,?,?)");
                                        $insert->xecute(array($pseudo,$email,$password));
                                    }else{
                                        header('location:signin.php?error=votre mot de passe doit contenir moins de 255 caractères');
                                    }
                                }else{
                                    header('location:signin.php?error=votre mot de passe doit contenir plus de 8 caractères');
                                }
                            }else{
                                header('location:signin.php?error=vos mots de passes sont différents');

                            }
                        }else{
                            header('location:signin.php?error=vos adresses mails sont différents');
                        }

                    }else{
                        header('location:signin.php?error=le pseudo doit faire plus de 4 caractères');
                    }
                }else {
                    header('location:signin.php?error=le pseudo doit etre inférieur à 255 caractères');
                }

        } else {
            header('loation:signin.php?error=Veuillez remplir tous les champs');
        } 
    }
}
?>