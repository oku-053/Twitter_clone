@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @if (isset($timelines))
            @foreach ($timelines as $timeline)
                <div class="col-md-8 mb-0">
                    <div class="card">
                        <div class="card-haeder p-3 w-100 d-flex" style="z-index:2">
                            <img src="{{ asset('storage/profile_image/' .$timeline->user->profile_image) }}" alt onerror="this.onerror = null; this.src='https://placehold.jp/50x50.png';" class="rounded-circle" width="50" height="50">
                            <div class="ml-2 d-flex flex-column">
                                <p class="mb-0">{{ $timeline->user->name }}</p>
                                <a href="{{ route('users.show', $timeline->user_id) }}" class="text-secondary">{{ $timeline->user_id }}</a>
                            </div>
                            <div class="d-flex justify-content-end flex-grow-1">
                                <p class="mb-0 text-secondary">{{ $timeline->created_at->format('Y-m-d H:i') }}</p>
                            </div>
                        </div>
                        <div class="card-body">
                            {!! nl2br(e($timeline->text)) !!}
                            <a href="{{ route('tweets.show',$timeline->tweet_id) }}" class="card__link"></a>
                        </div>
                    </div>
                </div>
            @endforeach
        @else
        <div class="col-md-8 mb-0">
            <div class="card">
                <div class="card-haeder p-3 w-100 d-flex" style="z-index:2">
                    <img src='https://placehold.jp/50x50.png';" class="rounded-circle" width="50" height="50">
                    <div class="ml-2 d-flex flex-column">
                        <p class="mb-0">{{__('Twitter') }}</p>
                        <a href="{{ route('users.show', $timeline->user_id) }}" class="text-secondary">{{ __('Twiiter000') }}</a>
                    </div>
                </div>
                <div class="card-body">
                    {{ __('Log in and tweet for the first time!') }}
                </div>
                    <span class="favorites" style="z-index:3">
                        <i class="fa-solid fa-heart"></i>
                        <span class="favoriteCounter">{{ __('0') }</span>
                    </span>
            </div>
        </div>
        @endif
    </div>
    <div class="my-4 d-flex justify-content-center">
        {{ $timelines->links() }}
    </div>
</div>
@endsection