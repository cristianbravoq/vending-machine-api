<?php

namespace App\Services;

use App\Repositories\ItemRepository;

class ItemHandler
{
    protected $itemRepository;

    public function __construct(ItemRepository $itemRepository)
    {
        $this->itemRepository = $itemRepository;
    }

    public function getItems()
    {
        return $this->itemRepository->getItems();
    }

    public function getItemById($itemId)
    {
        // Lógica para obtener un producto por su ID desde el repositorio de productos.
        return $this->itemRepository->getItemById($itemId);
    }

    public function updateItem($itemId, $data)
    {
        return $this->itemRepository->updateItem($itemId, $data);
    }
}