<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Prescriptions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class PrescriptionController extends Controller
{
    public function add(Request $request,$id){
        if(session()->has('userId')){
            // dd($request->all());
            $this->validate($request,[
             'prescription'=>'required|max:200|min:5',
             'date_of_issued'=>'required',
             ]
             );
             $pre=new Prescriptions();
             $pre->p_id  =$id;
             $pre->description =$request->prescription;
             $pre->date =$request->date_of_issued;
                 $done=$pre->save();
                     if($done){
            
            return Redirect::to('/welcome/view_patients/'.$id);

                     }else{
                         return redirect('/welcome')->with('error_message', 'Addition Failed!');
                     }
 }else{
     return redirect('/');
 }

    }
}
