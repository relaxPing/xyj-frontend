@extends('common\layout')
@section('content')
<h3>充值记录</h3>
<div class="panel panel-default">
    <div class="panel-body">
        <table class="table table-striped table-hover table-responsive">
            <thead>
            <tr>
                <th style="text-align: center">类型</th>
                <th style="text-align: center">说明</th>
                <th style="text-align: center">金额</th>
                <th style="text-align: center">操作时间</th>
            </tr>
            </thead>
            <tbody>
            @foreach($recordsIn as $recordIn)
            <tr>
                <td style="text-align: center">{{$recordIn->type($recordIn->type)}}</td>
                <td style="text-align: center">{{$recordIn->title}}</td>
                <td style="text-align: center">{{$recordIn->money}}美元</td>
                <td style="text-align: center">{{date('Y-m-d',$recordIn->created_at)}}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>


<!--分页-->
<div>
    <div class="pull-right">
        {{$recordsIn->render()}}
    </div>
</div>
@stop