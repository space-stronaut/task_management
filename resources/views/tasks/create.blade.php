@extends('layout.admin')
@section('title', 'Buat Task')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Tambah Task</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Tambah Task</li>
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
                        <a href="/tasks" class="btn btn-outline-secondary"><i class="fas fa-arrow-left"></i> Back</a>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="/tasks/store" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
                            <input type="hidden" name="status" value="assign">
                            <div class="form-group">
                                <label for="name">Title</label>
                                <input type="text" name="task_name" class="form-control" required placeholder="Title">
                            </div>

                            <div class="form-group">
                                <label for="title">Description</label>
                                <textarea name="description" id="" class="form-control"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="title">Due Date</label>
                                <input type="date" name="due_date" class="form-control" required placeholder="Due Date" value="{{ old('title') }}">
                            </div>

                            <div class="form-group">
                                <label for="roles">Image <small class="text-danger">*Optional</small></label>
                                <input type="file" name="image" class="form-control" id="">
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
