@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="mb-5">
                <div class="d-flex justify-content-between mb-3">
                    <a class="btn fw-semibold">
                        <span class="fs-5">
                            <i class="bi bi-arrow-left"></i>
                        </span>
                        Chương trước
                    </a>
                    <a class="btn fw-semibold">
                        Chương sau
                        <span class="fs-5">
                            <i class="bi bi-arrow-right"></i>
                        </span>
                    </a>
                </div>
                <div>
                    <div class="py-4">
                        <span class="fs-4 fw-semibold">
                            Chương {{ $chapter->chapter_number }}: {{ $chapter->name }}
                        </span>
                    </div>
                    <div>
                        <span class="me-3">
                            <i class="bi bi-journal-text"></i>
                            {{ $story->name }}
                        </span>
                        <span class="me-3">
                            <i class="bi bi-brush"></i>
                            {{ App\Models\User::find($story->user_id)->name }}
                        </span>
                        <span>
                            <i class="bi bi-clock"></i>
                            {{ $story->created_at }}
                        </span>
                    </div>
                </div>
            </div>

            <div class=" fs-5">
                {!! $chapter->content !!}
            </div>
        </div>
    </div>
@endsection
