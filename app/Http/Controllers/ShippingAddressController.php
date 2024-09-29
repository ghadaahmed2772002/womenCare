<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ShippingAddress;
use App\Models\User;

class ShippingAddressController extends Controller
{
    public function index(){
        $addresses = ShippingAddress::with('users')->get();
        return view('dashboard.shipping_addresses.index', compact('addresses'));
    }
    public function create(){
        $users=User::all();
        return view('dashboard.shipping_addresses.create',compact('users'));
    }
    public function store(Request $request){
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'address_line_1' => 'required|string',
            'address_line_2' => 'nullable|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'country' => 'required|string',
            'postal_code' => 'required|string|max:10',
        ]);
        ShippingAddress::create($request->all());
        return redirect()->route('shipping_addresses.index');
    }


    public function show($id)
    {
        $address = ShippingAddress::findOrFail($id);
        return view('dashboard.shipping_addresses.show', compact('address'));
    }

    public function edit($id)
    {
        $address = ShippingAddress::findOrFail($id);
        $users = User::all();
        return view('dashboard.shipping_addresses.edit', compact('address', 'users'));
    }
    public function update(Request $request, $id)
    {
        $address = ShippingAddress::findOrFail($id);

        $request->validate([
            'user_id' => 'required|exists:users,id',
            'address_line_1' => 'required|string',
            'address_line_2' => 'nullable|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'country' => 'required|string',
            'postal_code' => 'required|string|max:10',
        ]);

        $address->update($request->all());

        return redirect()->route('shipping_addresses.index');
    }

    public function destroy($id)
    {
        $address = ShippingAddress::findOrFail($id);
        $address->delete();

        return redirect()->route('shipping_addresses.index');
    }
}
