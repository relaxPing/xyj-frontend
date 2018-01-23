<?php
/**
 * Created by IntelliJ IDEA.
 * User: X.P
 * Date: 12/8/2017
 * Time: 12:23 PM
 */
namespace App;
use Illuminate\Database\Eloquent\Model;

class Members extends Model{
    protected $table = 'xa_member';
    protected $primaryKey = 'userid';

    //会员类型号对应关系
    public function memberType($ind = null){
        $arr = [
            1 => '普通用户',
            15 => 'VIP用户'
        ];
        if($ind !== null){
            return array_key_exists($ind,$arr)?$arr[$ind]:'未知';
        }
        return $arr;
    }
}