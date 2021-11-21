<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class formController extends Controller
{
    // form view 
    public function index()
    {
        $data = DB::table('check_list_tbl')->get();
        return view('form.form',compact('data'));
    }

    // form save
    public function save( Request $request)
    {
        $no_id              = $request->no_id;
        $description        = $request->description;
        $status_checkbox    =   $request->status_checkbox;
        for($i=0;$i<count($no_id);$i++)
        {
            $datasave   =   [

                'no_id'       => $no_id[$i],
                'description' => $description[$i],
                'status'      => $status_checkbox[$i],
            ];
    
            // return dd($datasave);
            DB::table('save_checklist_tbl')->insert($datasave);
        }
        return redirect()->back();
    }

    // view 
    public function viewReport()
    {
        $data=  DB::table('save_checklist_tbl')->get();
        // return dd($data);
        return view('report.report',compact('data'));
    }
    
}
