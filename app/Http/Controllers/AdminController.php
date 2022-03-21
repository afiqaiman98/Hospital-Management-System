<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Notifications\SendEMailNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

// use Illuminate\Notifications\Notification;


class AdminController extends Controller
{
    public function addview()
    {
        return view('admin.add_doctor');
    }

    public function upload(Request $request)
    {
        $doctor = new Doctor();
        $image = $request->file;
        $imagename = time().'.'. $image->getClientoriginalExtension();
        $request->file->move('doctorimage',$imagename);
        $doctor->image=$imagename;

        $doctor->name=$request->name;
        $doctor->number=$request->number;
        $doctor->room=$request->room;
        $doctor->speciality=$request->speciality;

        $doctor->save();

        return redirect()->back()->with('message','Doctor Added Succesfully');


    }

    public function showappointment()
    {
        $data = Appointment::all();

        return view('admin.showappointment',compact('data'));
    }

    public function approved($id)
    {
        $data = Appointment::find($id);
        $data->status = 'approved';
        $data->save();
        return redirect()->back();
    }

    public function cancel($id)
    {
        $data = Appointment::find($id);
        $data->status = 'Canceled';
        $data->save();
        return redirect()->back();
    }

    public function showdoctor()
    {
        $data = Doctor::all();

        return view('admin.showdoctor',compact('data'));
    }

    public function deletedoctor($id)
    {
        $data = Doctor::find($id);
        $data->delete();
        return redirect()->back();
    }

    public function updatedoctor($id)
    {
        $data = Doctor::find($id);
        return view('admin.update_doctor',compact('data'));
    }

    public function editdoctor(Request $request, $id)
    {
        $doctor = Doctor::find($id);
        $doctor->name=$request->name;
        $doctor->number=$request->number;
        $doctor->speciality=$request->speciality;
        $doctor->room=$request->room;

        $image=$request->file;
        if($image)
        {
            $imagename=time().'.'.$image->getClientOriginalExtension();
            $image=$request->move('doctorimage',$imagename);
            $doctor->image=$imagename;
        }

        $doctor->save();
        return redirect()->back()->with('message','Doctor Details Updated Successfully');
        

    }

    public function emailview($id)
    {
        $data = Appointment::find($id);
        return view('admin.email_view',compact('data'));
    }

    public function sendemail(Request $request,$id)
    {
        $data = Appointment::find($id);
        $details = [

            'greeting' => $request->greeting,
            'body' => $request->body,
            'actiontext' => $request->actiontext,
            'actionurl' => $request->actionurl,
            'endpart' => $request->endpart,
        ];

        // Notification::send($data,new SendEMailNotification($details));
        // Notification::sendemail($data,new SendEMailNotification($details));
        // Notification::sendNow($data, new SendEMailNotification($details));
        Notification::send($data , new SendEMailNotification($details));
        return redirect()->back();
    }
}
