<?php 

namespace Tests\Unit\Services\Item;

use App\DataTransferObjects\Request\UpdateItemRequestData;
use App\Models\Item;
use App\Repositories\ItemRepository;
use App\Services\Item\UpdateItemHandler;
use Mockery;
use Tests\TestCase;

class UpdateItemHandlerTest extends TestCase 
{

    private Mockery\MockInterface $repository;
    private UpdateItemHandler $updateItemHandler;

    protected function setUp(): void
    {        
        parent::setUp();

        $this->repository = $this->mock(ItemRepository::class);
        $this->updateItemHandler = app(UpdateItemHandler::class);
        
    }
    public function test_update_item_status()
    {       
        $item = Mockery::mock(Item::class);
        $this->repository->shouldReceive('findById')->once()->with(1)->andReturn($item);
        $item->shouldReceive('setAttribute')->once();
        $item->shouldReceive('save')->once();
        ($this->updateItemHandler)(new UpdateItemRequestData(1, 'done'));

    }
}