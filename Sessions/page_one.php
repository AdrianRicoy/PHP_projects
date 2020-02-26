<?php 

    session_start();

    if(!isset($_SESSION['variable_session'])) {
        header("Location: index.php?error=session");
    }

    echo "Has iniciado sesión";

?>