<?php
/**
 * Created by IntelliJ IDEA.
 * User: X.P
 * Date: 12/9/2017
 * Time: 6:02 PM
 */
namespace App;

use Illuminate\Database\Eloquent\Model;

class Wupins extends Model{
    protected $table = 'xa_wupin';
    protected $primaryKey = 'wpid';
    public $timestamps = false;
    public $guarded = ['wpid'];
    /*public $fillable = [''];*/

    //物品类别 数据库对应关系
    public function wupinType(){
        $arr = [
            '包' =>'包',
            '手表' =>'手表',
            '食品饮料' =>'食品饮料',
            '食品饮料' =>'食品饮料',
            '母婴用品' =>'母婴用品',
            '母婴用品' =>'母婴用品',
            '保健品' =>'保健品',
            '化妆品' =>'化妆品',
            '钱包' =>'钱包',
            '鞋靴' =>'鞋靴',
            '生活用品' =>'生活用品',
            '护肤品' =>'护肤品',
            '衣服' =>'衣服',
            '墨镜' =>'墨镜',
            '奶粉' =>'奶粉',
            '皮带' =>'皮带',
            '小型电器' =>'小型电器',
            '其他' =>'其他',
            '玩具' =>'玩具',
            '个人护理' =>'个人护理',
            '影音设备' =>'影音设备',
            '厨房电器' =>'厨房电器',
            '文具用品' =>'文具用品',
            '首饰' =>'首饰',
            '厨卫用具' =>'厨卫用具',
            '体育用品' =>'体育用品'
        ];

        return $arr;
    }
}