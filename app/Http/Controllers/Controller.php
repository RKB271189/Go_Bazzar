<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/**
 * @OA\Info(
 *      version="1.0.0",
 *      title="Go Bazzar APIs",
 *      description="Go Bazzar APIs",
 *      @OA\Contact(
 *          email="rahul.baraiya05@gmail.com"
 *      )
 * )
 * 
 * @OA\SecurityScheme(
 *   securityScheme="oauth2",
 *   type="apiKey",
 *   in="header",
 *   name="Authorization",
 *   scheme="bearer"
 *  )
 */

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
}
