<?php

namespace App\Controllers;

use App\Models\Usuario_model;

class Login extends BaseController
{
    //Isela Liliana Lara
    /* Creamos la funcion ind
    ex para mostrar la vista principal del proyecto
    y agregamos un titulo a la pagina
     */
    public function index()
    {
        return view('login/index', ['title' => 'Inicio de sesion']);
    }

    /* Creamos la funcion mostrar para la vista de creacion de usuario 
    y agregamos un titulo a la pagina
     */
    public function mostrar()
    {
        return view('login/registro', ['title' => 'Registro']);
    }

    // Creamos la funcion registrar para la vista de registro de usuario
    public function registrar()
    {
        $validacion = service('validation');
        $validacion->setRules([
            'nombre' => 'alpha_space|required',
            'correo' => 'required|is_unique[usuarios.correo]',
            'clave' => 'required'
        ]);
        if (!$validacion->withRequest($this->request)->run()) {
            return view('login/registro', ['title' => 'Registro']);
        } else {

            $usuarios = new Usuario_model(); //  inicializamos nuestro modelo para interactuar con la base de datos
            //Se crea un array que asocia los datos del usuario para registrar mediante el formularo
            $usuario = [
                'nombre' => $this->request->getPost('nombre'),
                'correo' => $this->request->getPost('correo'),
                'clave' => password_hash((string) $this->request->getPost('clave'), PASSWORD_DEFAULT) // Se encripta la clave de usuario y se convierte en un dato hexadecimal 
            ];
            //Se llama el metodo registro del modelo y se el array creado
            if ($usuarios->registro($usuario)) {
                session()->setFlashdata('success', 'El registro se hizo exitosamente');
                return redirect()->to('/'); //si el registro es exitoso se redirige a la pagina raiz login
            } else {
                session()->setFlashdata('error', 'El registro no se hizo con exito'); //Si la operacion no tuvo un exito mostrara un mensaje avisando que no fue exitoso
            }
        }
    }


    public function validar()
    {
        //Se obtiene el correo y la clave del formulario 
        $correo = $this->request->getPost('correo');
        $clave = $this->request->getPost('clave');
        //Inicializamos nuestro modelo para interactuar con la base
        $usuarios = new Usuario_model();

        //Se verifica si el correo ingresado es valido
        if (filter_var($correo, FILTER_VALIDATE_EMAIL)) {
            $email = filter_var($correo, FILTER_SANITIZE_EMAIL); // Si es valido se sanea;
            $usuario = $usuarios->obtenerUsuario($correo, $clave); // Se ontiene la informacion de usuario a partir del correo y la clave
            //Se verifica si se encontro un usuario con el correo y clave
            if ($usuario) {
                session()->set('usuario', $usuario); //Si se encontro, se almacenara la informacion en la session
                return redirect()->to(base_url('/inicio')); //Redirigimos al usuario a la pagina de inicio
            } else {
                //Si no se encontro un usuario con el correo y clave, se establece un mensaje de error
                session()->setFlashdata('error', 'Correo electrónico o contraseña incorrectos');
                return redirect()->to('/'); // Redirigimos al usuario a la página de inicio de sesión o pagina raiz
            }
        }
    }
    
    //Crear funcion para mostrar pagina despues del inicio de sesion
    public function mostrarInicio()
    {
        return view('login/inicio', ['title' => 'Perfil']);
    }

    public function cerrarSesion()
    {
        
        $session = session();// Obtener el servicio de sesión      
        $session->destroy(); // Destruir todas las variables de sesión
        return redirect()->to('/');// Redirigir a la página de login
    }
}
