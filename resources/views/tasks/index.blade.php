@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')

    @if(Auth::user()->role->role == "ROLE_EMPLOYER")
    <a class="btn btn-primary btn-sm mt-2 ml-2" href="{{route('createTask')}}">Create</a>
        <div class="card mt-2">
            <div class="card-body">

                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th><b>Task Name</b></th>
                                <th><b>Price</b></th>
                                <th><b>Status</b></th>
                                <th><b>Agreement</b></th>
                                <th><b>Action</b></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($tasks as $task)
                                <tr>
                                    <td>{{$task->taskName}}</td>
                                    <td>{{$task->price}}</td>
                                    <td>{{$task->agreement}}</td>
                                    <td>{{$task->status}}</td>
                                    <td>
                                        <form action="">
                                            <a class="btn btn-sm btn-success" href="{{route('showTask', $task->id)}}">View</a>
                                            <a class="btn btn-sm btn-primary" href="">Edit</a>
                                            <button class="btn btn-sm btn-danger" type="text">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                                
                            </tbody>
                        </table>
                    </div>

            </div>
        </div>
    @elseif(Auth::user()->role->role == "ROLE_STUDENT")
            <div>

            </div>
    @else
        <div class="card mb-3">
            <div class="card-body">

                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                            <tr>
                                <th><b>Task Name</b></th>
                                <th><b>Price</b></th>
                                <th><b>Status</b></th>
                                <th><b>Agreement</b></th>
                                <th><b>Action</b></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($tasks as $task)
                                <tr>
                                    <td>{{$task->taskName}}</td>
                                    <td>{{$task->price}}</td>
                                    <td>{{$task->agreement}}</td>
                                    <td>{{$task->status}}</td>
                                    <td>
                                    <form action="">
                                            <a class="btn btn-success btn-sm" href="">View</a>
                                            <a class="btn btn-primary btn-sm" href="">Edit</a>
                                            <button class="btn btn-danger btn-sm" type="submit">
                                                Delete
                                            </button>
                                    </form>
                 
                                    </td>
                                </tr>
                            @endforeach
                                
                            </tbody>
                        </table>
                    </div>

            </div>
        </div>
    @endif

@endsection
