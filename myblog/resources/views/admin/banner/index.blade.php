@extends('layouts.app')

@section('css')
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">最新消息管理 - Index</div>

                <div class="card-body">
                    {{-- <a class="btn btn-success" href="/admin/news/create">新增最新消息</a> --}}
                    <hr>

                    <table id="example" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>alt</th>
                                <th>image</th>
                                <th width="120">更改</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td>{{ $item[0]->alt}}</td>
                                <td><img width="250" src="{{$item[0]->img}}" alt=""></td>
                                <td>
                                    <a class="btn btn-success btn-sm" href="/admin/banner/edit/{{ $item[0]->id}}">編輯</a>
                                    {{-- <a class="btn btn-danger btn-sm" href="#" data-itemid="{{$item->id}}">刪除</a>

                                    <form class="destroy-form" data-itemid="{{$item->id}}"
                                        action="/admin/news/destroy/{{$item->id}}" method="POST" style="display: none;">
                                        @csrf
                                    </form> --}}
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@section('js')
<script>
    $(document).ready(function() {
        $('#example').DataTable({
            "order": [1,"desc"]
        });

       /*  $('#example').on('click','.btn-danger',function(){
            event.preventDefault();
            var r = confirm("你確定要刪除此項目嗎?");
            if (r == true) {
                var itemid = $(this).data("itemid");
                $(`.destroy-form[data-itemid="${itemid}"]`).submit();
            }
        }); */
    });
</script>
@endsection
