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

    public function updateItem($itemId)
    {
        return $this->itemRepository->updateItem($itemId);
    }

    public function saleProduct($itemId)
    { 
        return $this->itemRepository->updateItem($itemId);
    }
}