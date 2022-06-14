@extends('layouts.app')
@section('title', 'ユーザー一覧')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @foreach ($all_users as $user)
            <div class="card">
                <div class="card-haeder p-3 w-100 d-flex">
                    <img src="{{ $user->profile_image }}" class="rounded-circle" width="50" height="50">
                    <div class="ml-2 d-flex flex-column">
                        <p class="mb-0">{{ $user->name }}</p>
                        <a href="{{ url('users/' .$user->user_id) }}" class="text-secondary">{{ $user->user_id }}</a>
                    </div>
                    @if (auth()->user()->isFollowed($user->user_id))
                    <div class="px-2">
                        <span class="px-1 bg-secondary text-light">フォローされています</span>
                    </div>
                    @endif
                    <div class="d-flex justify-content-end flex-grow-1">
                        @if (auth()->user()->isFollowing($user->user_id))
                        <form action="{{ route('unfollow', ['user' => $user->user_id]) }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}

                            <button type="submit" class="btn btn-danger">フォロー解除</button>
                        </form>
                        @else
                        <form action="{{ route('follow', ['user' => $user->user_id]) }}" method="POST">
                            {{ csrf_field() }}

                            <button type="submit" class="btn btn-primary">フォロー</button>
                        </form>
                        @endif
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="my-4 d-flex justify-content-center">
        {{ $all_users->links() }}
    </div>
</div>
@endsection