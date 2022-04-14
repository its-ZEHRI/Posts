@extends('layouts.app')
@section('content')
<x-layout>

    <div class="slot" style="overflow-y: auto">
        <div class="d-flex justify-content-between align-items-ceneter">
            <h3>Create a Post</h3>
            <div class="pe-5">
                <h5 class="text-capitalize">{{Auth::User()->name}}</h5>
            </div>
        </div>
        <hr>

        @if (Session::has('resp'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong></strong> {{Session::get('resp')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif

        <div class="px-5 container">
            <form action="createPost" method="POST">
                @csrf
                <input type="hidden" value="{{Auth::User()->name}}" name="authName">
                <label for="">Title</label>
                <input type="text"  name="title" class="form-control" placeholder="">
                @error('title')
                    <span class="text-danger">{{$message}}</span>
                @enderror
                <label for="">discription</label>
                <textarea name="body" class="form-control" cols="30" rows="10"></textarea>
                @error('body')
                    <span class="text-danger">{{$message}}</span>
                @enderror
                <input type="submit"  value="Create" class="butn cPost-btn mx-0">
            </form>
        </div>
    </div>
</x-layout>
@endsection
