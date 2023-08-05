@extends('layouts.app')
@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-title">
                    <h4>Create Service</h4>
                    @if (Session::has('msg'))
                        <p class="alert alert-info">{{ Session::get('msg') }}</p>
                    @endif
                </div>
                <div class="card-body">
                    <div class="basic-form">
                        <form action="{{ route('services.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Service Name</label>
                                <input type="text" class="form-control" placeholder="Service name" name="service_name" value="{{ old('service_name') }}">
                                @error('service_name')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Service Slug</label>
                                <input type="text" class="form-control" placeholder="service-name" name="service_slug" value="{{ old('service_slug') }}">
                                @error('service_slug')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-default">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection
