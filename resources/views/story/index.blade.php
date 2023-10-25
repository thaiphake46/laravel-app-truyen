@extends('layouts.app')

@section('content')
    <h3 class="mb-3">
        <a href="{{ route('author') }}"><i class="bi bi-arrow-left-circle"></i></a>
        Danh sách truyện
    </h3>
    <div class="mb-3">
        <a class="btn btn-success" href="{{ route('createStoryPage') }}">Đăng truyện</a>
    </div>
    <div>
        @foreach ($listStory->chunk(4) as $chunk)
            <div class="row mb-2">
                @foreach ($chunk as $item)
                    <div class="col-3 shadow-sm p-3 rounded">
                        {{-- storage/images --}}
                        <div class="d-flex justify-content-center mb-2">
                            <img class="img-fluid" src="{{ asset('storage/images/' . $item->image) }}" alt="">
                        </div>
                        <h4>Tên: {{ $item->name }}</h4>
                        <p>Thể loại: {{ App\Models\Category::find($item->category_id)->name }}</p>
                        {{-- <p>Mô tả: {{ $item->description }}</p> --}}
                        <form action="{{ route('deleteStory', ['id' => $item->id]) }}" method="POST">
                            @csrf
                            @method('delete')
                            <a class="btn btn-light border border-primary"
                                href="{{ route('listChapterPage', ['slug' => $item->slug]) }}">Chương</a>
                            <a class="btn btn-warning" href="{{ route('editStoryPage', ['id' => $item->id]) }}"><i
                                    class="bi bi-pencil-square"></i></a>
                            <button class="btn btn-danger" type="submit"
                                onclick="return confirm('Bạn có muốn xóa không')"><i class="bi bi-trash3"></i></button>
                        </form>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
@endsection
