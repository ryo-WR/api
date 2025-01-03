<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Worker;

class WorkerController extends Controller
{
    public function index()
    {
        $workers = Worker::all();
        return view('workers', compact('workers'));
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

        $worker = Worker::create($validated);

         // 一覧ページにリダイレクト
         return redirect()->route('workers.index')->with('success', 'Worker added successfully!');
    }

    public function show($id)
    {
        $worker = Worker::find($id);
        if (!$worker) {
            return response()->json([
                'message' => 'Worker not found'
            ], 404);
        }
        return response()->json($worker);
    }

    /**
     * Workerを削除する
     */
    public function destroy($id)
    {
        $worker = Worker::find($id);
        if (!$worker) {
            return response()->json(['message' => 'Worker not found'], 404);
        }

        $worker->delete();

        return response()->json(['message' => 'Worker deleted successfully']);
    }
}
