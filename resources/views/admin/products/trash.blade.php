@extends('admin.layouts')

@section('title', 'Trash Products')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <p class="mb-4">
        <a href="{{ route('product.index') }}" class="btn btn-primary">Trang sản phẩm</a>

        <a href="{{ route('product.delete-all') }}" class="btn btn-danger float-right"
            onclick="return confirm('Bạn muốn xóa tất cả? Dữ liệu này sẽ không thể phục hồi lại!')">Xóa tất cả</a>

        <a href="{{ route('product.restore-all') }}" class="btn btn-warning float-right mr-2"
            onclick="return confirm('Bạn muốn phục hồi lại tất cả?')">Phục hồi tất cả</a>
    </p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Thùng rác</h6>
        </div>

        <div class="col-sm-12">@include('partials.message')</div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"
                    style="font-size: 14.5px;">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Tên bánh</th>
                            <th width='10%'>Loại bánh</th>
                            <th width='6%'>Mô tả</th>
                            <th>Giá gốc</th>
                            <th>Giá giảm</th>
                            <th>Ảnh</th>
                            <th>Đơn vị</th>
                            <th>Nổi bật</th>
                            <th>Người tạo</th>
                            <th>Người sửa</th>
                            <th>Sửa</th>
                            <th>Phục hồi</th>
                            <th>Xóa Vĩnh viễn</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th>Tên bánh</th>
                            <th width='10%'>Loại bánh</th>
                            <th width='6%'>Mô tả</th>
                            <th>Giá gốc</th>
                            <th>Giá giảm</th>
                            <th>Ảnh</th>
                            <th>Đơn vị</th>
                            <th>Nổi bật</th>
                            <th>Người tạo</th>
                            <th>Người sửa</th>
                            <th>Sửa</th>
                            <th>Phục hồi</th>
                            <th>Xóa</th>
                        </tr>
                    </tfoot>
                    <tbody>

                        @foreach ($products as $key => $product)

                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $product->name }}</td>
                            <td>{{ $product->type_products->name }}</td>
                            <td><a href="{{ route('product.show', $product->id) }}">Chi tiết</a></td>
                            <td>{{ $product->unit_price }}</td>
                            <td>{{ $product->promotion_price }}</td>
                            <td><img src="source/image/product/{{ $product->image }}" alt="" srcset="" width="75px">
                            </td>
                            <td>{{ $product->unit }}</td>
                            @if($product->new == 1)
                            <td>Có</td>
                            @else
                            <td>Không</td>
                            @endif
                            <td><b style="color:orange">{{ $product->user_created }}</b> <br> {{ $product->created_at }}
                            </td>
                            <td><b style="color:red">{{ $product->user_updated }}</b> <br> {{ $product->updated_at }}
                            </td>
                            <td><a href="{{ route('product.edit', $product->id) }}" class="btn btn-info"><i
                                        class="fa fa-edit" aria-hidden="true" title="Sửa"></i></a>
                            </td>
                            <td><a href="{{ route('product.restore', $product->id) }}" class="btn btn-warning"
                                    onclick="return confirm('Bạn có muốn phục hồi sản phẩm {{ $product->name }}?')">
                                    <i class="far fa-window-restore" aria-hidden="true" title="Phục hồi"></i></a>
                            </td>

                            <td>
                                <a href="{{ route('product.delete', $product->id) }}" class="btn btn-danger"
                                    onclick="return confirm('Bạn muốn xóa vĩnh viễn sản phẩm {{ $product->name }}?')">
                                    <i class="fa fa-minus-circle"></i>
                                </a>
                            </td>
                        </tr>

                        @endforeach

                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

@endsection