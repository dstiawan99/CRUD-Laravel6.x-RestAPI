<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Store;

class StoreController extends Controller
{
    function get(){
        $data = Store::all();
        return response()->json(
            [
                "message"=>"success",
                "data"=>$data
            ]
        );
    }
    
    function getByID($id){
        $data = Store::where('id', $id)->get();
        return response()->json(
            [
                "message"=>"success",
                "data"=>$data
            ]
        );
    }


    function post(Request $request){

        $store = new Store;
        $store->name = $request->name;
        $store->name_store = $request->name_store;
        $store->address = $request->address;
        $store->telphone = $request->telphone;

        $store->save();

        return response()->json(
            [
                "message"=>"success",
                "data" => $store
            ]
        );
    }

    function put($id, Request $request){

        $store = Store::where('id', $id)->first();
        if ($store) {
            $store->name = $request->name ? $request->name :$store->name;
            $store->name_store = $request->name_store ? $request->name_store :$store->name_store;
            $store->address = $request->address ? $request->address :$store->address;
            $store->telphone = $request->telphone ? $request->telphone :$store->telphone;
            
            $store->save();

            return response()->json(
                [
                    "message"=>"Put Method Success ".$id ,
                    "data"=>$store
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
        $store = Store::where('id', $id)->first();
        if ($store) {
            $store->delete();
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
