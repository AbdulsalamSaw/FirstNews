@extends('admin.app.layout')
@section('title', __('cpanel.home_page'))

@section('content')
<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="card bg-primary text-white mb-4">
            <div class="card-body">
                <h4>{{ __('cpanel.user') }}</h4>
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <div class="PatientNumber">
                   <h5>{{ $usersCount }}</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="card bg-danger text-white mb-4">
            <div class="card-body">
                <h4>{{ __('cpanel.visitors') }}</h4>
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <div class="TestNumber">
                    <h5>{{ $visitorsCount }}</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="card bg-success text-white mb-4">
            <div class="card-body">
                <h4>{{ __('cpanel.categories') }}</h4>
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <div class="TestNumber">
                    <h5>{{ $categoriesCount }}</h5>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-3 col-md-6">
        <div class="card bg-danger text-white mb-4">
            <div class="card-body">
                <h4>{{ __('cpanel.articles') }}</h4>
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <div class="TestNumber">
                    <h5>{{ $articlesCount }}</h5>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-6 col-md-6">
        <div class="card-body">
            <h4>{{ __('cpanel.chart_user') }}</h4>
            {!! $chart_user->renderHtml() !!}
        </div>
    </div>
    <div class="col-lg-6 col-md-6">
        <div class="card-body">
            <h4>{{ __('cpanel.chart_visitor') }}</h4>
            {!! $chart_visitor->renderHtml() !!}
        </div>
    </div>
</div>

<div class="row">
    <div class="col-lg-6 col-md-6">
        <div class="card-body">
            <h4>{{ __('cpanel.chart_category') }}</h4>
            {!! $chart_category->renderHtml() !!}
        </div>
    </div>
    <div class="col-lg-6 col-md-6">
        <div class="card-body">
            <h4>{{ __('cpanel.chart_article') }}</h4>
            {!! $chart_article->renderHtml() !!}
        </div>
    </div>
</div>

{!! $chart_user->renderChartJsLibrary() !!}
{!! $chart_user->renderJs() !!}

{!! $chart_visitor->renderChartJsLibrary() !!}
{!! $chart_visitor->renderJs() !!}

{!! $chart_category->renderChartJsLibrary() !!}
{!! $chart_category->renderJs() !!}

{!! $chart_article->renderChartJsLibrary() !!}
{!! $chart_article->renderJs() !!}

@endsection
