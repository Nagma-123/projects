@extends('layouts.app')

@section('content')
<div class="container">
    {{-- <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
    </div> --}}
    <div class="row">
        @if($user && $user->profile)
        <div class="col-3 p-5">
            <img src="{{ $user->profile->profileImage() }}" style="height:170px;width:170px;" class="rounded-circle w-100">
        </div>
        @endif
        <div class="col-9 pt-5">
        <div class="d-flex justify-content-between align-items-baseline">
            <div class="d-flex">
                <h1>{{ $user->username }}</h1>
                <follow-button user-id="{{ $user->id }}" follows="{{ $follows }}"></follow-button>
            </div>
            @can('update', $user->profile)
                <a href="/p/create">Add New Post</a>
            @endcan
             
        </div>
        @can('update', $user->profile)
            <a href="/profile/{{ $user->id }}/edit">Edit Profile</a>
        @endcan
        {{-- <a href="/profile/{{ $user->id }}/edit">Edit Profile</a> --}}
            <div class="d-flex">
                <div class="pr-5"><strong>{{ $user->posts->count() }}</strong>posts</div>
                <div class="pr-5"><strong>{{ $user->profile->followers->count() }}</strong>followers</div>
                <div class="pr-5"><strong>{{ $user->following->count() }}</strong>following</div>
            </div>
            <div class="pt-4 font-weight-bold">{{ $user->profile->title ?? 'N/A' }}</div>
            <div>{{ $user->profile->description ?? 'N/A' }}</div>
            <div><a href="#">{{ $user->profile->url ?? 'N/A' }}</a></div>
        </div>
    </div>
    <div class="row pt-4">
        @foreach($user->posts as $post)
            <div class="col-4 pb-4">
                <a href="/p/{{ $post->id }}">
                    <img src="/storage/{{ $post->image }}" class="w-100">
                </a>        
            </div>
        @endforeach  
    </div>
</div>
@endsection
