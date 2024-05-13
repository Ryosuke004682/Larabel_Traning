@extends('layouts.app')

@section('content')
<h1>注文詳細</h1>
<table class="table">
    <tr>
        <th>注文ID</th>
        <td>{{ $order->id }}</td>
    </tr>
    <tr>
        <th>顧客</th>
        <td>{{ $order->customer_id}}：{{$order->customer->name }} 様</td>
    </tr>
    <tr>
        <th>商品</th>
        <td>{{ $order->product_id }}：{{ $order->product->name }}（{{ $order->product->category->name }}）</td>
    </tr>
    <tr>
        <th>注文数</th>
        <td>{{ $order->quantity }} 個</td>
    </tr>
    <tr>
        <th>購入単価</th>
        <td>{{ $order->unit_price }} 円</td>
    </tr>
    <tr>
        <th>注文合計金額</th>
        <td>{{ $order->quantity * $order->unit_price }} 円</td>
    </tr>
    <tr>
        <th>注文日</th>
        <td>{{ $order->created_at->format('Y-m-d') }}</td>
    </tr>
    <tr>
        <th>発送日</th>
        <td>{{ $order->shipped_on ?? '未発送' }}</td>
    </tr>
</table>
<p><a href="{{ route('orders.edit', $order->id) }}">編集</a></p>
<p>
    <form onsubmit="return confirm('本当に削除しますか？')" action="{{ route('orders.destroy', $order->id) }}" method="post">
        @csrf 
        @method('delete')
        <button type="submit">注文を削除</button>
    </form>
</p>
@endsection