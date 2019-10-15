<?php include_once 'includes/templates/header.php'; ?>

<section class="galeria-fotos contenedor">
    <h2>Calendario de eventos</h2>

    <?php
    try {
        require_once('includes/funciones/bd_conexion.php');
        $sql = "SELECT id_evento, nombre_evento, fecha_evento, hora_evento, cat_evento, icono, nombre_invitado, apellido_invitado ";
        $sql .= "FROM evento ";
        $sql .= "INNER JOIN categoria_evento ";
        $sql .= "ON evento.id_cat_evento = categoria_evento.id_categoria ";
        $sql .= "INNER JOIN invitado ";
        $sql .= "ON evento.id_inv = invitado.id_invitado ";
        $sql .= "ORDER BY id_evento";
        $resultado = $conn->query($sql);
    } catch (Exception $e) {
        echo $e->getMessage();
    }
    ?>

</section>

<div class="calendario">
    <?php
        $calendario = array();
        while($eventos = $resultado->fetch_assoc()) { 

            //Obtiene la fecha del evento
            $fecha = $eventos['fecha_evento'];

            $evento = array(
                'titulo' => $eventos['nombre_evento'],
                'fecha' => $eventos['fecha_evento'],
                'hora' => $eventos['hora_evento'],
                'categoria' => $eventos['cat_evento'],
                'icono' => 'fa' . " " . $eventos['icono'],
                'invitado' => $eventos['nombre_invitado'] . " " . $eventos['apellido_invitado']
            );
            
            //Manera de agrupar por fecha
            $calendario[$fecha][] = $evento;

        } ?>


    <?php
        foreach($calendario as $dia => $lista_eventos) { ?>
            <h3>
                <i class="fa fa-calendar"></i>
                <?php 
                    setLocale(LC_TIME,'spanish');
                
                    echo strftime( "%A, %d de %B del %Y", strtotime($dia) ); 
                ?>
            </h3>
            <?php foreach($lista_eventos as $evento) { ?>
                <div class="dia">
                    <p class="titulo">
                        <?php echo $evento['titulo']; ?>
                    </p>
                    <p class="hora">
                        <i class="fa fa-clock" aria-hidden="true"></i>
                        <?php echo $evento['fecha'] . " " . $evento['hora']; ?>
                    </p>
                    <p>
                        <i class="fa <?php echo $evento['icono']; ?>" aria-hidden="true"></i>
                        <?php echo $evento['categoria']; ?></p>
                    </p>
                    <p>
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <?php echo $evento['invitado']; ?></p>
                    </p>
                </div>
            <?php } //Fin foreach eventos ?> 
        <?php } //Fin foreach dias?>
</div>

<?php
    $conn->close();
?>

<?php include_once 'includes/templates/footer.php'; ?>