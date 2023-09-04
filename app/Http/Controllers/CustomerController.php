<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return view('customer');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $url = url('/customer/');
        $title = 'Create customer';
        $data = compact('url','title');
        return view('customer')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'name'=>'required',
                'email'=>'required:email',
                'password'=>'required',
                'password_config'=> 'required|same:password'
            ]
                    );
            //         echo '<pre>';
            // print_r($request->all());
          $customer =  new Customer();
          $customer->name = $request['name'];
          $customer->email = $request['email'];
          $customer->password = md5($request['password']);
          $customer->city = $request['city'];
          $customer->state = $request['state'];
          $customer->address = $request['address'];
          $customer->save();
          return redirect('/customer/view');
    }
    public function view(){
        $customers = Customer::all();
       $data = compact('customers');
      
        return view('customer-view')->with($data);
    }
    public function trash(){
        $customers = Customer::onlyTrashed()->get();
       $data = compact('customers');
      
        return view('customer-trash')->with($data);
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
       $customer = Customer::find($id);
       if(is_null($customer)){
        return  redirect('/customer');
       } else{
        $title = 'Update customer';
        $url = url('/customer/update/').'/'.$id;
        $data = compact('customer', 'url','title');
        return view('customer')->with($data);
       }
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
    $customer = Customer::find($id);
    $customer->name = $request['name'];
    $customer->email = $request['email'];
    $customer->city = $request['city'];
    $customer->state = $request['state'];
    $customer->address = $request['address'];
    $customer->save();
    return redirect('customer/view');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $customer = Customer::find($id);
        if(!is_null($customer)){
            $customer->delete();
        }
        return redirect('/customer/view');
    }
     /**
     * Restore the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {

        $customer = Customer::withTrashed()->find($id);
        if(!is_null($customer)){
            $customer->restore();
        }
        return redirect('/customer/view');
    }
    public function forceDelete($id)
    {
        $customer = Customer::withTrashed()->find($id);
        if(!is_null($customer)){
            $customer->forceDelete();
        }
        return redirect('/customer/view');
    }
    
    
}
