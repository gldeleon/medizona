<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\ResponseController as RC;
use App\Models\Items;

class ItemsController extends RC
{
    public function read(){        
        $items = Items::all();
        return $this->sendResponse($items, "ok", 200);
    }
}
