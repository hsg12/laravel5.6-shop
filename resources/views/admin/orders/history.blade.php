@extends('layouts-admin.master')
@section('title', "| Orders history")

@section('content')

<h4 class="mt-3 mb-4">Orders history</h4>

<div class="row">
    <div class="col-sm-12">
        @if($orders->count() <= 0)
    <h5>History list is empty</h5>
        @else
            <div class="row my-4">
                <div class="col-sm-4">
                    <div class="form-group">
                        <input type="text" class="form-control" id="ordersSearch" placeholder="Search Order in History" autocomplete="off">
                    </div> 
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-striped table-hover mb-5" id="ordersTable">
                    <tr>
                        <th>#</th>
                        <th>Order ID</th>
                        <th>Customer</th>
                        <th>Email</th>
                        <th>Order`s date</th>
                        <th>Status</th>
                        <th>Deleted at</th>
                        <th>Actions</th>
                    </tr>
                    @foreach($orders as $order)
                    <tr>
                        <td>{{ ++$cnt }}</td>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->user->name }}</td>
                        <td>{{ $order->user->email }}</td>
                        <td>{{ $order->created_at->toDateTimeString() }}</td>
                        <td>{{ ucfirst($order->status) }}</td>
                        <td>{{ $order->deleted_at ? $order->deleted_at->toDateTimeString() : '' }}</td>
                        <td>
                            <form action="{{ route('orders.delete.permanently', ['id' => $order->id]) }}" 
                                  method="post" 
                                  class="app-delete-form confirm-plugin-delete"
                            >

                                @csrf
                                @method('delete')

                                <input type="submit" name="delete" value="Permanently delete">
                            </form>
                        </td>
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
