<?php

namespace App\DataTransferObjects\Request;



class UpdateItemRequestData {
    
    public function __construct(        
        public readonly int $id,
        public readonly string $status,
    )
    {
        
    }

}
