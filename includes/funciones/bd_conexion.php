<?php
    $conn = new mysqli('localhost', 'root', '', 'vlcwebcamp');

    if($conn->connect_error) {
        echo $error -> $conn->connect_error;
    }
?>