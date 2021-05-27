<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
class EditDeleteDataController extends Controller
{
    public function EditDataInDb(){
        $products=Product::all();
        return view('EditDataInDb')->with(['products' => $products]);
    }

    public function deletedata($id)
    {
        Product::where('id',$id)->delete();
        $products=Product::all();
        return view('EditDataInDb')->with(['products' => $products]);
    }
    public function editdata($id)
    {
        $editProduct=Product::where('id',$id)->get();
        return view('EditDataOneProduct')->with(['editProduct' => $editProduct]);
    }
}
