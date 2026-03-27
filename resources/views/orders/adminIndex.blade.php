@extends('layout.app')

@section('content')
    <h2>Daftar Pesanan (Admin)</h2>

    @foreach($orders as $order)
        <p>Order #{{ $order->id }} oleh {{ $order->user->name }} - Status: {{ $order->status }}</p>
        <ul>
            @foreach($order->items as $item)
                <li>{{ $item->product->name }} x {{ $item->quantity }}</li>
            @endforeach
        </ul>

        <form action="{{ route('orders.updateStatus', $order->id) }}" method="POST">
            @csrf
            @method('PUT')
            <select name="status">
                <option value="diproses">Diproses</option>
                <option value="dikirim">Dikirim</option>
                <option value="selesai">Selesai</option>
            </select>
            <button type="submit">Update Status</button>
        </form>
    @endforeach
@endsection
