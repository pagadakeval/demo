@extends('layout.main')
@push('title')
<title>home page</title>   
@endpush
@section('main-section')
 <a href="{{url('/')}}">English</a>
 <a href="{{url('/hi')}}">Hindi</a>
 <a href="{{url('/guj')}}">Gujarti</a>
 <a href="{{url('/marathi')}}">Marathi</a>

 <h2 style="text-align: center;padding: 20% 0">@lang('lang.Welcome')</h2>
@endsection