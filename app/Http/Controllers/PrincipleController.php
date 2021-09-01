<?php

namespace App\Http\Controllers;

use App\Principle;
use Illuminate\Http\Request;

class PrincipleController extends Controller
{
    public function getPrinciple(){
        return response()->json(Principle::all(), 200);
    }

    public function getPrincipleById($id){
        $principle = Principle::find($id);
        if(is_null($principle)){
            return response()->json(['message' => 'Principle Not Found'], 404);
        }
        return response()->json($principle::find($id), 200);
    }
    
    public function insertPrinciple(Request $request){
        $principle = Principle::create([
            'alias' => $request->input('alias'),
            'description' => $request->input('description')
        ]);
        return response($principle, 201);
    }


    public function updatePrinciple(Request $request, $id){
        $principle = Principle::find($id);
        $principle->update([
            'alias' => $request->input('alias'),
            'description' => $request->input('description')
        ]);
        return response($principle, 201);
    }

    public function deletePrinciple(Request $request, $id){
        $principle = Principle::find($id);
        $principle->delete();

        return response($principle, 204);
    }
}