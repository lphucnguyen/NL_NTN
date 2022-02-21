@extends('template.master')

@section('title', "HOME")

@section('content')
<div class="container">
    <div class="row justify-content-center align-items-center bg-secondary text-light text-center border-3 border-primary">
        <div class="col">
            1
        </div>
        <div class="col">
            2
        </div>
        <div class="col-md">
            3
            @yield('contentt')

        </div>
    </div>
</div>
<h1>xin chaof dday la content trang home</h1>
<a href="./login">Login</a>
@stop