<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WorkerWebController extends Controller
{
  protected $apiBaseUrl;

  public function __construct()
  {
    $this->apiBaseUrl = config('appUrl.app_base_url') . '/api/v1/worker';
  }

  public function index()
  {
    $response = Http::get('http://localhost:8080/api/v1/worker');
    $workers = $response->json();

    return view('worker.index', ['workers' => $workers]);
  }

  public function store(Request $request)
  {
    Http::post($this->apiBaseUrl, $request->all());
    return redirect()->route('web.workers.index');
  }

  public function show($id)
  {
    $response = Http::get("($this->apiBaseUrl)/{$id}");
    $workers = $response->json();

    return view('worker.personal', ['workers' => $workers]);
  }

  public function update(Request $request, $id)
  {
    Http::put("{$this->apiBaseUrl}/{$id}", $request->all());
    return redirect()->route('web.workers.index');
  }

  public function destroy($id)
  {
    Http::delete("{$this->apiBaseUrl}/{$id}");
    return redirect()->route('web.workers.index');
  }
 }