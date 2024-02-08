@include('layout.header')

    <div class="float-right">
        <a class="btn btn-primary" href="{{route('customer.register')}}" role="button" >Add</a>
    </div>
    <div class="float-right">
        <a class="btn btn-primary" href="{{url('customer')}}" role="button" >Customer View</a>
    </div>


       <div
        class="table-responsive"
       >
       
        <table class="table table-primary">
            <thead>
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
                @foreach ($customers as $customer)

                <tr>
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
                    <a href="{{route('customer.restore',['id'=>$customer->customer_id])}}"><button class="btn btn-success">restore</button></a>
                <a href="{{route('customer.force_delete',['id'=>$customer->customer_id])}}"><button class="btn btn-danger" >Delete</button></a>
                {{-- or --}}
                {{-- <a href="{{url('/customer/delete/')}}/{{$customer->customer_id}}"><button class="btn btn-danger" >Delete</button></a> --}}

                </td>
               </tr>
                @endforeach
            </tbody>
        </table>

       </div>
       
    