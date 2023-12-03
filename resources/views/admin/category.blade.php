@extends('layouts.appbar')

@section('content')
    <div class="container bg-white p-3">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-6">
                        <h3>All Category</h3>
                    </div>
                    <div class="col-6 text-end">
                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#form_add"
                            data-bs-whatever="@mdo" onclick="add()">New Category</button>
                        {{-- <a href="{{ url('/admin/new/post/0/add') }}" class="btn btn-success">New Category</a> --}}
                    </div>
                </div>
                <table class="table table-light">
                    <thead>
                        <tr>
                            <th style="width: 10%;">ลำดับ</th>
                            <th style="width: 60%;">ชื่อหมวดหมู่</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $i = 1;
                        @endphp
                        @foreach ($data as $key => $item)
                            @if ($item->status == '1')
                                <tr>
                                    <td>{{ $i }}</td>
                                    <td>{{ $item->category_name }}</td>
                                    <td>
                                        {{-- <a class="btn btn-warning"
                                            href="{{ url('/admin/new/post/' . $item->id . '/' . 'edit') }}">แก้ไข</a> --}}
                                        <button type="button" class="btn btn-warning" data-bs-toggle="modal"
                                            data-bs-target="#form_add" onclick="edit({{ $item->id }})">แก้ไข</button>
                                        <button class="btn btn-danger" onclick="del({{ $item->id }})">ลบ</button>
                                    </td>
                                </tr>
                            @endif
                            @php
                                $i++;
                            @endphp
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>



    <div class="modal fade" id="form_add" tabindex="-1" aria-labelledby="form_addLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="form_addLabel">เพิ่มหมวดหมู่</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ url('/admin/category/process') }}" method="POST">
                    @csrf
                    <input type="hidden" name="category_id">
                    <input type="hidden" name="process" value="add">
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">ชื่อหมวดหมู่</label>
                            <input type="text" class="form-control" name="category_name" id="recipient-name" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function edit(id) {
            $.ajax({
                url: "{{ url('/admin/category/process/') }}" + '/' + id,
                type: "GET",
                success: function(result) {
                    console.log(result);
                    $('input[name="category_name"]').val(result.category_name);
                    $('input[name="process"]').val('edit');
                    $('input[name="category_id"]').val(result.id);
                }
            });
        }


        function add() {
            $('input[name="category_name"]').val('');
            $('input[name="process"]').val('add');
            $('input[name="category_id"]').val('');
        }

        function del(id) {
            $.ajax({
                url: "{{ url('/admin/category/process') }}",
                method: "POST",
                data: {
                    _token: '{{ csrf_token() }}',
                    process: 'delete',
                    category_id: id
                },
                success: function(result) {
                    console.log(result);
                    window.location.reload();
                }
            });
        }
    </script>
@endsection
