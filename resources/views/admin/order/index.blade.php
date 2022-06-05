@extends('layouts.admin')

@section('title') Order List @stop

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Order List</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>User</th>
                                <th>Shipping Address</th>
                                <th>Total item</th>
                                <th>Amount</th>
                                <th>Shipping Price</th>
                                <th>Total Amount</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach($orders as $order)
                                    <tr>
                                        <td>{{ $order->user['name'] }}</td>
                                        <td>{{ $order['shipping_address'] }}</td>
                                        <td>{{ $order['total_item'] }}</td>
                                        <td>{{ $order['amount'] }}</td>
                                        <td>{{ $order->shippingPrice['city'] }}<br>
                                            {{ $order->shippingPrice['formatted_price'] }}
                                        </td>
                                        <td>{{ $order['total_amount'] }}</td>
                                        <td>{{ $order['status'] }}</td>
                                        <td>
                                            <button class="btn btn-info btn-sm"><i class="fas fa-eye"></button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
@stop
