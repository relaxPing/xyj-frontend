@extends('common\layout')
@section('css')
<link rel="stylesheet" type="text/css" href="..\css\layout.css">
<link rel="stylesheet" type="text/css" href="..\css\pagination.css">
@stop
@section('headPic')
<img src="../imgs/header.jpg" style="width: 100%;height: auto">
@stop

@section('content')
<!--收件人信息-->
<form method="post" action="">
    {{csrf_field()}}
    <div class="panel panel-default">
        <div class="panel-heading">地址信息</div>
        <div class="panel-body">

            <div id="item1" class="form-inline">
                <div class="input-group">
                    <span class="input-group-addon">姓名</span>
                    <input class="form-control" type="text" name="Addresses[truename]"
                           value="{{old('Addresses')['truename']?old('Addresses')['truename']:$address->truename}}">
                </div>
                <div class="input-group">
                    <div class="form-inline">
                        <select class="form-control" name="Addresses[mobile_code]">
                            @foreach($address->phonePrefix() as $k=>$val)
                            <option value="{{$k}}" {{$address->mobile_code == $k?'selected':''}}>{{$val}}</option>
                            @endforeach
                        </select>
                        <input class="form-control" type="text" name="Addresses[mobile]" placeholder="请填写手机号码"
                        value="{{old('Addresses')['mobile']?old('Addresses')['mobile']:$address->mobile}}">
                    </div>
                </div>
            </div>
            <div class="form-inline">
                <div class="input-group">
                    <span class="input-group-addon">地址</span>
                    <input class="form-control" type="text" placeholder="省份" style="width: auto" name="Addresses[add_shengfen]"
                           value="{{old('Addresses')['add_shengfen']?old('Addresses')['add_shengfen']:$address->add_shengfen}}">
                    <input class="form-control" type="text" placeholder="城市" style="width: auto" name="Addresses[add_chengshi]"
                           value="{{old('Addresses')['add_chengshi']?old('Addresses')['add_chengshi']:$address->add_chengshi}}">
                    <input class="form-control" type="text" placeholder="区镇" style="width: auto" name="Addresses[add_quzhen]"
                           value="{{old('Addresses')['add_quzhen']?old('Addresses')['add_quzhen']:$address->add_quzhen}}">
                    <input class="form-control" type="text" placeholder="详细地址" style="width: 700px" name="Addresses[add_dizhi]"
                           value="{{old('Addresses')['add_dizhi']?old('Addresses')['add_dizhi']:$address->add_dizhi}}">
                </div>
            </div>
            <br>
            <div class="form-group" style="align-content: center">
                <button type="submit" class="btn btn-primary btn-md" >提交修改</button>
            </div>
        </div>
    </div>
</form>

@stop