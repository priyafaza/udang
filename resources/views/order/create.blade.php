@extends('layouts.user')

@section('title') Create New Order  @stop

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <!-- left column -->
                <div class="col-md-6">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Informasi pengiriman</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form role="form">
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nama</label>
                                    <input type="text" class="form-control" id="exampleInputEmail1"
                                           value="{{ auth()->user()['name'] }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Shipping Address</label>
                                    <textarea class="form-control" name="shipping_address" rows="4"></textarea>
                                </div>
                                <div class="form-group">
                                    <label>City</label>
                                    <select class="form-control" name="shipping_price_id" required>
                                        <option>-- Select City --</option>
                                        @foreach($shippingPrices as $shippingPrice)
                                            <option value="{{ $shippingPrice['id'] }}">{{ $shippingPrice['city'] }} -
                                                Ongkir {{ $shippingPrice['formatted_price'] }}/Kg
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card card-success">
                        <div class="card-header">
                            <h3 class="card-title">Variant Product</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-10">
                                    <div class="form-group">
                                        <select class="form-control" id="product_id" required>
                                            <option>-- Select Product --</option>
                                            @foreach($products as $product)
                                                <option value="{{ $product['id'] }}">{{ $product['name'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <button onclick="addVariant(document.getElementById('product_id').value)" class="btn btn-primary">Add</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card card-danger">
                        <div class="card-header">
                            <h3 class="card-title">Pemesanan</h3>
                        </div>
                        <div class="card-body" id="productVariant">
                            <div class="row">
                                <div class="col-8">
                                    <label>Product Variant /Size</label>
                                </div>
                                <div class="col-3">
                                    <label>Amount /Kg</label>
                                </div>
                                <div class="col-1">
                                    &nbsp;
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script>
        function addVariant(id) {
            $.get("/api/product-variant/"+id, function (data, status) {
                if (data.success) {
                    $('#productVariant').append(data.data);
                } else {
                    Swal.fire(
                        'Error',
                        data.message,
                        'error'
                    );
                }
            });
        }
    </script>
@stop
