@extends('layouts.app')

@section('content')
    story list
    <a class="btn btn-info" href="{{ route('createStoryPage') }}">Đăng truyện mới</a>
    <div>
        <ul>
            @foreach ($listStory as $item)
                <li>
                    <p>Tên: {{ $item->name }}</p>
                    <p>Mô tả: {{ $item->description }}</p>
                    <p>Ảnh: {{ $item->image }}</p>
                    <a href="{{ route('editStoryPage', ['id' => $item->id]) }}">Sửa</a>
                    <a href="/" onclick="return confirm('Are you sure')">Xóa</a>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
