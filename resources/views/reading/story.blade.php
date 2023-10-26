@extends('layouts.app')

@section('content')
    <div class="p-3">
        <div class="row">
            <div class="col-12 d-flex">
                <div class="w-20 pe-4">
                    <img class="w-100" src="{{ asset('storage\images\image1698286722_truyen_11.jpg') }}" alt="Image">
                </div>
                <div class="w-80 d-flex flex-column justify-content-between">
                    <div>
                        <div class="mb-3">
                            <span class="fs-3 fw-semibold">
                                Vạn Cổ Đệ Nhất Thần
                            </span>
                        </div>
                        <div class="mb-3">
                            <span class="border border-secondary text-secondary py-1 px-2 rounded-pill me-2">Tác giả</span>
                            <span class="border border-danger text-danger py-1 px-2 rounded-pill me-2">Đang ra</span>
                            <span class="border border-primary text-primary py-1 px-2 rounded-pill">Thể loại</span>
                        </div>
                        <div class="d-flex">
                            <div>
                                <span class="fs-5 fw-semibold me-4">1000</span><br>Chương
                            </div>
                            <div>
                                <span class="fs-5 fw-semibold">5.4M</span><br>Lượt đọc
                            </div>
                        </div>
                    </div>
                    <div>
                        <a class="btn btn-danger text-white text-decoration-none fs-5 fw-semibold rounded-pill px-3"
                            href="">
                            <span class="me-1">
                                <i class="bi bi-emoji-sunglasses"></i>
                            </span>
                            <span>Đọc truyện</span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="opacity-50">
                <hr>
            </div>
        </div>

        <div>
            <div>
                <span class="fs-4">
                    Giới thiệu
                </span>
            </div>
            <div>
                <p>
                    Lý Thiên Mệnh nằm mơ đều muốn cười tỉnh.

                    Nhà hắn sủng vật, vậy mà đều là trong truyền thuyết Thái Cổ Hỗn Độn Cự Thú.

                    Nhà của hắn gà, là lấy Thái Dương làm thức ăn 'Vĩnh Hằng Luyện Ngục Phượng Hoàng' .

                    Hắn mèo đen, là lấy lôi đình luyện hóa vạn giới 'Thái Sơ Hỗn Độn Lôi Ma' .

                    Liền nhà hắn gián, đều là nắm giữ ngàn tỷ bất tử phân thân 'Vạn Giới Vĩnh Sinh Thú' . . .

                    Từ đó, hắn khống chế mười đầu Thái Cổ Hỗn Độn Cự Thú, hóa thân Vạn Cổ đệ nhất Hỗn Độn Thần Linh, chu du
                    chư thiên vạn giới, san bằng vô tận Thần Vực. Vạn vật sinh linh, Chư Thiên Thần Ma, liền bò kéo lăn,
                    buồn bã hô run!

                    PS: Truyện đã kịp tác
                </p>
            </div>
            <div class="opacity-50">
                <hr>
            </div>
        </div>

        <div>
            <div class="d-flex justify-content-between">
                <span class="fs-4">
                    Danh sách chương
                </span>
                <button class="btn fs-4">
                    <i class="bi bi-sort-down"></i>
                </button>

            </div>
            <div>
                <div class="row">
                    <div class="col-4 text-truncate"><span>chương 1</span></div>
                    <div class="col-4 text-truncate"><span>chương 2</span></div>
                    <div class="col-4 text-truncate"><span>chương 3</span></div>
                </div>
                <div class="row">
                    <div class="col-4 text-truncate"><span>chương 1</span></div>
                    <div class="col-4 text-truncate"><span>chương 2</span></div>
                    <div class="col-4 text-truncate"><span>chương 3</span></div>
                </div>
            </div>
        </div>
    </div>
@endsection