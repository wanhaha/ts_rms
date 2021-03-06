{{-- 继承布局 --}}
@extends('system.home')


{{-- 页面内容 --}}
@section('content')

    <p>
        <a class="btn" href="{{route('sys_menu')}}">
            <i class="ace-icon fa fa-arrow-left bigger-110"></i>
            返回
        </a>
    </p>


    <form class="form-horizontal" role="form" action="{{route('sys_menu_add')}}" method="post">
        {{csrf_field()}}
        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right" for="parent_id"> 上级菜单： </label>
            <div class="col-sm-9">
                <input type="text" id="parent_id" value="{{$sdata['name']}}" class="col-xs-10 col-sm-5" readonly>
                <input type="hidden" name="parent_id" value="{{$sdata['id']}}">
            </div>
        </div>
        <div class="space-4"></div>

        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right" for="name"> 名称： </label>
            <div class="col-sm-9">
                <input type="text" id="name" name="name" value="{{old('name')}}" class="col-xs-10 col-sm-5" required>
            </div>
        </div>
        <div class="space-4"></div>

        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right" for="icon">字体图标代码：</label>
            <div class="col-sm-9">
                <textarea id="icon" name="icon" class="col-xs-10 col-sm-5" >{{old('icon')}}</textarea>
            </div>
        </div>
        <div class="space-4"></div>

        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right" for="module">模块：</label>
            <div class="col-sm-9 radio">
                @if($sdata['id'])
                    <input type="text" id="module" value="{{$sdata['module']}}" class="col-xs-10 col-sm-5" readonly>
                @else
                    <select name="module" id="module" class="col-xs-10 col-sm-5">
                        @foreach($edata->module as $key => $value)
                            <option value="{{$key}}">{{$value}}</option>
                        @endforeach
                    </select>
                
                @endif
                
            </div>
        </div>
        <div class="space-4"></div>

        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right" for="url"> 路由地址： </label>
            <div class="col-sm-9">
                <input type="text" id="url" name="url" value="{{old('url')}}" class="col-xs-10 col-sm-5" required>
            </div>
        </div>
        <div class="space-4"></div>

        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right" for="method"> 限制请求方法： </label>
            <div class="col-sm-9">
                <input type="text" id="method" name="method" value="{{old('method')}}" class="col-xs-10 col-sm-5" >
            </div>
        </div>
        <div class="space-4"></div>
        
        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right" for="login">限制登录访问：</label>
            <div class="col-sm-9 radio">
                @foreach($edata->login as $key => $value)
                    <label>
                        <input name="login" type="radio" class="ace" value="{{$key}}" @if($key==1) checked @endif >
                        <span class="lbl">{{$value}}</span>
                    </label>
                @endforeach
            </div>
        </div>
        <div class="space-4"></div>

        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right" for="auth">限制操作权限：</label>
            <div class="col-sm-9 radio">
                @foreach($edata->auth as $key => $value)
                    <label>
                        <input name="auth" type="radio" class="ace" value="{{$key}}" @if($key==1) checked @endif >
                        <span class="lbl">{{$value}}</span>
                    </label>
                @endforeach
            </div>
        </div>
        <div class="space-4"></div>

        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right" for="display">显示状态：</label>
            <div class="col-sm-9 radio">
                @foreach($edata->display as $key => $value)
                    <label>
                        <input name="display" type="radio" class="ace" value="{{$key}}" @if($key==1) checked @endif >
                        <span class="lbl">{{$value}}</span>
                    </label>
                @endforeach
            </div>
        </div>
        <div class="space-4"></div>

        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right" for="sort"> 排序： </label>
            <div class="col-sm-9">
                <input type="number" min="0" id="sort" name="sort" value="{{old('sort')}}" class="col-xs-10 col-sm-5" required>
            </div>
        </div>
        <div class="space-4"></div>

        <div class="form-group">
            <label class="col-sm-3 control-label no-padding-right" for="infos">描述：</label>
            <div class="col-sm-9">
                <textarea id="infos" name="infos" class="col-xs-10 col-sm-5" >{{old('infos')}}</textarea>
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

@endsection

{{-- 插件 --}}
@section('js')
    @parent
    <script src="{{asset('js/func.js')}}"></script>
    <script>
        $('#name').focus();
    </script>

@endsection