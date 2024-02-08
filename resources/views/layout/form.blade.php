@include('layout.header')
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  </head>
  <body>
    <h2>{{$title}}</h2>
    <form action="{{$url}}" method="post">
        @csrf
        
        <x-input type="text" name="name" label="Name" placeholder="Enter Your Name" value="{{isset($customer->name) ? $customer->name :'' }}"/>
        <x-input type="email" name="email" label="Email" placeholder="Enter Your Email" value="{{isset($customer->email) ? $customer->email :''}}"/>
        <x-input type="text" name="address" label="Adresss" placeholder="Enter Your Adress" value="{{isset($customer->address) ? $customer->address :''}}"/>
        <x-input type="number" name="number" label="Number" placeholder="Enter Your Number" value="{{isset($customer->number) ? $customer->number :''}}"/>
        <x-input type="text" name="state" label="State" placeholder="Enter Your State" value="{{isset($customer->state) ? $customer->state :''}}"/>
        <x-input type="text" name="city" label="City" placeholder="Enter Your City" value="{{isset($customer->city) ? $customer->city :''}}"/>

        <label for="">gender</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="gender" value="male" {{isset($customer->gender) && $customer->gender=='male' ? 'checked' : ''}}>
          <label class="form-check-label" for="inlineRadio1">male</label>
        </div>
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="radio" name="gender" value="female"  {{isset($customer->gender) && $customer->gender=='female' ? 'checked' : ''}}>
          <label class="form-check-label" for="inlineRadio2">female</label>
        </div>

        <x-input type="date" name="date" label="Date" value="{{isset($customer->date) ? $customer->date :''}}"/>
        <x-input type="password" name="password" label="Password" placeholder="Enter Your Password"/>
        <x-input type="password" name="password_confirmation" label="Confirm Password" placeholder="Enter Your Confirm Password"/>
         <div class="form-group row">
          <div class="col-sm-10">
            @if(!isset($customer))
            <button type="submit" class="btn btn-primary">Sign in</button>
            @else
            <button type="submit" class="btn btn-primary">update</button>
            @endif
          </div>
        </div>
        
        {{--<div class="form-group row">
            <label for="name" class="col-sm-2 col-form-label">Name</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="name" id="inputEmail3" placeholder="name" value="{{old('name')}}">
            
          <span class="text-danger mr-3">
            @error('name')
                {{$message}}
            @enderror
          </span></div></div><br><br>
        <div class="form-group row">
          <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
          <div class="col-sm-10">
            <input type="email" class="form-control" name="email" id="inputEmail3" placeholder="Email"  value="{{old('email')}}">
          
    <span class="text-danger">
      @error('email')
          {{$message}}
      @enderror
    </span></div></div><br><br>
        <div class="form-group row">
          <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
          <div class="col-sm-10">
            <input type="password" class="form-control" name="password" id="inputPassword3" placeholder="Password">
          
    <span class="text-danger">
      @error('password')
          {{$message}}
      @enderror
    </span></div></div><br><br>
        <div class="form-group row">
            <label for="inputPassword3" class="col-sm-2 col-form-label">Confirm Password</label>
            <div class="col-sm-10">
              <input type="password" class="form-control" name="password_confirmation" id="inputPassword3" placeholder="Confirm Password">
            
        <span class="text-danger">
          @error('password_confirmation')
              {{$message}}
          @enderror
        </span></div></div><br><br>
        <div class="form-group row">
          <div class="col-sm-10">
            <button type="submit" class="btn btn-primary">Sign in</button>
          </div>
        </div>--}}


        
      </form>
  </body>
</html>