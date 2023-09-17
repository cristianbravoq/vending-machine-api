<?php

namespace App\Services;

use App\Repositories\CoinRepository;
use App\Services\CoinManager;

class CoinHandler
{
    protected $coinRepository;
    protected $coinManager;

    public function __construct(CoinRepository $coinRepository, CoinManager $coinManager)
    {
        $this->coinRepository = $coinRepository;
        $this->coinManager = $coinManager;
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
        return $this->coinManager->getCoinInserted();
    }

    public function insertCoin($value)
    {
        return $this->coinManager->setCoinInserted($value);
    }

    public function resetCoinsInserted()
    {
        return $this->coinManager->clearMoneyInserted();
    }
}
