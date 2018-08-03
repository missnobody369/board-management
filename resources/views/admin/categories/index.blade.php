@extends('layouts.app')


@section('content')
    
    <div class="card">
        <div class="card-title">
            Categories
        </div>
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <th>
                        Category Name
                    </th>
                    <th>
                        {{-- Edit --}}
                    </th>
                    <th>
                        {{-- Delete --}}
                    </th>
                </thead>
        
                <tbody>
                    @if($categories->count()>0)
                        @foreach($categories as $category)
                            <tr>
                                <td>
                                    {{$category->name}}
                                </td>

                                {{-- Edit --}}
                                <td>
                                    <a href="{{route('category.edit', ['id' => $category->id])}}" class="btn btn-xs btn-info">
                                        Edit
                                    </a>
                                </td>

                                {{-- Delete --}}
                                <td>
                                    <a href="{{route('category.delete', ['id' => $category->id])}}" class="btn btn-xs btn-danger">
                                        Delete
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <th colspan="5" class="text-center">No Categories Created</th>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>


@stop