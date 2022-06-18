<?php

namespace App\Http\Controllers;


use App\Product;
use App\Image;
use App\Http\Requests\ProductRequest;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products=Product::all()->sortBy('id');
        return view('admin.products.index',compact('products'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.products.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        if($request->file('image')!=""){
            $product=Product::create([
                'title'=> $request->get('title'),
                'image_path'=> $request->get('title'),
                'description'=> $request->get('description'),
                'price'=> $request->get('price'),
                'stock'=> $request->get('stock'),
                'status'=> $request->get('status'),
        ]);
            foreach( $request->file('image') as $image){
                $imagePath=$request->get('title');
                $name =Str::random(5).'_'.$imagePath.'.'.$image->getClientOriginalExtension();
                $image->move("uploads/product-img/", $name);
                Image::create([
                    'path' => $name,
                    'products_id'=>$product->id
                ]);
            }
        }
        else{
            return redirect()->back()
            ->with(['warning'=>"You must have image or images"]);

        }
        return redirect()->back()
        ->with(['success'=>"New product with Id:$product->id was created"]);
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product=Product::find($id);
        return view('admin.products.show',compact('product'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $product=Product::find($id);
        return view('admin.products.edit',compact('product'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        $product = Product::find($id);
        if($request['image'] ==''){
            $name=$product->image;
        }
        else{
            foreach( $request->file('image') as $image){
                $imagePath=$request->get('title');
                $name =Str::random(5).'_'.$imagePath.'.'.$image->getClientOriginalExtension();
                $image->move("uploads/product-img/", $name);
                Image::create([
                    'path' => $name,
                    'products_id'=>$product->id
                ]);
            }
        }
        Product::findOrFail($id)->update([
            'title'=> $request->get('title'),
            'description'=> $request->get('description'),
            'price'=> $request->get('price'),
            'stock'=> $request->get('stock'),
            'status'=> $request->get('status')
        ]);
        return redirect()->back()
        ->with(['success'=>"Product with Id:$id was updated"]);
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $product=Product::findOrFail($id);
        foreach($product->images as $image){
          File::delete("uploads/product-img/".$image->path);
        }
        $product->images()->delete();
        $product->delete();
        return redirect()->back()
        ->with(['danger'=>"Product with   Id: $product->id   and   Title: $product->title  and ...   was deleted"]);
    }
    public function destroyImage($id)
    {
        $image=Image::find($id);
        file::delete("uploads/product-img/".$image->path);
        $image->delete();
        return redirect()->back()
        ->with(['danger'=>"Product with   Id: $image->id   and   was deleted"]);
    }
}
