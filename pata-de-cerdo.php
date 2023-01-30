<?php
session_start();

require 'database.php';

if (isset($_SESSION['user_id'])) {
  $records = $conn->prepare('SELECT nombre, id, email, password FROM users WHERE id = :id');
  $records->bindParam(':id', $_SESSION['user_id']);
  $records->execute();
  $results = $records->fetch(PDO::FETCH_ASSOC);

  $user = null;

  if (count($results) > 0) {
    $user = $results;
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <style> @import url('https://fonts.googleapis.com/css2?family=Patua+One&family=Roboto:wght@700&display=swap'); </style>
    <style>@import url('https://fonts.cdnfonts.com/css/beardbone-personal-use');</style>                
    <script src="https://kit.fontawesome.com/8614608c11.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="media/Log-ico/iconoMP.ico">
    <title>Metele pata - Pata de cerdo</title>
</head>
<body>
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
    <section id="compra-cerdo">
        <div class="contenedor">
            <div class="contenedor-descr">
                <h2>Pata de cerdo</h2>
                <p>Proba la mas rica pata de cerdo de Argentina! <br>
                La promocion para 20 personas incluye: </p>
                <ul>
                    <li>2 bandejas de carne</li>
                    <li>12 empanadas criollas copetin</li>
                    <li>12 árabes copetin</li>
                    <li>20 pizzetas</li>
                    <li>6 salsas</li>
                    <li>80 panes</li>            
                </ul>
                <h2>SALSAS</h2>
                <h3>Nuestras variedades</h3>
                <p>
                   Chimi, rucula, pickles, criolla, aceitunas, provenzal, roquefort, morron asado, hongos de pino, ajo, fondo de coccion.
                </p>
                <h2 class="precio">A solo $9000</h2>
            </div>
            <i class="fa-solid fa-cart-shopping" id="icon_shop"> <a href="https://wa.me/5493517601590?text=Quiero encargar una pata de Cerdo"
                    ><span>Hacer pedido</span></a>
            </i>
        </div>
    </section>
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
    <script src="js/script.js"></script>
</body>
</html>