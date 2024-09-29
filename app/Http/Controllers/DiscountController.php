<?php

namespace App\Http\Controllers;
use App\Models\Discount;
use Illuminate\Http\Request;

class DiscountController extends Controller
{

    public function index(){
        $discounts=Discount::all();
        return view('dashboard.discounts.index',compact('discounts'));
    }

    //show create form
    public function create(){
        return view('dashboard.discounts.create');
    }


    public function store(Request $request){
        $request->validate([
            'percent' => 'required|numeric|min:0|max:100',
            'status' => 'required|in:available,not available',
        ]);
        Discount::create([
                'percent'=>$request->percent,
                'status'=>$request->status
        ]);

        return redirect()->route('discount.index');
    }


    public function show(Discount $discount)
    {
        return view('dashboard.discounts.show', compact('discount'));
    }
    public function edit($id){
        $discount=Discount::findOrFail($id);
        return view('dashboard.discounts.edit',compact('discount'));
    }
    public function update(Request $request,$id)
    {
        $discount=Discount::findOrFail($id);
        $discount->update([
            'percent'=>$request->percent,
            'status'=>$request->status
        ]);
        return redirect()->route('discount.index');
    }

    public function destroy(Discount $discount)
    {
        $discount->delete();
        return redirect()->route('discount.index');
    }

}
