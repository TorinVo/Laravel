@extends('admin.layouts.master')

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    <div class="title">Danh Sách</div>
                </div>
                <div style="float: right;padding-top: 0.5em;">
                    <a href="{!! url('/admin/category/add') !!}" type="button" class="btn btn-primary" title=""><span class="glyphicon glyphicon-plus"></span> Thêm Mới</a>
                </div>
            </div>
            <div class="card-body">
                @if (Session::has('flash_message'))
                    <div style="margin-top: 10px; text-align: center;" class="cls-error alert fresh-color alert-success" role="alert">
                        {!! Session::get('flash_message') !!}
                    </div>
                @endif
                <table class="datatable table table-striped" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên Loại Sản Phẩm</th>
                            <th>Mô Tả</th>
                            <th>Loại Sản Phẩm Cha</th>
                            <th class="no-sort">Chỉnh Sửa</th>
                            <th class="no-sort">Xóa</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>STT</th>
                            <th>Tên Loại Sản Phẩm</th>
                            <th>Mô Tả</th>
                            <th>Loại Sản Phẩm Cha</th>
                            <th class="no-sort">Chỉnh Sửa</th>
                            <th class="no-sort">Xóa</th>
                        </tr>
                    </tfoot>
                    <tbody>
                    <?php if (!empty($cate)): ?>
                        <?php foreach ($cate as $key => $value): ?>
                            <tr>
                                <td width="50px">{!! ($key+1) !!}</td>
                                <td width="">{!! $value['name'] !!}</td>
                                <td width="">{!! $value['description'] !!}</td>
                                <td width="">
                                    @if($value['parent'] == 0)
                                        None
                                    @else
                                        <?php $m_parent = App\Models\Admin\MenuCategories::where('id',$value['parent'])->get()->first()->toArray() ?>
                                        {!! $m_parent['name'] !!}
                                    @endif
                                </td>
                                <td width="100px">
                                    <a href="{!! URL::route('admin.category.getEdit',$value['id']) !!}" title="" type="button" class="btn btn-xs btn-success">
                                        <span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
                                        Chỉnh Sửa
                                    </a>
                                </td>
                                <td width="100px">
                                    <a href="javascript:void(0)" onclick="fn_delete_ajax('{!! $value['id'] !!}')" type="button" class="btn btn-xs btn-success">
                                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                                        Xóa
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    <?php endif ?>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    function fn_delete (id) {
        console.log(APP_URL);
        $('#div_confirm').confirmModal({
            confirmTitle     : 'Xác Nhận.',
            confirmMessage   : 'Bạn Muốn Xóa ?',
            confirmOk        : 'Xóa',
            confirmCancel    : 'Hủy',
            confirmStyle     : 'primary',
            confirmCallback  : delete_categoty,
            confirmDismiss   : true,
            confirmAutoOpen  : true,
            dataId: id,
        });

        function delete_categoty(){
            var m_id = $(this).attr('dataId');
            window.location.href = APP_URL+'/admin/category/delete/'+m_id;
        }
    }

    function fn_delete_ajax(id){
        $('#div_confirm').confirmModal({
            confirmTitle     : 'Xác Nhận.',
            confirmMessage   : 'Bạn Thật Sự Muốn Xóa Loại Sản Phẩm ?',
            confirmOk        : 'XÓA',
            confirmCancel    : 'HỦY',
            confirmStyle     : 'primary',
            confirmCallback  : delete_categoty_ajax,
            confirmDismiss   : true,
            confirmAutoOpen  : true,
            dataId: id,
        });

        function delete_categoty_ajax(){
            var m_id = $(this).attr('dataId');
            var url = APP_URL+'/admin/category/delete/'+m_id;
            $.ajax({
                url: url,
                type: 'GET',
                dataType: 'json',
            })
            .done(function(data) {
                console.log(data);
            });
            
        }
    }
</script>
@endsection

