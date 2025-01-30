<?php

namespace App\Services;

use App\Models\Worker;
use App\Repositories\WorkerRepository;

class WorkerService
{
    private $worker_repository;

    public function __construct(WorkerRepository $worker_repository)
    {
        $this->worker_repository = $worker_repository;
    }

    public function getAllWorkers() {
      return $this->worker_repository->getAllWorkers();
    }

    public function getWorkerById(int $id): ?Worker {
      return $this->worker_repository->getWorkerById($id);
    }

    public function createWorker(array $data): bool {
      return $this->worker_repository->create($data);
    }

    public function updateWorker(int $id, array $data): bool {
      return $this->worker_repository->updateWorker($id, $data);
    }

    public function deleteWorker(int $id): bool {
      return $this->worker_repository->delete($id);
    }
}

