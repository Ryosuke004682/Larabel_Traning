@extends('layouts.app')

@section('content')
<h1>商品管理</h1>
<div class="flex">
    <div class="sidebar">
        <form action="{{ route('products.index') }}" method="get">
            <dl>
                <dt>カテゴリ</dt>
                <dd>
                    <select name="category_id">
                        <option value=""></option>
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}"{{ request('category_id') == $category->id ? ' selected' : '' }}>{{ $category->name }}（{{ $category->products->count()}}）</option>
                        @endforeach
                    </select>
                </dd>
                <dt>価格（下限）</dt>
                <dd>
                    <input type="number" name="min_price" value="{{ request('min_price') }}" placeholder="円">
                </dd>
                <dt>価格（上限）</dt>
                <dd>
                    <input type="number" name="max_price" value="{{ request('max_price') }}" placeholder="円">                
                </dd>
                <dt>キーワード</dt>
                <dd><input type="text" name="keyword" value="{{ request('keyword') }}" placeholder="商品名"></dd>
            </dl>
            <button type="submit">検索</button>
        </form>
    </div>
    <div class="content">
        <table class="table">
            <thead>
                <th>ID</th><th>商品名</th><th>カテゴリ</th><th>価格</th>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->category->name }}</td>
                    <td>{{ $product->price }}円</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {{ $products->appends(Request::all())->links() }}
    </div>
</div>
@endsection