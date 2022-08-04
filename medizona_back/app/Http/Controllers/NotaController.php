<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\ResponseController as RC;
use App\Models\Note;

class NotaController extends RC
{
    public function create(Request $request){
        if (empty($request->get('customer_id')) || empty($request->get('date')) || empty($request->total)) {
            return $this->sendError('error', 'Debes llenar todos los campos');
        }
        $nota = new Note();
        $nota->customer_id = $request->get('customer_id');
        $nota->date = $request->get('date');
        $nota->total = $request->get('total');
        $save = $nota->save();

        return $this->sendResponse($save, "ok", 200);
    }

    public function read($id){
        if(empty($id)){
            return $this->sendError('error', 'Debes llenar todos los campos');
        }
        $note = Note::where("id", "=", $id)->get();
        return $this->sendResponse($note, "ok", 200);
    }

    public function update($id, Request $request){
        if(empty($id) && empty($request)){
            return $this->sendError('error', 'Debes llenar todos los campos');
        }
        $nota = Note::where("id","=",$id)->update(["customer_id" => $request->get("customer_id"),"date" => $request->get("date"), "total" => $request->get("total")]);
        return $this->sendResponse($nota, "ok", 200);
    }
}
