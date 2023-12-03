@extends('layouts.appbar')

@section('content')
    <div class="container bg-white p-3">
        <div class="row">
            <div class="col-12">
                <div class="row">
                    <div class="col-6">
                        <h3>Tags SEO</h3>
                    </div>
                    <div class="col-6 text-end">
                        <button type="button" class="btn btn-primary add-seo-row">Add +</button>
                    </div>
                </div>
                <hr class="m-0 mt-3">
                <form action="{{ url('/admin/process/seo') }}" method="post">
                    @csrf
                    <div class="form-group">
                        @php
                            $i = 0;
                        @endphp
                        @foreach ($seo as $item)
                            @if ($item->status == '1')
                                <div class="row mt-3" id="row-{{ $i }}">
                                    <div class="col-11">
                                        <input type="hidden" name="seo[{{ $i }}][id]"
                                            value="{{ $item->id }}">
                                        <input type="hidden" name="seo[{{ $i }}][action]" value="update">
                                        <input type="text" name="seo[{{ $i }}][value]" class="form-control"
                                            value="{{ $item->value }}">
                                    </div>
                                    <div class="col-1 text-center">
                                        <button type="button" onclick="del('{{ $item->id }}')"
                                            class="btn btn-danger">X</button>
                                    </div>
                                </div>
                                @php
                                    $i++;
                                @endphp
                            @endif
                        @endforeach
                    </div>
                    <div class="row mt-3">
                        <div class="col-12">
                            <button type="submit" class="btn btn-success">บันทึก</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script>
        let number = '{{ $i }}';
        $('.add-seo-row').on('click', function() {
            let html = '';
            html += ` <div class="row mt-3" id="row-${number}">
                            <div class="col-11">
                                <input type="hidden" name="seo[${number}][action]" value="add">
                                <input type="text" name="seo[${number}][value]" class="form-control">
                            </div>
                            <div class="col-1 text-center">
                                <button type="button" onclick="$('#row-${number}').remove();" class="btn btn-danger">X</button>
                            </div>
                        </div>`;
            $('.form-group').append(html);
            number++;
        });

        function del(id) {
            $('#row-' + id).remove();
            $.ajax({
                url: '{{ url('/admin/process/seo') }}',
                type: 'post',
                data: {
                    id: id,
                    action: 'delete',
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    console.log(response);
                    window.location.reload();
                }
            });
        }
    </script>
@endsection
