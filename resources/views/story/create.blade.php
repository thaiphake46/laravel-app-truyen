@extends('layouts.app')

@section('content')
    create story author
    {{-- <form action="{{ route('storeStory') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div>
            <input type="text" name="user_id" value="{{ Auth::id() }}" hidden>
        </div>
        <div>
            <label for="name">Tên truyện</label>
            <input id="name" type="text" name="name">
        </div>
        <div>
            <label for="description">Mô tả</label>
            <input id="description" type="text" name="description">
        </div>
        <div>
            <label for="image">Ảnh</label>
            <input id="image" type="file" name="image">
        </div>
        <div>
            <label for="category_id">Thể loại</label>
            <select id="category_id" name="category_id">
                @foreach ($category as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
        </div>
        <input type="submit" value="Submit">
    </form> --}}
@endsection
