<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\Subcategory;
use App\Category;
class FrontProductController extends Controller
{
    //
    public function index(){
        $products = Product::latest()->limit(9)->get();
        $randomActiveProducts = Product::inRandomOrder()->limit(3)->get();
        $randomActiveProductsIds=[];
        foreach($randomActiveProducts as $product){
            array_push($randomActiveProductsIds,$product->id);
        }
        $randomItemProducts = Product::whereNotIn('id',$randomActiveProductsIds)->limit(3)->get();

        return view('product',compact('products','randomActiveProducts','randomItemProducts'));
    }
    public function show($id){
        $product = Product::find($id);
        $productFromSameCategories = Product::inRandomOrder()
        ->where('category_id',$product->category_id)
        ->where('id','!=',$product->id)
        ->limit(3)
        ->get();
        return view('show',compact('product','productFromSameCategories'));
    }
    public function allProduct($name,Request $request){

        $category  = Category::where('slug',$name)->first();
        $categoryId = $category->id;

        if($request->subcategory){
            $products = $this->filterProducts($request);
            //$filterSubCategories = $this->getSubcategoriesId($request);
        }elseif($request->min||$request->max){
            $products = $this->filterByPrice($request);

        }else{
            $products = Product::where('category_id',$category->id)->get();
        }
            $subcategories = Subcategory::where('category_id',$category->id)->get();
            $slug = $name;

        return view('category',compact('categoryId','products','subcategories','slug'));
    }

    public function filterProducts(Request $request){
        $subId =[];
        $subcategory = Subcategory::whereIn('id',$request->subcategory)->get();
        foreach($subcategory as $sub){
            array_push($subId, $sub->id);
        }
        $products = Product::whereIn('subcategory_id',$subId)->get();
        return $products;

    }
    public function getSubcategoriesId(Request $request){
        $subId =[];
        $subcategory = Subcategory::whereIn('id',$request->subcategory)->get();
        foreach($subcategory as $sub){
            array_push($subId, $sub->id);
        }

        return $subId;

    }
    public function filterByPrice(Request $request){
        $categoryId = $request->categoryId;
        $product = Product::whereBetween('price',[$request->min,$request->max ])->where('category_id',$categoryId)->get();
        return $product;
    }
}
