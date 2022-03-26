<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

/**
 * Class APIBaseController.
 */
class APIBaseController extends BaseController
{
    /**
     * @OA\Info(title="API Swagger documentation", version="1.0.0")
     * @OA\Schemes(format="http")
     * @OA\SecurityScheme(
     *      securityScheme="bearerAuth",
     *      in="header",
     *      name="bearerAuth",
     *      type="http",
     *      scheme="bearer",
     *      bearerFormat="JWT",
     * ),
     *
     */
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
