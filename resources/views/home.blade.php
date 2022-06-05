@extends('layouts.user')

@section('title') Product @stop

@section('content')
    <section>
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <!-- /.col -->
                    @foreach($products as $product)
                    <div class="col-md-3">
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">{{ $product['name'] }}</h3>

                                <div class="card-tools">
{{--                                    <button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i>--}}
{{--                                    </button>--}}
                                </div>
                                <!-- /.card-tools -->
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body text-center">
                                <img src="{{ $product['image'] }}" style="height: 100px; width: auto;">
                            </div>
                            <div class="card-footer">
                                <div class="row">
                                    <div class="col-6 text-left">
                                        <p>Stock : <i class="fas fa-box"></i> {{ $product->productDetails()->sum('stock') }} Kg</p>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <table class="table table-bordered table-striped">
                                            <thead>
                                            <tr>
                                                <th>Size</th>
                                                <th>Price /Kg</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($product->productDetails()->get() as $productDetail)
                                                <tr>
                                                    <td>{{ $productDetail['size'] }}</td>
                                                    <td>{{ $productDetail['formatted_price'] }}</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@stop
