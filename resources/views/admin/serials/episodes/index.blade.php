@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Episodes</div>

                <div class="card-body">
                    <div class="form-group row mb-0">
                        <div class="col-md-6">
                        <a href="{{ route('serials.episodes.create', $serial) }}" class="btn btn-primary">
                                {{ __('Add') }}
                        </a>
                        </div>
                    </div>

                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @foreach ($serial->episodes as $episode)
                    <div>
                        {{ $episode->name }}
                        <a href="{{ route('serials.episodes.edit', [$serial, $episode]) }}">
                            edit
                        </a>
                        <a href="{{ route('serials.episodes.delete', [$serial, $episode]) }}">
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
