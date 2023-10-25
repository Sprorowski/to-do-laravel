<?php 

namespace App\Request;

use App\DataTransferObjects\Request\UpdateItemRequestData;
use App\Enums\ItemStatusEnum;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateItemRequest extends FormRequest{

    /**
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'status' => ['required', Rule::in(ItemStatusEnum::getValues())],
        ];
    }


    /**
     * @throws UnknownProperties
     */
    public function toDto(int $id): UpdateItemRequestData
    {
        return new UpdateItemRequestData(
            ...$this->safe()->all(),
            id: $id
            );
    }


}