@extends('layouts.app')

@section('content')
    story author
    <a class="btn btn-info" href="{{ route('listStoryPage') }}">Danh sách</a>
    <a class="btn btn-info" href="{{ route('createStoryPage') }}">Đăng truyện mới</a>
@endsection
