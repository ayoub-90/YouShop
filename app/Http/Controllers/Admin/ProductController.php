<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }
    public function add()
    {
        $category = Category::all();
        return view('admin.products.add', compact('category'));
    }
    public function insert(Request $request)
    {
        $products = new Product();
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('upload/product', $filename);
            $products->image = $filename;
        }
        $products->cat_id = $request->input('cat_id');
        $products->name = $request->input('name');
        $products->slug = $request->input('slug');
        $products->small_description = $request->input('small_description');
        $products->description = $request->input('description');
        $products->originale_price = $request->input('originale_price');
        $products->selling_price = $request->input('selling_price');
        $products->taxss = $request->input('taxss');
        $products->qte = $request->input('qte');
        $products->status = $request->input('status') == TRUE ? '1' : '0';
        $products->trending = $request->input('trending') == TRUE ? '1' : '0';
        $products->meta_title = $request->input('meta_title');
        $products->meta_description = $request->input('meta_description');
        $products->meta_Keywords = $request->input('meta_keywords');
        $products->save();
        return redirect('/dashboard')->with('status', 'product added successfully');
    }
    public function edit($id)
    {
        $product = Product::find($id);
        return view('admin.products.edit', compact('product'));
    }
    public function update(Request $request, $id)
    {
        $products = Product::find($id);
        if ($request->hasFile('image')) {
            $path = 'public/upload/product/' . $products->image;
            if (File_exists($path)) {
                File::delete($path);
            }
            $file = $request->file('image');
            $ext = $file->getClientOriginalExtension();
            $filename = time() . '.' . $ext;
            $file->move('upload/product', $filename);
            $products->image = $filename;
        }
        $products->name = $request->input('name');
        $products->slug = $request->input('slug');
        $products->small_description = $request->input('small_description');
        $products->description = $request->input('description');
        $products->originale_price = $request->input('originale_price');
        $products->selling_price = $request->input('selling_price');
        $products->qte = $request->input('qte');
        $products->taxss = $request->input('taxss');
        $products->status = $request->input('status') == TRUE ? '1' : '0';
        $products->trending = $request->input('trending') == TRUE ? '1' : '0';
        $products->meta_title = $request->input('meta_title');
        $products->meta_Keywords = $request->input('meta_Keywords');
        $products->meta_description = $request->input('meta_description');
        $products->update();
        return redirect('dashboard')->with('status', 'product updated successfully');
    }
    public function destroy($id)
    {
        $products = Product::find($id);
        if ($products->image) {
            $path = 'upload/product/' . $products->image;
            if (File::exists($path)) {
                File::delete($path);
            }
        }
        $products->delete();
        return redirect('Products')->with('status', 'Category deleted successfully');
    }
}
