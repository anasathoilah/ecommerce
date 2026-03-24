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
    <form action="{{ route('cart.destroy', $item->id) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Hapus</button>
    </form>
@endforeach
@endsection
