@extends('layouts.appbar')

@section('content')
    <div class="container">
        <div class="row p-0">
            <div class="col-3 mx-1 bg-white py-3" style="border-radius: 5px;">
                <div class="row">
                    <div class="col-12 text-center">
                        <label for="" style="color: #6c757d">จำนวนการเข้าชมเว็บไซต์/คน</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 text-center">
                        <h4>{{ $visitCount }}</h4>
                    </div>
                </div>
            </div>
            <div class="col-3 mx-1 bg-white py-3" style="border-radius: 5px;">
                <div class="row">
                    <div class="col-12 text-center">
                        <label for="" style="color: #6c757d">จำนวนโพสต์</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 text-center">
                        <h4>{{ $PostCount }}</h4>
                    </div>
                </div>
            </div>
            <div class="col-3 mx-1 bg-white py-3" style="border-radius: 5px;">
                <div class="row">
                    <div class="col-12 text-center">
                        <label for="" style="color: #6c757d">จำนวนหมวดหมู่</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 text-center">
                        <h4>{{ $CategoryCount }}</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
