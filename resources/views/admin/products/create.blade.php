@extends('admin.layouts')

@section('title', 'Create Products')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800 center"><a href="{{ route('product.index') }}"
            style="text-decoration: none; color: orange;">Trang
            sản phẩm</a></h1>
    <p></p>
    <!-- Content Row -->
    <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
            {{-- <div class="col-xl-8 col-lg-7"> --}}
            <!-- Area Chart -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Thêm sản phẩm mới</h6>
                </div>
                <div class="card-body">
                    <div class="chart-area" style="height: auto">
                        <form method="post" action="{{ route('product.store') }}" enctype="multipart/form-data">
                            @csrf
                            @include('partials.message')

                            <div class="form-group @error('name') has-error has-feedback @enderror">

                                <label>Tên sản phẩm</label>

                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                    value="{{ old('name') }}" required>

                            </div>

                            <div class="form-group @error('content') has-error has-feedback @enderror">

                                <label>Mô tả</label>

                                <textarea class="form-control @error('content') is-invalid @enderror" name="content"
                                    required>{!! old('content') !!}</textarea>

                            </div>

                            <div class="form-group @error('id_type') has-error has-feedback @enderror">

                                <label>Loại sản phẩm</label>

                                <select name="id_type" id=""
                                    class="form-control @error('id_type') is-invalid @enderror">
                                    @foreach ($types as $type)
                                    <option value="{{ $type->id }}" @if(old('id_type')==$type->id) {{ "selected" }}
                                        @endif
                                        >{{ $type->name }}</option>
                                    @endforeach
                                </select>

                            </div>

                            <div class=" form-group @error('unit_price') has-error has-feedback @enderror">

                                <label>Giá gốc</label>

                                <input type="text" class="form-control @error('unit_price') is-invalid @enderror"
                                    name="unit_price" value="{{ old('unit_price') }}" required>

                            </div>

                            <div class="form-group @error('promotion_price') has-error has-feedback @enderror">

                                <label>Giá giảm (Nếu có)</label>

                                <input type="text" class="form-control @error('promotion_price') is-invalid @enderror"
                                    name="promotion_price" value="{{ old('promotion_price') }}">

                            </div>

                            <div class="form-group @error('unit') has-error has-feedback @enderror">

                                <label>Đơn vị</label>

                                <select name="unit" id="" class="form-control @error('unit') is-invalid @enderror">
                                    <option value="Cái" @if(old('unit')=='Cái' ) {{ "selected" }} @endif>Cái</option>
                                    <option value="Hộp" @if(old('unit')=='Hộp' ) {{ "selected" }} @endif>Hộp</option>
                                </select>

                            </div>

                            <div class="form-group @error('new') has-error has-feedback @enderror">

                                <label>Nổi bật</label>

                                <select name="new" id="" class="form-control @error('new') is-invalid @enderror">
                                    <option value="0" @if(old('new')==0) {{ "selected" }} @endif>Không</option>
                                    <option value="1" @if(old('new')==1) {{ "selected" }} @endif>Có</option>
                                </select>

                            </div>

                            <div class="form-group @error('file') has-error has-feedback @enderror">

                                <label>Ảnh</label>

                                <input id="imgPost" type="file" name="image"
                                    class="form-control @error('file') is-invalid @enderror" onchange="readURL(event)">

                                <img id="zoom" src="#" alt="" srcset="" width="250">

                            </div>

                            <button type="submit" class="btn btn-primary">Create</button>

                            <button class="btn btn-secondary"
                                onclick="window.history.go(-1); return false;">Cancle</button>
                        </form>

                    </div>
                </div>
            </div>
            {{-- </div> --}}

        </div>
    </div>
    <!-- /.container-fluid -->
</div>
@endsection