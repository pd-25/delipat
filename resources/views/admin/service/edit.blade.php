@extends('layouts.app')
@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-title">
                    <h4>Edit Service</h4>
                    @if (Session::has('msg'))
                        <p class="alert alert-info">{{ Session::get('msg') }}</p>
                    @endif
                </div>
                <div class="card-body">
                    <div class="basic-form">
                        <form action="{{ route('services.update', $service->service_slug) }}" method="POST">
                            @method('PUT')
                            @csrf
                            <div class="form-group">
                                <label>Service Name</label>
                                <input type="text" class="form-control" placeholder="Service name" name="service_name" value="{{ $service->service_name }}">
                                @error('service_name')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <input type="hidden" name="type" value="{{ $service->type }}">
                            {{-- <div class="form-group">
                                <label>Service Slug</label>
                                <input type="text" class="form-control" placeholder="service-name" name="service_slug" value="{{ $service->service_slug }}" disabled>
                                <span class="text-info">Slug can not be changed</span>
                                @error('service_slug')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div> --}}
                            <a href="{{ route('services.index') }}" class="btn btn-danger">Back</a>
                            <button type="submit" class="btn btn-default">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endsection
