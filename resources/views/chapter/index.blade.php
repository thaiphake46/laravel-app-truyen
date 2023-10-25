@extends('layouts.app')

@section('content')
    <h3 class="mb-3"><a href="{{ route('listStoryPage') }}"><i class="bi bi-arrow-left-circle"></i></a> Danh sách
        chương</h3>
    <div class="mb-3">
        <a class="btn btn-success" href="{{ route('createChapterPage', ['slug' => $slug]) }}">Thêm chương</a>
    </div>
    <div>
        @foreach ($listChapter->chunk(3) as $chunk)
            <div class="row mb-3">
                @foreach ($chunk as $chapter)
                    <div class="col-md-4 d-flex align-items-center justify-content-between shadow-sm p-3 rounded">
                        <span>Chương {{ $chapter->chapter_number }}: {{ $chapter->name }}</span>
                        <form
                            action="{{ route('deleteChapter', ['slug_story' => $slug, 'slug_chapter' => $chapter->slug]) }}"
                            method="post">
                            @csrf
                            @method('delete')
                            <a class="btn btn-warning"
                                href="{{ route('editChapterPage', ['slug_story' => $slug, 'slug_chapter' => $chapter->slug]) }}"><i
                                    class="bi bi-pencil-square"></i></a>
                            {{-- <button class="btn btn-danger" type="submit"
                                onclick="return confirm('Bạn có muốn xóa không')"><i class="bi bi-trash3"></i></button> --}}
                        </form>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
@endsection
