@extends('admin.layouts')

@section('title', 'Edit Products')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-sm-5"></div>
        <div class="col-sm-3">
            <h1 class="h3 mb-2 text-gray-800 center"><a href="{{ route('product.index') }}"
                    style="text-decoration: none; color: red;">
                    Trang sản phẩm</a></h1>
        </div>
    </div>
    <!-- Content Row -->
    <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
            {{-- <div class="col-xl-8 col-lg-7"> --}}
            <!-- Area Chart -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Sửa sản phẩm</h6>
                </div>
                <div class="card-body">
                    <div class="chart-area" style="height: auto">
                        <form method="post" action="{{ route('product.update', $product->id) }}"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            @include('partials.message')

                            <div class="form-group @error('name') has-error has-feedback @enderror">

                                <label>Tên sản phẩm</label>

                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                    value="{{ $product->name }}" required>

                            </div>

                            <div class="form-group @error('content') has-error has-feedback @enderror">

                                <label>Mô tả</label>

                                <textarea class="form-control @error('content') is-invalid @enderror" name="content"
                                    required>{{ $product->description }}</textarea>

                            </div>

                            <div class="form-group @error('id_type') has-error has-feedback @enderror">

                                <label>Loại sản phẩm</label>

                                <select name="id_type" id=""
                                    class="form-control @error('id_type') is-invalid @enderror">
                                    @foreach ($types as $type)
                                    <option value="{{ $type->id }}" @if($product->id_type==$type->id)
                                        {{ "selected" }}
                                        @endif
                                        >{{ $type->name }}</option>
                                    @endforeach
                                </select>

                            </div>

                            <div class=" form-group @error('unit_price') has-error has-feedback @enderror">

                                <label>Giá gốc</label>

                                <input type="text" class="form-control @error('unit_price') is-invalid @enderror"
                                    name="unit_price" value="{{ $product->unit_price }}" required>

                            </div>

                            <div class="form-group @error('promotion_price') has-error has-feedback @enderror">

                                <label>Giá giảm (Nếu có)</label>

                                <input type="text" class="form-control @error('promotion_price') is-invalid @enderror"
                                    name="promotion_price" value="{{ $product->promotion_price }}">

                            </div>

                            <div class="form-group @error('unit') has-error has-feedback @enderror">

                                <label>Đơn vị</label>

                                <select name="unit" id="" class="form-control @error('unit') is-invalid @enderror">
                                    <option value="Cái" @if($product->unit=='Cái' ) {{ "selected" }} @endif>Cái
                                    </option>
                                    <option value="Hộp" @if($product->unit=='Hộp' ) {{ "selected" }} @endif>Hộp
                                    </option>
                                </select>

                            </div>

                            <div class="form-group @error('new') has-error has-feedback @enderror">

                                <label>Nổi bật</label>

                                <select name="new" id="" class="form-control @error('new') is-invalid @enderror">
                                    <option value="0" @if($product->new==0) {{ "selected" }} @endif>Không
                                    </option>
                                    <option value="1" @if($product->new==1) {{ "selected" }} @endif>Có</option>
                                </select>

                            </div>

                            <div class="form-group @error('file') has-error has-feedback @enderror">

                                <label>Ảnh</label>

                                <input id="imgPost" type="file" name="image"
                                    class="form-control @error('file') is-invalid @enderror" onchange="readURL(event)">

                                <img id="zoom" src="source/image/product/{{ $product->image }}" alt="" srcset=""
                                    width="250">

                            </div>

                            <button type="submit" class="btn btn-primary">Sửa đổi</button>

                            <button class="btn btn-secondary" onclick="window.history.go(-1); return false;">Hủy
                                bỏ</button>
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