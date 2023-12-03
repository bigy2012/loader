@extends('layouts.appbar')

@section('content')
    <div class="container mt-3 p-3 bg-white">
        <div class="row">
            <div class="col-12">
                <h3>โพสต์</h3>
                <hr class="m-0">
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12">
                <form action="{{ url('/admin/new/post') }}" method="post">
                    @csrf
                    <input type="hidden" name="post_id" value="@if ($data && is_object($data)) {{ $data->id }} @endif">
                    <input type="hidden" name="process" value="{{ $process }}">
                    <input type="hidden" name="post_status"
                        value="@if ($data && is_object($data)) {{ $data->post_status }} @endif">

                    <div class="row">
                        <div class="col-12">
                            <label for="category">หมวดหมู่</label>
                            <select class="form-select" name="post_catergory" id="category" required
                                value="@if ($data && is_object($data)) {{ $data->post_catergory }} @endif">
                                <option value="">เลือกหมวดหมู่</option>
                                @foreach ($categorys as $item)
                                    <option value="{{ $item->id }}"
                                        @if ($data && is_object($data)) @if ($item->id == $data->post_catergory) selected @endif
                                        @endif>{{ $item->category_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="post_name" name="post_name" required
                                    @if ($data && is_object($data)) value="{{ $data->post_name }}"@endif>
                                <label for="post_name">ชื่อโพสต์</label>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="post_image" name="post_image" required
                                    @if ($data && is_object($data)) value="{{ $data->post_image }}"@endif>
                                <label for="post_image">URL รูปภาพหน้าปก</label>
                            </div>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-12">
                            <div class="form-floating">
                                <input type="text" class="form-control" id="link_loader" name="link_loader" required
                                    @if ($data && is_object($data)) value="{{ $data->link_load }}" @endif>
                                <label for="link_loader">Link Download</label>
                            </div>
                        </div>
                    </div>


                    <div class="row mt-3">
                        <div class="col-12 ">
                            <textarea name="post_description" class="post_description" rows="30" required>
                                @if ($data && is_object($data))
                                    {{ $data->post_description }}
                                @endif
                            </textarea>
                        </div>
                    </div>


                    <div class="row mt-3">
                        <div class="col-12">
                            <label for="description_seo">รายละเอียดเพิ่มเติม SEO</label>
                            <textarea name="description_seo" class="form-control" id="description_seo" cols="30" rows="10">@if ($data && is_object($data)){{ $data->description_seo }}@endif</textarea>
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="col-12">
                            <button class="btn btn-success" type="submit">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script>
        tinymce.init({
            selector: '.post_description',
            plugins: 'ai tinycomments mentions anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed permanentpen footnotes advtemplate advtable advcode editimage tableofcontents mergetags powerpaste tinymcespellchecker autocorrect a11ychecker typography inlinecss',
            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | align lineheight | tinycomments | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
            tinycomments_mode: 'embedded',
            tinycomments_author: 'Author name',
            images_upload_url: 'postAcceptor.php',
            images_upload_base_path: '/some/basepath',
            mergetags_list: [{
                    value: 'First.Name',
                    title: 'First Name'
                },
                {
                    value: 'Email',
                    title: 'Email'
                },
            ],
            ai_request: (request, respondWith) => respondWith.string(() => Promise.reject(
                "See docs to implement AI Assistant")),
        });

        $(function() {
            $('input')
                .on('change', function(event) {
                    var $element = $(event.target);
                    var $container = $element.closest('.example');

                    if (!$element.data('tagsinput')) return;

                    var val = $element.val();
                    if (val === null) val = 'null';
                    var items = $element.tagsinput('items');

                    $('code', $('pre.val', $container)).html(
                        $.isArray(val) ?
                        JSON.stringify(val) :
                        '"' + val.replace('"', '\\"') + '"'
                    );
                    $('code', $('pre.items', $container)).html(
                        JSON.stringify($element.tagsinput('items'))
                    );
                })
                .trigger('change');
        });
    </script>


    <style>
        .bootstrap-tagsinput .tag {
            margin-right: 2px;
            color: white !important;
            background-color: #0d6efd;
            padding: 0.2rem;
        }
    </style>
@endsection
