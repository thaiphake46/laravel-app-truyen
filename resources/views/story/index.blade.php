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
                    <form action="{{ route('deleteStory', ['id' => $item->id]) }}" method="POST">
                        @csrf
                        @method('delete')
                        <a class="btn btn-info" href="{{ route('editStoryPage', ['id' => $item->id]) }}">Sửa</a>
                        <button class="btn btn-info" type="submit" onclick="return confirm('Are you sure')">Xóa</button>
                    </form>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
