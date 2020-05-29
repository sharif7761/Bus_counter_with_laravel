<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\busCounter;
use App\buses;
use DB;


use App\Http\Requests\HomeRequest;
use Validator;
class HomeController extends Controller
{
    
    
    public function Userindex(Request $req){

		if($req->session()->has('uname')){
            return view('home.Userindex');
            
		}else{
			return redirect('/login');
        }
        
    }


    public function viewBus()
	{
		
		$buses=buses::all() ;
        return view('home.viewBus',compact('buses'));
	}

	public function deletebus($id)
    {
        buses::find($id)->delete();
        return redirect(route('home.viewBus'))->with('successMsg','bus deleted Successfully');
	}

	public function editbus($id)
    {
        $bus=buses::find($id);
        return view('home.editbus',compact('bus'));
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
        return redirect(route('home.viewBus'))->with('successMsg','bus updated Successfully');
    }
	

    public function addBus()
    {
        return view('home.addBus');
    }
    
    public function storeBus(Request $request)
    {
        $this->validate($request,[
            'name'=>'required',
            'company'=>'required',
            'location'=>'required',
            'seat_row'=>'required',
            'seat_column'=>'required'
        ]);

        $bus=new buses;
        $bus->name=$request->name;
        $bus->company=$request->company;
        $bus->location=$request->location;
        $bus->seat_row=$request->seat_row;
        $bus->seat_column=$request->seat_column;
        $bus->save();
        return redirect(route('home.viewBus'))->with('successMsg','bus added Successfully');
    }


    function action(Request $request)
    {
     if($request->ajax())
     {
      $output = '';
      $query = $request->get('query');
      if($query != '')
      {
        $data = DB::table('buses')
         ->where('name', 'like', '%'.$query.'%')
         ->get();
         
         
      }
      else
      {
        $data = DB::table('buses')
         ->get();
      }
      $total_row = $data->count();
      if($total_row > 0)
      {
       foreach($data as $row)
       {
        $output .= '
        <tr>
         <td>'.$row->name.'</td>
         <td>'.$row->location.'</td>
         <td>'.$row->seat_row.'</td>
         <td>'.$row->seat_column.'</td>
         <td>'.$row->company.'</td>
        </tr>
        ';
       }
      }
      else
      {
       $output = '
       <tr>
        <td align="center" colspan="5">No Data Found</td>
       </tr>
       ';
      }
      $data = array(
       'table_data'  => $output,
       'total_data'  => $total_row
      );

      echo json_encode($data);
     }
    }



    public function searchBus(Request $request)
	{
		
		
        $buses = DB::table('buses');
        if( $request->input('search')){
            $buses = $buses->where('name', 'LIKE',  $request->search . "%");
        }
        $buses = $buses->paginate(10);
        
    	return view('home.viewBus', compact('buses'));
    }
        
        
}


    
	
    

