@extends('admin.app.layout')
@section('title', 'Show')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ $article->title }}</div>
                <div class="card-body">
                    @if ($article->image)
                        <img src="{{ asset($article->image) }}" alt="{{ $article->title }}" class="img-fluid mb-3">
                    @endif
                    @if ($article->video)
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item" src="{{ $article->video }}" allowfullscreen></iframe>
                        </div>
                    @endif
                    <p class="mt-3">{{ $article->content }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Related Articles</div>
                <div class="card-body">
                    <!-- عرض المقالات ذات الصلة هنا -->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
