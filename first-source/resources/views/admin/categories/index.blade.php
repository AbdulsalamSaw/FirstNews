@extends('admin.app.layout')
@section('title', 'categories.viewCategories')
@section('content')
    <div class="container">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">{{ __('categories.categories') }}</div>
                    <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">{{ __('categories.categoryName') }}</th>
                                <th scope="col">{{ __('actions.actions') }}</th>
                            </tr>
                        </thead>
                        <tbody >
                            @foreach ($categories as $category)
                                <tr>
                                    <th scope="row">{{ $category->id }}</th>
                                    <td>{{ $category->name }}</td>
                                    <td>
                                        <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-secondary btn-equal-size">{{ __('actions.edit') }}</a>
                                        <a action="{{ route('categories.destroy', $category->id) }}" method="POST" >
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"  class="btn btn-danger btn-equal-size" onclick="return confirm('Are you sure you want to delete this category?')">{{ __('actions.delete') }}</button>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
    </div>
@endsection
