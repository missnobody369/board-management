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
            Create a New Category
        </div>

        <div class="card-body">
            <form action="{{route('category.store')}}" method="POST">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control">
                </div>
                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success" type="submit">Create Category</button>
                    </div>
                </div>
            </form>
        </div>

    </div>


@stop