@extends('admin.app.layout')
@section('title', 'Home Page')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">{{ __('categories.addNewCategory') }}</div>

            <div class="card-body">
                <form method="POST" action="{{ route('categories.store') }}">
                    @csrf

                    <div class="form-group row">
                        <label for="name" class="col-md-2 col-form-label text-md-right">{{ __('categories.categoryName') }}</label>

                        <div class="col-md-10">
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="description" class="col-md-2 col-form-label text-md-right">{{ __('categories.categoryDescription') }}</label>
                    
                        <div class="col-md-10">
                            <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description" rows="4" required>{{ old('description') }}</textarea>
                            
                            @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="image" class="col-md-2 col-form-label text-md-right">{{ __('categories.categoryImage') }}</label>
                    
                        <div class="col-md-10">
                            <input id="image" type="file" class="form-control @error('image') is-invalid @enderror" name="image" accept="image/*" required>
                            
                            @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                                        
                    <div class="form-group row">
                        <div class="col-md-12 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('categories.addNewCategory') }}
                            </button>
                            <a href="{{ route('categories.index') }}" class="btn btn-secondary">{{ __('actions.cancel') }}</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
