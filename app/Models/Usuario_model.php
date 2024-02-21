<?php

namespace App\Models;

use CodeIgniter\Model;

class Usuario_model extends Model
{

    //Isela Liliana Lara
    protected $table = 'usuarios';//Se establece el nombre de la tabla de la base de datos
    protected $primaryKey = 'id';//Se establece el nombre de la columna que es llave primaria de la tabla
    protected $allowedFields = ['nombre', 'correo', 'clave'];//Se definen los campos de la tabla para que se puedan asignar al metodo insertar y actualizar

    //Se crea la funcion para registrar nuevo usuario
    public function registro($usuario)
    {
        return $this->insert($usuario);
    }

    //Se crea una funcion pque recibe 2 parametros para poder comparar los datos del formulario con los datos de la base de datos
    public function obtenerUsuario($correo, $clave)
    {
        $usuario = $this->where('correo', $correo)->first();// se realiza una consulta para obtener el registro del campo correo
        //Se verifica que se encontro un usuario con el correo proporcionado
        if ($usuario) {
            //Si encuentra un usuario se verifica la clave 
            if (password_verify($clave, $usuario['clave'])) {
                return $usuario;//si coinciden se devuelve el registro
            }
        } else {
            return false;// Si no se encuentra un usuario devolvera false
        }
    }
}
