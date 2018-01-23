@extends('common\layout')
@section('content')
<h3>地址簿</h3>
@include('common\message')
<div class="panel panel-default">
    <div class="panel-body">
        <table class="table table-striped table-hover table-responsive">
            <thead>
            <tr>
                <th style="text-align: center">姓名</th>
                <th style="text-align: center">手机</th>
                <th style="text-align: center">地址</th>
                <th style="text-align: center">身份证号</th>
                <th style="text-align: center">操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach($addresses as $address)
            <tr>
                <td style="text-align: center">{{$address->truename}}</td>
                <td style="text-align: center">{{$address->mobile}}</td>
                <td style="text-align: center">{{$address->add_guojia}} {{$address->add_shengfen}} {{$address->add_chengshi}} {{$address->add_quzhen}} {{$address->add_dizhi}}</td>
                <td style="text-align: center">{{$address->shenfenhaoma}}</td>
                <td style="text-align: center">
                    <a href="{{url('addressEdit',['addid'=>$address->addid])}}"><button class="btn btn-info">修改</button></a>
                    <a href="{{ url('addressDelete',['addid'=>$address->addid])}}" onclick="if(confirm('确定要执行删除吗？注意：删除操作不可恢复！')== false) return false"><button class="btn btn-danger">删除</button></a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>

<!--分页-->
<div>
    <div class="pull-right">
        {{$addresses->render()}}
    </div>
</div>
@stop