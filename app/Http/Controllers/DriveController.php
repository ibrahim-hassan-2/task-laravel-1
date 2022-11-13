<?php

namespace App\Http\Controllers;

use App\Drive;
use Illuminate\Http\Request;

class DriveController extends Controller
{

    public function index()
    {
        $drives = Drive::all();
        return view("drives.index")->with("drives" , $drives);
    }

    public function create()
    {
        return view("drives.create");
    }

    public function store(Request $request)
    {
        $size = 2 * 1024;

       $request->validate([

           "title"=> "required",
           "description"=> "required",
           "file_input"=> "required |file|max:$size",
       ]);

       $drive = new Drive();
       $drive->title = $request->title;
       $drive->description = $request->description;
       $drive_data = $request->file('file_input');
       $drive_name = time(). $drive_data->getClientOriginalName();
       $drive_data->move(public_path() . "/drives/" , $drive_name);
       $drive->file = $drive_name;
       $drive->save();
       return redirect("/file/lists")->with("done", "Insert Succesfuly");
    }

    public function show($id)
    {
       $drives  = Drive::find($id);
       return view("drives.show")->with("drives" , $drives);
    }

    public function edit($id)
    {
        $drives  = Drive::find($id);
        return view('drives.edit')->with("drives" , $drives);
    }

    public function update(Request $request, $id)
    {
        $size = 2 * 1024;

        $request->validate([

            "title"=> "required",
            "description"=> "required",
            "file_input"=> "required |file|max:$size",
        ]);

        $drive  = Drive::find($id);
        $drive->title = $request->title;
        $drive->description = $request->description;
        $drive_data = $request->file('file_input');
        $drive_name = time(). $drive_data->getClientOriginalName();
        $drive_data->move(public_path() . "/drives/" , $drive_name);
        $drive->file = $drive_name;
        $drive->save();
        return redirect("/file/lists")->with("done", "Updated Succesfuly");
    }

    public function destroy($id)
    {
        $drives  = Drive::find($id);
        $drives->delete();
        return redirect("/file/lists")->with("done", "Deleted Succesfuly");
    }
}
