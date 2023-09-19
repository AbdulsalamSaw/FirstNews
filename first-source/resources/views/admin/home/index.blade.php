@extends('admin.app.layout')
@section('title', 'Home Page')
@section('content')
<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="card bg-primary text-white mb-4">
            <div class="card-body">
                <h4>User</h4>
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
                <h4>Visitors</h4>
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
                <h4>Categories</h4>
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
                <h4>Articles</h4>
            </div>
            <div class="card-footer d-flex align-items-center justify-content-between">
                <div class="TestNumber">
                    <h5>{{ $articlesCount }}</h5>
                </div>
            </div>
        </div>
    </div>
</div>


</table>




@endsection
