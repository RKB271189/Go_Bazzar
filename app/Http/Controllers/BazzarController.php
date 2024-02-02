<?php

namespace App\Http\Controllers;

use App\Http\Resources\AdvertisementResource;
use App\Services\Advertisement;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class BazzarController extends Controller
{
    public function __construct(private Advertisement $advertisement)
    {
    }
    public function home()
    {
        try {
            $advertisements = $this->advertisement->getCollection(8);
            $advertisements = AdvertisementResource::collection($advertisements);
            return response()->json(['advertisements' => $advertisements], 200);
        } catch (Exception $ex) {
            Log::channel('bazzar_exception_log')->error($ex->getMessage());
            return response()->json(['error' => 'Something went wrong. Please try again.'], 500);
        }
    }
}
