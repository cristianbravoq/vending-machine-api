<?php

namespace App\Repositories;

use App\Models\Item;

class ItemRepository
{
    protected $model;

    public function __construct(Item $model)
    {
        $this->model = $model;
    }

    public function getItems()
    {
        return $this->model->all();
    }

    public function getItemById($itemId)
    {
        return $this->model->find($itemId);
    }

    public function updateItem($itemId)
    {
        $item = $this->model->find($itemId);

        if (!$item) {
            return null; // Opcional: Manejar el caso en el que el producto no existe.
        }

        $item->quantity -= 1;
        $item->save();

        return $item;
    }
}