<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customer= Customer::all();
        return $customer;

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $customer=$request->validate([
            'name'=>'required|min:4',
            'email'=>'email|unique:customers,email',
            'phone'=>'required'
        ],
        [
            'name.required'=> 'Please give your name.'
        ]
       );

       Customer::create($customer);
    }

    /**
     * Display the specified resource.
     */
    public function show(Customer $customer)
    {
        return response()->json($customer);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
