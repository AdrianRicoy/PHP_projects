<?php
    /*
        Session: Almacena y persistencia de datos del usuario mientras navega en un sitio hasta que
            cierra la session o cierra el navegador
    */

    session_start();

    if(isset($_GET["error"])) {
        echo "Necesitas iniciar sesión" . "<br/>";
    }

    $_SESSION['variable_session'] = "A value session var"; // Variable de session

    echo $_SESSION['variable_session'];
?>