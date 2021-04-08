@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')
        <div class="card mt-2">
            <div class="card-body">
                <h3>{{$task->taskName}}</h3>
                <hr>
                <p>{{$task->description}}</p>

                @if (Auth::user()->role->role == "ROLE_EMPLOYER")
                    <p><b>Price: </b>{{$task->price}} | <b>Status: </b>{{$task->status}}</p>
                    
                    @if($task->studentEmail == null)
                        <form action="">
                            <button class="btn btn-sm btn-primary">Propose</button>
                        </form>
                    @else
                        <p><b>Student Doing the task:</b></p> 
                        <a href="">Profile</a> 
                    @endif
                @endif

                @if (Auth::user()->role->role == "ROLE_STUDENT" && $task->studentEmail == Auth::user()->email)
                    <p><b>Price: </b>{{$task->price}} | <b>Status: </b>{{$task->status}}</p>
                    
                    @if($task->agreement == 0)
                        <a class="btn btn-sm btn-success">Accept</a>
                        <a class="btn btn-sm btn-delete">Reject</a>
                    @else
                        <p><b>Are you done with the task? </b></p> 
                        <a class="btn btn-sm btn-success" href="">Done</a> 
                    @endif
                @endif

            </div>
        </div>

@endsection
