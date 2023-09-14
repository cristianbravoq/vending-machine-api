<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ItemHandler;

class ItemController extends Controller
{
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

    public function updateById(Request $request, $itemId)
    {
        $data = $request->validate([
            'name' => 'string',
            'price' => 'numeric',
        ]);

        $updatedItem = $this->itemHandler->updateItem($itemId, $data);

        if (!$updatedItem) {
            return response()->json(['message' => 'Item not found'], 404);
        }

        return response()->json($updatedItem);
    }
}
