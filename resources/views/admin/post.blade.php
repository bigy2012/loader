@extends('layouts.appbar')

@section('content')
    <div class="container bg-white p-3">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-6">
                        <h3>All Posts</h3>
                    </div>
                    <div class="col-6 text-end">
                        <a href="{{ url('/admin/new/post/0/add') }}" class="btn btn-success">New Post</a>
                    </div>
                </div>
                <table class="table table-light">
                    <thead>
                        <tr>
                            <th style="width: 10%;">ลำดับ</th>
                            <th style="width: 10%;">รูป</th>
                            <th style="width: 50%;">ชื่อ</th>
                            <th style="width: 20%;">หมวดหมู่</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($post as $key => $data)
                            @if ($data->post_status == '1')
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>
                                        <img src="{{ $data->post_image }}" width="50px" height="50px" alt="">
                                    </td>
                                    <td>{{ $data->post_name }}</td>
                                    <td>
                                        @foreach ($categorys as $item)
                                            @if ($data->post_catergory == $item->id)
                                                {{ $item->category_name }}
                                            @endif
                                        @endforeach
                                    </td>
                                    <td>
                                        <a class="btn btn-warning"
                                            href="{{ url('/admin/new/post/' . $data->id . '/' . 'edit') }}">แก้ไข</a>
                                        <button onclick="del('{{ $data->id }}')" class="btn btn-danger">ลบ</button>
                                    </td>
                                </tr>

                                @php
                                    $i++;
                                @endphp
                            @endif
                        @endforeach
                    </tbody>
                </table>
                <div class="d-flex">
                    {!! $post->links() !!}
                </div>
            </div>
        </div>
    </div>


    <script>
        function del(id) {

            // Swal.fire({
            //     title: "The Internet?",
            //     text: "That thing is still around?",
            //     icon: "question",
            //     success: function(){}
            // });

            $.ajax({
                url: "{{ url('/admin/new/post') }}",
                method: "POST",
                data: {
                    _token: '{{ csrf_token() }}',
                    process: 'delete',
                    post_id: id
                },
                success: function(result) {
                    console.log(result);
                    // window.location.reload();
                }
            });
        }
    </script>
@endsection
