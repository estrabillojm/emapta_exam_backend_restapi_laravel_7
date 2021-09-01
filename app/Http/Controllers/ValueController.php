<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Value;

class ValueController extends Controller
{
    public function getValue(){
        return response()->json(Value::all(), 200);
    }

    public function getValueById($id){
        $value = Value::find($id);
        if(is_null($value)){
            return response()->json(['message' => 'Value Not Found'], 404);
        }
        return response()->json($value::find($id), 200);
    }



    public function insertValue(Request $request){
        $value = Value::create([
            'alias' => $request->input('alias'),
            'description' => $request->input('description')
        ]);
        return response($value, 201);
    }


    public function updateValue(Request $request, $id){
        $value = Value::find($id);
        $value->update([
            'alias' => $request->input('alias'),
            'description' => $request->input('description')
        ]);
        return response($value, 201);
    }

    public function deleteValue(Request $request, $id){
        $value = Value::find($id);
        $value->delete();

        return response($value, 204);
    }
}
