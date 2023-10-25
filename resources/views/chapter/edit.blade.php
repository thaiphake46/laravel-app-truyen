@extends('layouts.app')

@section('content')
    <h3 class="mb-3">
        <a href="{{ route('listChapterPage', ['slug' => $slug_story]) }}"><i class="bi bi-arrow-left-circle"></i></a>
        Chỉnh sửa chương
    </h3>
    <form action="{{ route('updateChapter', ['slug_story' => $slug_story, 'slug_chapter' => $chapter->slug]) }}"
        method="post">
        @csrf
        @method('patch')
        <div class="mb-3">
            <label for="name">Tên chương</label>
            <input class="form-control mt-2" id="name" type="text" name="name" placeholder="Tên truyện" required
                value="{{ $chapter->name }}">
        </div>
        <div class="mb-3">
            <label for="content">Nội dung</label>
            <textarea name="content" id="content">{{ $chapter->content }}</textarea>
        </div>
        <input class="btn btn-primary mt-2" type="submit" value="Submit">
    </form>
    <script>
        @vite('resources/js/textEditor.js')
    </script>
@endsection
