@extends('layouts.app')

@section('content')
    <div class="mt-5 card-container">
        <div class="row">
            <div class="col-12">
                <h4 class="author">{{ $post->user->name }}</h4>
            </div>
            <div class="col-12 text-center img-resize">
                @if (substr( filter_var($post->img_post), 0, 4 ) === "http" )
                    <img src="{{ $post->img_post }}" alt="img post" class="w-100">
                @else
                    <img src="{{ asset('storage/' . $post->img_post) }}" alt="img post"  class="w-100">
                @endif 
            </div>
            <div class="col-12">
                Tags: 
                @forelse ($post->tags as $tag)
                    <span class="badge rounded-pill text-white bg-success p-2 mx-1">
                         {{  $tag->name }}
                    </span>
                @empty
                    <span>
                        No tags
                    </span>
                @endforelse
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
                <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-warning">Edit</a>
            </div>
        </div>

    </div>
@endsection