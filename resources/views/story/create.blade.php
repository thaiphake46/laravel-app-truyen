@extends('layouts.app')

@section('content')
    create story author
    <form action="{{ route('storeStory') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="name">Tên truyện</label>
            <input class="form-control mt-2" id="name" type="text" name="name" placeholder="Tên truyện" required>
        </div>
        <div>
            <label for="description">Mô tả</label>
            <input class="form-control mt-2" id="description" type="text" name="description" placeholder="Mô tả"
                required>
        </div>
        <div>
            <label for="image">Ảnh</label>
            <input class="form-control" id="image" type="file" name="image" required>
        </div>
        <div>
            <label for="category_id">Thể loại</label>
            <select class="form-control" id="category_id" name="category_id" required>
                @foreach ($category as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
        </div>
        <input class="btn btn-primary mt-2" type="submit" value="Submit">
    </form>
@endsection
