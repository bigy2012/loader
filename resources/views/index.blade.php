@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-10  bg-white p-3" style="border-radius: 10px">
                <div class="row">
                    <div class="col-12 text-center" style="font-weight: bold">
                        <h1>Jiroload</h1>
                    </div>
                </div>
                <div class="row mt-1">
                    <div class="col-12" style="font-weight: bold">
                        <nav class="navbar navbar-expand-sm navbar-light bg-light">
                            <div class="container-fluid">
                                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                                    <li class="nav-item">
                                        <a class="nav-link active"
                                            href="{{ url('/') }}">All</a>
                                    </li>
                                    @foreach ($categorys as $item)
                                        <li class="nav-item">
                                            <a class="nav-link"
                                                href="{{ url('/category/' . $item->id) }}">{{ $item->category_name }}</a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
                <div class="row">
                    @foreach ($data as $item)
                        @if ($item->post_status == '1')
                            <div class="col-lg-3 col-sm-12 col-md-12 widget-content">
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

