<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\WorkerService;

class WorkerController extends Controller
{
    protected $worker_service;

    public function __construct(WorkerService $worker_service)
    {
        $this->worker_service = $worker_service;
    }

    public function index()
    {
        $workers = $this->worker_service->getAllWorkers();
        return response()->json($workers);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'gender' => 'required|string|max:255',
            'disability' => 'required|string|max:255',
            'level' => 'required|string|max:255',
        ]);

        $this->worker_service->createWorker($validated);
        return response()->json(['message' => 'Worker created successfully']);
    }

    public function show($id)
    {
        $worker = $this->worker_service->getWorkerById($id);

        return $worker
            ? response()->json($worker)
            : response()->json(['message' => 'Worker not found'], 404);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'address' => 'required|string|max:255',
        ]);

        $updated = $this->worker_service->updateWorker($id, $validated);
        return $updated
            ? response()->json(['message' => 'Worker updated successfully'])
            : response()->json(['message' => 'Worker not found'], 404); 
    }

    public function destroy($id)
    {
        $deleted = $this->worker_service->deleteWorker($id);

        return $deleted 
            ? response()->json(['message' => 'Worker deleted successfully'])
            : response()->json(['message' => 'Worker not found'], 404);
    }
}
