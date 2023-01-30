<?php

  require 'database.php';

  $message = '';

  if (!empty($_POST['nombre']) &&!empty($_POST['email']) && !empty($_POST['password'])) {
    $sql = "INSERT INTO users (nombre, email, password) VALUES (:nombre, :email, :password)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':nombre', $_POST['nombre']);
    $stmt->bindParam(':email', $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $stmt->bindParam(':password', $password);

    if ($stmt->execute()) {
      $message = 'Su cuenta ha sido creada correctamente! Haga click en Iniciar sesion para comenzar';
    } else {
      $message = 'Lo sentimos, ha ocurrido un problema al crear su cuenta';
    }
  }
?>
<!DOCTYPE html>
<html>
<?php include "php/head.php" ?>
<body class="body_log">
    <header>
          <div class="contenedor">
              <img src="media/Log-ico/letra.png" alt="">
              <div class="menu">
              <nav>
                    <a href="index.php">Inicio</a>
                    <a href="#footer">Contacto</a>              
                    <?php if(!empty($user)): ?>                        
                        <a href="logout.php" class="iniciar">Salir</a>
                    <?php else: ?>
                    <a href="login.php" class="iniciar">Entrar</a>
                    <?php endif; ?>
                </nav>
              </div>
              <i class="fa-solid fa-bars" id="icon__menu"></i>
          </div>
      </header>

    <?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php endif; ?>

    <h1>Registrarse</h1>
    <span>o <a href="login.php">Iniciar sesion</a></span>

    <form action="signup.php" method="POST">
      <input name="nombre" type="text" placeholder="Tu nombre">
      <input name="email" type="email" placeholder="Tu email">
      <input name="password" type="password" placeholder="Tu contraseña">
      <input type="submit" value="Enviar">
    </form>
    <footer id="footer">
        <div class="contenedor">
            <a href="https://www.facebook.com/pages/category/restaurant/metele_patapatas_flambeadas-109364917994075/" target="_blank">
               <img src="media/Log-ico/facebook.png" alt="facebook">
            </a>
            <a href="https://www.instagram.com/metelepata.ok/" target="_blank">
               <img src="media/Log-ico/instagram.png" alt="Instagram">
            </a>
        </div>
            <p>&copy; MetelePata todos los derechos reservados.</p>
    </footer>
    <div id="whatsapp-logo">
        <?php if(!empty($user)): ?>
        <h3>¡Hola <?= $user['nombre']; ?>!</h3>
        <?php else: ?>
        <h3>¡Escribinos!</h3>
        <?php endif; ?>    
        <a href="https://api.whatsapp.com/send/?phone=5493517601590" target="_blank">
            <img src="media/Log-ico/WhatsApp-logo.png" alt="whatsapp-logo">
        </a>
    </div>

  </body>
</html>
