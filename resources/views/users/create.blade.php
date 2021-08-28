@extends('layout.admin')
@section('title', 'Buat Task')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Tambah Member</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Tambah Member</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- general form elements -->
                <div class="card">
                    <div class="card-header">
                        <a href="/members" class="btn btn-outline-secondary"><i class="fas fa-arrow-left"></i> Back</a>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="/members/store" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name">Nama</label>
                                <input type="text" name="name" class="form-control" required placeholder="Nama">
                            </div>

                            <div class="form-group">
                                <label for="title">Email</label>
                                <input type="email" name="email" class="form-control" required placeholder="Email" value="{{ old('email') }}">
                            </div>

                            <div class="form-group">
                                <label for="title">Password</label>
                                <input type="password" name="password" class="form-control" required placeholder="Title" value="{{ old('title') }}">
                            </div>

                            <div class="form-group">
                                <label for="roles">Role</label>
                                <select name="roles" id="" class="form-control">
                                    <option value="" disabled selected>Pilih...</option>
                                    <option value="master">Master</option>
                                    <option value="member">Member</option>
                                </select>
                            </div>

                        </div>

                        <!-- /.card-body -->

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
                <!-- /.card -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection
@push('addon-script')
    <script>
        $(function () {
            // Summernote
            $('#summernote').summernote({
                height: 150
            });
            bsCustomFileInput.init();
        });
    </script>
@endpush
