<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Movement;
use App\Http\Resources\MovementResource;
use App\Http\Requests\StoreMovementRequest;

use function PHPUnit\Framework\isEmpty;

class MovementController extends Controller
{
    function getAllMovements()
    {
        // Relaciono los movimientos con las clases Product y MovementType para mostrar en la respuesta
        // los datos relacionados, por ejemplo productName y movementTypeName
        // Para esto he creado el recurso MovementResource en el que he definido el formato de la respuesta JSON
        $movements = Movement::with(['product', 'movementType'])->get();
        $response = MovementResource::collection($movements);

        if ($response->isEmpty()) {
            return response()->json([
                'status' => 'error',
                'code' => 404,
                'message' => '⚠️ No se encontraron movimientos',
                'data' => []
            ]);
        }
        return response()->json([
            'status' => 'success',
            'code' => 200,
            'message' => '✅ Datos cargados correctamente',
            'data' => $response
        ]);
    }
    function getMovementFiltered(Request $request)
    {
        $query = Movement::query()->with(['product', 'movementType']);

        // Filtra por productName si se proporciona
        if ($request->has('productName') && $request->productName != '') {
            $query->whereHas('product', function ($q) use ($request) {
                $q->where('productName', 'LIKE', '%' . $request->productName . '%');
            });
        }

        // Filtra por productCode si se proporciona
        if ($request->has('productCode') && $request->productCode != '') {
            $query->where('productCode', 'like', '%' . $request->productCode . '%');
        }
        // Filtra por fromBatchNumber si se proporciona
        if ($request->has('fromBatchNumber') && $request->fromBatchNumber != '') {
            $query->where('fromBatchNumber', $request->fromBatchNumber);
        }
        // Filtra por toBatchNumber si se proporciona
        if ($request->has('toBatchNumber') && $request->toBatchNumber != '') {
            $query->where('toBatchNumber', $request->toBatchNumber);
        }
        // Filtra por fromLocation si se proporciona
        if ($request->has('fromLocation') && $request->fromLocation != '') {
            $query->where('fromLocation', $request->fromLocation);
        }
        // Filtra por toLocation si se proporciona
        if ($request->has('toLocation') && $request->toLocation != '') {
            $query->where('toLocation', $request->toLocation);
        }
        // Filtra por quantity si se proporciona
        if ($request->has('quantity') && $request->quantity != '') {
            $query->where('quantity', $request->quantity);
        }
        // Filtra por movementTypeId si se proporciona
        if ($request->has('movementTypeId') && $request->movementTypeId != '') {
            $query->where('movementTypeId', $request->movementTypeId);
        }
        // Filtra por movementDate si se proporciona
        if ($request->has('movementDate') && $request->movementDate != '') {
            $query->where('movementDate', $request->movementDate);
        }
        // Filtra por customer si se proporciona
        if ($request->has('customer') && $request->customer != '') {
            $query->where('customer', $request->customer);
        }
        // Filtra por supplier si se proporciona
        if ($request->has('supplier') && $request->supplier != '') {
            $query->where('supplier', $request->supplier);
        }

        $movements = $query->with(['product', 'movementType'])->get();
        $response = MovementResource::collection($movements);


        if ($response->isEmpty()) {
            return response()->json([
                'status' => 'error',
                'code' => 404,
                'message' => '⚠️ No se han encontrado movimientos',
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'code' => 200,
            'message' => '✅ Datos cargados correctamente',
            'data' => $response
        ]);
    }
}
