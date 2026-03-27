@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Kelola Pesanan</h2>

    <table class="table">
        <thead>
            <tr>
                <th>ID Order</th>
                <th>User</th>
                <th>Total</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->user->name }}</td>
                <td>Rp {{ number_format($order->total,0,',','.') }}</td>
                <td>{{ $order->status }}</td>
                <td>
                    <form action="{{ route('orders.updateStatus', $order->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <select name="status" class="form-select">
                            <option value="{{ \App\Models\Order::STATUS_PENDING }}">Pending</option>
                            <option value="{{ \App\Models\Order::STATUS_PAID }}">Paid</option>
                            <option value="{{ \App\Models\Order::STATUS_SHIPPED }}">Shipped</option>
                            <option value="{{ \App\Models\Order::STATUS_COMPLETED }}">Completed</option>
                        </select>
                        <button type="submit" class="btn btn-sm btn-primary mt-1">Update</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
