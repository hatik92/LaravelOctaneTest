<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/**
 *  @OA\Info(
 *    title="Quantum API documentation",
 *    version="2.8.0",
 *    description=""
 *  ),  
 *  @OA\SecurityScheme(
 *    securityScheme="bearer_token",
 *    type="apiKey",
 *    name="Authorization",
 *    in="header"
 *  )
 *
 *@OA\Get(
 *      path="/api/user",
 *      description="Home Page",
 *      security={
 *          {"bearer_token": {}
 *      }},
 *      @OA\Response(response="default", description="Welcome Page")
 *)
 */
class Controller extends BaseController
{

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
