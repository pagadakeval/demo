@include('layout.header')
<style>
    .w-5{
        display: none;
    }
</style>

<div class="row">
    <div class="float-right">
        <a class="btn btn-primary" href="{{route('customer.register')}}" role="button" >Add</a>
    </div>
    <div class="float-right">
        <a class="btn btn-danger" href="{{url('/customer/trash_customer')}}" role="button" >Go To Trush</a>
    </div>
</div>

<form action="" >
    <div class="mb-3 col-4 mt-4 ">
        <input type="text" name="search" id="" class="form-control" placeholder="Search Name and Eamil" value="{{$search}}" />
        <a href="">
            <button class=" btn btn-primary mt-3">search</button>
        </a>
    </div>
    
</form>

       <div
        class="table-responsive"
       >
       
        <table class="table table-primary">
            <thead>
                    <th>No.</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Gender</th>
                    <th>Number</th>
                    <th>State</th>
                    <th>City</th>
                    <th>Date</th>
                    <th>Create At</th>
                    <th>Update At</th>
                    <th>Status</th>
                    <th>Action</th>
                
            </thead>
            <tbody>
                @php
                  $i=1;  
                @endphp
                @foreach ($customers as $customer)

                <tr>
                <td>{{$i}}</td>
                <td>{{$customer->name}}</td>
                <td>{{$customer->email}}</td>
                <td>{{$customer->address}}</td>
                <td>{{$customer->gender}}</td>
                <td>{{$customer->number}}</td>
                <td>{{$customer->state}}</td>
                <td>{{$customer->city}}</td>
                <td>{{$customer->date}}</td>
                <td>{{$customer->created_at}}</td>
                <td>{{$customer->updated_at}}</td>
                <td>@if($customer->status=='1')<a class="btn btn-success">Active</a> @else <a class="btn btn-danger">Inactive</a>  @endif</td>
                <td>
                <a href="{{route('customer.edit',['id'=>$customer->customer_id])}}"><button class="btn btn-success">Edit</button></a>
                <a href="{{route('customer.delete',['id'=>$customer->customer_id])}}"><button class="btn btn-danger" >Trush</button></a>
                {{-- or --}}
                {{-- <a href="{{url('/customer/delete/')}}/{{$customer->customer_id}}"><button class="btn btn-danger" >Delete</button></a> --}}

                </td>
               </tr>
               @php
                   $i++;
               @endphp
                @endforeach
            </tbody>
           
        </table>

       </div>
       {{$customers->links()}}
    