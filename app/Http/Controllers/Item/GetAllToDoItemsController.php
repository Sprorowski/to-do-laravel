<?php

declare(strict_types=1);

namespace App\Http\Controllers\Item;

use App\Http\Controllers\Controller;
use App\Services\Item\GetAllToDoItemsHandler;
use Illuminate\Http\JsonResponse;

class GetAllToDoItemsController extends Controller
{
    public function __invoke(
        GetAllToDoItemsHandler $getAllToDoItemsHandler
    ): JsonResponse
    {
        $response = $getAllToDoItemsHandler();       
        return new JsonResponse($response);
    }
}
