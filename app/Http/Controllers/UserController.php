<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\utils\ApiResponse;

class UserController extends Controller
{
    public function getAllUsers()
    {
        $users = User::all();

        if ($users->isEmpty()) {
            return sendJsonResponse(new ApiResponse(
                status: 'error',
                code: 404,
                message: 'No se encontraron usuarios',
                data: []
            ));
        }
        return sendJsonResponse(new ApiResponse(
            status: 'success',
            code: 200,
            message: 'Datos cargados correctamente',
            data: $users
        ));
    }

    function getUserById(Request $request)
    {
        $dni = $request->input("dni");

        $users = DB::table('users')->where('dni', $dni)->get();

        if ($users->isEmpty()) {
            return sendJsonResponse(new ApiResponse(
                status: 'error',
                code: 404,
                message: 'No se encontraron usuarios',
                data: []
            ));
        }
        return sendJsonResponse(new ApiResponse(
            status: 'success',
            code: 200,
            message: 'Datos cargados correctamente',
            data: $users
        ));
    }


    function createUser(Request $request)
    {


        $user = new User;

        $user->name = $request->input("name");
        $user->surname = $request->input("surname");
        $user->dni = $request->input("dni");
        $user->dateOfBirth = $request->input("dateOfBirth");
        $user->departmentId = $request->input("departmentId");




        // Valido los datos antes de la inserción
        $errores = User::validacionesDeUsuario($user);

        if (empty($errores)) {
            $user->save();
        } else {

// echo "hola";



            sendJsonResponse(new ApiResponse(
                status: 'not success',
                code: 400,
                message: $errores,
                data: null
            ));
            // return null;
        }


        // if (isset($user)) {
        //     return sendJsonResponse(new ApiResponse(
        //         status: 'success',
        //         code: 200,
        //         message: 'Datos cargados correctamente',
        //         data: $user
        //     ));
        // }












    }














    /*********** Funciones necesarias ***********/
    function validacionesDeUsuario($user)
    {
        // Valido los datos insertados en body (formulario) y voy completando el array $arrayErrores con los errores que aparezcan
        $arrayErrores = array();
        if (empty($user['name'])) {
            $arrayErrores["name"] = 'El nombre es obligatorio';
        }
        if (empty($this->surname)) {
            $arrayErrores["surname"] = 'El apellido es obligatorio';
        }
        if (empty($this->dni)) {
            $arrayErrores["dni"] = 'El DNI es obligatorio';
        }
        // } elseif (!$userService->dniVerify($this) && $stopOnExistingDni) {
        //     $arrayErrores["dni"] = 'El DNI no está registrado en el sistema';
        // } elseif ($userService->dniVerify($this) && !$stopOnExistingDni){
        //         $arrayErrores["dni"] = 'El DNI ya está registrado en el sistema';
        //     }
        //  elseif (!validarDNI($this->dni)) {
        //     $arrayErrores["dni"] = 'El DNI no es válido';
        // }        
        if (empty($this->dateOfBirth)) {
            $arrayErrores["dateOfBirth"] = 'La fecha de nacimiento es obligatoria';
        }
        if (empty($this->departmentId)) {
            $arrayErrores["departmentId"] = 'El departamento es obligatorio';
        }
        return $arrayErrores;
    }
}
