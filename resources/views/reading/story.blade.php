@extends('layouts.app')

@section('content')
    <div class="p-3">
        <div class="row">
            <div class="col-12 d-flex">
                <div class="w-20 pe-4">
                    <img class="w-100" src="{{ asset('storage\images/' . $story->image) }}" alt="Image">
                </div>
                <div class="w-80 d-flex flex-column justify-content-between">
                    <div>
                        <div class="mb-3">
                            <span class="fs-3 fw-semibold">
                                {{ $story->name }}
                            </span>
                        </div>
                        <div class="mb-3">
                            <span
                                class="border border-secondary text-secondary py-1 px-2 rounded-pill me-2">{{ App\Models\User::find($story->user_id)->name }}</span>
                            <span class="border border-danger text-danger py-1 px-2 rounded-pill me-2">Đang ra</span>
                            <span
                                class="border border-primary text-primary py-1 px-2 rounded-pill">{{ App\Models\Category::find($story->category_id)->name }}</span>
                        </div>
                        <div class="d-flex my-4">
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
                            href="{{ route('chapterViewPage', ['slug_story' => $story->slug, 'number' => 1]) }}">
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
                <p>{{ $story->description }}</p>
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
                @foreach ($listChapter->chunk(3) as $chunk)
                    <div class="row">
                        @foreach ($chunk as $chapter)
                            <div class="col-4 text-truncate">
                                <a class="text-black text-decoration-none"
                                    href="{{ route('chapterViewPage', ['slug_story' => $story->slug, 'number' => $chapter->chapter_number]) }}">
                                    <span>Chương {{ $chapter->chapter_number }}:
                                        {{ $chapter->name }}</span>
                                </a>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
