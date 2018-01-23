<?php
/**
 * Created by IntelliJ IDEA.
 * User: X.P
 * Date: 12/12/2017
 * Time: 1:41 PM
 */
namespace App\Http\Controllers;
use App\Members;

class MemberController extends Controller{
    public function memberDetail(){
        $member = Members::find(12093);
        return view('memberDetail',[
            'member'=>$member
        ]);
    }
}