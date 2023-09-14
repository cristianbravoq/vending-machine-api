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
}
