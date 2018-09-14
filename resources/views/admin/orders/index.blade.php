@extends('layouts-admin.master')
@section('title', "| Orders")

@section('content')

<h4 class="mt-3 mb-4">Orders</h4>

<div class="row">
    <div class="col-sm-12">
        @if($orders->count() <= 0)
    <h5>Orders list is empty</h5>
        @else
            <div class="table-responsive">
                <table class="table table-striped table-hover mb-5" id="usersTable">
                    <tr>
                        <th>#</th>
                        <th>Order ID</th>
                        <th>Customer</th>
                        <th>Order`s date</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    @foreach($orders as $order)
                    <tr>
                        <td>{{ ++$cnt }}</td>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->user->name }}</td>
                        <td>{{ $order->created_at->toDateTimeString() }}</td>
                        <td>{{ ucfirst($order->status) }}</td>
                        <td><a href="{{ route('orders.show', ['id' => $order->id]) }}">Order details</a></td>
                        
                    </tr>
                    @endforeach
                </table>
            </div>
            <br>
            <br>
            <br>
        @endif
    </div>
</div>



@endsection
