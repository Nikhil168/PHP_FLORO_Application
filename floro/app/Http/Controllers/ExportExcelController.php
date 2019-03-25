<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use Excel;

class ExportExcelController extends Controller
{
    function excel(){
        $data=DB::table('users')->get()->toArray();
        $users_array[]=array('user_name','email','first_name','last_name','address','city','postal_code','created_at','last_sign_in_at');
        foreach($data as $users)
        {
             $users_array[]=array(
                 'user_name'=>$users->user_name,
                 'email'=>$users->email,
                 'first_name'=>$users->first_name,
                 'last_name'=>$users->last_name,
                 'address'=>$users->address,
                 'city'=>$users->city,
                 //'house_number'->$users->house_number,
                 'postal_code'=>$users->postal_code,
                 //'telephone_code'=>$users->telephone_code,
                 'created_at'=>$users->created_at,
                 'last_sign_in_at'=>$users->last_sign_in_at,

             );

             }
             
             Excel::create('MyExcel',function($excel) use($users_array)
             {
                // dd('dsdh');
                 $excel->setTitle('MyExcel');
                 $excel->sheet('MyExcel',function($sheet) use($users_array)
                 {
                    $sheet->fromArray($users_array);
                 });
             })->download('xlsx');
           
    }
}
