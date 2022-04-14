@extends('layouts.app')
@section('content')
<x-layout>
    <div class="slot">
        <h1 class="post-title">{{$post->title}}</h1>
        <hr>
        <div class="px-5 post-body">
           <h4>{{$post->body}}</h4>
        </div>
        <div class="back">
            <hr>
            <a href="/post" class="butn">back</a>
        </div>
    </div>
</x-layout>
@endsection
