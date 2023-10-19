@extends('layouts.app')

@section('content')
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <span class="fw-bolder">
                        {{ __('Truyện đề cử') }}
                    </span>
                </div>

                <div class="card-body">
                    <h1>
                        TRANG CHỦ
                    </h1>
                    <p>
                        {{ $name }}
                    </p>
                </div>
            </div>
        </div>
    </div>
@endsection
