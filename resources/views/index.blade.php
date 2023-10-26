@extends('layouts.app')

@section('content')
    <div class="row d-flex">
        <div class="col-8 ">
            <div class="fs-4">Truyện đề cử</div>
            <div class="row">
                <div class="card-story col-6 d-flex">
                    <div class="col-3">
                        <a class="text-black text-decoration-none" href="">
                            <div class="col-10">
                                <img class="w-100" src="{{ asset('storage\images\image1698286722_truyen_11.jpg') }}"
                                    alt="Image">
                            </div>
                        </a>
                    </div>
                    <div class="col-9">
                        <a class="text-black text-decoration-none" href="">
                            <h5>
                                Ten truyen
                            </h5>
                        </a>
                        <p class="text-secondary text-overflow-2-lines">
                            Mô tả mô tả mô tả mô tả mô tả mô tả mô tả mô tả mô tả mô tả mô tả mô tả mô tả mô tả mô tả mô tả
                            mô tả
                        </p>
                        <div class="row d-flex">
                            <div class="col-9">
                                <div class="text-truncate">
                                    <i class="bi bi-brush"></i>
                                    <span class="text-secondary">
                                        Tác giả
                                    </span>
                                </div>
                            </div>
                            <div class="col-3">
                                <span class="border border-primary text-primary small px-2 truncate-100">The loai</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="opacity-50">
                    <hr>
                </div>
            </div>
        </div>

        <div class="col-4">
            <div class="fs-4">Đang đọc</div>
            <div class="row">
                <div class="col-3">
                    <a class="text-black text-decoration-none" href="">
                        <div class="col-10">
                            <img class="w-100" src="{{ asset('storage\images\image1698286722_truyen_11.jpg') }}"
                                alt="Image">
                        </div>
                    </a>
                </div>
                <div class="col-9 text-truncate">
                    <a class="text-black text-decoration-none" href="">
                        <span class="fs-5">
                            Tên truyện
                        </span>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div>
        <div>
            <span class="fs-4">Mới cập nhật</span>
        </div>
        <div>
            <table class="table">
                <tbody>
                    <tr class="row">
                        <td class="col-1 text-truncate text-tertiary"><span>Thể loại</span></td>
                        <td class="col-3 text-truncate"><a class="text-black text-decoration-none" href=""><span
                                    class="fw-bolder">Tên truyện</span></a></td>
                        <td class="col-4 text-truncate"><a class="text-black text-decoration-none"
                                href=""><span>Chương</span></a></td>
                        <td class="col-3 text-truncate text-tertiary"><span>Tác giả</span></td>
                        <td class="col-1 text-truncate text-tertiary"><span>2 phút trước</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection