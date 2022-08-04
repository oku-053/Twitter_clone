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
                    <div class="card-footer py-1 d-flex justify-content-end bg-white" style="z-index:4">
                        <div>
                            @if (!$tweet->isfavoritedBy(Auth::user()))
                                <span class="favorites">
                                <i class="fa-solid fa-heart favoriteToggle" data-tweet-id="{{ $tweet->tweet_id }}"></i>
                                <span class="favoriteCounter">{{$tweet->favoritesCount()}}</span>
                                </span>
                            @else
                                <span class="favorites">
                                    <i class="fa-solid fa-heart favoriteToggle favorite"  data-tweet-id="{{ $tweet->tweet_id }}"></i>
                                <span class="favoriteCounter">{{$tweet->favoritesCount()}}</span>
                                </span>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
                <ul class="list-group col-md-8 mb-0">
                    <li class="list-group-item">
                        <div class="py-3">
                            <form method="POST" action="{{ route('comments.store') }}">
                                @csrf
                                <div class="form-group row mb-0">
                                    <div class="col-md-12 p-3 w-100 d-flex">
                                        <img src="{{ asset('storage/profile_image/' .$user->profile_image) }}" alt onerror="this.onerror = null; this.src='https://placehold.jp/50x50.png';" class="rounded-circle" width="50" height="50">
                                        <div class="ml-2 d-flex flex-column">
                                            <p class="mb-0">{{ $user->name }}</p>
                                            <a href="{{ route('users.show', $tweet->user->user_id) }}"  class="text-secondary">{{ $user->user_id }}</a>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <input type="hidden" name="tweet_id" value="{{ $tweet->tweet_id }}">
                                        <textarea class="form-control @error('text') is-invalid @enderror" id="tweetForm" name="text" required autocomplete="text" rows="4" placeholder="{{ __('Tweet a comment') }}">{{ old('text') }}</textarea>

                                        @error('text')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                    <div class="col-md-12 text-right">
                                        <p id="inputCount" class="mb-4 text-dark"><span id="inputCounter">{{ __('0') }}</span>{{ __('characters') }}</p>
                                        <script src="{{ mix('js/tweet.js') }}"></script>
                                        <button type="submit" id="tweetButton" class="btn btn-primary">
                                            {{ __('Tweet') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                            @if (session('flash_message'))
                                <div class="flash_message">
                                    {{ __(session('flash_message')) }}
                                </div>
                            @endif
                        </div>
                    </li>
                    @forelse ($comments as $comment)
                        <li class="list-group-item">
                            <div class="py-3 w-100 d-flex">
                                <img src="{{ asset('storage/profile_image/' .$comment->user->profile_image) }}" alt onerror="this.onerror = null; this.src='https://placehold.jp/50x50.png';" class="rounded-circle" width="50" height="50">
                                <div class="ml-2 d-flex flex-column">
                                    <p class="mb-0">{{ $comment->user->name }}</p>
                                    <a href="{{ route('users.show', $tweet->user->user_id) }}" class="text-secondary">{{ $comment->user->user_id }}</a>
                                </div>
                                <div class="d-flex justify-content-end flex-grow-1">
                                    <p class="mb-0 text-secondary">{{ $comment->created_at->format('Y-m-d H:i') }}</p>
                                 </div>
                                </div>
                            <div class="py-3">
                                {!! nl2br(e($comment->text)) !!}
                            </div>
                            <div class="card-footer py-1 d-flex justify-content-end bg-white" style="z-index:3">
                            </div>
                        </li>
                    @empty
                        <li class="list-group-item">
                            <p class="mb-0 text-secondary">{{ __('No comments') }}</p>
                        </li>
                    @endforelse
                </ul>

        </div>
    </div>
@endsection