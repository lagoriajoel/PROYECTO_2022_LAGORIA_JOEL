<?php
require_once('vista/includes/head.php');
require_once('vista/includes/header.php');

if($accion === "eliminar"){
    if ($error !== ""){
        echo '<div class="alert alert-danger m-3"><p class="fw-bold">Error en la operación</p><p>'.$error.'</p></div>';
    }
    else{
        echo '<div class="alert alert-success m-3"><p class="fw-bold">Operación exitosa</p><p>Se registró la cuenta en la base de datos</p></div>';
    }
}


?>
<body>
    
</body>
</html>