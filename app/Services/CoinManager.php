<?php

namespace App\Services;

use App\Repositories\CoinRepository;

class CoinManager
{
    protected $coinRepository;

    public function __construct(CoinRepository $coinRepository)
    {
        $this->coinRepository = $coinRepository;
    }

    public function setCoinInserted($value)
    {
        // Lógica para registrar la moneda insertada.
    }

    public function getCoinInserted()
    {
        // Lógica para obtener información sobre las monedas insertadas.
    }

    public function clearMoneyInserted()
    {
        // Lógica para limpiar las monedas insertadas (por ejemplo, cuando se cancela la transacción).
    }
}