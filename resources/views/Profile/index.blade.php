@extends('admin.layouts')
@section('title', 'Your Profile')
@section('content')
<style>
    label {
        color: rgba(85, 85, 85, .8);
    }

    .borderSpan {
        border: 1px solid #d9d9d9;
        border-radius: 12px;
        padding: 0px 10px;
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
    <div class="container" style="font-size: 16px;">
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
                            <td></td>
                        </tr>

                        <tr>
                            <td><label for="name">Full Name: &nbsp;</label> </td>
                            <td><span class="borderSpan">{{ $staff->Ho_Ten }}</span>
                            </td>
                            <td></td>
                        </tr>

                        <tr>
                            <td><label for="email">Email: &nbsp;</label> </td>
                            <td>
                                <span class="borderSpan">
                                    {{ Auth::user()->email }}
                                </span>
                            </td>
                            <td></td>
                        </tr>

                        <tr>
                            <td><label for=" name">Position: &nbsp;</label> </td>
                            <td><span class="borderSpan">{{ $staff->chuc_vu->Ten_CV }}</span>
                            </td>
                            <td></td>
                        </tr>

                        <tr>
                            <td><label for="name">Shift Work: &nbsp;</label> </td>
                            <td><span class="borderSpan">{{ $staff->ca_lam->Ca }}</span>
                            </td>
                            <td></td>
                        </tr>

                        <tr>
                            <td><label for="phone">Phone Number: &nbsp;</label></td>
                            <td>
                                <span class="borderSpan">{{ $staff->So_Dien_Thoai }}
                                </span>
                            </td>
                            <td></td>
                        </tr>

                        <tr>
                            <td><label for="phone">Date Of Birth: &nbsp;</label></td>
                            <td>
                                <span class="borderSpan">{{ $staff->Ngay_Sinh }}
                                    <i class="fas fa-birthday-cake" style="color: orange"></i>
                                </span>
                            </td>
                            <td></td>
                        </tr>

                        <tr>
                            <td><label for="phone">Gender: &nbsp;</label></td>
                            <td>
                                <span class="borderSpan">{{ $staff->Gioi_Tinh }}
                                    @if($staff->Gioi_Tinh == "Female")
                                    <i class="fas fa-venus" style="color:#FF1493"></i>
                                    @elseif($staff->Gioi_Tinh == "Male")
                                    <i class="fas fa-mars" style="color:blue"></i>
                                    @endif
                                </span>
                            </td>
                            <td></td>
                        </tr>

                        <tr>
                            <td><label for="phone">Address: &nbsp;</label></td>
                            <td>
                                <span class="borderSpan" class="borderSpan">{{ $staff->Dia_Chi }}
                                </span>
                            </td>
                            <td></td>
                        </tr>

                        <tr>
                            <td><label for="phone">Date Start Work: &nbsp;</label></td>
                            <td>
                                <span class="borderSpan">{{ $staff->Ngay_Bat_Dau_Lam }}
                                </span>
                            </td>
                            <td></td>
                        </tr>

                        @if($staff->Ngay_Nghi_Viec != null)
                        <tr>
                            <td><label for="phone">Date End Work: &nbsp;</label></td>
                            <td>
                                <span class="borderSpan">{{ $staff->Ngay_Nghi_Viec }}
                                </span>
                            </td>
                            <td></td>
                        </tr>
                        @endif

                        <tr>
                            <td>
                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#SLH"
                                    onclick="profile.nghiPhep()">Sabbatical Leave History</button>
                            </td>
                            <td>
                                <button type="button" class="btn btn-info" data-toggle="modal"
                                    data-target="#WorkHistory">Work History</button>
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <td colspan="2"> <a class="nav-link btn-success btn text-white"
                                    onclick="Dxp.create()">Create
                                    Sabbatical Leave</a></td>
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

@push('script')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-toast-plugin/1.3.2/jquery.toast.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.serializeJSON/2.9.0/jquery.serializejson.min.js">
</script>
@endpush

@push('CRUD')
<script src="js/profile.js"></script>
<script src="js/donxinphep.js"></script>
@endpush