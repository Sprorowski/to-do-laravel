<?php 

namespace App\Services\Item;

use App\DataTransferObjects\Request\UpdateItemRequestData;
use App\Repositories\ItemRepository;

class UpdateItemHandler {

    public function __construct(
        private readonly ItemRepository $itemRepository
    )
    {        
    }

    public function __invoke(UpdateItemRequestData $dto)
    {       
        $item = $this->itemRepository->findById($dto->id);
        $item->status = $dto->status;
        $item->save();
    }
}