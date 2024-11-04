<?php
// Simular una acción (por ejemplo, guardar datos en una base de datos)
sleep(2); // Simulando un tiempo de carga de 2 segundos

// Después de realizar la acción
echo json_encode(['status' => 'success', 'message' => 'La acción se realizó de manera correcta.']);
?>
