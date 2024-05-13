<dl>
    <dt>顧客名</dt>
    <dd>
        <select name="customer_id">
            <option value=""></option>
            @foreach($customers as $customer)
            <option value="{{ $customer->id }}"{{ old('customer_id', $order->customer_id) == $customer->id ? ' selected' : ''}}>
                {{ $customer->name}} 様
            </option>
            @endforeach
        </select>
    </dd>
    <dt>商品を選択</dt>
    <dd>
        <select name="product_id">
            <option value=""></option>
            @foreach($products as $product)
            <option value="{{ $product->id }}"{{ old('product_id', $order->product_id) == $product->id ? ' selected' : '' }}>
                {{ $product->name}}（{{ $product->category->name }}）
            </option>
            @endforeach
        </select>
    </dd>
    <dt>注文数</dt>
    <dd><input type="number" name="quantity" min="1" max="999" value="{{ old('quantity', $order->quantity) }}"> 個</dd>
    @if($order->id)
    <dt>購入単価</dt>
    <dd><input type="number" name="unit_price" min="1" value="{{ old('unit_price', $order->unit_price) }}"> 円</dd>
    <dt>発送日</dt>
    <dd><input type="date" name="shipped_on" value="{{ old('shipped_on', $order->shipped_on) }}"></dd>
    @endif
</dl>