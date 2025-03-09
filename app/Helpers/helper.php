<?php

// Convierto la fecha de DD-MM-YYYY a YYYY-MM-DD
function formatDate(string $date): ?string
{
    $dateTime = DateTime::createFromFormat('d/m/Y', $date);
    return $dateTime ? $dateTime->format('Y-m-d') : null; // para recordarlo: expresión condicional ternaria
}

// // He adaptado la función para que me dé la respuesta correcta con Laravel
// function sendJsonResponse($apiResponse)
// {
//     return response()->json(
//         json_decode($apiResponse->toJSON(), true), // Asegura que sea un array válido
//         $apiResponse->getCode() // Código de estado HTTP
//     );
// }

// // Verifica si el código de producto existe en la BBDD
// function productCodeVerify($connection, $data)
// {
//     $query = "SELECT COUNT(*) FROM products WHERE productCode = :productCode";
//     $statement = $connection->prepare($query);

//     if ($statement) {
//         $statement->execute(['productCode' => $data['productCode']]);
//         $count = $statement->fetchColumn();
//         return $count > 0;
//     } else {
//         // Controlo el error si la preparación de la consulta falla
//         throw new Exception("Error al preparar la consulta SQL.");
//     }
// }

// // Verifico si el ID del tipo de movimiento existe en la BBDD
// function movementTypeIdVerify($connection, $data)
// {
//     $query = "SELECT COUNT(*) FROM movementTypes WHERE movementTypeId = :movementTypeId";
//     $statement = $connection->prepare($query);
//     $statement->execute(['movementTypeId' => $data['movementTypeId']]);
//     $count = $statement->fetchColumn();
//     return $count > 0;
// }

// // Verifico si el departmentId está registrado en la tabla departments
// function departmentIdVerify($connection, $data)
// {
//     // Verifico si el departmentId está registrado en la tabla departments
//     $query = "SELECT COUNT(*) FROM departments WHERE departmentId = :departmentId";
//     $statement = $connection->prepare($query);
//     if ($statement) {
//         $statement->execute(['departmentId' => $data['departmentId']]);
//         $count = $statement->fetchColumn();
//         return $count > 0;
//     } else {
//         // Controlo el error si la preparación de la consulta falla
//         throw new Exception("Error al preparar la consulta SQL.");
//     }
// }

// // Verifico si el movementTypeId está siendo usado en la tabla movements
// function movementTypeIdInUseVerify($connection, $data)
// {
//     $query = "SELECT COUNT(*) FROM movements WHERE movementTypeId = :movementTypeId";
//     $statement = $connection->prepare($query);
//     $statement->execute(['movementTypeId' => $data['movementTypeId']]);
//     $count = $statement->fetchColumn();
//     return $count > 0;
// }
