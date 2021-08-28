@extends('layout.admin')
@section('title', 'Task Detail')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Task Detail</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Task Detail</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="card p-3">
                    <img src="{{ Storage::url($task->image) }}" style="max-width: 60%" class="img-fluid" alt="">
                    <article>
                        <div class="content mt-4">
                            <h1>{{ $task->task_name }}</h1>
                            <h5>Created At : {{ Carbon\Carbon::parse($task['created_at'])->format('D,d F Y') }}</h5>
                                <h5>Due Date : {{ Carbon\Carbon::parse($task['due_date'])->format('D,d F Y') }}</h5>
                                <h5 >Dilayangkan Oleh: {{ $task->author->name }}</h5>
                                @if ($task->status == 'done')
                                    <button class="btn btn-outline-success text-uppercase">{{$task->status}}</button>
                                @else
                                    <button class="btn btn-warning text-uppercase">{{$task->status}}</button>
                                @endif
                            <hr>
                                <p>{!! $task->description !!}</p>
                            <hr>
                            <table border="2" class="table">
                                <tbody>
                                    <tr>
                                        <th>Submission Status</th>
                                        <td class="table-{{ $task->status == 'done' ? 'success' : 'warning' }} text-uppercase" colspan="1">{{$task->status}}</td>
                                    </tr>
                                    <tr>
                                        <th>Time Remaining</th>
                                        @if ($task->status == 'done')
                                            <td>
                                                Assignment Was Submitted {{Carbon\Carbon::parse($task->updated_at)->diffForHumans()}}
                                            </td>
                                        @else
                                            <td>
                                                {{Carbon\Carbon::parse($task->due_date)->diffForHumans()}}
                                            </td>
                                        @endif
                                    </tr>
                                </tbody>
                            </table>

                            <!-- Button trigger modal -->
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    Submission
                </button>
                
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Submission Form</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>
                        <div class="modal-body">
                            <form action="/submissions/store" enctype="multipart/form-data" method="POST">
                                @csrf
                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                <input type="hidden" name="task_id" value="{{ $task->id }}">
                                <div class="form-group">
                                    <label for="">Image <small class="text-danger">*Optional</small></label>
                                    <input type="file" name="image" class="form-control" id="">
                                </div>
                                <div class="form-group">
                                    <label for="">Description <small class="text-danger">*Optional</small></label>
                                    <textarea name="description" class="form-control" id="" cols="30" rows="10"></textarea>
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-success btn-block">Mark As Done</button>
                                </div>
                            </form>
                        </div>
                    </div>
                    </div>
                </div>

                <article>
                    <div class="content mt-4">
                        <h3>Members Who Have Submitted : </h3>
                        <hr>
                        @forelse ($subs as $sub)
                        <div class="card p-4">
                            <h5>
                                {{$sub->author->name}}
                            </h5>
                            <p>{!! $sub->description !!}</p>
                            <img src="{{ Storage::url($sub->image) }}" style="max-width: 60%" class="img-fluid" alt="">
                        </div>
                        @empty
                            <h4 class="text-center">
                                No Members Have Submitted Yet
                            </h4>
                        @endforelse
                    </div>
                </article>
                        </div>
                    </article>
                </div>
                <!-- /.card -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection

