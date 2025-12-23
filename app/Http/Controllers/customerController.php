<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class customerController extends Controller
{
    function index(){
        // $customers = Customer::all();
        $customers = Customer::paginate(5);
        // $customers = DB::table('customers')->get();
        // echo '<pre>';
        // print_r($customers);
        // echo '</pre>';
        return view("customer.index", compact('customers'));
    }

    function create(){
        return view("customer.create");
    }

    function save(Request $request){
        // print_r($request->all());
        $request->validate([
            'name'=>'required|min:4',
            'email'=>'email|unique:customers,email'
        ],
        [
            'name.required'=> 'Please give your name.'
        ]
       );

       $img= "";
       $imgname = "";
       if ($request->hasFile('photo')) {
        $imgname = $request->name.".".$request->file("photo")->extension();
        $request->file("photo")->storeAs("photo/customer", $imgname, "public");
       }

        $customer = new Customer();
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->photo = $imgname;
        $customer->address = $request->address;
        $customer->save();
        return redirect('customer');
    }
    function find($id){
        return "Customer id is $id";
    }
    function edit($id){
        $customer = Customer::find($id);
        return view("customer.edit", compact("customer"));
    }
    function update(Request $request, $id){
        // print_r($request->all());
        $customer = Customer::find($id);
        $customer->name = $request->name;
        $customer->email = $request->email;
        $customer->phone = $request->phone;
        $customer->address = $request->address;
        $customer->update();
        return redirect('customer');
    }

    function delete ($id) {
        $customer = Customer::find($id);
        $customer-> delete();
        return redirect("customer");
        // print_r($customer);
    }

}
