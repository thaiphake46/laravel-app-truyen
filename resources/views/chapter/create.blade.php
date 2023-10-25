@extends('layouts.app')

@section('content')
    <h3 class="mb-3">
        {{-- route('listChapterPage', ['slug' => $slug]) --}}
        <a href="{{ route('listChapterPage', ['slug' => $slug]) }}"><i class="bi bi-arrow-left-circle"></i></a>
        Thêm chương
    </h3>
    <form action="{{ route('storeChapter', ['slug' => $slug]) }}" method="post">
        @csrf
        <div class="mb-3">
            <label for="name">Tên chương</label>
            <input class="form-control mt-2" id="name" type="text" name="name" placeholder="Tên truyện" required>
        </div>
        <div class="mb-3">
            <label for="content">Nội dung</label>
            <textarea name="content" id="content"></textarea>
        </div>
        <input class="btn btn-primary mt-2" type="submit" value="Submit">
    </form>
    <script>
        @vite('resources/js/textEditor.js')
    </script>
@endsection
