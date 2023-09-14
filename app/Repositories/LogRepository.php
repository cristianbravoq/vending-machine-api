<?php

namespace App\Repositories;

use App\Models\Log;

class LogRepository
{
    protected $model;

    public function __construct(Log $model)
    {
        $this->model = $model;
    }

    public function createLog($data)
    {
        return $this->model->create($data);
    }
}