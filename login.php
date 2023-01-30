<?php

  session_start();

  if (isset($_SESSION['user_id'])) {
    header('Location: /login');
  }
  require 'database.php';

  if (!empty($_POST['email']) && !empty($_POST['password'])) {
    $records = $conn->prepare('SELECT id, email, password FROM users WHERE email = :email');
    $records->bindParam(':email', $_POST['email']);
    $records->execute();
    $results = $records->fetch(PDO::FETCH_ASSOC);

    $message = '';

    if (is_countable($results) > 0 && password_verify($_POST['password'], $results['password'])) {
      $_SESSION['user_id'] = $results['id'];
      header("Location: /metelepata");
    } else {
      $message = 'El usuario o contraseña son incorrectos';
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
                      <a href="#">Quienes Somos</a>
                      <a href="#footer">Contacto</a>
                  </nav>
              </div>
              <i class="fa-solid fa-bars" id="icon__menu"></i>
          </div>
      </header>

    <?php if(!empty($message)): ?>
      <p> <?= $message ?></p>
    <?php endif; ?>

    <h1 class="h1">Entrar</h1>
    <span>o <a href="signup.php">Registrarse</a></span>

    <form action="login.php" method="POST">
      <input name="email" type="email" placeholder="Ingrese su email">
      <input name="password" type="password" placeholder="Ingrese su contraseña">
      <input type="submit" value="Submit">
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
