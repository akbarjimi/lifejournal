@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Directors</div>

                <div class="card-body">
                    <div class="form-group row mb-0">
                        <div class="col-md-6">
                        <a href="{{ route('directors.create') }}" class="btn btn-primary">
                                {{ __('Add') }}
                        </a>
                        </div>
                    </div>

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @foreach ($directors as $director)
                        <div>
                        {{ $director->fullname }}
                        <a href="{{ route('directors.edit', $director) }}">
                            edit
                        </a>
                        <a href="{{ route('directors.delete', $director) }}">
                            delete
                        </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
