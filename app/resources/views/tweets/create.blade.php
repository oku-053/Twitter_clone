@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Tweet') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('tweets.store') }}">
                        @csrf
                        <div class="form-group row mb-0">
                            <div class="col-md-12 p-3 w-100 d-flex">
                                <img src="{{ asset('storage/profile_image/' .$user->profile_image) }}" alt onerror="this.onerror = null; this.src='https://placehold.jp/50x50.png';" class="rounded-circle" width="50" height="50">
                                <div class="ml-2 d-flex flex-column">
                                    <p class="mb-0">{{ $user->name }}</p>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <textarea class="form-control @error('text') is-invalid @enderror" id="tweetForm" name="text" required autocomplete="text" rows="4">{{ old('text') }}</textarea>

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
                    <!-- フラッシュメッセージ -->
                    @if (session('flash_message'))
                    <div class="flash_message">
                        {{ __(session('flash_message')) }}
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection