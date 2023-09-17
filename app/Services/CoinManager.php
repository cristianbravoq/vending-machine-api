<?php

namespace App\Services;

use App\Models\Acumulado;
use App\Models\Coin;
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
        $acumulado = Acumulado::firstOrNew([]);
        $coin = Coin::where('value', $value)->first();

        if ($coin) {
            $coin->quantity += 1;
            $coin->save();
        } else {
            // Manejar el caso en el que no se encuentra la moneda con el valor especificado
            return 'La moneda no existe';
        }

        // Suma el nuevo valor al valor acumulado actual
        $acumulado->valor_acumulado += $value;

        // Guarda el valor acumulado en la base de datos
        $acumulado->save();

        // Retorna el valor acumulado actualizado
        return $acumulado->valor_acumulado;
    }

    public function getCoinInserted()
    {
        // Lógica para obtener información sobre las monedas insertadas.
        return Acumulado::firstOrNew([]);
    }

    public function clearMoneyInserted()
    {
        // Lógica para limpiar las monedas insertadas (por ejemplo, cuando se cancela la transacción).
        // Lógica para registrar la moneda insertada.
        $acumulado = Acumulado::firstOrNew([]);

        // Suma el nuevo valor al valor acumulado actual
        $acumulado->valor_acumulado = 0;

        // Guarda el valor acumulado en la base de datos
        $acumulado->save();

        // Retorna el valor acumulado actualizado
        return $acumulado->valor_acumulado;
    }
}
