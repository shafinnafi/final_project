<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\DB;


class EmployeeController extends Controller
{
    public function index(Request $req){

		// if($req->session()->has('uname')){
		// 	return view('employee.index');
		// }else{
        //     $req->session()->flash('msg','invalid request');
        //     return redirect('/login');
            
        // }
       $uname = $req->session()->get('uname');
       return view('employee.index');
        
  } 
  
  
}
