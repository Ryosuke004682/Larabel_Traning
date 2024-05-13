@extends('layouts.app')

@section('content')
<h1>注文管理</h1>
<p><a href="{{ route('orders.create') }}">新規注文作成</a></p>
<table class="table">
    <thead>
        <th>詳細</th><th>注文ID</th><th>注文日</th><th>顧客名</th><th>商品名</th><th>注文数</th><th>注文合計金額</th><th>発送日</th>
    </thead>
    <tbody>
    @foreach($orders as $order)
        <tr>
            <td><a href="{{ route('orders.show', $order->id) }}">詳細</a></td>
            <td>{{ $order->id }}</td>
            <td>{{ $order->created_at->format('Y年m月d日') }}</td>
            <td>{{ $order->customer->name }}</td> 
            <td>{{ $order->product->name }}</td>
            <td>{{ $order->quantity }}</td>
            <td>{{ $order->quantity * $order->unit_price }}円</td>
            <td>
                @if($order->shipped_on)
                {{ $order->shipped_on }}
                @else
                <form onsubmit="return confirm('発送済みにしますか？')" action="{{ route('orders.ship', $order->id) }}" method="post">
                    @csrf 
                    @method('patch')
                    <button type="submit">発送済みにする</button>
                </form>
                @endif
            </td>
        </tr>
    @endforeach
    </tbody>
</table>

@endsection