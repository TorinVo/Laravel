@extends('admin.layouts.master')

@section('content')
<div class="row">
    <div class="col-xs-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">
                    <div class="title">{!! isset($m_title)?$m_title:'Thêm Mới' !!}</div>
                </div>
                <div style="float: right;padding-top: 0.5em;">
                    <a style="min-width: 95px;" href="{!! url('/admin/category') !!}" type="button" class="btn btn-primary" title=""><span class="glyphicon glyphicon glyphicon-arrow-left"></span> Quay Lại</a>
                </div>
            </div>
            @if (Session::has('flash_message'))
                <div style="margin-top: 10px; text-align: center;" class="cls-error alert fresh-color alert-success" role="alert">
                    {!! Session::get('flash_message') !!}
                </div>
            @endif
            <div class="card-body col-md-6 col-md-offset-3">
                <form id="m_frm" method="POST" action="{{ url('/admin/category/save') }}">
                    {!! csrf_field() !!}
                    <div class="form-group">
                        <label for="slt_category">Loại Sản Phẩm Cha</label>
                        <select class="form-control" id="slt_category" name="slt_category">
                            <option value="0">|--Chọn Loại Sản Phẩm</option>
                            @if (!empty($cate))
                                @foreach ($cate as $key => $value)
                                    <option @if(isset($m_data) && $m_data['parent'] == 0) disabled @endif @if(isset($m_data) && $m_data['parent'] == $value['id']) selected @endif value="{!! $value['id'] !!}">{!! $value['name'] !!}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                    <div class="form-group{{ $errors->has('txt_name') ? ' has-error' : '' }}">
                        <label for="txt_name">Tên Loại Sản Phẩm</label>
                        <input name="txt_name" type="text" value="{!! Htmlentities(isset($m_data['name'])?$m_data['name']:'') !!}" class="form-control" id="txt_name" placeholder="Tên Loại Sản Phẩm">
                        @if ($errors->has('txt_name'))
                            <span class="help-block">
                                <strong>{{ $errors->first('txt_name') }}</strong>
                            </span>
                        @endif
                    </div>
                    <div class="form-group{{ $errors->has('txt_discription') ? ' has-error' : '' }}">
                        <label for="exampleInputPassword1">Mô Tả</label>
                        <textarea name="txt_discription" class="form-control" rows="3" placeholder="Mô Tả">{!! isset($m_data['description'])?Htmlentities($m_data['description']):'' !!}</textarea>
                        @if ($errors->has('txt_discription'))
                            <span class="help-block">
                                <strong>{{ $errors->first('txt_discription') }}</strong>
                            </span>
                        @endif
                    </div>
                    <input type="hidden" name="txt_hd_id" value="{!! isset($m_data['id'])?$m_data['id']:'' !!}">
                    <input type="hidden" name="txt_add_new" id="txt_add_new" value="">
                    <button style="min-width: 95px;" type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-save"></span> Lưu</button>
                    <button id="btn_add_new" style="min-width: 95px;" type="button" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-save"></span> Lưu Và Thêm Mới</button>
                    <a style="min-width: 95px;" href="{!! url('/admin/category') !!}" type="button" class="btn btn-default" title=""><span class="glyphicon glyphicon glyphicon-arrow-left"></span> Quay Lại</a>
                </form>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $('button[type="submit"]').click(function(event) {
        event.preventDefault();
        $('#m_frm').submit();
    });
    $('#btn_add_new').click(function(event) {
        $('#txt_add_new').val(1);
        $('#m_frm').submit();
    });
</script>
@endsection