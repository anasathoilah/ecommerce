@extends('layout.app')

@section('content')

<h2>Riwayat Pesanan</h2>

<table class="table">
    <thead>
        <tr>
            <th>ID Order</th>
            <th>Produk</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>
                    {{-- Loop semua item dalam order --}}
                    <ul>
                        @foreach($order->items as $item)
                            <li>{{ optional($item->product)->name ?? 'Produk tidak tersedia' }} x {{ $item->quantity }}</li>
                        @endforeach
                    </ul>
                </td>
                <td>{{ $order->status }}</td>
                <td>
                    {{-- Update status --}}
                    <form action="{{ route('orders.updateStatus', $order->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <button type="submit" class="btn btn-primary">Update Status</button>
                    </form>

                    {{-- Link ke index admin --}}
                    <a href="{{ route('orders.adminIndex') }}" class="btn btn-secondary">Index Admin</a>

                    {{-- Hapus pesanan khusus customer --}}
                    @if(Auth::check() && Auth::user()->role === 'admin' && $order->user_id === Auth::id())
                        <form action="{{ route('orders.destroy', $order->id) }}" method="POST" onsubmit="return confirm('Yakin hapus pesanan ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </form>
                    @endif
                    @if(Auth::check() && Auth::user()->role !== 'customer')
    
@endif

                </td>
            </tr>
        @endforeach
    </tbody>
</table>

@endsection
