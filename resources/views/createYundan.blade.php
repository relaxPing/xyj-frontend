@extends('common/layout')
@section('content')
<h3>运单列表</h3>
<!--验证信息-->
@include('common/validator')
<form method="post" action="">
    {{csrf_field()}}
    <!--基本信息-->
    <div class="panel panel-default">
        <div class="panel-heading">基本信息</div>
        <div class="panel-body">
            <div class="form-inline" >
                <div class="input-group">
                    <span class="input-group-addon">收件仓库</span>
                    <select class="form-control" name="Yundans[warehouse]">
                        @foreach($yundan->warehouses() as $k => $val)
                        <option value="{{$k}}" name="Yundans[warehouse]" {{old('Yundans')['warehouse'] == $k?'selected':''}}>{{$val}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="input-group">
                    <span class="input-group-addon">运输渠道</span>
                    <select class="form-control" name="Yundans[channel]">
                        @foreach($yundan->channels() as $k=>$val)
                        <option value="{{$k}}" name="Yundans[channel]" {{old('Yundans')['channel'] == $k?'selected':''}}>{{$val}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

        </div>
    </div>
    <!--商品信息-->
    <div class="panel panel-default">
        <div class="panel-heading">商品信息</div>
        <div class="panel-body" id="itemInfo" style="padding: 5px 10px">
            <!--添加商品按钮-->
            <input type="button" class="btn btn-default" id="addOneRow" style="margin-bottom: 5px" value="添加商品"></input>
            <!--商品-->
            <div class="form-inline itemList">
                <div class="input-group">
                    <span class="input-group-addon">类别</span>
                    <select class="form-control wupin_type" name="Wupins[0][wupin_type]">
                        @foreach($wupin->wupinType() as $k => $val)
                        <option value="{{$k}}" class="wupin_type" name="Wupins[0][wupin_type]" {{old('Wupins')[0]['wupin_type'] == $k?'selected':''}}>{{$val}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="input-group">
                    <span class="input-group-addon">品名</span>
                    <input class="form-control wupin_name" required="required" type="text" placeholder="请输入商品中文名称" name="Wupins[0][wupin_name]" value="{{old('Wupins')[0]['wupin_name']}}">
                </div>
                <div class="input-group">
                    <span class="input-group-addon">品牌/厂商</span>
                    <input class="form-control wupin_brand" required="required" type="text" placeholder="" name="Wupins[0][wupin_brand]" value="{{old('Wupins')[0]['wupin_brand']}}">
                </div>
                <div class="input-group">
                    <span class="input-group-addon" >数量</span>
                    <input class="form-control wupin_number" required="required" type="text" style="width: 50px" name="Wupins[0][wupin_number]" value="{{old('Wupins')[0]['wupin_number']}}">
                </div>
                <div class="input-group">
                    <span class="input-group-addon">单价</span>
                    <input class="form-control wupin_price"  required="required" type="text" style="width: 50px" name="Wupins[0][wupin_price]" value="{{old('Wupins')[0]['wupin_price']}}">
                </div>
                <div class="input-group">
                    <span class="input-group-addon">总价</span>
                    <input class="form-control wupin_total" required="required" type="text" style="width: 50px" name="Wupins[0][wupin_total]" value="{{old('Wupins')[0]['wupin_total']}}">
                </div>
                <input type="button" class="delRow btn btn-default" value="-" />
            </div>
            <!--测试的-->
            <!--<div id="item1" class="form-inline" style="padding-bottom: 3px">
                <div class="input-group">
                    <span class="input-group-addon">类别</span>
                    <select class="form-control" name="Wupins[1][wupin_type]">
                        @foreach($wupin->wupinType() as $k => $val)
                        <option value="{{$k}}" name="Wupins[1][wupin_type]">{{$val}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="input-group">
                    <span class="input-group-addon">品名</span>
                    <input class="form-control" type="text" placeholder="请输入商品中文名称" name="Wupins[1][wupin_name]">
                </div>
                <div class="input-group">
                    <span class="input-group-addon">品牌/厂商</span>
                    <input class="form-control" type="text" placeholder="" name="Wupins[1][wupin_brand]">
                </div>
                <div class="input-group">
                    <span class="input-group-addon" >数量</span>
                    <input class="form-control" type="text" style="width: 50px" name="Wupins[1][wupin_number]">
                </div>
                <div class="input-group">
                    <span class="input-group-addon">单价</span>
                    <input class="form-control" type="text" style="width: 50px" name="Wupins[1][wupin_price]">
                </div>
                <div class="input-group">
                    <span class="input-group-addon">总价</span>
                    <input class="form-control" type="text" style="width: 50px" name="Wupins[1][wupin_total]">
                </div>
                <input type="button" onclick="addItem()" value="+" />
            </div>-->

        </div>
        <div class="panel-footer" style="color:red;">» 请务必准确如实填写商品的名称、单价和数量，如您购买的是套装，数量为套装商品数量。若因您的填写错误而导致海关扣货以及目的国清关额外税费的，由您自行承担。</div>
    </div>
    <!--收件人信息-->
    <div class="panel panel-default">
        <div class="panel-heading">收件人信息</div>
        <div class="panel-body">
            <div class="form-inline">
                <div class="input-group">
                    <a href="{{url('addressSelect')}}">从地址簿导入</a>
                </div>
            </div>
            <div id="item1" class="form-inline">
                <div class="input-group">
                    <span class="input-group-addon">收件人姓名</span>
                    <input class="form-control" required="required" type="text" name="Yundans[s_name]" value="{{old('Yundans')['s_name']}}">
                </div>
                <div class="input-group">
                    <div class="form-inline">
                        <select class="form-control" name="Yundans[s_mobile_code]">
                            @foreach($yundan->phonePrefix() as $k=>$val)
                            <option value="{{$k}}" name="Yundans[s_mobile_code]" {{old('Yundans')['s_mobile_code'] == $k?'selected':''}}>{{$val}}</option>
                            @endforeach
                        </select>
                        <input class="form-control" required="required" type="text" name="Yundans[s_mobile]" placeholder="请填写手机号码" value="{{old('Yundans')['s_mobile']}}">
                    </div>
                </div>
            </div>
            <div class="form-inline">
                <div class="input-group">
                    <span class="input-group-addon">收件人地址</span>
                    <input class="form-control" required="required" type="text" placeholder="省份" style="width: auto" name="Yundans[s_add_shengfen]" value="{{old('Yundans')['s_add_shengfen']}}">
                    <input class="form-control" required="required" type="text" placeholder="城市" style="width: auto" name="Yundans[s_add_chengshi]" value="{{old('Yundans')['s_add_chengshi']}}">
                    <input class="form-control" required="required" type="text" placeholder="区镇" style="width: auto" name="Yundans[s_add_quzhen]" value="{{old('Yundans')['s_add_quzhen']}}">
                    <input class="form-control" required="required" type="text" placeholder="详细地址" style="width: 700px" name="Yundans[s_add_dizhi]" value="{{old('Yundans')['s_add_dizhi']}}">
                </div>
            </div>
        </div>
    </div>
    <!--发件人信息-->
    <div class="panel panel-default">
        <div class="panel-heading">发件人信息</div>
        <div class="panel-body">
            <div class="form-inline">
                <div class="input-group">
                    <input type="button" value="从地址簿导入">
                    <label><input type="checkbox" checked="checked">保存到地址簿</label>
                </div>
            </div>
            <div class="form-inline">
                <div class="input-group">
                    <span class="input-group-addon">发件人姓名</span>
                    <input class="form-control" required="required" type="text" name="Yundans[f_name]" value="{{old('Yundans')['f_name']}}">
                </div>
                <div class="input-group">
                    <div class="form-inline">
                        <select class="form-control" name="Yundans[f_mobile_code]" >
                            @foreach($yundan->phonePrefix() as $k=>$val)
                            <option value="{{$k}}" name="Yundans[f_mobile_code]" {{old('Yundans')['f_mobile_code'] == $k?'selected':''}}>{{$val}}</option>
                            @endforeach
                        </select>
                        <input class="form-control" required="required" type="text" name="Yundans[f_mobile]" placeholder="请填写手机号码" value="{{old('Yundans')['f_mobile']}}">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--接受条款 提交-->
    <div class="form-group" style="align-content: center">
        <label><input type="checkbox" checked="checked"><a href="#">我已看过并接受《赔付条例》条款</a></label></br>
        <button type="submit" class="btn btn-primary btn-md" >确认并提交</button>
    </div>
</form>
@stop

@section('js')
<script type="text/javascript">

    $(function() {
        //添加行
        var count = 0;
        $("#addOneRow").click(function() {
            count++;
            var temp = $(".itemList:first").clone(true);
            $(".itemList:last").after(temp);
            //更改name属性。这个用于向数据库传多个商品数据 不能丢
            $(".itemList:last .wupin_type").attr('name','Wupins['+count+'][wupin_type]');
            $(".itemList:last .wupin_name").attr('name','Wupins['+count+'][wupin_name]');
            $(".itemList:last .wupin_brand").attr('name','Wupins['+count+'][wupin_brand]');
            $(".itemList:last .wupin_number").attr('name','Wupins['+count+'][wupin_number]');
            $(".itemList:last .wupin_price").attr('name','Wupins['+count+'][wupin_price]');
            $(".itemList:last .wupin_total").attr('name','Wupins['+count+'][wupin_total]');
            //物品只有第一行有数据保持
            $(".itemList:last .wupin_name").val('');
            $(".itemList:last .wupin_brand").val('');
            $(".itemList:last .wupin_number").val('');
            $(".itemList:last .wupin_price").val('');
            $(".itemList:last .wupin_total").val('');
        });

        //删除行
        $(".delRow").click(function() {
            if ($(".itemList").length < 2) {
                alert("至少保留一件商品！");
            } else {
                $(this).parent().remove();
            }
        });

        //商品不能为空


    });
</script>
@stop