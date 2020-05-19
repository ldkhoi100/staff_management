@extends('admin.layouts')
@section('title', 'Your Profile')
@section('content')
<style>
    label {
        color: rgba(85, 85, 85, .8);
    }
</style>
<!-- Breadcrumb Section Begin -->
<div class="breacrumb-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb-text">
                    <a href="{{ route('dashboard') }}"><i class="fa fa-home"></i> Home</a> >
                    <span>My Profile</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb Form Section Begin -->

<!-- Section Begin -->
<div class="register-login-section spad">
    <div class="container" style="font-size: 20px;">
        <div class="row">
            <div class="col-lg-6 offset-lg-3">
                <div class="register-form">
                    <h2 style="text-align: center">My Profile</h2>

                    <table>

                        <tr>
                            <td></td>
                            <td>
                                <img id="zoom" src="img/{{ $staff->Anh_Dai_Dien }}" alt="No Image" srcset="" width="150"
                                    style=" border: 1px solid #d9d9d9;" class="img-thumbnail">
                            </td>
                        </tr>

                        <tr>
                            <td><label for="name">Full Name: &nbsp;</label> </td>
                            <td><span
                                    style=" border: 1px solid #d9d9d9; border-radius:12px; padding: 0px 10px;">{{ $staff->Ho_Ten }}</span>
                            </td>
                        </tr>

                        <tr>
                            <td><label for="email">Email: &nbsp;</label> </td>
                            <td>
                                <span style="border: 1px solid #d9d9d9; border-radius:12px; padding: 0px 10px;">
                                    {{ Auth::user()->email }}
                                </span>
                            </td>
                        </tr>

                        <tr>
                            <td><label for="name">Position: &nbsp;</label> </td>
                            <td><span
                                    style=" border: 1px solid #d9d9d9; border-radius:12px; padding: 0px 10px;">{{ $staff->chuc_vu->Ten_CV }}</span>
                            </td>
                        </tr>

                        <tr>
                            <td><label for="name">Shift Work: &nbsp;</label> </td>
                            <td><span
                                    style=" border: 1px solid #d9d9d9; border-radius:12px; padding: 0px 10px;">{{ $staff->ca_lam->Ca }}</span>
                            </td>
                        </tr>

                        <tr>
                            <td><label for="phone">Phone Number: &nbsp;</label></td>
                            <td>
                                <span
                                    style=" border: 1px solid #d9d9d9; border-radius:12px; padding: 0px 10px;">{{ $staff->So_Dien_Thoai }}
                                </span>
                            </td>
                        </tr>

                        <tr>
                            <td><label for="phone">Date Of Birth: &nbsp;</label></td>
                            <td>
                                <span
                                    style=" border: 1px solid #d9d9d9; border-radius:12px; padding: 0px 10px;">{{ $staff->Ngay_Sinh }}
                                    <i class="fas fa-birthday-cake" style="color: orange"></i>
                                </span>
                            </td>
                        </tr>

                        <tr>
                            <td><label for="phone">Gender: &nbsp;</label></td>
                            <td>
                                <span
                                    style=" border: 1px solid #d9d9d9; border-radius:12px; padding: 0px 10px;">{{ $staff->Gioi_Tinh }}
                                    @if($staff->Gioi_Tinh == "Female")
                                    <i class="fas fa-venus" style="color:#FF1493"></i>
                                    @elseif($staff->Gioi_Tinh == "Male")
                                    <i class="fas fa-mars" style="color:blue"></i>
                                    @endif
                                </span>
                            </td>
                        </tr>

                        <tr>
                            <td><label for="phone">Address: &nbsp;</label></td>
                            <td>
                                <span
                                    style=" border: 1px solid #d9d9d9; border-radius:12px; padding: 0px 10px;">{{ $staff->Dia_Chi }}
                                </span>
                            </td>
                        </tr>

                        <tr>
                            <td><label for="phone">Date Start Work: &nbsp;</label></td>
                            <td>
                                <span
                                    style=" border: 1px solid #d9d9d9; border-radius:12px; padding: 0px 10px;">{{ $staff->Ngay_Bat_Dau_Lam }}
                                </span>
                            </td>
                        </tr>

                        @if($staff->Ngay_Nghi_Viec != null)
                        <tr>
                            <td><label for="phone">Date End Work: &nbsp;</label></td>
                            <td>
                                <span
                                    style=" border: 1px solid #d9d9d9; border-radius:12px; padding: 0px 10px;">{{ $staff->Ngay_Nghi_Viec }}
                                </span>
                            </td>
                        </tr>
                        @endif

                        <tr>
                            <td>
                                <button type="button" class="btn btn-warning" data-toggle="modal"
                                    data-target="#SLH">Sabbatical Leave History</button>
                            </td>
                            <td>
                                <button type="button" class="btn btn-info" data-toggle="modal"
                                    data-target="#WorkHistory">Work History</button>
                            </td>
                        </tr>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@include("Profile.Modal.modal")
<!-- Form Section End -->
@endsection

@push('clicked')

@endpush