@if(empty($chuc_vu ))
@else


                        @foreach ($chuc_vu as $key => $cv)

                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{ $cv->Ten_CV }}</td>
                            <td>{{ $cv->Cong_Viec }}</td>
                            <td>{{ $cv->created_at }}</td>
                           {{-- <td><b style="color:orange">{{ $product->user_created }}</b> <br> {{ $product->created_at }}
                            </td>
                            <td><b style="color:red">{{ $product->user_updated }}</b> <br> {{ $product->updated_at }}
                             </td>
                            <td><a href="" class="btn btn-info btn-sm">
                                    <i class="fa fa-edit" title="Sửa"></i></a>
                            </td>
                            <td>
                                <form action="" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        onclick="return confirm('Bạn chắc chắn muốn xóa sản phẩm này?')"
                                        class="btn btn-danger btn-sm"><i class="fa fa-trash-o" aria-hidden="true"
                                            title="Xóa"></i></button>
                                </form>
                            </td> --}}
                            </tr>


                            @endforeach
                            @endif
