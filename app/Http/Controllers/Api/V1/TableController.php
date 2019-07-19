<?php

namespace App\Http\Controllers\Api\V1;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Model\Table;

use App\Http\Resources\Table as TableResource;
use App\Http\Resources\TableCollection;

class TableController extends Controller
{
    //

    public function list(Request $request){



        // $tables = Table::all();
        $tables =Table::where('guests', $request->table_for)->get();
        $tables = new TableCollection($tables);

        return response()->json([
            'success'   => true,
            'status'    => 200,
            'message'   => 'sucess',
            'data'      => $tables
        ]);
        
     


    }

    public function guests($id){
        $result = Table::where('id', $id)->first();
        return response()->json([
            'success'   => true,
            'status'    => 200,
            'message'   => 'success',
            'data'      => new TableResource($result)
        ]);
    }

    public function tableCapacity($count){
        $result = Table::where('guests', $count)->get();
        return response()->json([
            'success'   => true,
            'status'    => 200,
            'message'   => 'success',
            'data'      => $result
        ]);
    }

}
