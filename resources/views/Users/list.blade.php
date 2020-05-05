@extends('admin.layouts')

@section('title', 'Manager')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <p class="mb-4">
        <a href="{{ route('product.create') }}" class="btn btn-primary">User</a>
        <a href="{{ route('product.trash') }}" class="btn btn-danger">Trash</a>
    </p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Manager user</h6>
        </div>

        <div class="col-sm-12">@include('partials.message')</div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0"
                    style="font-size: 14.5px;">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Email verified</th>
                            <th>Block</th>
                            <th>Created at</th>
                            <th>Đơn vị</th>
                            <th>Nổi bật</th>
                            <th>Người tạo</th>
                            <th>Người sửa</th>
                            <th>Sửa</th>
                            <th>Xóa</th>
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
                            <td><a href="{{ route('product.edit', $product->id) }}" class="btn btn-info btn-sm">
                                    <i class="fa fa-edit" title="Sửa"></i></a>
                            </td>
                            <td>
                                <form action="{{ route('product.destroy', $product->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        onclick="return confirm('Bạn chắc chắn muốn xóa sản phẩm này?')"
                                        class="btn btn-danger btn-sm"><i class="fa fa-trash-o" aria-hidden="true"
                                            title="Xóa"></i></button>
                                </form>
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