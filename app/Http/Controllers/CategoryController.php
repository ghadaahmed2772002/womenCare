<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Traits\UploadeImageTrait;

class CategoryController extends Controller
{
    use UploadeImageTrait;
    public function index(){
        $categories=Category::all();
        return view('dashboard.categories.index',compact('categories'));
    }
    public function create(){
        return view('dashboard.categories.create');
    }
    public function store(Request $request){
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'photo' => 'nullable|image|max:2048',
        ]);
        $imagePath = $this->uploade_image($request, 'photo', 'categories');
        Category::create([
            'name'=>$request->name,
            'description'=>$request->description,
            'photo'=>$imagePath
        ]);
        return redirect()->route('category.index');

    }
    // disply edit-form
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('dashboard.categories.edit', compact('category'));
    }
    // edit form
    public function update(Request $request,  $id)
    {
        $category = Category::findOrFail($id);
        $old_path=$category->photo;
        $imagePath=$this->uploade_image($request, 'photo', 'categories', $old_path);
        $updateData = [
            'name' => $request->name,
            'description' => $request->description,
            'photo' => $old_path,
        ];

        if ($imagePath) {
            $updateData['photo'] = $imagePath;
        }
        $category->update($updateData);
        return redirect()->route('category.index');
    }

    // display one category
    public function show(Category $category)
    {
        return view('dashboard.categories.show', compact('category'));
    }

    //delete category
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('category.index');
    }

}
