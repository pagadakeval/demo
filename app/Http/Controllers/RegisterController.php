<?php

namespace App\Http\Controllers;
use App\Models\Customer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index(){
        $url = url('/customer/register');
        $title = 'Add Customer';
        $data = compact('url','title');
        return view('layout.form')->with($data);
    }

// insert data
    public function register(Request $request){

        $request->validate(
            [
                'name'=>'required',
                'email'=>'required|email',
                'address'=>'required',
                'date'=>'required',
                'number'=>'required',
                'state'=>'required',
                'city'=>'required',
                'gender'=>'required',
                'password'=>'required|confirmed',
                'password_confirmation'=>'required'
            ]
        );

        // echo '<pre>';
        // print_r($request->all());

        $customer = new Customer;
        $customer->name = $request['name']; 
        $customer->email = $request['email']; 
        $customer->address = $request['address']; 
        $customer->gender = $request['gender']; 
        $customer->city = $request['city']; 
        $customer->state = $request['state']; 
        $customer->number = $request['number']; 
        $customer->date = $request['date']; 
        $customer->password = md5($request['password']);
        $customer->confirm_password = md5($request['confirm_password']);
        $customer->save();

       return redirect('/customer');
    }

// show data in table, search data, pagination
    public function view(Request $request){
        $search = $request['search'];
        if($search!=''){
            $customers = Customer::where('name','LIKE',"%$search%")->orwhere('email','LIKE',"%$search%")->Paginate(3);
            // $customers = Customer::Paginate(15)->appends($search);
            $customers->appends(['search'=>$search]);
        }else{
            $customers = Customer::Paginate(3);
        }
        $data = compact('customers','search');
        return view('layout.customer-view')->with($data);
    }

//delete data 
    public function delete($id){ 
        $customer = Customer::find($id);
        if(!is_null($customer)){
            $customer->delete();
        }
        return redirect()->back();
    }

// delete data forever using force delete
    public function force_delete($id){ 
        $customer = Customer::withTrashed()->find($id);
        if(!is_null($customer)){
            $customer->forceDelete();
        }
        return redirect()->back();
    }

// get delete data in trash
    public function trash(){
        $customers = Customer::onlyTrashed()->get();
        $data = compact('customers');
        return view('layout.trash_customer')->with($data);

    }

// restore delete data
    public function restore($id){
        $customer = Customer::withTrashed()->find($id);
        if(!is_null($customer)){
            $customer->restore();
        }
        return redirect('customer');
    }
    
//edit query
    public function edit($id){
        $customer= Customer::find($id);
        if(is_null($customer)){
            return redirect('/customer');
        }else{
            $title='Update Customer Details';
            $url = url('/customer/update').'/'.$id;
            $data = compact('url','customer','title');
            return view('layout.form')->with($data);
        }
    }

    //update data
    public function update($id,Request $request){

        $request->validate(
            [
                'name'=>'required',
                'email'=>'required|email',
                'address'=>'required',
                'date'=>'required',
                'number'=>'required',
                'state'=>'required',
                'city'=>'required',
                'gender'=>'required',
            ]
        );

        $customer = Customer::find($id);
        $customer->name = $request['name'];
        $customer->email = $request['email']; 
        $customer->address = $request['address']; 
        $customer->gender = $request['gender']; 
        $customer->city = $request['city']; 
        $customer->state = $request['state']; 
        $customer->number = $request['number']; 
        $customer->date = $request['date']; 
        $customer->save();

        return redirect('/customer');
    }

}
