<?php

namespace Tests\Feature\Http\Api;

// use Illuminate\Foundation\Testing\RefreshDatabase;

use App\Models\Item;
use Tests\TestCase;

class UpdateItemRequestTest extends TestCase
{

    protected function setUp(): void
    {        
        parent::setUp();
        Item::factory()->create([
            'id' => 1
        ]);
    }
    public function test_update_item_returns_a_successful_response(): void
    {
        $response = $this->patch('api/item/1', ['status' =>  'done']);


        $response->dump();
        $response->assertStatus(200);

        $item = Item::find(1);
        $this->assertSame($item->status, 'done');
    }


    public function test_update_item_without_status_should_return_error(): void
    {
        $response = $this->patch('api/item/1', []);
        $response
            ->assertSessionHasErrors(
                ['status' => 'The status field is required.']
            );
    }

    
    public function test_update_item_with_wrong_status_should_return_error(): void
    {
        $response = $this->patch('api/item/1', [ 'status' => "FAIL"]);
        $response
            ->assertSessionHasErrors(
                ['status' => 'The selected status is invalid.']
            );
    }

    public function test_update_invalid_id_should_return_error(): void
    {
        $response = $this->patch('api/item/111', ['status' =>  'done']);
        $response->assertStatus(404);
    }
}
