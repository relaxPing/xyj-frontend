@extends('common\layout')
@section('content')
<h3>我的资料</h3>
<div class="panel panel-default">
    <div class="panel-body">
        <table class="table table-hover table-responsive">
            <tr>
                <td>会员类型</td>
                <td>{{$member->memberType($member->groupid)}}</td>
            </tr>
            <tr>
                <td>登录账号</td>
                <td>{{$member->username}}</td>
            </tr>
        </table>
    </div>
</div>
@stop