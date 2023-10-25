<?php

namespace App\Repositories;

use App\Enums\ItemStatusEnum;
use App\Models\Item;
use Exception;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\ItemNotFoundException;

class ItemRepository
{
    public function __construct(
        private Item $model
    ) {
    }

    public function getAllItemsNotDone(): Collection{
        return $this->model->all()->where('status',"<>", ItemStatusEnum::DONE);
    }
    public function getAllPaginated(): LengthAwarePaginator {
        return $this->model->paginate();
    }


    public function findById(int $id) : Item {
        try{
            return $this->model->findOrFail($id); 
        }catch(ModelNotFoundException){
            throw new ItemNotFoundException();
        }
    }
}
