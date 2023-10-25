<?php

namespace Tests\Unit\Services\Item;

// use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Models\Item;
use App\Repositories\ItemRepository;
use App\Services\Item\GetAllToDoItemsHandler;
use Mockery;
use Tests\TestCase;

class GetAllToDoItemsHandlerTest extends TestCase
{    
    
    private Mockery\MockInterface $repository;
    private GetAllToDoItemsHandler $getAllToDoItemsHandler;

    protected function setUp(): void
    {        
        parent::setUp();

        $this->repository = $this->mock(ItemRepository::class);
        $this->getAllToDoItemsHandler = app(GetAllToDoItemsHandler::class);
        
    }

    public function test_should_call_paginate(): void
    {
        $this->repository->shouldReceive('getAllPaginated')->once();
       ($this->getAllToDoItemsHandler)();

    }
}
