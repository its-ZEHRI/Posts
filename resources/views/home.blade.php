@extends('layouts.app')
@section('content')
<x-layout homepage>
    <x-slot name="hpage">
        @Auth
            <h1 style="letter-spacing: 15px"><span>{{Auth::user()->name}}</span></h1>
        @endAuth
        @guest
            <h1><span>Post</span> Something Special</h1>
            <p>Create your first post</p>
            <a href="{{route('login')}}" class="butn btn-S-in">Login</a>
            <a href="{{route('register')}}" class="butn btn-S-up">Register</a>
        @endguest
    </x-slot>
</x-layout>
@endsection
