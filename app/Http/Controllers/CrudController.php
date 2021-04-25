<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\User;
use Exception;


class CrudController extends Controller
{

	public function index($value='')
    {
   		$result['users'] =User::get()->toArray();

   		return view('crud.show_users',$result);
    }


    public function create()
    {

    	return view('crud.create');
    }

    public function edit(Request $request)
    {
    	
    $result['data']  = User::where('id','=',$request->id)->firstOrFail();
            
    return view('crud.edit',$result);
    }

    public function update(Request $request)
    {
    	$validated = $request->validate([
        'name'  => 'required',
        'email' => 'required',
    ]);

   if($validated)
   {

   	$password = Hash::make($request->password);

    $data = array(

    "name"	=>$request->name,
    "email"	=>$request->email,

    );

    try {
        
        $result = User::where('id','=',$request->id)->update($data);
        return redirect('/index')->with(array("message"=>"User Updated Successfully!","class"=>"success"));
    } 
    catch (Exception $e) {
        return redirect('/index')->with(array("message"=>"Someting is Wrong!","class"=>"danger"));

    }

    }

}

        

   public function delete(Request $request)
   
    {
     
    try {
        
        $result = User::where('id','=',$request->id)->delete();
        return redirect('/index')->with(array("message"=>"User Deleted Successfully!","class"=>"success"));
    } 
    catch (Exception $e) {
        return redirect('/index')->with(array("message"=>"Someting is Wrong!","class"=>"danger"));

    }
    
    }

   
    public function register(Request $request)
    {

    	$validated = $request->validate([
        'name'  => 'required',
        'email' => 'required',
        'password'=> 'required'
    ]);

   if($validated)
   {

   	$password = Hash::make($request->password);

    $data = array(

    "name"	=>$request->name,
    "email"	=>$request->email,
    "password"=>$password	

    );

    try {
        
    $result = User::insert($data);
    return redirect('/home')->with(array("message"=>"User Add Successfully!","class"=>"success"));
    
    } 
    catch (Exception $e) {
        return redirect('/create')->with(array("message"=>"Someting is Wrong!","class"=>"danger"));

    }


   } 	
    
   }


   public function addNewpost(Request $data)
    {

       $title =$data->title;
       $desc  =$data->desc; 
       $user_id =auth()->user()->id;
       $date    =date('Y-m-d');


    

    try {
        
    $result = DB::insert("INSERT INTO posts(user_id,title,description,date) VALUES ('$user_id','$title','$desc','$date')");
     return response()->json(['data' =>"Post Add Successfully!"]);
    
    } 
    catch (Exception $e) {
         return response()->json(['data' =>"Something is Wrong"]);

    }
    
   }


}
