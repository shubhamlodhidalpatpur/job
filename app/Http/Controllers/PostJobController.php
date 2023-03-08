<?php

namespace App\Http\Controllers;
use App\Models\Department;
use App\Models\Category;
use App\Models\PostJob;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostJobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $post_annoucements = DB::table('post_annoucements')->first();
        $PostJob=PostJob::leftjoin('categories','categories.id','post_jobs.category_id')
        ->leftjoin('departments','departments.id','post_jobs.department_id')
        ->leftjoin('states','states.id','post_jobs.state_id')->select('post_jobs.*','categories.title as category','departments.title as department','states.name as state')->get();
        return view('postjob.Postjob',compact('PostJob','post_annoucements'));

    }
    public function FrontendIndex()
    {
        $post_annoucements = DB::table('post_annoucements')->get();
        $PostJob=PostJob::leftjoin('categories','categories.id','post_jobs.category_id')
        ->leftjoin('departments','departments.id','post_jobs.department_id')
        ->leftjoin('states','states.id','post_jobs.state_id')->select('post_jobs.*','categories.title as category','departments.title as department','states.name as state')->get();
        return view('welcome',compact('PostJob','post_annoucements'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $department=Department::all();
        $category=Category::all();
        $state=State::select('name','id')->where('country_id',101)->get();
        return view('postjob.AddPostJob',['department'=>$department,'category'=>$category,'state'=>$state]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $JobPost= new PostJob ;
        $JobPost->name=$request->post_name;
        $JobPost->start_date=$request->start_date;
        $JobPost->end_date=$request->end_date;
        $JobPost->category_id=$request->category;
        $JobPost->state_id=$request->state;
        $JobPost->department_id=$request->department;
        $JobPost->min_age=$request->min_age;
        $JobPost->max_age=$request->max_age;
        $JobPost->eligibility=$request->education_eligibility;
        $JobPost->fee=$request->fee;
        $JobPost->notification_link=$request->notification_link;
        $JobPost->apply_link=$request->Apply_link;
        $JobPost->no_of_vacancy=$request->no_of_vacancy;
        $JobPost->save();
        return redirect('/Jobpost');

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
        $department=Department::all();
        $category=Category::all();
        $state=State::select('name','id')->where('country_id',101)->get();
        $PostJob=PostJob::find($id);
        return view('postjob.UpdatePostJob',['PostJob'=>$PostJob,'department'=>$department,'category'=>$category,'state'=>$state]);

        //
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
        $JobPost= PostJob::find($id) ;
        $JobPost->name=$request->post_name;
        $JobPost->start_date=$request->start_date;
        $JobPost->end_date=$request->end_date;
        $JobPost->category_id=$request->category;
        $JobPost->state_id=$request->state;
        $JobPost->department_id=$request->department;
        $JobPost->min_age=$request->min_age;
        $JobPost->max_age=$request->max_age;
        $JobPost->eligibility=$request->education_eligibility;
        $JobPost->fee=$request->fee;
        $JobPost->notification_link=$request->notification_link;
        $JobPost->apply_link=$request->apply_link;
        $JobPost->no_of_vacancy=$request->no_of_vacancy;
        $JobPost->save();
        return redirect('/Jobpost')->with('message','Data Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $jobPost=PostJob::where('id',$id)->delete();
        return redirect('/Jobpost')->with('message','Post Delete Successfully');

    }
    public function UpdateAnnoucement(Request $request){
        $annoucement = DB::table('post_annoucements')
              ->where('id', 1)
              ->update(['annoucement' => $request->annoucement]);
        return redirect('/Jobpost')->with('message','annoucement Updated Successfully');

              
    }
}
