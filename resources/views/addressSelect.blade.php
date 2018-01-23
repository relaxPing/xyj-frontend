@extends('common\layout')
@section('content')
<h3>地址簿</h3>
<div class="panel panel-default">
    <div class="panel-body">
        <table class="table table-striped table-hover table-responsive">
            <thead>
            <tr>
                <th style="text-align: center">姓名</th>
                <th style="text-align: center">手机</th>
                <th style="text-align: center">地址</th>
                <th style="text-align: center">证件</th>
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
                <td style="text-align: center"><a href="{{url()->previous()}}">选择</a></td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- 分页  -->
<div>
    <div class="pull-right">
        {{$addresses -> render()}}
    </div>
</div>
@stop