@extends('layouts.app')

@section('content')
    <h2>story author</h2>
    <a class="btn btn-info" href="{{ route('listStoryPage') }}">Danh sách</a>
    <a class="btn btn-info" href="{{ route('createStoryPage') }}">Đăng truyện mới</a>
@endsection
