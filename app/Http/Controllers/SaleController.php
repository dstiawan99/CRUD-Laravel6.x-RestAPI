<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sale;

class SaleController extends Controller
{
    function get(){
        $data = Sale::all();
        return response()->json(
            [
                "message"=>"success",
                "data"=>$data
            ]
        );
    }
    
    function getByID($id){
        $data = Sale::where('id', $id)->get();
        return response()->json(
            [
                "message"=>"success",
                "data"=>$data
            ]
        );
    }


    function post(Request $request){

        $sale = new Sale;
        $sale->name = $request->name;
        $sale->genre = $request->genre;
        $sale->address = $request->address;
        $sale->telphone = $request->telphone;
        $sale->email = $request->email;

        $sale->save();

        return response()->json(
            [
                "message"=>"success",
                "data" => $sale
            ]
        );
    }

    function put($id, Request $request){

        $sale = Sale::where('id', $id)->first();
        if ($sale) {
            $sale->name = $request->name ? $request->name :$sale->name;
            $sale->genre = $request->genre ? $request->genre :$sale->genre;
            $sale->address = $request->address ? $request->address :$sale->address;
            $sale->telphone = $request->telphone ? $request->telphone :$sale->telphone;
            $sale->email = $request->email ? $request->email :$sale->email;
            
            $sale->save();

            return response()->json(
                [
                    "message"=>"Put Method Success". $id,
                    "data"=>$sale
                ]
            );
        }
        return response()->json(
            [
                "message"=>"Item with ID ". $id." Not Found"
            ],
            400
        );
    }

    function delete($id){
        $sale = Sale::where('id', $id)->first();
        if ($sale) {
            $sale->delete();
            return response()->json(
                [
                    "message"=>"Delete Method on ". $id." success"
                ]
            );
        }
        return response()->json(
            [
                "message"=>"Item with ID ". $id." Not Found"
            ],
            400
        );
    }
}
