<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\CategoryChild;

class CategoryChildController extends Controller
{

    public function index()
    {
        $categoryChildren = CategoryChild::with('category')->get();
        return view('dashboard.category_childs.index', compact('categoryChildren'));
    }
    public function create()
    {
        $categories = Category::all();
        return view('dashboard.category_childs.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable|string',
        ]);

        CategoryChild::create([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'description' => $request->description,
        ]);

        return redirect()->route('category_childs.index');
    }


    public function edit($id)
    {
        $categoryChild = CategoryChild::findOrFail($id);
        $categories = Category::all();
        return view('dashboard.category_childs.edit', compact('categoryChild', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $categoryChild = CategoryChild::findOrFail($id);

        $request->validate([
            'name' => 'required|string',
            'category_id' => 'required|exists:categories,id',
            'description' => 'nullable|string',
        ]);

        $categoryChild->update([
            'name' => $request->name,
            'category_id' => $request->category_id,
            'description' => $request->description,
        ]);

        return redirect()->route('category_childs.index');
    }


    public function show($id)
    {
        $categoryChild = CategoryChild::findOrFail($id);
        return view('dashboard.category_childs.show', compact('categoryChild'));
    }

    public function destroy($id)
    {
        $categoryChild = CategoryChild::findOrFail($id);
        $categoryChild->delete();

        return redirect()->route('category_childs.index');
    }

}
