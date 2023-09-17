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

        // Obtén el valor total ingresado por el cliente (como se discutió anteriormente)
        $valorTotalIngresado = $this->coinManager->getCoinInserted();

        // Verifica si el valor total ingresado es mayor que cero
        if ($valorTotalIngresado) {

            $coinsToRefund = $this->coinRepository->calculateRefundCoins($valorTotalIngresado->valor_acumulado);

            if ($this->refundCoins($coinsToRefund)) {
                $this->coinManager->clearMoneyInserted();
                return $coinsToRefund;
            }
        } else {
            // El valor total ingresado es cero o negativo, no se puede realizar la cancelación
            return 'No se puede cancelar la compra. No se ha ingresado dinero.';
        }
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

    private function refundCoins($coinsToRefund)
    {
        // Implementa la lógica para devolver las monedas al cliente aquí
        return true; // Cambia esto según tu implementación real
    }
}
