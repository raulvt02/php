<?php
include 'config.php';

$id = $_GET['id'];

$stmt = $pdo->prepare("DELETE FROM jabones WHERE id = ?");
$stmt->execute([$id]);

header('Location: index.php');
exit;

Notas importantes:

    En edit.php, primero se verifica si se ha enviado el formulario. Si es así, se actualiza el registro. Si no, se muestra el formulario con los datos actuales del jabón para ser editados.

    En delete.php, simplemente se elimina el jabón con el ID especificado y luego se redirige al usuario de nuevo al listado principal.

    Es esencial proteger estos scripts para evitar la inyección de SQL. Las consultas preparadas (como las que se muestran arriba) son una forma de protegerse contra este tipo de ataques. Sin embargo, siempre es una buena práctica seguir las mejores prácticas de seguridad y considerar medidas adicionales como la validación de entrada, la autenticación y otros mecanismos de seguridad.

