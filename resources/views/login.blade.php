@extends('layouts.plantilla')

@section('title','LOGIN')

@section('content')
    <h1>LOGIN</h1>
    <form action="{{ route('login.validate') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="username">Username : </label>
        <input type="text" name="username"><br>
        <span>@error('username') {{$message}} @enderror</span> <br>
        <label for="username" >Password :  </label>
        <input type="text" type="password" name="password"> <br>
        <span>@error('password') {{$message}} @enderror</span> <br>
        <label for="username" >Imagen :  </label>
        <input type="file" name="file" accept="image/*"> <br> <br>
        <span>@error('file') {{$message}} @enderror</span> <br>
        <button type="submit">Ingresar</button>
    </form>

@endsection
