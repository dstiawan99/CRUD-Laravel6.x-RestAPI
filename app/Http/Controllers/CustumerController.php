<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Custumer;

class CustumerController extends Controller
{
    function get(){
        $data = Custumer::all();
        return response()->json(
            [
                "message"=>"success",
                "data"=>$data
            ]
        );
    }
    
    function getByID($id){
        $data = Custumer::where('id', $id)->get();
        return response()->json(
            [
                "message"=>"success",
                "data"=>$data
            ]
        );
    }


    function post(Request $request){

        $custumer = new Custumer;
        $custumer->name = $request->name;
        $custumer->genre = $request->genre;
        $custumer->address = $request->address;
        $custumer->telphone = $request->telphone;
        $custumer->email = $request->email;

        $custumer->save();

        return response()->json(
            [
                "message"=>"success",
                "data" => $custumer
            ]
        );
    }

    function put($id, Request $request){

        $custumer = Custumer::where('id', $id)->first();
        if ($custumer) {
            $custumer->name = $request->name ? $request->name :$custumer->name;
            $custumer->genre = $request->genre ? $request->genre :$custumer->genre;
            $custumer->address = $request->address ? $request->address :$custumer->address;
            $custumer->telphone = $request->telphone ? $request->telphone :$custumer->telphone;
            $custumer->email = $request->email ? $request->email :$custumer->email;
            
            $custumer->save();

            return response()->json(
                [
                    "message"=>"Put Method Success". $id,
                    "data"=>$custumer
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
        $custumer = Custumer::where('id', $id)->first();
        if ($custumer) {
            $custumer->delete();
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
