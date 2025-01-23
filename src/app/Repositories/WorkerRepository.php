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
    return DB::table('workers')->where('id', $id)->first();
  }

  public function create(array $data)
  {
    $data['created_at'] = Carbon::now();
    $data['updated_at'] = Carbon::now();

    return DB::table('workers')->insert($data);
  }

  public function delete($id)
  {
    return DB::table('workers')->where('id', $id)->delete();
  }
}