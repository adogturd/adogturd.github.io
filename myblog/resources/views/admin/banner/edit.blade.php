@extends('layouts.app')

@section('css')
@endsection

@section('content')
<div class="container">
	<div class="row justify-content-center">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header">最新消息管理 - Edit</div>

				<div class="card-body">
					<form method="post" action="/admin/banner/update/{{ $item->id }}" enctype="multipart/form-data">
						@csrf
						<div class="form-group row">
							<label for="title" class="col-sm-2 col-form-label">alt</label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="title" name="title"
									value="{{ $item->alt }}">
							</div>
						</div>
						<div class="form-group row">
							<label for="sort" class="col-sm-2 col-form-label">Banner-image</label>
							<div class="col-sm-10">
								<img class="img-fluid" src="{{$item->img}}" alt="">
							</div>
						</div>
						<div class="form-group row">
							<label for="img" class="col-sm-2 col-form-label">重新上傳產品圖片 <br><small
									class="text-danger">*建議圖片尺寸</small></label>
							<div class="col-sm-10">
								<input type="file" class="form-control" id="img" value="" name="img">
							</div>
						</div>
						<div class="form-group row">
							<div class="col-sm-10">
								<button type="submit" class="btn btn-primary">Edit</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection


@section('js')
<script>
	$(document).ready(function() {
            $('#description').summernote({
                height: 150,
                lang: 'zh-TW',
                callbacks: {
                    onImageUpload: function(files) {
                        for(let i=0; i < files.length; i++) {
                            $.upload(files[i]);
                        }
                    },
                    onMediaDelete : function(target) {
                        $.delete(target[0].getAttribute("src"));
                    }
                },
            });


            $.upload = function (file) {
                let out = new FormData();
                out.append('file', file, file.name);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    method: 'POST',
                    url: '/admin/ajax_upload_img',
                    contentType: false,
                    cache: false,
                    processData: false,
                    data: out,
                    success: function (img) {
                        $('#description').summernote('insertImage', img);
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.error(textStatus + " " + errorThrown);
                    }
                });
            };

            $.delete = function (file_link) {
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    method: 'POST',
                    url: '/admin/ajax_delete_img',
                    data: {file_link:file_link},
                    success: function (img) {
                        console.log("delete:",img);
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        console.error(textStatus + " " + errorThrown);
                    }
                });
            }
       });
</script>
@endsection
