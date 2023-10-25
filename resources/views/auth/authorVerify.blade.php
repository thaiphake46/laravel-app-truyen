@extends('layouts.app')

@section('content')
    <h3>Xác nhận tác giả</h3>
    <form action="{{ route('verifyAuthor') }}" method="post">
        @csrf
        <input class="btn btn-success" type="submit" value="Đồng ý trở thành tác giả">
    </form>
@endsection
