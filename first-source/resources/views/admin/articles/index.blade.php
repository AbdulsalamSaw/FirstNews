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
                            @foreach($articles as $article)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $article->title }}</td>
                                <td>{{ $article->created_at }}</td>
                                <td>
                                    <td>
                                        <a href="{{ route('articles.show', $article->id) }}" class="btn btn-primary">عرض</a>
                                        <a href="{{ route('articles.edit', $article->id) }}" class="btn btn-warning">تعديل</a>
                                        <form action="{{ route('articles.destroy', $article->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">حذف</button>
                                        </form>
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
