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
<?php include "php/head.php" ?>
<body>
    <header>
        <div class="contenedor">
            <img src="media/Log-ico/letra.png" alt="">
            <div class="menu">
                <nav>                    
                    <a href="#productos">Productos</a>
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
    <section id="hero">
        <img src="media/Log-ico/Logo con borde blanco .png" alt="">
    </section>
    <section id="productos">
        <div class="contenedor">
            <h2>NUESTROS <span>PRODUCTOS</span></h2>
            <div class="carta">
                <div class="productos__carta_img">
                    <img src="img/img7.jpg" alt="MetelePata" name="slider" id="img-pata">
                </div>
                <div class="productos__carta"> 
                <?php if(!empty($user)): ?>               
                    <p>
                        ¡Hola <span style="color: red;"><?= $user['nombre']; ?></span>!<br><br>  Tenemos opciones para todo tipo de eventos. <br>                        
                    </p>
                <?php else: ?>
                    <p>
                        ¡Hola!<br> Tenemos opciones para todo tipo de eventos. <br>                        
                    </p>
                <?php endif; ?>
                    <ul>
                        <li>Pata de cerdo</li>
                        <li>Pata de ternera</li>
                        <li>Bondiola braseada</li>
                        <li>Picadas</li>
                        <li>Opcion para celiácos</li>
                    </ul>
                    <p>
                        Podes elegir nuestras promociones* o comunicarte con nosotros para un pedido mas personalizado!
                    </p>
                    <!-- div en caso de achicar la descripcion mobile (display none) -->
                    <div class="productos__carta__escritorio"> 
                        <p>*Nuestras promociones de patas <b>(para 20)</b> incluyen: </p>
                        <ul>
                            <li>2 bandejas de carne (cerdo o ternera)</li>
                            <li>12 empanadas criollas copetin</li>
                            <li>12 árabes copetin</li>
                            <li>20 pizzetas</li>
                            <li>6 salsas</li>
                            <li>80 panes</li>           
                        </ul>
                        <p>
                          Recorda que podes elegir entre las siguientes salsas: <br> <br>
                          <b>Chimi, rucula, pickles, criolla, aceitunas, provenzal, roquefort, morron asado, hongos de pino, ajo, fondo de coccion.</b>
                        </p>
                    </div>
                    <i class="fa-solid fa-cart-shopping" id="icon_shop"> <a href="productos.php"
                        ><span>HACE TU PEDIDO</span></a></i>                  
                </div>
                
            </div>
            
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