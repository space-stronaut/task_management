@extends('layout.admin')
@section('title', 'Dashboard')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Task</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="/">Home</a></li>
                            <li class="breadcrumb-item active">Task</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header d-flex justify-content-end">
                        @if (Auth::user()->roles == 'master')
                            <a href="/tasks/create" class="btn btn-primary">+ Tambah Task</a>
                        @endif
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                            <tr>
                                <th style="width: 10px">ID</th>
                                <th>Title</th>
                                <th>Description</th>
                                <th>Author</th>
                                <th>Due Date</th>
                                <th>Status</th>
                                <th>Selesai Pada</th>
                                <th style="width: 200px" colspan="3">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($tasks as $task)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $task->task_name }}</td>
                                    <td>{{ Str::limit($task->description, 50) }}</td>
                                    <td>
                                        {{$task->author->name}}
                                    </td>
                                    <td>
                                        {{Carbon\Carbon::parse($task->due_date)->diffForHumans()}}
                                    </td>
                                    <td class="text-uppercase">
                                        <div class="badge badge-{{$task->status == 'done' ? 'success' : 'danger'}}">
                                            {{$task->status}}
                                        </div>
                                    </td>
                                    <td>
                                        @if ($task->status == 'assign')
                                            Belum Selesai
                                        @else
                                            {{Carbon\Carbon::parse($task->updated_at)->diffForHumans()}}
                                        @endif
                                    </td>
                                    <td>
                                        @if (Auth::user()->roles == 'master')
                                            @if ($task->status != 'done')
                                                <a href="/tasks/edit/{{$task->id}}" class="btn btn-success">Edit</a>
                                                <a href="/tasks/delete/{{$task->id}}" class="btn btn-danger">Hapus</a>
                                                <a href="/tasks/show/{{$task->id}}" class="btn btn-info">Show</a>
                                            @else
                                                <a href="/tasks/show/{{$task->id}}" class="btn btn-info">Show</a>
                                                <a href="/tasks/delete/{{$task->id}}" class="btn btn-danger">Hapus</a>
                                            @endif
                                        @else
                                            <a href="/tasks/show/{{$task->id}}" class="btn btn-info">Go To Activity</a>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center">Data Kosong</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mx-auto">
                        {{$tasks->links('vendor.pagination.bootstrap-4')}}
                    </div>
                    <!-- /.card-body -->
                    
                </div>
                <!-- /.card -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection