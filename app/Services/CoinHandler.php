<?php

namespace App\Services;

use App\Repositories\CoinRepository;

class CoinHandler
{
    protected $coinRepository;

    public function __construct(CoinRepository $coinRepository)
    {
        $this->coinRepository = $coinRepository;
    }

    public function getCoins()
    {
        return $this->coinRepository->getCoins();
    }

    public function returnCoinsInsertByUser()
    {
        // Lógica para devolver las monedas insertadas por el usuario (cancelar la transacción).
    }
    
    public function updateCoin($coinId, $data)
    {
        // Lógica para actualizar una moneda específica por su ID en el repositorio de monedas.
        return $this->coinRepository->updateCoin($coinId, $data);
    }
    
    public function getCoinsInserted()
    {
        // Lógica para obtener información sobre las monedas insertadas durante una transacción.
    }
}