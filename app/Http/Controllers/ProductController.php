<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    function get(){
        $data = Product::all();
        return response()->json(
            [
                "message"=>"success",
                "data"=>$data
            ]
        );
    }
    
    function getByID($id){
        $data = Product::where('id', $id)->get();
        return response()->json(
            [
                "message"=>"success",
                "data"=>$data
            ]
        );
    }


    function post(Request $request){

        $product = new Product;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->description = $request->description;

        $product->save();

        return response()->json(
            [
                "message"=>"success",
                "data" => $product
            ]
        );
    }

    function put($id, Request $request){

        $product = Product::where('id', $id)->first();
        if ($product) {
            $product->name = $request->name ? $request->name :$product->name;
            $product->price = $request->price ? $request->price :$product->price;
            $product->quantity = $request->quantity ? $request->quantity :$product->quantity;
            $product->description = $request->description ? $request->description :$product->description;
            
            $product->save();

            return response()->json(
                [
                    "message"=>"Put Method Success". $id,
                    "data"=>$product
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
        $product = Product::where('id', $id)->first();
        if ($product) {
            $product->delete();
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
