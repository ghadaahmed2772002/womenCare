<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\CategoryChild;
use App\Models\Company;
use App\Models\Discount;
use App\Models\Category;
use App\Traits\UploadeImageTrait;
use GuzzleHttp\Handler\Proxy;

class ProductController extends Controller
{
    use UploadeImageTrait;

    public function index()
    {
        $products = Product::with(['categoryChild', 'discount', 'company'])->get();
        return view('dashboard.products.index', compact('products'));
    }

    public function create()
    {
        $discounts = Discount::all();
        $companies = Company::all();
        $categories = Category::all();
        $categoryChildren = CategoryChild::all();
        return view('dashboard.products.create', compact('categories','categoryChildren', 'discounts', 'companies'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_child_id' => 'required|exists:category_children,id',
            'name' => 'required|string',
            'price' => 'required|numeric',
            'photo' => 'nullable|image',
            'quantity_in_stock' => 'required|integer',
            'discount_id' => 'nullable|exists:discounts,id',
            'status' => 'required|in:available,not available',
            'company_id' => 'required|exists:companies,id',
        ]);


        $categoryChild = CategoryChild::findOrFail($request->category_child_id);
        $category = $categoryChild->category;
        $path = 'products/' . $category->name . '/' . $categoryChild->name;
        $imagePath = $this->uploade_image($request, 'photo', $path);

        Product::create([
            'category_child_id' => $request->category_child_id,
            'name' => $request->name,
            'price' => $request->price,
            'photo' => $imagePath,
            'quantity_in_stock' => $request->quantity_in_stock,
            'discount_id' => $request->discount_id,
            'status' => $request->status,
            'company_id' => $request->company_id,
        ]);

        return redirect()->route('products.index');
    }

    public function show($id)
    {
        $product = Product::with(['categoryChild', 'discount', 'company'])->findOrFail($id);
        return view('dashboard.products.show', compact('product'));
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categoryChildren = CategoryChild::all();
        $discounts = Discount::all();
        $companies = Company::all();
        $categories = Category::all();
        return view('dashboard.products.edit', compact('categories','product', 'categoryChildren', 'discounts', 'companies'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'category_child_id' => 'required|exists:category_children,id',
            'name' => 'required|string',
            'price' => 'required|numeric',
            'photo' => 'nullable|image',
            'quantity_in_stock' => 'required|integer',
            'discount_id' => 'nullable|exists:discounts,id',
            'status' => 'required|in:available,not available',
            'company_id' => 'required|exists:companies,id',
        ]);

        $product = Product::findOrFail($id);
        $oldPath = $product->photo;
        if ($request->hasFile('photo')) {
            $categoryChild = CategoryChild::findOrFail($request->category_child_id);
            $category = $categoryChild->category;
            $path = 'products/' . $category->name . '/' . $categoryChild->name;
            $imagePath = $this->uploadImage($request, 'photo', $path);
        } else {
            $imagePath = $oldPath;
        }

        $product->update([
            'category_child_id' => $request->category_child_id,
            'name' => $request->name,
            'price' => $request->price,
            'photo' => $imagePath ?? $oldPath,
            'quantity_in_stock' => $request->quantity_in_stock,
            'discount_id' => $request->discount_id,
            'status' => $request->status,
            'company_id' => $request->company_id,
        ]);

        return redirect()->route('products.index');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->route('products.index');
    }
}
