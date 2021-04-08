@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')

    @if(Auth::user()->role->role == "ROLE_ADMIN")
    <div class="container mt-2">
        <h1>Students</h1>
        <div class="card mb-2">
                <div class="card-body">
    
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                <tr>
                                    <th><b>First Name</b></th>
                                    <th><b>Last Name</b></th>
                                    <th><b>Email</b></th>
                                    <th><b>Action</b></th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach ($students as $student)
                                    <tr>
                                        <td>{{$student->firstName}}</td>
                                        <td>{{$student->lastName}}</td>
                                        <td>{{$student->email}}</td>
                                        <td>
                                        <form action="{{route('deleteCategory', $student->id)}}" method="POST">
                                            @csrf
                                            <a class="btn btn-sm btn-primary" href="{{route('studentProfile', $student->id)}}">Profile</a>
                                            <button class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                        </td>
                                    </tr>
                                @endforeach
                                    
                                </tbody>
                            </table>
                        </div>
    
                </div>
            </div>
    </div>     
        
    @elseif(Auth::user()->role->role == "ROLE_STUDENT")

    @else
    
    @endif

@endsection
