@extends('layouts.app')

@section('content')
    <div class="mt-5 card-container">
        <div class="row">
            <div class="col-12">
                <h4 class="author">{{ $post->user->name }}</h4>
            </div>
            <div class="col-12 text-center img-resize">
                <img src="{{ $post->img_post }}" alt="img post" >
            </div>
            <div class="col-12 post mt-2">
                {{ $post->description }}
            </div>
            <div class="col-6 date-cont">
                <span>
                    {{ $post->post_date }}
                </span>
            </div>
            <div class="col-6 d-flex justify-content-end">
                <a href="" class="btn btn-warning">Edit</a>
            </div>
        </div>

    </div>
@endsection