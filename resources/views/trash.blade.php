@extends('layouts.app')
@section('content')
<x-layout>

    <div class="slot">
        <div class="d-flex jsutify-content-between align-items-center">
            <h1 style="color: #1A8CD8">Trash Posts</h1>
            <div class="ms-auto">
                <a href="/dashboard" class="butn "><- back</a>
            </div>
        </div>
        <hr>
        <div class="px-5 container post-body">

            @if (Session::has('resp'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong></strong> {{Session::get('resp')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            @if (Session::has('response'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>Invalid Credentials..</strong> {{Session::get('response')}}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @foreach ($trashPosts as $post)
            @if($post->user_id != Auth::User()->id)
                @else
                    <div class="post mt-3">
                        <h5>{{$post->title}}</h5>
                        <p class="mb-1">{{Str::limit($post->body, 80, ' ...')}}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="text-capitalize">{{$post->author}} | {{$post->created_at->format('m/d/y')}}</span>
                            <div>
                                <a href="/restorePost/{{$post->id}}" class="btn btn-success btn-sm ms-auto">Restore</a>
                                <a href="/P-deletePost/{{$post->id}}" class="btn btn-danger btn-sm">Delete</a>
                            </div>
                        </div>
                    </div>
                    @endif
                    @endforeach
                </div>
            </div>
</x-layout>
@endsection
