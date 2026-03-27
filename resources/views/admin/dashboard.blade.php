<h1>Admin Dashboard</h1>@extends('layout.app')

@section('content')
    <h2>Dashboard Admin</h2>

    <div class="stats">
        <p>Total Orders: {{ $ordersCount }}</p>
        <p>Total Products: {{ $productsCount }}</p>
        <p>Total Users: {{ $usersCount }}</p>
    </div>

    <a href="{{ route('orders.adminIndex') }}" class="btn btn-primary">Kelola Pesanan</a>
    <a href="{{ route('products.index') }}" class="btn btn-secondary">Kelola Produk</a>
@endsection
