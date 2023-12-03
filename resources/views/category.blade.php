@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-10  bg-white p-3" style="border-radius: 10px">
                <div class="row">
                    <div class="col-12" style="font-weight: bold">
                        @foreach ($categorys as $item)
                            @if ($category_id == $item->id)
                                <h3>{{ $item->category_name }}</h3>
                                <hr>
                            @break
                        @endif
                    @endforeach
                </div>
            </div>
            <div class="row">
                @foreach ($data as $item)
                    @if ($item->post_status == '1')
                        <div class="col-3 widget-content">
                            <a href="{{ url('/detail/' . $item->post_name . '/' . $item->id) }}"
                                style="text-decoration: none;">
                                <div class="card my-3">
                                    <img src="{{ $item->post_image }}" class="card-img-top" alt="">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $item->post_name }}</h5>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endif
                @endforeach
            </div>
            <div class="d-flex">
                {!! $data->links() !!}
            </div>
        </div>
    </div>
</div>


<style>
    .widget-content:hover {
        transform: scale(1.1);
    }

    .card:hover {
        color: blue;
    }
</style>
@endsection
