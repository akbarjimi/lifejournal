@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Serials</div>

                <div class="card-body">
                    <div class="form-group row mb-0">
                        <div class="col-md-6">
                        <a href="{{ route('serials.create') }}" class="btn btn-primary">
                                {{ __('Add') }}
                        </a>
                        </div>
                    </div>

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @foreach ($serials as $serial)
                        <div>
                        {{ $serial->name }}
                        {{ $serial->user->name}}
                        <a href="{{ route('serials.edit', $serial) }}">
                            edit
                        </a>
                        <a href="{{ route('serials.delete', $serial) }}">
                            delete
                        </a>
                        <a href="{{ route('serials.episodes.index', $serial) }}">
                            episodes
                        </a>                        

                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
