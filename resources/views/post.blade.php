@extends('layouts.app')
@section('content')
<x-layout>

    <div class="slot">
        <div class="d-flex jsutify-content-between align-items-center">
            <h1 style="color: #1A8CD8">Posts</h1>
            <div class="ms-auto">
            </div>
        </div>
        <hr>
        <div class="px-5 container post-body">
            @foreach ($posts as $post)
                <a class="post-link" href="/post/{{$post->id}}">
                    <div class="post mt-3">
                        <h5>{{$post->title}}</h5>
                        <p class="mb-1">{{Str::limit($post->body, 80, ' ...')}}</p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="text-capitalize">{{$post->author}} | {{$post->created_at->format('m/d/y')}}</span>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </div>
</x-layout>
@endsection
