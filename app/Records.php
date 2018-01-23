<?php
/**
 * Created by IntelliJ IDEA.
 * User: X.P
 * Date: 12/11/2017
 * Time: 12:51 PM
 */
namespace App;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Builder\Class_;

class Records extends Model{
    protected $table = 'records_money_in';
    protected $primaryKey = 'id';
    public $timestamps = true;
    public $guarded = ['id'];

    //用于存储unix时间戳
    protected function getDataFormat(){
        return time();
    }

    protected function asDateTime($value)
    {
        return $value;
    }


    //用于返回充值类型的对应关系
    public function type($ind = null){
        $arr = [
            52 => '后台充值',
            51 => '后台退款',
            53 => '后台赠送',
            54 => '理赔',
            100 => '其他'
        ];
        if($ind !== null){
            return array_key_exists($ind,$arr)?$arr[$ind]:'未知';
        }
        return $arr;
    }
}