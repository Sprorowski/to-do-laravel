<?php  

namespace App\Models;

use App\Enums\ItemStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model {

    use HasFactory;

    protected $fillable = [
        'name',
        'status',
        'description',
    ];

    public function done(){
        $this->status = ItemStatusEnum::DONE;
    }
}