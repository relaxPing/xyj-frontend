<?php
/**
 * Created by IntelliJ IDEA.
 * User: X.P
 * Date: 12/7/2017
 * Time: 3:14 PM
 */
namespace App;
use Illuminate\Database\Eloquent\Model;

class Yundans extends Model{
    protected $table = 'yundan';
    protected $primaryKey = 'ydid';
    public $guarded = ['ydid'];
    public $timestamps = true;
    //下面两个方法用于存unix时间戳
    protected function getDateFormat()
    {
        return 'U';
    }

    protected function asDateTime($value)
    {
        return $value;
    }

    //状态号对应的名称
    public function  status($ind = null){
        $arr = [
            0 => '待审核',
            3 => '已打包计费，待支付',
            4 => '已支付，待出库',
            5 => '出库发送',
            7 => '飞往中国',
            9 => '机场检验/海关清关',
            12 => '海关检验',
            20 => '快递送货中',
            30 => '完成'
        ];
        if($ind !== null){
            return array_key_exists($ind,$arr)?$arr[$ind]:'其他';
        }
        //如果不传参数直接调用 返回数组
        return $arr;
    }
    //渠道号对应的模型
    public function channels($ind = null){
        $arr =[
          1 => '普货线(保健品/食品)',
          2 => '衣服/鞋/粉剂/液体',
          3 => '包/化妆品/小电器',
          4 => '手表/香水',
          5 => 'BS电商专用',
          6 => '其他'
        ];
        if($ind !== null){
            return array_key_exists($ind,$arr)?$arr[$ind]:'其他';
        }
        //如果不传参数直接调用 返回数组
        return $arr;
    }
    //仓库号对应的名称
    public function warehouses( $ind = null){
        $arr = [
            17 => '达拉斯',
            14 => '休斯顿',
            19 => 'Frisco网点',
            20 => '奥斯汀',
            21 => '亚特兰大',
            22 => 'UTDSW收货点'
        ];
        if($ind !== null){
            return array_key_exists($ind,$arr)?$arr[$ind]:'其他';
        }
        //如果不传参数直接调用 返回数组
        return $arr;
    }
    //类别对应的名称
    //手机号对应名称
    public function phonePrefix(){
        $arr = [
            1 => '美国/加拿大',
            86 => '中国大陆'
        ];
        return $arr;
    }
}