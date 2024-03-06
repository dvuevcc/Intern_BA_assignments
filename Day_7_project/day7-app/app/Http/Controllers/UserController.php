<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user_data; //add Customers Model
use DataTables;

class UserController extends Controller
{
    //
    
    function index()
    {
        return view('index');
    }
    public function getdata()
    {
        $user = user_data::select('id', 'user_name', 'user_email', 'status');
        return Datatables::of($user)
            ->addColumn('action', function($user){
                return '<a href="#" class="btn btn-xs btn-primary edit" id="'.$user->id.'"><i class="bi bi-pencil-square"></i> Edit</a> <a href="#" class="btn btn-xs btn-danger delete" id="'.$user->id.'"><i class="bi bi-backspace-reverse-fill"></i> Delete</a>';
            })
            ->addColumn('checkbox', function($user){
                return '<input type="checkbox" name="user_checkbox[]" class="user_checkbox" value="'.$user->id.'" />';
            })
            ->rawColumns(['checkbox', 'action'])
            ->make(true);
    }
   
}
