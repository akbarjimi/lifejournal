@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Publishers</div>

                <div class="card-body">
                    <div class="form-group row mb-0">
                        <div class="col-md-6">
                        <a href="{{ route('publishers.create') }}" class="btn btn-primary">
                                {{ __('Add') }}
                        </a>
                        </div>
                    </div>

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @foreach ($publishers as $publisher)
                        <div>
                        {{ $publisher->name }}
                        <a href="{{ route('publishers.edit', $publisher) }}">
                            edit
                        </a>
                        <a href="{{ route('publishers.delete', $publisher) }}">
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
