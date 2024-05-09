<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>商品検索</title>
</head>
<body>
    <form action="{{route('top') }}" method='get'>
        @include('search')
        <button type='submit'>検索</button>
    </form>

    <table border="1">
        <thead>
            <tr>
                <th>ID</th>
                <th>商品名</th>
                <th>カテゴリ</th>
                <th>価格</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->category->name }}</td>
                    <td>{{ $product->price }}</td>
                </tr>
            @endforeach
        </tbody>
        {{ $products->appends(Request::all())->links() }}
    </table>
    
    <dl>
        <dt>カテゴリ</dt>
        <dd>
            <select name="category_id">
                <option value=""></option>
                @foreach($categories as $category) 
                    <option value="{{'$category->id'}}"{{ request('category_id')==$category->id?'selected': ''}}>
                        {{ $category->name }} ({{ $category->products_count }})
                    </option>
                @endforeach
            </select>
        </dd>
        <!--価格とか書いてく-->
    </dl>
</body>
</html>