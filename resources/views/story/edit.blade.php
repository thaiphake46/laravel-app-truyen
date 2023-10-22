@extends('layouts.app')

@section('content')
    edit story author
    <form action="{{ route('updateStory', ['id' => $story->id]) }}" method="post" enctype="multipart/form-data">
        @csrf
        @method('patch')
        <div>
            <label for="name">Tên truyện</label>
            <input id="name" type="text" name="name" value="{{ $story->name }}" required>
        </div>
        <div>
            <label for="description">Mô tả</label>
            <input id="description" type="text" name="description" value="{{ $story->description }}" required>
        </div>
        <div>
            <label for="image">Ảnh</label>
            <input id="image" type="file" name="image">
        </div>
        <div>
            <label for="category_id">Thể loại</label>
            <select id="category_id" name="category_id" required>
                @foreach ($category as $item)
                    <option value="{{ $item->id }}" @selected($item->id == $story->category_id)>
                        {{ $item->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <input type="submit" value="Submit">
    </form>
@endsection
