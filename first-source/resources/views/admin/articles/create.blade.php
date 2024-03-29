@extends('admin.app.layout')
@section('title', __('articles.addNewArticle'))
@section('content')
<div class="container mt-5">
    <form action="{{ route('articles.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">{{ __('articles.articleTitle') }}:</label>
            <input type="text" name="title" id="title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label for="content" class="form-label">{{ __('articles.articleContent') }}:</label>
            <div class="d-flex align-items-center mb-2">
                <div class="flex-grow-1">
                    <textarea name="content" id="editor" class="form-control"></textarea>
                </div>
                <div class="ms-2">
                    <i class="bi bi-font-size"></i>
                </div>
            </div>
        </div>

        <div class="mb-3">
            <label for="categorie_id" class="form-label">{{ __('articles.selectCategory') }}:</label>
            <select name="categorie_id" id="categorie_id" class="form-select" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">{{ __('articles.chooseImage') }}:</label>
            <input type="file" name="image" id="image" class="form-control" accept="image/*" required>
        </div>

        <button type="submit" class="btn btn-primary">{{ __('articles.createArticle') }}</button>
    </form>
</div>
@endsection
