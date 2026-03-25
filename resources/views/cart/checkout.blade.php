@extends('layout.app')


@section('content')
<div class="container">
    <h2>Checkout</h2>

    {{-- Ringkasan Pesanan --}}
    <h4>Ringkasan Pesanan</h4>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Produk</th>
                <th>Jumlah</th>
                <th>Harga</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @php $total = 0; @endphp
            @foreach($cartItems as $item)
                @php 
                    $subtotal = $item->product->price * $item->quantity;
                    $total += $subtotal;
                @endphp
                <tr>
                    <td>{{ $item->product->name }}</td>
                    <td>{{ $item->quantity }}</td>
                    <td>Rp {{ number_format($item->product->price, 0, ',', '.') }}</td>
                    <td>Rp {{ number_format($subtotal, 0, ',', '.') }}</td>
                </tr>
            @endforeach
            <tr>
                <td colspan="3" class="text-end"><strong>Total</strong></td>
                <td><strong>Rp {{ number_format($total, 0, ',', '.') }}</strong></td>
            </tr>
        </tbody>
    </table>

    {{-- Form Checkout --}}
    <form action="{{ route('checkout.process') }}" method="POST">
        @csrf

        {{-- Alamat Pengiriman --}}
        <div class="mb-3">
            <label for="address" class="form-label">Alamat Pengiriman</label>
            <textarea name="address" id="address" class="form-control" rows="3" required></textarea>
        </div>

        {{-- Metode Pembayaran --}}
        <div class="mb-3">
            <label for="payment_method" class="form-label">Metode Pembayaran</label>
            <select name="payment_method" id="payment_method" class="form-select" required>
                <option value="transfer">Transfer Bank</option>
                <option value="cod">Cash on Delivery</option>
                <option value="ewallet">E-Wallet (OVO, GoPay, Dana)</option>
            </select>
        </div>

        <button type="submit" class="btn btn-success">Proses Pesanan</button>
    </form>
</div>
@endsection
