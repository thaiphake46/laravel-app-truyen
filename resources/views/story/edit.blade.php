@extends('layouts.app')

@section('content')
    <h3>
        <a href="{{ route('listStoryPage') }}"><i class="bi bi-arrow-left-circle"></i></a>
        Sửa thông tin truyện
    </h3>
    <form action="{{ route('updateStory', ['id' => $story->id]) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div class="mb-3">
            <label for="name">Tên truyện</label>
            <input class="form-control mt-2" id="name" type="text" name="name" placeholder="Tên truyện" required
                value="{{ $story->name }}">
        </div>
        <div class="mb-3">
            <label for="description">Mô tả</label>
            <textarea required class="form-control mt-2" name="description" id="description" cols="30" rows="10">{{ $story->description }}</textarea>
        </div>
        <div class="mb-3">
            <label for="image">Ảnh</label>
            <input class="form-control mt-2" id="image" type="file" name="image">
        </div>
        <div class="mb-3">
            <label for="category_id">Thể loại</label>
            <select class="form-select" id="category_id" name="category_id" required>
                @foreach ($category as $item)
                    <option value="{{ $item->id }}" @selected($item->id == $story->category_id)>
                        {{ $item->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <input class="btn btn-primary" type="submit" value="Sửa truyện">
    </form>
@endsection
