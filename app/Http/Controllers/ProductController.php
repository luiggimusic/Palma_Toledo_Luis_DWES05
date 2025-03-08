<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use App\utils\ApiResponse;

class UserController extends Controller
{
    public function getAllProducts()
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

    function createUser()
    {

        echo "hola";
        // $dni = $request->input("dni");

        // $users = new User;

    //     if ($users->isEmpty()) {
    //         return sendJsonResponse(new ApiResponse(
    //             status: 'error',
    //             code: 404,
    //             message: 'No se encontraron usuarios',
    //             data: []
    //         ));
    //     } 
    //          return sendJsonResponse(new ApiResponse(
    //             status: 'success',
    //             code: 200,
    //             message: 'Datos cargados correctamente',
    //             data: $users
    //         ));
    }


}
