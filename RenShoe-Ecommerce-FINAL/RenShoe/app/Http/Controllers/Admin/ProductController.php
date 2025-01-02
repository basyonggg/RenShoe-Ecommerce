<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Str;
use App\Models\Product;
use Inertia\Inertia;
use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\ProductImage;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {

        $products = Product::with('category', 'brand', 'product_images')->get();
        $brands = Brand::get();
        $categories = Category::get();

        return Inertia::render(
             'Admin/Product/index', 
            [
                'products' => $products, 
                'brands' => $brands, 
                'categories' => $categories
            ]
        );

    }

    public function store(Request $request){

        

        $product = new Product;
        $product->product_name = $request->product_name;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->description = $request->description;
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;
        $product->save();

        //uploading of images of the product

        if($request->hasFile('product_images')) {
            
            $productImages = $request->file('product_images');
            foreach($productImages as $image) {
                
                //Generate unique name for image using timstamp and random string
                $uniqueName = time() . '-' . Str::random(10) . '.' . $image->getClientOriginalExtension();

                //Store image in public folder with unique name
                $image->move('product_images', $uniqueName);

                //Create new product image record with the product_id and unique name
                ProductImage::create([
                    'product_id'=>$product->id,
                    'image'=>'product_images/' . $uniqueName,
                ]);

            }
        }
        return redirect()->route('admin.products.index')->with('success', 'Product created successfully.');

    }

    //update
    public function update(Request $request, $id){
        $product = Product::findOrFail($id);
        $product->product_name = $request->product_name;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->description = $request->description;
        $product->category_id = $request->category_id;
        $product->brand_id = $request->brand_id;


        //check if product images were uploaded
        if($request->hasFile('product_images')){
            $productImages = $request->file('product_images');
            //loop through each uploaded image
            foreach($productImages as $image) {
                
                //Generate unique name for image using timstamp and random string
                $uniqueName = time() . '-' . Str::random(10) . '.' . $image->getClientOriginalExtension();

                //Store image in public folder with unique name
                $image->move('product_images', $uniqueName);

                //Create new product image record with the product_id and unique name
                ProductImage::create([
                    'product_id'=>$product->id,
                    'image'=>'product_images/' . $uniqueName,
                ]);

            }
        }
        $product->update();
        return redirect()->back()->with('success', 'Product updated successfully!');
    }

    public function deleteImage($id) {
        $image = ProductImage::where('id',$id)->delete();
        return redirect()->route('admin.products.index')->with('success', 'Image deleted successfully!');
    }

    public function destroy($id){
        $product = Product::findOrFail($id)->delete();
        return redirect()->route('admin.products.index')->with('success', 'Product deleted successfully!');
    }
}


