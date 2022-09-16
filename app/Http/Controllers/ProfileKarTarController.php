<?php

namespace App\Http\Controllers;

use App\Models\ProfileKarTar;
use Illuminate\Http\Request;

class ProfilekartarController extends Controller
{

    public function index()
    {
       $data = ProfileKarTar::all();
       return view('dashboard',compact('data'));
    }


    public function store(Request $request)
    {
        $this->validate($request, [
            'image' => 'required|file|max:3072',
            'kartar' => 'required',
     
        ]);

        $data = new ProfileKarTar();
        $data->kartar = $request->kartar;
        
        
        $img = $request->file('image');
        $filename = $img->getClientOriginalName();

        if ($request->hasFile('image')) {
            $request->file('image')->storeAs('/kartar',$filename);
        }
        $data->image = $request->file('image')->getClientOriginalName();
        // dd($data);

        $data->save();

        return redirect()->back();
    }

    public function editKarTar(Request $request,$id){
        $data = ProfileKarTar::where('id',$id)->firstOrFail();

        $request->validate([
            'image' => 'required|file|max:3072',
            'kartar' => 'required',
            
        ]);

        $data->kartar = $request->kartar;
       
        
        $img = $request->file('image');
        $filename = $img->getClientOriginalName();

        if ($request->hasFile('image')) {
            $request->file('image')->storeAs('/kartar',$filename);
        }
        $data->image = $request->file('image')->getClientOriginalName();
        // dd($data);
        $data->update();

        return redirect()->back();
    }
}
