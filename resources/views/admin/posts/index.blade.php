@extends('layouts.app')

@section('content')
    <div class="container-lg mt-5">
      @if (session('delete'))
        <div class="delete-div p-2 mb-3">
          Il post con id {{ session('delete') }} è stato eliminato!
        </div>
      @endif
      <a href="{{ route('admin.posts.create') }}" class="btn btn-primary mb-3">Add</a>
        <table class="table">
            <thead class="thead-dark">
              <tr class="text-center">
                <th scope="col">ID</th>
                <th scope="col">Author</th>
                <th scope="col">Description</th>
                <th scope="col">Tag</th>
                <th scope="col"></th>
                <th scope="col"></th>
              </tr>
            </thead>
            <tbody>
                @forelse ($posts as $post)
                <tr>
                    <td><a href="{{ route('admin.posts.show', $post->id) }}">{{ $post->id }}</a></td>
                    <td>{{ $post->user->name }}</td>
                    <td>{{ $post->description }}</td>
                    <td>
                      @forelse ($post->tags as $tag)
                      <span class="badge rounded-pill text-white bg-success p-2 m-1">
                        {{ $tag->name }}
                      </span>
                      @empty
                          <span>
                              Could not find any tag
                          </span>
                      @endforelse
                    </td>
                    <td><a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-warning">Edit</a></td>
                    <td>
                      <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST">
                        @csrf
                        @method('delete')
                        <input type="submit" class="btn btn-danger" value="Delete">
                      </form>
                    </td>
                </tr>
                @empty
                    
                @endforelse
                

            </tbody>
          </table>
          
    </div>


@endsection