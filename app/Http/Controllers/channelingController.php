<?php

namespace App\Http\Controllers;

use App\Models\channeling;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class channelingController extends Controller
{
    public function addView($id){
        if(session()->has('userId')){
            $patient=Patient::find($id);
            return view('add_appointment')->with('patient', $patient);

        }else{
            return redirect('/');
        }
    }
    public function add(Request $request,$id){
        if(session()->has('userId')){
            $this->validate($request,[
                'reason'=>'required',  
                'payment'=>'required|max:10|min:1',
                'date'=>'required',
                ]
                );
                $appoinment=new channeling();
                $date=$request->date;
                $c_id=DB::table('channelings')->where([["p_id","=",$id],["date","=",$date]])->value('id');
                if(empty($c_id)){
                    $app_count = count(DB::select('select no from channelings  where date =?', [$date]));
                            if(empty($app_count)){
                                $no=1;
                                $appoinment->p_id=$id;
                                $appoinment->topic=$request->reason;
                                $appoinment->date=$date;
                                $appoinment->no=$no;
                                $appoinment->amount=$request->payment;
                                $done=$appoinment->save();
                                        if($done){
                                            return redirect('/welcome')->with('message', 'Channeling Registetion Successfuly!');
                                        }

                            }else{
                                $no=$app_count+1;
                                $appoinment->p_id=$id;
                                $appoinment->topic=$request->reason;
                                $appoinment->date=$date;
                                $appoinment->no=$no;
                                $appoinment->amount=$request->payment;
                                $done=$appoinment->save();
                                if($done){
                                    return redirect('/welcome')->with('message', 'Channeling Registetion Successfuly!');
                                }

                            }

                }else{
                    return redirect()->back()->with('error_message', 'This Customer was getten Appoinment this day!');
                }


        }else{
            return redirect('/');
        }

    }
    public function view(){
        if(session()->has('userId')){
           
            $appoinment = DB::table('channelings')
            ->leftJoin('patients','channelings.p_id','=','patients.id')->where('status',0)->orderBy('date','DESC')->get();
    
            return view('data_table_appoinment',['appoinment'=>$appoinment]);

        }else{
            return redirect('/');
        }

    }
    public function accept($id){

        if(session()->has('userId')){
            
           $app=channeling::find($id);
           $app->status=1;
           $done=$app->update();
           if($done){
            return redirect()->back()->with('message', 'Accepted Successfuly!');

        }else{
            return redirect()->back()->with('error_message', 'Accept Failed!');
        }

        }else{
            return redirect('/');
        }
    }
    public function cancle($id){

        if(session()->has('userId')){
            
           $app=channeling::find($id);
           $app->status=2;
           $done=$app->update();
           if($done){
            return redirect()->back()->with('message', 'Deleted Successfuly!');

        }else{
            return redirect()->back()->with('error_message', 'Delete Failed!');
        }

        }else{
            return redirect('/');
        }
    }
    public function acceptview(){
        if(session()->has('userId')){
            
            $tot_income = DB::table('channelings')->sum('amount');
            $month_income= DB::table('channelings')->where('date', date('yy-mm'))->sum('amount');
            $appoinment = DB::table('channelings')
            ->leftJoin('patients','channelings.p_id','=','patients.id')->where('status',1)->orderBy('date','DESC')->get();
    
            return view('data_table_channeled',['appoinment'=>$appoinment,'tot'=>$tot_income,'mic'=>$month_income]);

        }else{
            return redirect('/');
        }

    }
    public function delete($id){

        if(session()->has('userId')){
            
           $app=channeling::find($id);
           $app->status=2;
           $done=$app->update();
           if($done){
            return redirect()->back()->with('message', 'Deleted Successfuly!');

        }else{
            return redirect()->back()->with('error_message', 'Delete Failed!');
        }

        }else{
            return redirect('/');
        }
    }
}
