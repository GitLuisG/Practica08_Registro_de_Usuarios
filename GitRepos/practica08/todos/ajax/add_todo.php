<?php


include '../../config.php';
include '../../db.php';

// En el HTTP Response, decimos que la respuesta va a ser de tipo JSON.
header('Content-Type: application/json');

// Assoc array que va a representar la respuesta JSON.
$jsonResp = array('id' => 0, 'mensaje' => NULL, 'error' => NULL);

// Obtenemos el parámetro POST 'todo'.
$todo = filter_input(INPUT_POST, 'usuario');
$todo2 = filter_input(INPUT_POST, 'name');
$todo3 = filter_input(INPUT_POST, 'email');
$todo4 = filter_input(INPUT_POST, 'password');

// Validación del parámetro 'todo' recibido.
if ($todo == NULL || $todo === false || $todo === '') {
    $jsonResp['error'] = 'No se envió parámetro todo';
    echo json_encode($jsonResp);
    exit();  // termina la ejecución del archivo php.
}
if ($todo2 == NULL || $todo2 === false || $todo2 === '') {
    $jsonResp['error'] = 'No se envió parámetro todo';
    echo json_encode($jsonResp);
    exit();  // termina la ejecución del archivo php.
}
if ($todo3 == NULL || $todo3 === false || $todo3 === '') {
    $jsonResp['error'] = 'No se envió parámetro todo';
    echo json_encode($jsonResp);
    exit();  // termina la ejecución del archivo php.
}
if ($todo4 == NULL || $todo4 === false || $todo4 === '') {
    $jsonResp['error'] = 'No se envió parámetro todo';
    echo json_encode($jsonResp);
    exit();  // termina la ejecución del archivo php.
}

// PDO Object para la interacción con la base de datos.
$db = getPDO();  

// Insert del registro en tabla 'todos'.
$stmt = $db->prepare('INSERT INTO users(`username`, `name`, `email`, `password`)VALUE(:todo, :todo2, :todo3, :todo4)');
$stmt->bindParam(':todo', $todo);
$stmt->bindParam(':todo2', $todo2);
$stmt->bindParam(':todo3', $todo3);
$stmt->bindParam(':todo4', $todo4);
$stmt->execute();

// Obtenemos el id del registro inserado.
$stmt = $db->prepare('SELECT last_insert_id() id');
$stmt->execute();
$id = $stmt->fetch(PDO::FETCH_ASSOC)['id'];

// Modificamos el assoc array para enviar el id del registro insertado.
$jsonResp['id'] = (int)$id;  // <-- conversión a int.
$jsonResp['mensaje'] = 'OK desde server ;)';

// Enviamos la respuesta JSON. Con la función json_encode, creamos el
// JSON a partir del Assoc array.
echo json_encode($jsonResp);
