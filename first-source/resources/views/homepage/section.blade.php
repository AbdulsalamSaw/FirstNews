@extends('app.layout')
@section('title', 'Home Page')
@section('content')

<section id="hero">
    <section class="top-news">
        @foreach ($latestNews as $news)
        <article class="news-article">
            <img src="{{ $news->image }}" alt="News Image">
            <h2>{{ $news->title }}</h2>
            <p>{{ $news->content }}</p>
            <a href="{{ route('news.show', $news->id) }}">Read More</a>
        </article>
        @endforeach
    </section>
</section>

@endsection

