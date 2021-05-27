<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use http\Params;
use Illuminate\Http\Request;
use App\Models\product;
use Illuminate\Support\Facades\DB;
use Validator;
class ProductController extends Controller
{

    public function index()
    {
       // return product::all();
        $product = product::paginate(4);
        return $product;

    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator=Validator::make(
            $request->all(),
            [
                "name"=>["required"],
                "image"=>["required"],
                "category"=>["required"],
                "price"=>["required"],
            ]
        );
        if($validator->fails()){
            return [
                "status"=>false,
                "errors"=>$validator->messages()
            ];
        }
        $product=product::create([
            "name"=>$request->name,
            "image"=>$request->image,
            "category"=>$request->category,
            "price"=>$request->price
        ]);
        return [
            "status"=>true,
            "product"=>$product
        ];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        $product=product::find($id);
        if(!$product){
            return response()->json([
                "status"=>false,
                "message"=>"product not found"
            ])->setStatusCode(404);
        }
        return $product;
    }
    public function getring()
    {
       $product=Product::where('category','ring')->paginate(4);
       // $product=Product::paginate(4);
        return $product;
    }
    public function getpendant()
    {
        $product=Product::where('category','pendant')->paginate(4);
        return $product;
    }
    public function getbracelet()
    {
//        $this->category="bracelet";
//        $product = DB::table('products')->where('category',$this->category)->get();
        $product=Product::where('category','bracelet')->paginate(4);
        return $product;
    }
}
