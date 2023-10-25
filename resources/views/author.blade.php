@extends('layouts.app')

@section('content')
    <h2>Tác giả</h2>
    <a class="btn btn-info" href="{{ route('listStoryPage') }}">Danh sách truyện</a>
    <a class="btn btn-info" href="{{ route('createStoryPage') }}">Đăng truyện mới</a>
@endsection
