@extends('layout.app')

@section('extra-links') 
<a class="nav-link" href="{{route('cart.create')}}" role="tab">Tambah product</a>
@endsection

@section('content')
<h2>Keranjang Belanja</h2>

@foreach($cartItems as $item)
    <p>
        {{ $item->product->name }} - Qty: {{ $item->quantity }}
    </p>
    <form action="{{ route('cart.store') }}" method="POST">
        @csrf
        <input type="hidden" name="product_id" value="{{ $item->product->id }}">
        <input type="number" name="quantity" value="1" min="1">
        <button type="submit">Tambah cart</button>
    </form>
    <form action="{{ route('cart.destroy', $item->id) }}" method="POST">
        
        @csrf
        @method('DELETE')
        <button type="submit">Hapus</button>
    </form>
    <a href="{{route('checkout.index')}}"> checkout</a>
@endforeach
@endsection
