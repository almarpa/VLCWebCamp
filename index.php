<?php include_once 'includes/templates/header.php'; ?>
  <section class="seccion contenedor">
    <h2>La mejor conferencia de diseño web en español</h2>
    <p>
      Proin suscipit mi id lacus malesuada, vitae lobortis urna venenatis. Maecenas eget porttitor dui, pellentesque
      tempus mi. Nunc vehicula, augue eu blandit sagittis, turpis magna vestibulum dui, vehicula convallis augue mauris
      eget ex. Phasellus sit amet feugiat purus. Vestibulum eget tortor purus.
    </p>
  </section>

  <section class="programa">
    <div class="contenedor-video">
      <video autoplay loop poster="img/bg-talleres.jpg">
        <source src="video/video.mp4" type="video/mp4">
        <source src="video/video.webm" type="video/webm">
        <source src="video/video.ogv" type="video/ogg">
      </video>
    </div>

    <div class="contenido-programa">
      <div class="contenedor">
        <div class="programa-evento">
          <h2>Programa del evento</h2>

          <?php
            try {
                require_once('includes/funciones/bd_conexion.php');
                $sql = "SELECT * FROM categoria_evento ";
                $resultado = $conn->query($sql);
            } catch (Exception $e) {
                echo $e->getMessage();
            }
          ?>

          <nav class="menu-programa">
            <?php while($cat = $resultado->fetch_array(MYSQLI_ASSOC)) { ?>
              <?php $categoria = $cat['cat_evento']; ?>
              <a href="<?php echo strtolower($categoria) ?>">
                  <i class="fas <?php echo $cat['icono'] ?>"></i> <?php echo $categoria; ?>
              </a>
            <?php } ?>
          </nav>

          <?php   //MULTIPLES CONSULTAS CON PHP/MYSQL
            try {
                require_once('includes/funciones/bd_conexion.php');
                $sql = "SELECT id_evento, nombre_evento, fecha_evento, hora_evento, cat_evento, icono, nombre_invitado, apellido_invitado ";
                $sql .= "FROM evento ";
                $sql .= "INNER JOIN categoria_evento ";
                $sql .= "ON evento.id_cat_evento = categoria_evento.id_categoria ";
                $sql .= "INNER JOIN invitado ";
                $sql .= "ON evento.id_inv = invitado.id_invitado ";
                $sql .= "AND evento.id_cat_evento = 1 ";
                $sql .= "ORDER BY id_evento LIMIT 2;";
                $sql .= "SELECT id_evento, nombre_evento, fecha_evento, hora_evento, cat_evento, icono, nombre_invitado, apellido_invitado ";
                $sql .= "FROM evento ";
                $sql .= "INNER JOIN categoria_evento ";
                $sql .= "ON evento.id_cat_evento = categoria_evento.id_categoria ";
                $sql .= "INNER JOIN invitado ";
                $sql .= "ON evento.id_inv = invitado.id_invitado ";
                $sql .= "AND evento.id_cat_evento = 2 ";
                $sql .= "ORDER BY id_evento LIMIT 2;";
                $sql .= "SELECT id_evento, nombre_evento, fecha_evento, hora_evento, cat_evento, icono, nombre_invitado, apellido_invitado ";
                $sql .= "FROM evento ";
                $sql .= "INNER JOIN categoria_evento ";
                $sql .= "ON evento.id_cat_evento = categoria_evento.id_categoria ";
                $sql .= "INNER JOIN invitado ";
                $sql .= "ON evento.id_inv = invitado.id_invitado ";
                $sql .= "AND evento.id_cat_evento = 3 ";
                $sql .= "ORDER BY id_evento LIMIT 2;";
            } catch (Exception $e) {
                echo $e->getMessage();
            }
          ?>

          <?php $conn->multi_query($sql); ?>

          <?php //do while
            do {  
              $resultado = $conn->store_result();
              $row = $resultado->fetch_all(MYSQLI_ASSOC); ?>

              <?php $i = 0; ?>
              <?php foreach($row as $evento): ?>
                <?php if($i % 2 == 0) { ?>
                  <div id="<?php echo strtolower($evento['cat_evento']) ?>" class="info-curso ocultar clearfix">
                <?php } ?>
                    <div class="detalle-evento">
                      <h3><?php echo $evento['nombre_evento'] ?></h3>
                      <p><i class="fas fa-clock"></i><?php echo $evento['hora_evento'] ?></p>
                      <p><i class="fas fa-calendar"></i><?php echo $evento['fecha_evento'] ?></p>
                      <p><i class="fas fa-user"></i><?php echo $evento['nombre_invitado'] . " " . $evento['apellido_invitado'] ?></p>
                    </div>
                    
                <?php if($i % 2 == 1): ?>  
                  <a href="calendario.php" class="button float-right">Ver todos</a>
                  </div><!--talleres-->
                <?php endif; ?>
            <?php $i++; ?>
            <?php endforeach; ?>
            <?php $resultado->free(); ?>
          <?php  } while ($conn->more_results() && $conn->next_result()); ?>
 
        </div><!--programa-evento-->
      </div><!--contenedor-->
    </div><!--programa-->

  </section>

  <section class="invitados contenedor seccion">
    <h2>Nuestros invitados</h2>
    <ul class="lista-invitados clearfix">
      <li>
        <div class="invitado">
          <img src="img/invitado1.jpg" alt="invitado1">
          <p>Raúl Giménez</p>
        </div>
      </li>
      <li>
        <div class="invitado">
          <img src="img/invitado2.jpg" alt="invitado1">
          <p>Shari Herrera</p>
        </div>
      </li>
      <li>
        <div class="invitado">
          <img src="img/invitado3.jpg" alt="invitado1">
          <p>Gregorio Sanchez</p>
        </div>
      </li>
      <li>
        <div class="invitado">
          <img src="img/invitado4.jpg" alt="invitado1">
          <p>Susana Rivera</p>
        </div>
      </li>
      <li>
        <div class="invitado">
          <img src="img/invitado5.jpg" alt="invitado1">
          <p>Harold García</p>
        </div>
      </li>
      <li>
        <div class="invitado">
          <img src="img/invitado6.jpg" alt="invitado1">
          <p>Susan Sánchez</p>
        </div>
      </li>
    </ul>
  </section>

  <div class="contador parallax">
    <div class="contenedor">
      <ul class="resumen-evento clearfix">
        <li class="uno"><p class="numero">0</p> Invitados</li>
        <li><p class="numero">0</p> Talleres</li>
        <li><p class="numero">0</p> Días</li>
        <li><p class="numero">0</p> Conferencias</li>
      </ul>
    </div>
  </div>

  <section class="precios seccion">
    <h2>Precios</h2>
    <div class="contenedor">
      <ul class="lista-precios clearfix">
        <li>
          <div class="tabla-precio">
            <h3>Pase por día</h3>
            <p class="numero">30$</p>
            <ul>
              <li><i class="fas fa-check"></i>Bocadillos gratis</li>
              <li><i class="fas fa-check"></i>Todas las conferencias</li>
              <li><i class="fas fa-check"></i>Todos los talleres</li>
            </ul>
            <a href="registro.php" class="button hollow">Comprar</a>
          </div>
        </li>

        <li>
          <div class="tabla-precio">
            <h3>Todos los días</h3>
            <p class="numero">50$</p>
            <ul>
              <li><i class="fas fa-check"></i>Bocadillos gratis</li>
              <li><i class="fas fa-check"></i>Todas las conferencias</li>
              <li><i class="fas fa-check"></i>Todos los talleres</li>
            </ul>
            <a href="registro.php" class="button">Comprar</a>
          </div>
        </li>

        <li>
          <div class="tabla-precio">
            <h3>Pase por dos días</h3>
            <p class="numero">40$</p>
            <ul>
              <li><i class="fas fa-check"></i>Bocadillos gratis</li>
              <li><i class="fas fa-check"></i>Todas las conferencias</li>
              <li><i class="fas fa-check"></i>Todos los talleres</li>
            </ul>
            <a href="registro.php" class="button hollow">Comprar</a>
          </div>
        </li>
      </ul>
    </div>
  </section>

  <div id="mapa" class="mapa">
  
  </div>

  <section class="seccion">
    <h2>Opiniones</h2>
    <div class="opiniones contenedor clearfix">
      <div class="opinion">
        <blockquote>
          <p>Sed mollis velit sit amet felis condimentum ultrices. Fusce vehicula ut sem vitae semper. Nullam blandit neque eu semper ullamcorper. Duis comodo quam in orci condimentum ultricies.</p>
          <footer class="info-opinion clearfix">
            <img src="img/testimonial.jpg" alt="imagen testimonial">
            <cite>Raúl Giménez Escobar <span>Diseñador en @prisma.</span></cite>
          </footer>
        </blockquote>
      </div><!--opinion-->
      <div class="opinion">
        <blockquote>
          <p>Sed mollis velit sit amet felis condimentum ultrices. Fusce vehicula ut sem vitae semper. Nullam blandit neque eu semper ullamcorper. Duis comodo quam in orci condimentum ultricies.</p>
          <footer class="info-opinion clearfix">
            <img src="img/testimonial.jpg" alt="imagen testimonial">
            <cite>Raúl Giménez Escobar <span>Diseñador en @prisma.</span></cite>
          </footer>
        </blockquote>
      </div><!--opinion-->
      <div class="opinion">
        <blockquote>
          <p>Sed mollis velit sit amet felis condimentum ultrices. Fusce vehicula ut sem vitae semper. Nullam blandit neque eu semper ullamcorper. Duis comodo quam in orci condimentum ultricies.</p>
          <footer class="info-opinion clearfix">
            <img src="img/testimonial.jpg" alt="imagen testimonial">
            <cite>Raúl Giménez Escobar <span>Diseñador en @prisma.</span></cite>
          </footer>
        </blockquote>
      </div><!--opinion-->
    </div>
  </section>

  <div class="newsletter parallax">
    <div class="contenido contenedor">
      <p>Registrate al newsletter</p>
      <h3>VLCWebCamp</h3>
      <a href="registro.php" class="button transparente">Registro</a>
    </div>
  </div>

  <section class="seccion">
    <h2>Faltan</h2>
    <div class="cuenta-regresiva contenedor">
      <ul class="clearfix">
        <li><p id="dias" class="numero"></p>días</li>
        <li><p id="horas" class="numero"></p>horas</li>
        <li><p id="minutos" class="numero"></p>minutos</li>
        <li><p id="segundos" class="numero"></p>segundos</li>
      </ul>
    </div>
  </section>

  <?php include_once 'includes/templates/footer.php'; ?>