<?php

namespace App\Repositories;

use App\Models\Worker;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class WorkerRepository
{
  public function getAllWorkers()
  {
    return DB::table('workers')->get();
  }

  public function getWorkerById($id)
  {
    $result = DB::table('workers')->where('id', $id)->first();
    return $result ? $result : null;
  }

  public function create(array $data)
  {
    $data['created_at'] = Carbon::now();
    $data['updated_at'] = Carbon::now();

    return DB::table('workers')->insert($data);
  }

  public function updateWorker(int $id, array $data) : bool
  {
    $data['updated_at'] = Carbon::now();

    return DB::table('workers')->where('id', $id)->update($data) > 0;
  }

  public function delete(int $id) : bool
  {
    return DB::table('workers')->where('id', $id)->delete() > 0;
  }
}