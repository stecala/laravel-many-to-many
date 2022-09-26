@extends('layouts.app')

@section('content')
    <div class="container-lg mt-5">
        <form action="{{ route('admin.posts.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            @include('admin.posts.include.form')
            <button type="submit" class="btn btn-primary">Add</button>
          </form>
    </div>
@endsection