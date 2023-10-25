<?php

namespace Tests\Feature\Console\Command;

use App\Models\Item;
use Illuminate\Console\Command;
use Tests\TestCase;

class UpdatingToDoListToDoneTest extends TestCase {

    protected function setUp(): void
    {
        parent::setUp();
        Item::factory()->count(10)->create();
        
    }

    public function test_should_return_successful_with_the_correct_amount(): void
    {
        $count = Item::where('status', '<>', 'done')->count();
        $this->artisan('app:updating-to-do-list-to-done -vv')
            ->expectsOutput('Items not done found: '. $count)
            ->assertExitCode(Command::SUCCESS);
    }
}