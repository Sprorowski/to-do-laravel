<?php

namespace App\Console\Commands;

use App\Jobs\ToDoneItem;
use App\Models\Item;
use App\Repositories\ItemRepository;
use Illuminate\Console\Command;

class UpdatingToDoListToDone extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:updating-to-do-list-to-done';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command that update the status of all to-do items from “pending” to “done”.';

    /**
     * Execute the console command.
     */
    public function handle( ItemRepository $itemRepository )
    {
        $this->info('Start Command.', 'v');
        $items = $itemRepository->getAllItemsNotDone();
        $this->info('Items not done found: ' . $items->count(), 'vv');
        foreach($items as $item) {            
            $this->info('Item: ' . $items, 'vvv');
            dispatch(new ToDoneItem($item));
        }
        $this->info('End Command.', 'v');
        return Command::SUCCESS;
    }
}
