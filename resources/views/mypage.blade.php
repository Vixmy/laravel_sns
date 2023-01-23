@extends('layouts.app')

@section('content')
mypage
<p>name : {{ auth()->user()->name }}</p>
@endsection
