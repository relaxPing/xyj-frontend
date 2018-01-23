<?php
/**
 * Created by IntelliJ IDEA.
 * User: X.P
 * Date: 12/11/2017
 * Time: 1:45 PM
 */
namespace App\Http\Controllers;

use App\Records;

class RecordsController extends Controller{
    public function recordMoneyIn(){
        $recordsIn = Records::where('userid',10065)->Orderby('created_at','desc')->paginate(20);

        return view('recordMoneyIn',[
            'recordsIn' => $recordsIn
        ]);
    }
}