<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ItemHandler;

/**
* @OA\Info(title="API Usuarios", version="1.0")
*
* @OA\Server(url="http://swagger.local")
*/

class ItemController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/items",
     *     summary="Obtener todos los productos",
     *     description="Obtiene una lista de todos los productos disponibles en la máquina expendedora.",
     *     @OA\Response(
     *         response=200,
     *         description="Lista de productos",
     *     )
     * )
     */
    protected $itemHandler;

    public function __construct(ItemHandler $itemHandler)
    {
        $this->itemHandler = $itemHandler;
    }

    public function getAll()
    {
        $items = $this->itemHandler->getItems();
        return response()->json($items);
    }

    public function getById($itemId)
    {
        $item = $this->itemHandler->getItemById($itemId);

        if (!$item) {
            return response()->json(['message' => 'Item not found'], 404);
        }

        return response()->json($item);
    }

    public function updateById($itemId)
    {
        $updatedItem = $this->itemHandler->updateItem($itemId);

        if (!$updatedItem) {
            return response()->json(['message' => 'Item not found'], 404);
        }

        return response()->json($updatedItem);
    }
}
