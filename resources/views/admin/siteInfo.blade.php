@extends('layouts.app')
@section('content')
    <div class="card">
        <div class="card-title">
            <h4>Site Information</h4>
            @if (Session::has('msg'))
                <p class="alert alert-info">{{ Session::get('msg') }}</p>
            @endif
        </div>
        <form action="{{ route('updateSite') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        
                        <div><label>Logo</label></div>
                        @if (isset($siteInfo->logo_image) &&
                                !empty($siteInfo->logo_image && File::exists(public_path('storage/SiteInfo/' . $siteInfo->logo_image))))
                            <img style="max-width: 100px;" src="{{ asset('storage/SiteInfo/' . $siteInfo->logo_image) }}" alt="">
                        @else
                            <img src="{{ asset('noimg.png') }}" alt="Image not found">
                        @endif
                        <input type="file" class="form-control mt-2" name="logo_image">

                    </div>

                    <div class="form-group">
                        <div>
                            <label>Favicon</label>
                        </div>
                        @if (isset($siteInfo->favicon_image) &&
                                !empty($siteInfo->favicon_image && File::exists(public_path('storage/SiteInfo/' . $siteInfo->favicon_image))))
                            <img style="max-width: 100px;" src="{{ asset('storage/SiteInfo/' . $siteInfo->favicon_image) }}" alt="">
                        @else
                            <img src="{{ asset('noimg.png') }}" alt="Image not found">
                        @endif
                        <input type="file" class="form-control mt-2" name="favicon_image">

                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Address</label>
                        <input type="text" class="form-control" placeholder="title" name="address"
                            value="{{ $siteInfo->address }}" required>
                        @error('address')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" class="form-control" placeholder="email" name="email"
                            value="{{ $siteInfo->email }}" required>
                        @error('email')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>

                    <div class="form-group">
                        <label>Phone</label>
                        <input type="text" class="form-control" placeholder="Phone" name="phone"
                            value="{{ $siteInfo->phone }}" required>
                        @error('phone')
                            <span class="text-danger" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                    </div>
                </div>
            </div>
            <div class="text-center">
                <button class="btn btn-primary btn-lg">Update</button>

            </div>
        </form>
    </div>
@endsection
