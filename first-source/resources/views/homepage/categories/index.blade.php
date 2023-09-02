<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <div class="tab-content" id="nav-tabContent">
        <!-- Loop through the articles in the $category variable -->
        @foreach($articles as $article)
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                <div class="whats-news-caption">
                    <div class="row">
                        <div class="col-lg-6 col-md-6">
                            <div class="single-what-news mb-100">
                                <div class="what-img">
                                    <!-- Use the article's image URL -->
                                    <img src="{{ $article->image_url }}" alt="{{ $article->title }}">
                                </div>
                                <div class="what-cap">
                                    <span class="color1">{{ $article->category }}</span>
                                    <h4><a href="">{{ $article->title }}</a></h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

</body>
</html>
