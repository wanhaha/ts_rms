{{-- 继承布局 --}}
@extends('system.home')


{{-- 页面内容 --}}
@section('content')

    <p>
        <a class="btn" href="javascript:history.back();">
            <i class="ace-icon fa fa-arrow-left bigger-110"></i>
            返回
        </a>
    </p>


    <form class="form-horizontal" role="form" action="{{route('sys_process_edit')}}" method="post">
        {{csrf_field()}}

        <input type="hidden" name="id" value="{{$sdata->id}}">
        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right" for="schedule_id"> 项目进度： </label>
            <div class="col-sm-9">
                <input type="text" id="schedule_id" value="{{$sdata->schedule->name}}" class="col-xs-10 col-sm-5" readonly>
            </div>
        </div>
        <div class="space-4"></div>

        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right" for="parent_id"> 上级流程： </label>
            <div class="col-sm-9">
                <input type="text" id="parent_id" value="{{$sdata->father->name}}" class="col-xs-10 col-sm-5" readonly>
            </div>
        </div>
        <div class="space-4"></div>

        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right" for="name"> 名称： </label>
            <div class="col-sm-9">
                <input type="text" id="name" name="name" value="{{$sdata->name}}" class="col-xs-10 col-sm-5" required>
            </div>
        </div>
        <div class="space-4"></div>

        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right" for="type">操作类型：</label>
            <div class="col-sm-9 radio">
                @foreach($edata->type as $key => $value)
                    <label>
                        <input name="type" type="radio" class="ace" value="{{$key}}" @if($value==$sdata->type) checked @endif >
                        <span class="lbl">{{$value}}</span>
                    </label>
                @endforeach
            </div>
        </div>
        <div class="space-4"></div>

        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right" for="sort"> 排序： </label>
            <div class="col-sm-9">
                <input type="number" min="0" id="sort" name="sort" value="{{$sdata->sort}}" class="col-xs-10 col-sm-5" required>
            </div>
        </div>
        <div class="space-4"></div>

        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right" for="number"> 同级角色执行限制人数： </label>
            <div class="col-sm-9">
                <input type="number" min="1" id="number" name="number" value="{{$sdata->number}}" class="col-xs-10 col-sm-5" required>
            </div>
        </div>
        <div class="space-4"></div>

        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right" for="infos">描述：</label>
            <div class="col-sm-9">
                <textarea id="infos" name="infos" class="col-xs-10 col-sm-5" >{{$sdata->infos}}</textarea>
            </div>
        </div>
        <div class="space-4"></div>

        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right"> 关联菜单： </label>
            <div class="col-sm-9">
                <div class="col-xs-10 col-sm-5">
                    <table class="table table-hover table-bordered treetable">
                        <thead>
                        <tr>
                            <th>菜单</th>
                            <th>选择</th>
                        </tr>
                        </thead>
                        <tbody>
                        {!! $sdata->menu_tree !!}
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="space-4"></div>

        <div class="clearfix form-actions">
            <div class="col-md-offset-3 col-md-9">
                <button class="btn btn-info" type="button" onclick="sub(this)">
                    <i class="ace-icon fa fa-check bigger-110"></i>
                    保存
                </button>
                &nbsp;&nbsp;&nbsp;
                <button class="btn" type="reset">
                    <i class="ace-icon fa fa-undo bigger-110"></i>
                    重置
                </button>
            </div>
        </div>
    </form>


@endsection

{{-- 样式 --}}
@section('css')
    <link rel="stylesheet" href="{{asset('treetable/jquery.treetable.theme.default.css')}}" />
@endsection

{{-- 插件 --}}
@section('js')
    @parent
    <script src="{{asset('treetable/jquery.treetable.js')}}"></script>
    <script src="{{asset('js/func.js')}}"></script>
    <script>
        $('#name').focus();

        $(".treetable").treetable({
            expandable: true // 展示
            ,initialState :"collapsed"//默认打开所有节点
            ,stringCollapse:'关闭'
            ,stringExpand:'展开'
        });
    </script>

@endsection