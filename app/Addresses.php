<?php
/**
 * Created by IntelliJ IDEA.
 * User: X.P
 * Date: 12/12/2017
 * Time: 10:43 AM
 */
namespace App;
use Illuminate\Database\Eloquent\Model;

class Addresses extends Model{
    protected $table = 'xa_member_address';
    protected $primaryKey = 'addid';
    public $timestamps = true;
    public $guarded = ['addid','updated_at'];
    //下面两个方法用于存unix时间戳
    protected function getDataFormat(){
        return time();
    }

    protected function asDateTime($value)
    {
        return $value;
    }
    //手机号前缀
    public function phonePrefix(){
        $arr = [
            1 => '美国/加拿大',
            86 => '中国大陆'
        ];
        return $arr;
    }
}