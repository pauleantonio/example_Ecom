<?php

namespace App\Http\Controllers;

use App\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $data= Product::paginate(10);
        return view('product.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {    


        
        $data=request()->validate([
            'prod_name'=>'required',
            'prod_description'=>'required',
            'prod_price'=>'required',
             

        ]);
        $data['date']=Carbon::now();    

        $product=Product::create($data);
        return redirect(route('productShow',$product))->with('success','Successful Creation');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('product.show',compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {   
        $data=Product::find($product->id);
        
        return view('product.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {   
        
        $product->update(request()->validate([
            'prod_name'=>'required',
            'prod_description'=>'required',
            'prod_price'=>'required',
            'date'=>'required'
         

        ]));
            
            
        return redirect(route('productShow',$product))->with('success','Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {   
      
        Product::find($product->id)->delete();
       
        return redirect(route('productIndex'))->with('success','Successfully Deleted');
    }
}
