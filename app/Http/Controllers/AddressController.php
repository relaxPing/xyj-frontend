<?php
/**
 * Created by IntelliJ IDEA.
 * User: X.P
 * Date: 12/12/2017
 * Time: 11:06 AM
 */
namespace App\Http\Controllers;

use App\Addresses;
use Illuminate\Http\Request;

class AddressController extends Controller{
    //地址选择，在下单时候用
    public function addressSelect(){
        $addresses = Addresses::orderBy('Created_at','desc')->paginate(20);
        return view('addressSelect',[
            'addresses'=>$addresses
        ]);
    }
    //地址管理，在地址簿中
    public function addressManagement(){
        $addresses = Addresses::orderBy('Created_at','desc')->paginate(20);
        return view('addressManagement',[
            'addresses' => $addresses
        ]);
    }
    //地址编辑 在地址簿中
    public function addressEdit(Request $request,$addid){
        $address = Addresses::find($addid);
        if($request->isMethod('POST')){
            $data = $request->input('Addresses');
            $address->truename = $data['truename'];
            $address->mobile_code = $data['mobile_code'];
            $address->mobile = $data['mobile'];
            $address->add_shengfen = $data['add_shengfen'];
            $address->add_chengshi = $data['add_chengshi'];
            $address->add_quzhen = $data['add_quzhen'];
            $address->add_dizhi = $data['add_dizhi'];
            if($address->save()){
                return redirect('addressManagement')->with('success','修改成功');
            }else{

            }
        }
        return view('addressEdit',[
            'address' => $address
        ]);
    }

    //地址删除 在地址簿中
    public function addressDelete($addid){
        $address = Addresses::find($addid);
        //提取出地址人名 下面提示中用
        $uname = $address->truename;
        if($address->delete()){
            return redirect('addressManagement')->with('success','成功删除-'.$uname);
        }else{
            return redirect('addressManagement')->with('error','删除失败');
        }
    }
}