<?php
include('../includes/config.inc.php');
if(isset($_GET['logout'])){
   if(isset($_POST['si'])){
      session_destroy();
      header('location:login.php');
   }
}else{
   if(isset($_SESSION['user'])){
      header('location:index.php');
   }
   if(isset($_POST['submit'])){
      if(empty($_POST['user']) || empty($_POST['pass'])){

      }else{
         $user = $mysqli->real_escape_string($_POST['user']);
         $pass = $_POST['pass'];
         $resultado = $mysqli->query("SELECT admin, password FROM ".$mysql['prefijo']."usuarios WHERE username='".$user."' LIMIT 1");
         if($resultado->num_rows==1){
            $res = $resultado->fetch_assoc();
            if(hash_equals($res['password'], crypt($pass, $res['password']))){
               $_SESSION['user'] = $user;
               $_SESSION['admin'] = $res['admin'];
               $mysqli->query("UPDATE ".$mysql['prefijo']."usuarios SET password='".new_pass($pass)."' WHERE username='".$user."'");
               header('location:index.php');
            }
         }
      }
   }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
   <meta charset="UTF-8">
   <title>Control de sesión</title>
</head>
<body>
   <form action="" method="post">
   <?php if(isset($_GET['logout'])): ?>
      <div>¿Seguro que deseas salir?</div>
      <button name="si">Si</button> <button type="button" onclick="location.href='index.php'">No</button>
   <?php else: ?>
      <div>
         <label for="user">Usuario
            <input type="text" name="user" id="user">
         </label>
      </div>
      <div>
         <label for="pass">Contraseña
            <input type="text" name="pass" id="pass">
         </label>
      </div>
      <button name="submit">Entrar</button>
   <?php endif; ?>
   </form>
</body>
</html>