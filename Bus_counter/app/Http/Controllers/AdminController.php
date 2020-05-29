<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\busCounter;
use App\buses;
use DB;



class AdminController extends Controller
{
    public function index(Request $req){

		if($req->session()->has('uname')){
			return view('admin.index');
		}else{
			return redirect('/login');
        }
        
	}
	
	public function viewManager()
	{
		
		$managers=User::all() ;
        return view('admin.viewManager',compact('managers'));
	}

	public function deleteManager($id)
    {
        User::find($id)->delete();
        return redirect(route('viewManager'))->with('successMsg','Manager deleted Successfully');
	}
	
	public function viewStaff()
	{
		
		$staffs=User::all() ;
        return view('admin.viewStaff',compact('staffs'));
	}

	public function deletestaff($id)
    {
        User::find($id)->delete();
        return redirect(route('viewStaff'))->with('successMsg','Staff deleted Successfully');
	}

	public function editStaff($id)
    {
        $staff=User::find($id);
        return view('admin.editStaff',compact('staff'));
	}
	
	public function updateStaff(Request $request,$id)
    {
        $this->validate($request,[
            'uname'=>'required',
            'password'=>'required',
            'type'=>'required',
            'name'=>'required'
        ]);

        $staff=User::find($id);
        $staff->username=$request->uname;
        $staff->password=$request->password;
        $staff->type=$request->type;
        $staff->name=$request->name;
        $staff->save();
        return redirect(route('viewStaff'))->with('successMsg','staff updated Successfully');
    }
	




	
	
    
	public function viewCounter()
	{
		
		$counters=busCounter::all() ;
        return view('admin.viewCounter',compact('counters'));
	}

	public function deletecounter($id)
    {
        busCounter::find($id)->delete();
        return redirect(route('viewCounter'))->with('successMsg','Counter deleted Successfully');
	}

	public function editcounter($id)
    {
        $counter=busCounter::find($id);
        return view('admin.editcounter',compact('counter'));
	}
	
	public function updatecounter(Request $request,$id)
    {
        $this->validate($request,[
            'operator'=>'required',
            'manager'=>'required',
            'location'=>'required',
            'name'=>'required'
        ]);

        $counter=busCounter::find($id);
        $counter->operator=$request->operator;
        $counter->manager=$request->manager;
        $counter->name=$request->name;
        $counter->location=$request->location;
        $counter->save();
        return redirect(route('viewCounter'))->with('successMsg','counter updated Successfully');
    }
	

    public function viewBus()
	{
		
		$buses=buses::all() ;
        return view('admin.viewBus',compact('buses'));
	}

	public function deletebus($id)
    {
        buses::find($id)->delete();
        return redirect(route('viewBus'))->with('successMsg','bus deleted Successfully');
	}

	public function editbus($id)
    {
        $bus=buses::find($id);
        return view('admin.editbus',compact('bus'));
	}
	
	public function updatebus(Request $request,$id)
    {
        $this->validate($request,[
            'name'=>'required',
            'company'=>'required',
            'location'=>'required',
            'seat_row'=>'required',
            'seat_column'=>'required'
        ]);

        $bus=buses::find($id);
        $bus->name=$request->name;
        $bus->company=$request->company;
        $bus->location=$request->location;
        $bus->seat_row=$request->seat_row;
        $bus->seat_column=$request->seat_column;
        $bus->save();
        return redirect(route('viewBus'))->with('successMsg','bus updated Successfully');
    }
	


    public function searchBus(Request $request)
	{
		
		
        $buses = DB::table('buses');
        if( $request->input('search')){
            $buses = $buses->where('name', 'LIKE',  $request->search . "%");
        }
        $buses = $buses->paginate(10);
        
    	return view('admin.viewBus', compact('buses'));
    }

    public function searchCounter(Request $request)
	{
		
		
        $counters = DB::table('bus_counters');
        if( $request->input('search')){
            $counters = $counters->where('name', 'LIKE',  $request->search . "%");
        }
        $counters = $counters->paginate(10);
        
    	return view('admin.viewCounter', compact('counters'));
    }



}
 