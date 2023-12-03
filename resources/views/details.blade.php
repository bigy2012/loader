@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row d-flex justify-content-center">
            <div class="col-8  bg-white p-3" style="border-radius: 10px">
                <div class="row">
                    <div class="col-12">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item">หน้าแรก</li>
                                <li class="breadcrumb-item">{{ $category->category_name }}</li>
                                <li class="breadcrumb-item">{{ $data->post_name }}</li>
                            </ol>
                        </nav>
                        <hr class="m-0 mt-2">
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-12" style="font-weight: bold">
                        <h1>{{ $data->post_name }}</h1>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-12" style="font-weight: bold" style="width: 100%; height: 300px;">
                        {!! html_entity_decode($data->post_description) !!}
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-12 text-center">
                        <a class="btn" href="{{ $data->link_load }}"
                            target="_blank"
                            style="background: #34b703; color: white; border-radius: 25px; width: 200px; padding: 10px">ดาวน์โหลด</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    


    <style type="text/css">

        .widget-content:hover {
            transform: scale(1.1);
        }
    </style>
@endsection
