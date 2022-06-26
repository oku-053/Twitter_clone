@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        @if (isset($timelines))
        @foreach ($timelines as $timeline)
        <div class="col-md-8 mb-3">
            <div class="card">
                <div class="card-haeder p-3 w-100 d-flex">
                    <img src="{{ asset('storage/profile_image/' .$timeline->user->profile_image) }}" class="rounded-circle" width="50" height="50">
                    <div class="ml-2 d-flex flex-column">
                        <p class="mb-0">{{ $timeline->name }}</p>
                        <a href="{{ route('users.show', $timeline->user_id) }}" class="text-secondary">{{ $timeline->user_id }}</a>
                    </div>
                    <div class="d-flex justify-content-end flex-grow-1">
                        <p class="mb-0 text-secondary">{{ $timeline->created_at->format('Y-m-d H:i') }}</p>
                    </div>
                </div>
                <div class="card-body">
                    {!! nl2br(e($timeline->text)) !!}
                </div>
                <div class="card-footer py-1 d-flex justify-content-end bg-white">
                    @if ($timeline->user_id === Auth::id())
                    <div class="dropdown mr-3 d-flex align-items-center">
                        <a href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-fw"></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <form method="POST" action="{{ route('tweets.show', $timeline->user_id) }}" class="mb-0">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="dropdown-item del-btn">削除</button>
                            </form>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
        </div>
        @endforeach
        @endif
    </div>
    <div class="my-4 d-flex justify-content-center">
        {{ $timelines->links() }}
    </div>
</div>
@endsection