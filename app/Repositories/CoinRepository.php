<?php

namespace App\Repositories;

use App\Models\Coin;

class CoinRepository
{
    protected $model;

    public function __construct(Coin $model)
    {
        $this->model = $model;
    }

    public function getCoins()
    {
        return $this->model->all();
    }

    public function updateCoin($coinId, $data)
    {
        $coin = $this->model->find($coinId);

        if (!$coin) {
            return null; // Opcional: Manejar el caso en el que la moneda no existe.
        }

        $coin->update($data);

        return $coin;
    }

    public function updateCoins($coinId, $data)
    {
        $coin = $this->model->find($coinId);

        if (!$coin) {
            return null; // Opcional: Manejar el caso en el que la moneda no existe.
        }

        $coin->update($data);

        return $coin;
    }

    // Función para calcular la cantidad de monedas necesarias para el reembolso
    public function calculateRefundCoins($amountToRefund)
    {
        $coins = Coin::orderBy('value', 'desc')->get(); // Obtén las monedas en orden descendente por valor
        $refundCoins = [];

        foreach ($coins as $coin) {
            while ($amountToRefund >= $coin->value && $coin->quantity > 0) {
                $refundCoins[] = $coin->value;
                $amountToRefund -= $coin->value;
                $coin->quantity--; // Resta una moneda de la cantidad disponible en la base de datos
            }
        }

        return $refundCoins;
    }
}
