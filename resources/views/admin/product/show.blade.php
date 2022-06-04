@extends('layouts.admin')

@section('title') Product Detail @stop

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Product Detail</h3>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <img src="{{ $product['image'] }}">
                            <h6>Name : {{ $product['name'] }}</h6>
                            <h6>Summary : {{ $product['summary'] }}</h6>
                            <h6>Description : </h6>
                            <p>{{ $product['description'] }}</p>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <button class="btn btn-success" data-toggle="modal" data-target="#addData"><i
                                class="fas fa-plus"></i> Add Product Variant
                        </button>
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>Size</th>
                                <th>Price</th>
                                <th>Stock</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($product->productDetails() as $productVariant)
                                <tr>
                                    <td>{{ $productVariant['size'] }}</td>
                                    <td>{{ $productVariant['price'] }}</td>
                                    <td>{{ $productVariant['stock'] }}</td>
                                    <td>
                                        <form action="{{ route('product.destroy', $productVariant['id']) }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="_method" value="DELETE">
                                            <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                        </form>
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

    <div id="addData" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Product</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form action="{{ route('product.store') }}" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        @csrf
                        <div class="form-group">
                            <label>Image</label>
                            <input name="image" type="file" class="form-control"
                                   accept="image/*" required>
                        </div>
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" name="name" required>
                        </div>
                        <div class="form-group">
                            <label>Summary</label>
                            <textarea class="form-control" rows="3" name="summary" required></textarea>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea class="form-control" rows="6" name="description" required></textarea>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
@stop
