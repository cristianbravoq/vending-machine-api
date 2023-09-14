<?php

namespace App\Services;

use App\Repositories\LogRepository;

class LogHandler
{
    protected $logRepository;

    public function __construct(LogRepository $logRepository)
    {
        $this->logRepository = $logRepository;
    }

    public function createLog($data)
    {
        return $this->logRepository->createLog($data);
    }
}