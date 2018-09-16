@extends('layouts-admin.master')
@section('title', "| Orders")

@section('content')

<h4 class="mt-3 mb-4">Orders</h4>

<div class="row">
    <div class="col-sm-12">
        @if($orders->count() <= 0)
        <h5>Orders list is empty</h5>
        @else
            <div class="row my-4">
                <div class="col-sm-4">
                    <div class="form-group">
                        <input type="text" class="form-control" id="ordersSearch" placeholder="Search Order" autocomplete="off">
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
                        <th>Actions</th>
                    </tr>
                    @foreach($orders as $order)
                    <tr>
                        <td>{{ ++$cnt }}</td>
                        <td>{{ $order->id }}</td>
                        <td>{{ $order->user->name }}</td>
                        <td>{{ $order->user->email }}</td>
                        <td>{{ $order->created_at->toDateTimeString() }}</td>
                        <td>{{ $order->status }}</td>
                        <td>
                            <a href="{{ route('orders.show', ['id' => $order->id]) }}">Show</a> |

                            <form action="{{ route('orders.destroy', ['id' => $order->id]) }}" 
                                  method="post" 
                                  class="app-delete-form confirm-plugin-delete"
                            >

                                @csrf
                                @method('delete')

                                <input type="submit" name="delete" value="Delete">
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
