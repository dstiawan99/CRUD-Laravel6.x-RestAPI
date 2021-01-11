<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Suplier;

class SuplierController extends Controller
{
    function get(){
        $data = Suplier::all();
        return response()->json(
            [
                "message"=>"success",
                "data"=>$data
            ]
        );
    }
    
    function getByID($id){
        $data = Suplier::where('id', $id)->get();
        return response()->json(
            [
                "message"=>"success",
                "data"=>$data
            ]
        );
    }


    function post(Request $request){

        $suplier = new Suplier;
        $suplier->name = $request->name;
        $suplier->address = $request->address;
        $suplier->telphone = $request->telphone;
        $suplier->email = $request->email;

        $suplier->save();

        return response()->json(
            [
                "message"=>"success",
                "data" => $suplier
            ]
        );
    }

    function put($id, Request $request){

        $suplier = Suplier::where('id', $id)->first();
        if ($suplier) {
            $suplier->name = $request->name ? $request->name :$suplier->name;
            $suplier->address = $request->address ? $request->address :$suplier->address;
            $suplier->telphone = $request->telphone ? $request->telphone :$suplier->telphone;
            $suplier->email = $request->email ? $request->email :$suplier->email;
            
            $suplier->save();

            return response()->json(
                [
                    "message"=>"Put Method Success ".$id ,
                    "data"=>$suplier
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
        $suplier = Suplier::where('id', $id)->first();
        if ($suplier) {
            $suplier->delete();
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
