<?php

namespace App\Http\Model\Common;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function getAllActiveCategory()
    {
        return $this->select('id', 'name')
                    ->where('status', 1)
                    ->get();
    }
            
}
