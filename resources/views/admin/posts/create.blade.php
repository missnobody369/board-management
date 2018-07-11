@extends('layouts.app')


@section('content')


    {{-- Logic to see errors, from postcontroller --}}
    @if(count($errors) > 0)
        <ul class="list-group">
            @foreach($errors->all() as $error)
                <li class="list-group-item text-danger">
                    {{ $error }}
                </li>
            @endforeach
        </ul>
    @endif
    {{-- to check if this error has data --}}
    {{-- if there is data it should be outputted so user can see error --}}


    <div class="card">

        <div class="card-header">
            Create a New Post
        </div>

        <div class="card-body">
            <form action="{{route('post.store')}}" method="POST" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="title">Title</label>
                    <input type="text" name="title" class="form-control">
                </div>
                <div class="form-group">
                    <label for="featured">Featured Image</label>
                    <input type="file" name="featured" class="form-control">
                </div>
                <div class="form-group">
                    <label for="featured">Content</label>
                    <textarea name="content" id="content" cols="5" rows="5" class="form-control"></textarea>
                </div>

                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success" type="submit">Create Post</button>
                    </div>
                </div>
            </form>
        </div>

    </div>


@stop