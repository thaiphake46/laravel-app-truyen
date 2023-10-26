@extends('layouts.app')

@section('content')
    <div class="row d-flex">
        <div class="col-8 ">
            <div class="fs-4">Truyện đề cử</div>
            @foreach ($randomListStory->chunk(2) as $chunk)
                <div class="row">
                    @foreach ($chunk as $story)
                        <div class="card-story col-6 d-flex">
                            <div class="col-3">
                                <a class="text-black text-decoration-none"
                                    href="{{ route('storyViewPage', ['slug' => $story->slug]) }}">
                                    <div class="col-10">
                                        <img class="w-100" src="{{ asset('storage/images/' . $story->image) }}"
                                            alt="Image">
                                    </div>
                                </a>
                            </div>
                            <div class="col-9">
                                <a class="text-black text-decoration-none"
                                    href="{{ route('storyViewPage', ['slug' => $story->slug]) }}">
                                    <h5>
                                        {{ $story->name }}
                                    </h5>
                                </a>
                                <p class="text-secondary text-overflow-2-lines">
                                    {{ $story->description }}
                                </p>
                                <div class="row d-flex">
                                    <div class="col-9">
                                        <div class="text-truncate">
                                            <i class="bi bi-brush"></i>
                                            <span class="text-secondary">
                                                {{ App\Models\User::find($story->user_id)->name }}
                                            </span>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <span class="border border-primary text-primary small px-2 truncate-100">The
                                            loai</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <div class="opacity-50">
                        <hr>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="col-4">
            <div class="fs-4">Đang đọc</div>
            @foreach ($dangDoc as $story)
                <div class="row mb-1">
                    <div class="col-3">
                        <a class="text-black text-decoration-none"
                            href="{{ route('storyViewPage', ['slug' => $story->slug]) }}">
                            <div class="col-10">
                                <img class="w-100" src="{{ asset('storage\images/' . $story->image) }}" alt="Image">
                            </div>
                        </a>
                    </div>
                    <div class="col-9 text-truncate">
                        <a class="text-black text-decoration-none"
                            href="{{ route('storyViewPage', ['slug' => $story->slug]) }}">
                            <span class="fs-5">
                                {{ $story->name }}
                            </span>
                        </a>
                    </div>
                </div>
            @endforeach
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
                                href=""><span>Chương</span></a>
                        </td>
                        <td class="col-3 text-truncate text-tertiary"><span>Tác giả</span></td>
                        <td class="col-1 text-truncate text-tertiary"><span>2 phút trước</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
