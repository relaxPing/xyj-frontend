@extends('common/layout')
@section('content')
<h3>运单管理</h3>
<!--Tab-->
<ul class="nav nav-tabs">
    <li class="{{Request::getPathInfo() == '/yundanManagementS1'?'active':''}}"><a href="{{url('yundanManagementS1')}}" >全部</a></li>
    <li class="{{Request::getPathInfo() == '/yundanManagementS2'?'active':''}}"><a href="{{url('yundanManagementS2')}}" >待审核</a></li>
    <li class="{{Request::getPathInfo() == '/yundanManagementS3'?'active':''}}"><a href="{{url('yundanManagementS3')}}">待支付</a></li>
    <li class="{{Request::getPathInfo() == '/yundanManagementS4'?'active':''}}"><a href="{{url('yundanManagementS4')}}">待出库</a></li>
    <li class="{{Request::getPathInfo() == '/yundanManagementS5'?'active':''}}"><a href="{{url('yundanManagementS5')}}">已出库</a></li>
    <li class="{{Request::getPathInfo() == '/yundanManagementS6'?'active':''}}"><a href="{{url('yundanManagementS6')}}">已签收</a></li>
</ul>
<!--搜索条件-->
<div class="panel panel-default">
    <div class="panel-body">

            <div class="form-inline">
                <div class="input-group" style="padding: 0">
                    <form method="post" action="">
                        {{csrf_field()}}
                        <input class="form-control"  placeholder="运单号查询" style="width: 230px" name="Search[ydh]">
                        <button type="submit" class="btn btn-default">查询</button>
                    </form>
                </div>
                <div class="input-group" style="padding: 0">
                    <form method="post" action="">
                        {{csrf_field()}}
                        <input class="form-control"  placeholder="会员名查询" style="width: 230px" name="Search[username]">
                        <button type="submit" class="btn btn-default">查询</button>
                    </form>
                </div>
                <div class="input-group" style="padding: 0">
                    <form method="post" action="">
                        {{csrf_field()}}
                        <input class="form-control"  placeholder="会员号查询" style="width: 230px" name="Search[userid]">
                        <button type="submit" class="btn btn-default">查询</button>
                    </form>
                </div>
            </div>
            <div class="form-inline" style="margin-top: 5px;padding-bottom: 0">
                <div class="input-group" style="padding: 0">
                    <input  type="text" placeholder="下单时间">-
                    <input  type="text" placeholder="下单时间">
                    <button type="submit" class="btn btn-default">查询</button>
                </div>
                <div class="input-group" style="padding: 0">
                    <input  type="text" placeholder="修改时间">-
                    <input type="text" placeholder="修改时间">
                    <button type="submit" class="btn btn-default">查询</button>
                </div>

            </div>
    </div>
</div>

<!--搜索出的运单-->
<div class="table-responsive" style="margin: 10px">
    <!--显示搜索出数据的表格-->
    <table class="table table-hover">
        <thead style="background-color: #e3e3e3">
        <tr>
            <th align="center" valign="middle" style="text-align: center"><input type="checkbox" id="selectAll"></th>
            <th align="center" valign="middle" style="text-align: center">运单号</th>
            <th align="center" valign="middle" style="text-align: center">状态</th>
            <th align="center" valign="middle" style="text-align: center">渠道</th>
            <th align="center" valign="middle" style="text-align: center">收件人</th>
            <th align="center" valign="middle" style="text-align: center">操作</th>
        </tr>
        </thead>
        <tbody style="background-color: #f0f0f0">
        @foreach($yundans as $yundan)
        <tr>
            <td align="center" valign="middle" style="text-align: center"><input type="checkbox" class="selectBox"></td>
            <td align="center" valign="middle" style="text-align: center">{{$yundan->ydh}}</td>
            <td align="center" valign="middle" style="text-align: center">{{$yundan->status($yundan->status)}}</br>
                @if($yundan->gnkdydh)申通:@endif{{$yundan->gnkdydh}}</td>
            <td align="center" valign="middle" style="text-align: center">{{$yundan->channels($yundan->channel)}}</td>
            <td align="center" valign="middle" style="text-align: center">{{$yundan->s_name}}<br>
                {{$yundan->s_mobile_code}} {{$yundan->s_mobile}}</td>
            <td align="center" valign="middle" style="text-align: center">
                <button type="button" class="btn btn-info btn-mid">复制</button>
                <button type="button" class="btn btn-info btn-mid print">打印</button>
            </td>
        </tr>
        <!--分割开始-->
        <tr colspan="10" style="height: 10px;"></tr>
        <!--分割结束-->
        @endforeach
        </tbody>
    </table>
    <!--显示数量-->
    <div>共{{$yundans->total()}}条数据</div>
</div>

<!--打印和导出-->
<div class="form-inline" style="background-color: #fafafa;padding: 10px">

    <select class="form-control" style="width: 200px">
        <option>条码</option>
        <option>普通A4纸</option>
    </select>
    <button type="button" class="btn btn-warning btn-md ">打印所选</button>
    <select class="form-control" style="width: 200px">
        <option>简易清单</option>
        <option>报税单</option>
    </select>
    <button type="button" class="btn btn-warning btn-md ">导出</button>
</div>

<!-- 分页  -->
<div>
    <div class="pull-right">
        {{$yundans -> render()}}
    </div>
</div>

<button class="btn1">提交</button>
<button class="btn2">提交2</button>

@stop

@section('js')
<script type="text/javascript">
    $(document).ready(function(){
        //tab状态改变，这个其实可有可无因为前面li标签已经动态判断了
        //但是还是要留着，因为这样tab的反应很快，数据还没请求过来tab已经响应了
        $('li').click(function() {
            $('li', $(this).parent()).removeClass('active');
            $(this).addClass('active');
        })
        //全选框
        $("#selectAll").click(function(){//给全选按钮加上点击事件
            var xz = $(this).prop("checked");//判断全选按钮的选中状态
            var ck = $(".selectBox").prop("checked",xz);  //让class名为qx的选项的选中状态和全选按钮的选中状态一致。
        })

        //测试
        /*$(".btn1").click(function(){
            var len = $("input:checkbox:checked").length;
            alert("你一共选中了"+len+"个复选框");
        })

        $(".btn1").click(function(){
            var len = $("input:checkbox:checked").length;
            alert("你一共选中了"+len+"个复选框");
        })*/
        var yundan ="<?php $yundans ?>";
        $(".print").click(function(){
            alert(yundan);
            console.log(yundan);
        })
    });
</script>
@stop