@extends('layouts.plantilla')

@section('title','API')

@section('content')
    <h1> Estas en API</h1>
    <table border="2">
        <thead>
        <tr>
            <th>Name</th>
            <th>Description</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>{{ $moviedata['fecha'] }}</td>
            <td></td>
        </tr>
        </tbody>
    </table>
@endsection
