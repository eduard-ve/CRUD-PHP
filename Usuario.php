<?php

require_once 'database.php';

class Usuario
{
    private PDO $conn;

    public function __construct()
    {
        $this->conn = (new Database())->getConnection();
    }

    public function listarUsuarios()
    {
        $sql = "SELECT id, primer_nombre, segundo_nombre, primer_apellido, 
        segundo_apellido, email, telefono, direccion FROM usuarios";

        try {
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
        error_log("Error al listar usuarios: " . $e->getMessage());
        return [];
        }   
    }

    public function obtenerUsuario($id)
    {
        // Consulta SQL para obtener un usuario por su ID
        $sql = "SELECT id, primer_nombre, segundo_nombre, primer_apellido, 
                segundo_apellido, email, telefono, direccion, creado_en 
                FROM usuarios WHERE id = :id";
    
        try {
            // Preparar la consulta
            $stmt = $this->conn->prepare($sql);
            // Vincular el parámetro :id con el valor de $id
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            // Ejecutar la consulta
            $stmt->execute();
            // Retornar el resultado como un array asociativo
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Registrar el error en el log y devolver null
            error_log("Error al obtener usuario: " . $e->getMessage());
            return null;
        }
    }

    public function crearUsuario()
    {
        // Lógica para insertar usuario
    }

    public function actualizarUsuario()
    {
        // Lógica para actualizar un usuario
    }

    public function eliminarUsuario($id)
    {
        $sql = "DELETE FROM usuarios WHERE id = :id";

        try {
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            return $stmt->execute(); 
        } catch (PDOException $e) {
            error_log("Error al eliminar usuario: " . $e->getMessage());
            return false;
        }
    }   
    
}

