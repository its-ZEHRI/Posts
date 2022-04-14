@extends('layouts.app')
@section('content')
<x-layout>

    <div class="slot">
        <div class="d-flex jsutify-content-between align-items-center">
            <h1 style="color: #1A8CD8">Editor</h1>
            <div class="ms-auto">
            </div>
        </div>
        <hr>
        <div class="px-5">
            <textarea class="form-control" id="summary-ckeditor" name="summary-ckeditor"></textarea>
        </div>
        <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
        <script>
            CKEDITOR.replace( 'summary-ckeditor' );
        </script>

    </div>
</x-layout>
@endsection
