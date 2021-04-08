@extends('layouts.home', ['class' => 'bg-default'])

@section('content')
    @include('layouts.headers.guest')

    <div class="container mt--8 pb-5">
        <!-- Table -->
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <div class="card bg-secondary shadow border-0">
                    <div class="card-body px-lg-5 py-lg-5">
                        <div class="text-center text-muted mb-4">
                            <h3>
                                All Students
                            </h3>
                        </div>
                        <form action="{{route('sorting')}}" method="POST">
                                <div class="row">
                                        <div class="col-sm-8">
                                            <div class="form-group{{ $errors->has('category') ? ' has-danger' : '' }}">
                                                <div class="input-group input-group-alternative mb-3">
                                        
                                                    <select class="form-control{{ $errors->has('category') ? ' is-invalid' : '' }}" name="category" id="">
                                                        <option value="">--Select Category--</option>
                                                        @foreach ($categories as $category)
                                                            <option value="{{$category->id}}">{{$category->category}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                @if ($errors->has('category'))
                                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                                        <strong>{{ $errors->first('category') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col-sm-4">
                                            <button class="btn btn-primary">G0</button>
                                        </div>
                                </div>
                        </form>

                        <br> <br>

                        @forelse ($category->students as $student)
                        <h3>
                            <i class="fa fa-user"></i>
                            {{$student->lastName}} {{$student->firstName}}
                        </h3>
                        <p>{{$student->description}}</p>
                        <p><b>Category: </b>{{$student->category->category}}</p>
                        <form action="">
                            <button class="btn btn-primary btn-sm">Propose</button>
                        </form>
                        <hr class="bg-danger">
                        @empty
                            No student yet
                        @endforelse
        
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
