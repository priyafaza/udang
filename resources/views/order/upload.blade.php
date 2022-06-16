@extends('layouts.user')

@section('content')
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Upload Bukti Transfer</h3>
                        </div>
                    <div class="card-body">
                            <h4>Total Payment : </h4>
                            <p>No.Rekening Perusahaan</p>
                        <form action="upload.php" method="post" enctype="multipart/form-data">
                               Upload Bukti Transfer
                            <input type="file" name="fileToUpload" id="fileToUpload">
                            <input type="submit" value="Upload Image" name="submit">
                        </form>
                </div>

<!-- /.card-body -->
            </div>
        </div><!-- /.container-fluid -->
    </section>
@endsection
