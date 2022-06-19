@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mb-3">
            <div class="card">
                <div class="d-inline-flex">
                    <div class="p-3 d-flex flex-column">
                        <img src="{{ asset('storage/profile_image/' .$user->profile_image) }}" class="rounded-circle" width="100" height="100">
                        <div class="mt-3 d-flex flex-column">
                            <h4 class="mb-0 font-weight-bold">{{ $user->name }}</h4>
                            <span class="text-secondary">{{ $user->user_id }}</span>
                        </div>
                    </div>
                    <div class="p-3 d-flex flex-column justify-content-between">
                        <div class="d-flex">
                            <div>
                                @if ($user->user_id === Auth::user()->user_id)
                                <a href="{{ route('users.edit', $user->user_id) }}" class="btn btn-primary">{{ __('edit_profile') }}</a>
                                @else
                                @if ($isFollowing)
                                <form action="{{ route('unfollow', ['user' => $user->user_id]) }}" method="POST">
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}

                                    <button type="submit" class="btn btn-danger">{{ __('un_Follow') }}</button>
                                </form>
                                @else
                                <form action="{{ route('follow', ['user' => $user->user_id]) }}" method="POST">
                                    {{ csrf_field() }}

                                    <button type="submit" class="btn btn-primary">{{ __('Follow') }}</button>
                                </form>
                                @endif

                                @if ($isFollowed)
                                <span class="mt-2 px-1 bg-secondary text-light">{{ __('Followed') }}</span>
                                @endif
                                @endif
                            </div>
                        </div>
                        <div class="d-flex justify-content-end">
                            <div class="p-2 d-flex flex-column align-items-center">
                                <p class="font-weight-bold">{{ __('Tweet_count') }}</p>
                                <span>{{ $tweetCount }}</span>
                            </div>
                            <div class="p-2 d-flex flex-column align-items-center">
                                <p class="font-weight-bold">{{ __('Follow_count') }}</p>
                                <span>{{ $followCount }}</span>
                            </div>
                            <div class="p-2 d-flex flex-column align-items-center">
                                <p class="font-weight-bold">{{ __('Follower_count') }}</p>
                                <span>{{ $followerCount }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @if (isset($timelines))
        <div class="col-md-8 mb-3">
            @foreach ($timelines as $timeline)
            <div class="card">
                <div class="card-haeder p-3 w-100 d-flex">
                    <img src="{{ asset('storage/profile_image/' .$user->profile_image) }}" class="rounded-circle" width="50" height="50">
                    <div class="ml-2 d-flex flex-column flex-grow-1">
                        <p class="mb-0">{{ $user->name }}</p>
                        <a href="{{ route('users.show', $timeline->user_id) }}" class="text-secondary">{{ $timeline->user_id }}</a>
                    </div>
                    <div class="d-flex justify-content-end flex-grow-1">
                        <p class="mb-0 text-secondary">{{ $timeline->created_at->format('Y-m-d H:i') }}</p>
                    </div>
                </div>
                <div class="card-body">
                    {{ $timeline->text }}
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endif
</div>
<div class="my-4 d-flex justify-content-center">
    {{ $timelines->links() }}
</div>
</div>
@endsection