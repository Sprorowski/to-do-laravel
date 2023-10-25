<?php 

declare(strict_types=1);

namespace App\Http\Controllers\Item;

use App\Exceptions\InvalidArgumentsException;
use App\Exceptions\UnknownProperties;
use App\Http\Controllers\Controller;
use App\Repositories\ItemRepository;
use App\Request\UpdateItemRequest;
use App\Services\Item\UpdateItemHandler;
use Illuminate\Http\Response;
use Illuminate\Support\ItemNotFoundException;
use Throwable;

class UpdateItemController extends Controller {

    public function __construct(
        private readonly ItemRepository $itemRepository
    )
    {        
    }

    public function __invoke(
        UpdateItemRequest $request,
        int $id,
        UpdateItemHandler $updateItemHandler
        
    ){        
        try{
            $dto = $request->toDto($id);
            ($updateItemHandler)($dto);
        }catch(UnknownProperties|InvalidArgumentsException $exception){
            return response()->json(['message' => $exception->getMessage()], 400);
        }catch(ItemNotFoundException $exception){
            return response()->json(['message' => $exception->getMessage()], 404);
        }catch (Throwable $exception) {
            return response()->json(['message' => $exception->getMessage()], 500);
        }
        return response('', Response::HTTP_OK);
    }
}