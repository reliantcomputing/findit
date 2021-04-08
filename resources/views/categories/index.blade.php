@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')

    @if(Auth::user()->role->role == "ROLE_ADMIN")
        <div class="container">
                <a class="btn btn-primary btn-sm mt-2 mb-2 ml-2" href="{{route('createCategory')}}">Create</a>
                <div class="card mb-3">
                    <div class="card-body">

                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                    <tr>
                                        <th><b>Category Name</b></th>
                                        <th><b>Action</b></th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($categories as $category)
                                        <tr>
                                            <td>{{$category->category}}</td>
                                            <td>
                                            <form action="{{route('deleteCategory', $category->id)}}" method="POST">
                                                @csrf
                                                <a class="btn btn-sm btn-primary" href="{{route('editCategory', $category->id)}}">Edit</a>
                                                <button class="btn btn-sm btn-danger">Delete</button>
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
