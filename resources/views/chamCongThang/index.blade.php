@extends('admin.layouts')
@section('title', 'Your Profile')
@section('content')

<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="{{ route('dashboard') }}"><i class="fa fa-home"></i> Home</a> >
                    <span>Timekeeping Month</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Form Section Begin -->

<!-- Section Begin -->
<div class="register-login-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="register-form">

                </div>
            </div>
        </div>
    </div>
</div>

<!-- Form Section End -->
@endsection

@push('CRUD')
@endpush