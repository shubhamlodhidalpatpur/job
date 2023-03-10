<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\State;
use App\Models\VisitorUser;
use Illuminate\Support\Facades\DB;



class VisitorUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $visiter_users = DB::select('SELECT st.name,vs.fname,vs.state,vs.category,vs.mobile_number,vs.age,vs.id FROM `visitor_users` vs , `states` st WHERE vs.state=st.id');
        return view('visitor_user.VisitorUser', ['visiter_user' => $visiter_users]);
    }
  
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $state = State::select('name', 'id')->where('country_id', 101)->get();
        return view('visitor_user.AddVisitorUser', ['state' => $state]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'first_name' => 'required',
                'password' => 'required',
                'state' => 'required',
                'date_of_birth' => 'required',
                'age' => 'required',
                'category' => 'required',
                'mobile_number' => 'required'

            ]
        );
        $visitor_user = new VisitorUser;
        $visitor_user->fname = $request->first_name;
        $visitor_user->state = $request->state;
        $visitor_user->date_of_birth = $request->date_of_birth;
        $visitor_user->category = $request->category;
        $visitor_user->age = $request->age;
        $visitor_user->password = $request->password;
        $visitor_user->mobile_number = $request->mobile_number;
        $visitor_user->save();
        return redirect('/visitor_user');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $state = State::select('name', 'id')->where('country_id', 101)->get();
        $visiter_users = DB::select('SELECT st.name,vs.fname,vs.state,vs.category,vs.mobile_number,vs.age,vs.id,vs.password,vs.date_of_birth FROM `visitor_users` vs , `states` st WHERE vs.state=st.id and vs.id = ?', [$id]);
        //  dd($visiter_users);
        return view('visitor_user.EditVisitorUser', ['visiter_user' => $visiter_users], ['state' => $state]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        echo 'check';

        $visitor_user = VisitorUser::find($id);
        $visitor_user->fname = $request->first_name;
        $visitor_user->state = $request->state;
        $visitor_user->date_of_birth = $request->date_of_birth;
        $visitor_user->category = $request->category;
        $visitor_user->age = $request->age;
        $visitor_user->password = $request->password;
        $visitor_user->mobile_number = $request->mobile_number;
        $visitor_user->save();
        return redirect('/visitor_user');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::delete('DELETE FROM visitor_users WHERE id = ?', [$id]);
        echo ("User Record deleted successfully.");
        return redirect('/visitor_user');
    }




    // user login
    public function login()
    {
        return view('Register.register');
    }
    public function loginPage()
    {
        return view('Register.login');
    }
// login frount
    public function loginUser(Request $request)
    {
        $request->validate(
            [
                'phone' => 'required',
                'password' => 'required',
               

            ]
        );
      
          $user = VisitorUser::where('mobile_number', $request->phone)
          ->first();
            if ($user->mobile_number==$request->phone) {
               
                if ($request->password== $user->password) {
      
                  
                    return redirect('/');
                     } else {
                        return view('Register.login');
                    //  $response = ["message" => "Password mismatch"];
                     
                     return response($response, 422);
                     }
                    }
        return view('Register.login');
    }
            
        
    public function Regiterstore(Request $request)
    {
        $request->validate(
            [
                'full_name' => 'required',
                'password' => 'required',
                // 'state' => 'required',
                'date_of_birth' => 'required',
                // 'age' => 'required',
                'category' => 'required',
                'mobile_number' => 'required | max:10'

            ]
        );
        $visitor_user = new VisitorUser;
        $visitor_user->fname = $request->full_name;
        // $visitor_user->state = $request->state;
        $visitor_user->date_of_birth = $request->date_of_birth;
        $visitor_user->category = $request->category;
        // $visitor_user->age = $request->age;
        $visitor_user->password = $request->password;
        $visitor_user->mobile_number = $request->mobile_number;
        $visitor_user->save();
        return view('Register.login');
    }
}
