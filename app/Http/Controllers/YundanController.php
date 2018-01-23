<?php
/**
 * Created by IntelliJ IDEA.
 * User: X.P
 * Date: 12/7/2017
 * Time: 3:25 PM
 */
namespace App\Http\Controllers;

use App\Wupins;
use App\Yundans;
use Illuminate\Http\Request;

class YundanController extends Controller{
    /*
     * 这一部分是运单管理，总共有6个方法，是因为有6个不同状态*/
    //运单管理(运单列表页)，全部
    public function yundanManagementS1(Request $request){

        if($request->isMethod('POST') && $request->input('Search')){
            if (array_key_exists('ydh',$request->input('Search'))){
                $keywords = $request->input('Search')['ydh'];
                $yundans = Yundans::where('ydh','like','%'.$keywords.'%')->orderBy('created_at','desc')->Paginate(20);
            }elseif (array_key_exists('username',$request->input('Search'))){
                $keywords = $request->input('Search')['username'];
                $yundans = Yundans::where('username','like','%'.$keywords.'%')->orderBy('created_at','desc')->Paginate(20);
            }elseif (array_key_exists('userid',$request->input('Search'))){
                $keywords = $request->input('Search')['userid'];
                $yundans = Yundans::where('userid','like','%'.$keywords.'%')->orderBy('created_at','desc')->Paginate(20);
            }
        }else{
            $yundans = Yundans::orderBy('created_at','desc')->Paginate(20);
        }
        //$title是测试
        $title = 'xp';
        return view('yundanManagement',[
            'yundans'=>$yundans,
            'title' =>$title
        ]);
    }
    //运单管理(运单列表页)，待审核 status =0
    public function yundanManagementS2(Request $request){

        if($request->isMethod('POST') && $request->input('Search')){
            if (array_key_exists('ydh',$request->input('Search'))){
                $keywords = $request->input('Search')['ydh'];
                $yundans = Yundans::where('status',0)->where('ydh','like','%'.$keywords.'%')->orderBy('created_at','desc')->Paginate(20);
            }elseif (array_key_exists('username',$request->input('Search'))){
                $keywords = $request->input('Search')['username'];
                $yundans = Yundans::where('status',0)->where('username','like','%'.$keywords.'%')->orderBy('created_at','desc')->Paginate(20);
            }elseif (array_key_exists('userid',$request->input('Search'))){
                $keywords = $request->input('Search')['userid'];
                $yundans = Yundans::where('status',0)->where('userid','like','%'.$keywords.'%')->orderBy('created_at','desc')->Paginate(20);
            }
        }else{
            $yundans = Yundans::where('status',0)->orderBy('created_at','desc')->Paginate(20);
        }
        return view('yundanManagement',[
            'yundans'=>$yundans
        ]);
    }
    //运单管理(运单列表页)，待支付(说明已经审单，但是账户没钱) status =3
    public function yundanManagementS3(Request $request){

        if($request->isMethod('POST') && $request->input('Search')){
            if (array_key_exists('ydh',$request->input('Search'))){
                $keywords = $request->input('Search')['ydh'];
                $yundans = Yundans::where('status',3)->where('ydh','like','%'.$keywords.'%')->orderBy('created_at','desc')->Paginate(20);
            }elseif (array_key_exists('username',$request->input('Search'))){
                $keywords = $request->input('Search')['username'];
                $yundans = Yundans::where('status',3)->where('username','like','%'.$keywords.'%')->orderBy('created_at','desc')->Paginate(20);
            }elseif (array_key_exists('userid',$request->input('Search'))){
                $keywords = $request->input('Search')['userid'];
                $yundans = Yundans::where('status',3)->where('userid','like','%'.$keywords.'%')->orderBy('created_at','desc')->Paginate(20);
            }
        }else{
            $yundans = Yundans::where('status',3)->orderBy('created_at','desc')->Paginate(20);
        }
        return view('yundanManagement',[
            'yundans'=>$yundans
        ]);
    }
    //运单管理(运单列表页)，待出库(说明已支付) status =4
    public function yundanManagementS4(Request $request){

        if($request->isMethod('POST') && $request->input('Search')){
            if (array_key_exists('ydh',$request->input('Search'))){
                $keywords = $request->input('Search')['ydh'];
                $yundans = Yundans::where('status',4)->where('ydh','like','%'.$keywords.'%')->orderBy('created_at','desc')->Paginate(20);
            }elseif (array_key_exists('username',$request->input('Search'))){
                $keywords = $request->input('Search')['username'];
                $yundans = Yundans::where('status',4)->where('username','like','%'.$keywords.'%')->orderBy('created_at','desc')->Paginate(20);
            }elseif (array_key_exists('userid',$request->input('Search'))){
                $keywords = $request->input('Search')['userid'];
                $yundans = Yundans::where('status',4)->where('userid','like','%'.$keywords.'%')->orderBy('created_at','desc')->Paginate(20);
            }
        }else{
            $yundans = Yundans::where('status',4)->orderBy('created_at','desc')->Paginate(20);
        }
        return view('yundanManagement',[
            'yundans'=>$yundans
        ]);
    }
    //运单管理(运单列表页)，已出库(包括5出库发送 7飞往中国 9机场检验/海关清关 12海关查验 20快递送货中) status =5,7,9,12,20
    public function yundanManagementS5(Request $request){

        if($request->isMethod('POST') && $request->input('Search')){
            if (array_key_exists('ydh',$request->input('Search'))){
                $keywords = $request->input('Search')['ydh'];
                $yundans = Yundans::where('status',5)->orwhere('status',7)->orwhere('status',9)->orwhere('status',12)->orwhere('status',20)->where('ydh','like','%'.$keywords.'%')->orderBy('created_at','desc')->Paginate(20);
            }elseif (array_key_exists('username',$request->input('Search'))){
                $keywords = $request->input('Search')['username'];
                $yundans = Yundans::where('status',5)->orwhere('status',7)->orwhere('status',9)->orwhere('status',12)->orwhere('status',20)->where('username','like','%'.$keywords.'%')->orderBy('created_at','desc')->Paginate(20);
            }elseif (array_key_exists('userid',$request->input('Search'))){
                $keywords = $request->input('Search')['userid'];
                $yundans = Yundans::where('status',5)->orwhere('status',7)->orwhere('status',9)->orwhere('status',12)->orwhere('status',20)->where('userid','like','%'.$keywords.'%')->orderBy('created_at','desc')->Paginate(20);
            }
        }else{
            $yundans = Yundans::where('status',5)->orwhere('status',7)->orwhere('status',9)->orwhere('status',12)->orwhere('status',20)->orderBy('created_at','desc')->Paginate(20);
        }
        return view('yundanManagement',[
            'yundans'=>$yundans
        ]);
    }
    //运单管理(运单列表页)，已收货(说明用户已经收货) status =30
    public function yundanManagementS6(Request $request){

        if($request->isMethod('POST') && $request->input('Search')){
            if (array_key_exists('ydh',$request->input('Search'))){
                $keywords = $request->input('Search')['ydh'];
                $yundans = Yundans::where('status',30)->where('ydh','like','%'.$keywords.'%')->orderBy('created_at','desc')->Paginate(20);
            }elseif (array_key_exists('username',$request->input('Search'))){
                $keywords = $request->input('Search')['username'];
                $yundans = Yundans::where('status',30)->where('username','like','%'.$keywords.'%')->orderBy('created_at','desc')->Paginate(20);
            }elseif (array_key_exists('userid',$request->input('Search'))){
                $keywords = $request->input('Search')['userid'];
                $yundans = Yundans::where('status',30)->where('userid','like','%'.$keywords.'%')->orderBy('created_at','desc')->Paginate(20);
            }
        }else{
            $yundans = Yundans::where('status',30)->orderBy('created_at','desc')->Paginate(20);
        }
        return view('yundanManagement',[
            'yundans'=>$yundans
        ]);
    }



    //创建运单
    public function createYundan(Request $request){
        //建立这两个模型对象是为了把数据库对应模型传给视图
        $yundan = new Yundans();
        $wupin = new Wupins();

        if($request->isMethod('POST')){
            //验证
            $validator = \Validator::make($request->input(),[
                'Yundans.s_name'=> 'required',
                'Yundans.s_mobile'=> 'required',
                'Yundans.s_add_shengfen'=>'required',
                'Yundans.s_add_chengshi'=>'required',
                'Yundans.s_add_quzhen'=>'required',
                'Yundans.s_add_dizhi'=>'required',
                'Yundans.f_name'=>'required',
                'Yundans.f_mobile'=>'required',
                /*'Wupins.wupin_name'=>'required',
                'Wupins.wupin_brand'=>'required',
                'Wupins.wupin_number'=>'required|integer',
                'Wupins.wupin_price'=>'required',
                'Wupins.wupin_total'=>'required'*/
            ],[
                'required'=>':attribute 为必填项',
                'integer'=>':attribute 必须为整数'
            ],[
                'Yundans.s_name'=> '收件人姓名',
                'Yundans.s_mobile'=> '收件人电话',
                'Yundans.s_add_shengfen'=>'收件人省份',
                'Yundans.s_add_chengshi'=>'收件人城市',
                'Yundans.s_add_quzhen'=>'收件人区镇',
                'Yundans.s_add_dizhi'=>'收件人地址',
                'Yundans.f_name'=>'发件人姓名',
                'Yundans.f_mobile'=>'发件人电话',
                /*'Wupins.wupin_name'=>'物品名称',
                'Wupins.wupin_brand'=>'物品品牌',
                'Wupins.wupin_number'=>'物品数量',
                'Wupins.wupin_price'=>'物品价格',
                'Wupins.wupin_total'=>'物品总价'*/
            ]);
            /*$count = count($request->input('Wupins'));
            dd($count);*/

            if($validator->fails()){
                return redirect()->back()->withErrors($validator)->withInput();
            }


            $dataYD = $request->input('Yundans');
            $dataWP = $request->input('Wupins');
            //思路是先把用户传过来的数据建立到数据库中，再对运单号，等信息进行建立
            $yundanCreate = Yundans::create($dataYD);

            if($yundanCreate){//等登录系统弄好以后 这里应该是已经存了用户id的,下面直接取来用就好
                //这两行放在这里，放在create之后是因为create之前没有ydid和wpid
                $yundanCreate->ydh = $yundanCreate->warehouse.'12093'.$yundanCreate->ydid;
                foreach ($dataWP as $data){
                    $wupinCreate = Wupins::create($data);
                    $wupinCreate->fromid = $yundanCreate->ydid;
                    $wupinCreate->save();
                }
                //下面的$wupinCreate这个实际上是最后一件物品，但是只要最后一件物品存储成功了前面也没问题
                if($yundanCreate->save() && $wupinCreate->save()){
                    return redirect('yundanManagementS1');
                }
            }else{
                //留：这里要加错误信息提示
                return redirect('yundanManagementS1');
            }
        }
        return view('createYundan',[
            'yundan'=>$yundan,
            'wupin'=>$wupin
        ]);
    }


}