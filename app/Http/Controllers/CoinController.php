<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\CoinHandler;

class CoinController extends Controller
{
    protected $coinHandler;

    public function __construct(CoinHandler $coinHandler)
    {
        $this->coinHandler = $coinHandler;
    }

    public function getAll()
    {
        $coins = $this->coinHandler->getCoins();
        return response()->json($coins);
    }

    public function returnCoinsInsertByUser()
    {
        $returnedCoins = $this->coinHandler->returnCoinsInsertByUser();
        return response()->json($returnedCoins);
    }

    public function updateById(Request $request, $coinId)
    {
        $data = $request->validate([
            'value' => 'numeric',
        ]);

        $updatedCoin = $this->coinHandler->updateCoin($coinId, $data);

        if (!$updatedCoin) {
            return response()->json(['message' => 'Coin not found'], 404);
        }

        return response()->json($updatedCoin);
    }

    public function getInfoCoinsInserted()
    {
        $coinsInserted = $this->coinHandler->getCoinsInserted();
        return response()->json($coinsInserted);
    }
}
