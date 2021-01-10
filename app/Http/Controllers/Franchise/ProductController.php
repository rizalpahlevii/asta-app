<?php

namespace App\Http\Controllers\Franchise;

use App\Helpers\Flashdata;
use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductMaterial;
use App\Models\RawMaterial;
use Illuminate\Http\Request;
use File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::with('category')->whereFranchise(auth()->user()->franchise->id)->get();
        return view('pages.franchise.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::whereFranchise(auth()->user()->franchise->id)->get();
        $materials = RawMaterial::whereFranchise(auth()->user()->franchise->id)->get();
        return view('pages.franchise.product.create', compact('categories', 'materials'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'price' => 'required',
            'discount' => 'required',
            'material_id1' => 'required',
            'material_id2' => 'required',
            'image' => 'required|mimes:jpg,jpeg,png',
            'information' => 'required',
        ]);
        $imageName = time() . auth()->user()->franchise->id . '.' .  $request->image->extension();
        $request->image->move(public_path('images'), $imageName);
        $product = new Product();
        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->price = $request->price;
        $product->discount = $request->discount;
        $product->final_price = $request->price - $request->discount;
        $product->franchise_id = auth()->user()->franchise->id;
        $product->image = $imageName;
        $product->information = $request->information;
        $product->save();

        $productMaterial1 = new ProductMaterial();
        $productMaterial1->product_id = $product->id;
        $productMaterial1->raw_material_id = $request->material_id1;
        $productMaterial1->save();

        $productMaterial2 = new ProductMaterial();
        $productMaterial2->product_id = $product->id;
        $productMaterial2->raw_material_id = $request->material_id2;
        $productMaterial2->save();

        Flashdata::success_alert("Success to create product");
        return redirect(route('franchise.product.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categories = Category::whereFranchise(auth()->user()->franchise->id)->get();
        $materials = RawMaterial::whereFranchise(auth()->user()->franchise->id)->get();
        $product = Product::with('category')->findOrFail($id);
        $productMaterials = ProductMaterial::with('product', 'rawMaterial')->where('product_id', $product->id)->get()->toArray();
        return view('pages.franchise.product.edit', compact('categories', 'materials', 'product', 'productMaterials'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'name' => 'required',
            'category_id' => 'required',
            'price' => 'required',
            'discount' => 'required',
            'material_id1' => 'required',
            'material_id2' => 'required',
            'information' => 'required',
        ];
        if ($request->image) {
            $rules['image'] = 'required|mimes:jpg,jpeg,png';
        }
        $validated = $request->validate($rules);
        $product = Product::find($id);
        $product->name = $request->name;
        $product->category_id = $request->category_id;
        $product->price = $request->price;
        $product->discount = $request->discount;
        $product->final_price = $request->price - $request->discount;
        $product->franchise_id = auth()->user()->franchise->id;
        if ($request->image) {
            $oldImage = $product->image;
            $imageName = time() . auth()->user()->franchise->id . '.' .  $request->image->extension();
            $request->image->move(public_path('images'), $imageName);
            $product->image = $imageName;
            File::delete(public_path('images/') . $oldImage);
        }
        $product->information = $request->information;
        $product->save();

        $productMaterial1 =  ProductMaterial::find($request->raw_material_id1);
        $productMaterial1->raw_material_id = $request->material_id1;
        $productMaterial1->save();

        $productMaterial2 =  ProductMaterial::find($request->raw_material_id2);
        $productMaterial2->raw_material_id = $request->material_id2;
        $productMaterial2->save();

        Flashdata::success_alert("Success to update product");
        return redirect(route('franchise.product.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        File::delete(public_path('images/') . $product->image);
        $product->delete();
        Flashdata::success_alert("Success to delete category");
        return redirect(route('franchise.product.index'));
    }

    public function getMaterials()
    {
        return response()->json(RawMaterial::whereFranchise(auth()->user()->franchise->id)->get());
    }
}
