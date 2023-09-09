<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Catagory;
use App\Models\Product;
use App\Models\Order;

class AdminController extends Controller
{
    public function view_catagory()
    {
        $data = Catagory::all();
        return view('admin.catagory', compact('data'));
    }

    public function add_catagory(Request $request)
    {
        $data = new Catagory();
        $data->catagory_name = $request->catagory;
        $data->save();
        return redirect()->back()->with('message', 'Category Added Successfully');
    }

    public function delete_catagory($id)
    {
        $data = Catagory::find($id);
        $data->delete();
        return redirect()->back();
    }

    public function view_product()
    {
        $categories = Catagory::all();
        return view('admin.product', compact('categories'));
    }

    public function add_product(Request $request)
    {
        $product = new Product();
        $product->code = $request->code;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->discount_price = $request->discount_price;
        $product->catagory_name = $request->category;
        

        $image = $request->image;
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $request->image->move('product', $imageName);
        $product->image = $imageName;

        $product->save();
        return redirect()->back()->with('message','Product Added Successfully');
    }

    public function show_product(){
        $product=Product::all();
        return view('admin.show_product',compact('product'));
    }

    public function delete_product($id){
        $product=product::find($id);
        $product->delete();
        return redirect()->back()->with('message','Product Deleted Successfully');
    }

    public function update_product($id){
        $product = Product::find($id);
        $categories = Catagory::all(); // Fetch categories to populate the dropdown
        return view('admin.update_product', compact('product', 'categories'));
    }

    public function update_product_confirm(Request $request, $id) {
        $product = Product::find($id);
        $product->code = $request->code;
        $product->name = $request->name;
        $image = $request->image;
        
        if ($image) {
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $request->image->move('product', $imageName);
            $product->image = $imageName;
        }
         
        $product->catagory_name = $request->category;
        $product->price = $request->price;
        $product->discount_price = $request->discount_price;
    
        $product->save(); // Save the changes to the product
    
        return redirect()->back();
    }

    public function order(){
        $order=order::all();

        return view('admin.order',compact('order'));
    }
    
    public function delivered($id){
        $order=order::find($id);
        $order->delivery_status="delivered";
        $order->payment_status='paid';
        $order->save();
        return redirect()->back();
    }
    
}
