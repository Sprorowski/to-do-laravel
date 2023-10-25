<?php 

namespace App\Services\Item;

use App\Repositories\ItemRepository;

class GetAllToDoItemsHandler {

    public function __construct(
        private readonly ItemRepository $itemRepository
    )
    {        
    }

    public function __invoke(){        
        return $this->itemRepository->getAllPaginated();
    }
}