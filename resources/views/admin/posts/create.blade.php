@extends('layouts.app')


@section('content')


    <div class="card">

        <div class="card-header">
            Create a New Post
        </div>

        <div class="card-body">
            <form action="{{route('post.store')}}" method="POST">
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