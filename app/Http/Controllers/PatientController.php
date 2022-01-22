<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\Prescriptions;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function register(Request $request){
        if(session()->has('userId')){
                   // dd($request->all());
                   $this->validate($request,[
                    'name'=>'required|max:200|min:5',
                    'mobile_number'=>'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',  
                    'email'=>'required|max:100|min:5|email',
                    'date_of_birth'=>'required',
                    'image'=>'required|max:5048',
                    ]
                    );
                    $patient=new Patient();
                    $patient->p_name =$request->name;
                    $patient->p_email =$request->email;
                    $patient->p_mobile =$request->mobile_number;
                    $patient->dob =$request->date_of_birth;
                            $image_name=$request->image->getClientOriginalName();
                            $patient->image =$image_name;
                        $done=$patient->save();
                            if($done){
                                $request->image->move('patients_images',$image_name);
                                return redirect('/welcome')->with('message', 'Registetion Successfuly!');

                            }else{
                                return redirect()->back()->with('error_message', 'Registetion Failed!');
                            }
        }else{
            return redirect('/');
        }

    }
    public function view($id){
        if(session()->has('userId')){
            $patient=Patient::find($id);
            $prescription=Prescriptions::where("p_id", "=",$id)->orderBy('id','DESC')->get();
            return view('view_patients',['patient'=>$patient,'pres'=>$prescription]);

        }else{
            return redirect('/');
        }

    }
    public function editView($id){
        if(session()->has('userId')){
            $patient=Patient::find($id);
            return view('update_patients')->with('patient', $patient);

        }else{
            return redirect('/');
        }

    }
    public function editdata($id,Request $request){
        if(session()->has('userId')){
            $patient=Patient::find($id);
            $this->validate($request,[
                'name'=>'required|max:200|min:5',
                'mobile_number'=>'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',  
                'email'=>'required|max:100|min:5|email',
                'date_of_birth'=>'required',
                'image'=>'max:4048',
                ]
                );
                $image = $request->image;
                    if(empty( $image)){
                    $patient->p_name =$request->name;
                    $patient->p_email =$request->email;
                    $patient->p_mobile =$request->mobile_number;
                    $patient->dob =$request->date_of_birth;
                                
                            $done= $patient->update();
                                if($done){
                                    return redirect('/welcome');
    
                                }else{
                                    return redirect()->back()->with('error_message', 'Registetion Failed!');
                                }

                    }else{
                        $patient->p_name =$request->name;
                        $patient->p_email =$request->email;
                        $patient->p_mobile =$request->mobile_number;
                        $patient->dob =$request->date_of_birth;
                                $image_name=$request->image->getClientOriginalName();
                                $patient->image =$image_name;
                        $done=$patient->update();
                            if($done){
                                $request->image->move('patients_images',$image_name);
                                return redirect('/welcome')->with('message', 'Updated Successfuly!');

                            }else{
                                return redirect()->back()->with('error_message', 'Updation Failed!');
                            } 

                    }
            

        }else{
            return redirect('/');
        }
        

    }
    public function remove($id){
        if(session()->has('userId')){
            $patient=Patient::find($id);
            $patient->delete();
            return redirect()->back()->with('message', 'Deleted Row!');;

        }else{
            return redirect('/');
        }

    }
}
