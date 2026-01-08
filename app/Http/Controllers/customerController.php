<?php

namespace App\Http\Controllers;

use App\Events\MakeUser;
use App\Mail\UserNotification;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class customerController extends Controller
{
    function index(Request $request){
        // $customers = Customer::all();
        $customers = Customer::paginate(5);
        // $customers = DB::table('customers')->get();
        $customers = Customer::when($request->search, function($query) use($request){
            return $query->whereAny(["name", "id", "email", "phone"], "LIKE", "%".$request->search."%");
        })->paginate(5);
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
        event(new MakeUser($customer));
        // Mail::to($request->email)->send(new UserNotification);
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
