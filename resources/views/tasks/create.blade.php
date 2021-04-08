@extends('layouts.app')

@section('content')
    @include('layouts.headers.cards')

    <div class="container mt-4 pb-5">
        <!-- Table -->
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-12">
                <div class="card bg-white shadow border-0">
                    <div class="card-body px-lg-5 py-lg-5">
                        <div class="text-center text-muted mb-4">
                            <h3>{{ __('Create Task') }}</h3>
                        </div>
                        <form role="form" method="POST" action="{{ route('saveTask') }}">
                            @csrf()
                            
                            <!-- first name and last name -->
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group{{ $errors->has('taskName') ? ' has-danger' : '' }}">
                                        <label for="description">
                                            <b>Task Name</b>
                                        </label>
                                        <div class="input-group input-group-alternative mb-3">
                                            <input class="form-control{{ $errors->has('taskName') ? ' is-invalid' : '' }}" type="text" name="taskName" value="{{ old('taskName') }}" required autofocus>
                                        </div>
                                        @if ($errors->has('taskName'))
                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                                <strong>{{ $errors->first('taskName') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <!-- first name and last name -->
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group{{ $errors->has('description') ? ' has-danger' : '' }}">
                                        <label for="description">
                                            <b>Description</b>
                                        </label>
                                        <div class="input-group input-group-alternative mb-3">
                                            <textarea rows="4" class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" value="{{ old('description') }}" required autofocus>
                                            </textarea>
                                        </div>
                                        @if ($errors->has('description'))
                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                                <strong>{{ $errors->first('description') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group{{ $errors->has('price') ? ' has-danger' : '' }}">
                                        <label for="description">
                                            <b>Price</b>
                                        </label>
                                        <div class="input-group input-group-alternative mb-3">
                                            <input class="form-control{{ $errors->has('price') ? ' is-invalid' : '' }}" type="text" name="price" value="{{ old('price') }}" required autofocus>
                                        </div>
                                        @if ($errors->has('price'))
                                            <span class="invalid-feedback" style="display: block;" role="alert">
                                                <strong>{{ $errors->first('price') }}</strong>
                                            </span>
                                        @endif
                                    </div>
                                </div>
                            </div>

    
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary btn-block">{{ __('Create Task') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection
