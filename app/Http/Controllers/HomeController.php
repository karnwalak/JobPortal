<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    
    public function index(Request $request)
    {
        $listing = Listing::latest()->filter(request(['tag','search']))->paginate(10);
        return view('index',compact('listing'));
    }

    public function manage()
    {
        $listing = Listing::where('user_id',Auth::user()->id)->get();
        return view('manage',compact('listing'));
    }

    public function create_job()
    {
        return view('create-job');
    }

    public function show_detail(Request $request)
    {
        $data = Listing::find($request->id);
        if($data){
            return view('show-detail')->with('data',$data);
        }else{
            abort('404');
        }
    }

    public function edit(Request $request)
    {
        return view('edit-job')->with('job',Listing::find($request->id));
    }

    public function delete(Request $request)
    {
        Listing::find($request->id)->delete();
        return redirect()->route('manage')->with('message','Job Deleted Successfully!');
    }

    public function store_job(Request $request)
    {
        $formField = $request->validate([
            'title' => 'required',
            'tags' => 'required',
            'company' => 'required',
            'location' => 'required',
            'email' => 'required',
            'website' => 'required',
            'description' => 'required',
        ]);
        // return $request;
        $formField['user_id'] = Auth::user()->id;
        if($request->hasFile('logo')){
            $formField['logo'] = $request->file('logo')->store('logos','public'); 
        }
        if(Listing::create($formField)){
            return redirect()->route('manage')->with('message','Job Added Successfully!');
        }else{
            return redirect()->route('manage')->with('error','Something Went Wrong!');
        }
    }

    public function update_job(Request $request)
    {
        $formField = $request->validate([
            'title' => 'required',
            'tags' => 'required',
            'company' => 'required',
            'location' => 'required',
            'email' => 'required',
            'website' => 'required',
            'description' => 'required',
        ]);
        // return $request;
        if($request->hasFile('logo')){
            $formField['logo'] = $request->file('logo')->store('logos','public'); 
        }

        if(Listing::where('id',$request->id)->update($formField)){
            return redirect()->route('manage')->with('message','Job Updated Successfully!');
        }else{
            return redirect()->route('manage')->with('error','Something Went Wrong!');
        }
    }
}
