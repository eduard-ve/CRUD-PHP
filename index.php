<?php

require_once 'Usuario.php';

// Crear una instancia de la clase Usuario
$usuarioModel = new Usuario();

// -------------------- CREAR USUARIO --------------------
$usuarioModel->crearUsuario("Ana", "ana@mail.com", 22);

// -------------------- LISTAR USUARIOS --------------------
echo "<pre>";
print_r($usuarioModel->listarUsuarios());
echo "</pre>";

// -------------------- OBTENER USUARIO POR ID --------------------
$idBuscar = 2;
$usuario = $usuarioModel->obtenerUsuario($idBuscar);

if ($usuario) {
    echo "Usuario encontrado:\n";
    print_r($usuario);
} else {
    echo "No se encontró el usuario con ID: $idBuscar\n";
}

// -------------------- ELIMINAR USUARIO --------------------
$idEliminar = 3;
$resultado = $usuarioModel->eliminarUsuario($idEliminar);

if ($resultado) {
    echo "✅ Usuario con ID $idEliminar eliminado correctamente.";
} else {
    echo "❌ No se pudo eliminar el usuario con ID $idEliminar.";
}

// -------------------- MOSTRAR DETALLES DE UN USUARIO --------------------
$idDetalle = 1;
$resultado = $usuarioModel->obtenerUsuario($idDetalle);

if ($resultado) {
    echo "<h2>Información del Usuario</h2>";
    echo "<p>ID: " . $resultado['id'] . "</p>";
    echo "<p>Nombre: " . $resultado['primer_nombre'] . " " . ($resultado['segundo_nombre'] ?? '') . "</p>";
    echo "<p>Apellido: " . $resultado['primer_apellido'] . " " . ($resultado['segundo_apellido'] ?? '') . "</p>";
    echo "<p>Email: " . $resultado['email'] . "</p>";
    echo "<p>Teléfono: " . ($resultado['telefono'] ?? 'No registrado') . "</p>";
    echo "<p>Dirección: " . ($resultado['direccion'] ?? 'No registrada') . "</p>";
    echo "<p>Creado en: " . $resultado['creado_en'] . "</p>";
} else {
    echo "<p>No se encontró el usuario o ocurrió un error.</p>";
}
