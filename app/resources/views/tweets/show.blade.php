@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center mb-5">
            <div class="col-md-8 mb-3">
                <div class="card">
                    <div class="card-haeder p-3 w-100 d-flex">
                        <img src="{{ asset('storage/profile_image/' .$tweet->user->profile_image) }}" alt onerror="this.onerror = null; this.src='https://placehold.jp/50x50.png';" class="rounded-circle" width="50" height="50">
                        <div class="ml-2 d-flex flex-column">
                            <p class="mb-0">{{ $tweet->user->name }}</p>
                            <a href="{{ route('users.show', $tweet->user->user_id) }}" class="text-secondary">{{ $tweet->user->user_id }}</a>
                        </div>
                        <div class="d-flex justify-content-end flex-grow-1">
                            <p class="mb-0 text-secondary">{{ $tweet->created_at->format('Y-m-d H:i') }}</p>
                        </div>
                    </div>
                    <div class="card-body">
                        {!! nl2br(e($tweet->text)) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection