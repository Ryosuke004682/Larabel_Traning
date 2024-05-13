@extends('layouts.app')

@section('content')
<h1>顧客管理</h1>
<table class="table">
    <thead>
        <th>顧客ID</th><th>顧客名</th>
    </thead>
    <tbody>
    @foreach($customers as $customer)
        <tr>
            <td>{{ $customer->id }}</td>
            <td>{{ $customer->name }}</td> 
        </tr>
    @endforeach
    </tbody>
</table>

@endsection