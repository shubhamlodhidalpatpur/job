<?php

namespace App\Http\Controllers;
use App\Models\AdmitCard;
use App\Models\PostJob;
use Illuminate\Http\Request;


class AdmitCardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {   
        $result=AdmitCard::leftjoin('post_jobs','post_jobs.id','admit_cards.id')
        ->select('admit_cards.*','post_jobs.name as postjob')->get();
        return view('AdmitCard.AdmitCards',compact('result'));

    }
    //frount
    public function listing(){
        $result=AdmitCard::leftjoin('post_jobs','post_jobs.id','admit_cards.id')
        ->select('admit_cards.*','post_jobs.name as postjob')->get();
        return view('AdmitCard.listing',compact('result'));
    }
    public function create()
    {  
        $post=PostJob::select('name','id')->get();
        return view('AdmitCard.AddAdmitCard',['post'=>$post]);

    }
    public function store(Request $request)
    {
        $result=New AdmitCard;
        $result->post_id=$request->post;
        $result->link=$request->link;
        $result->save();

        return redirect('admidCard');

    }
    public function destroy($id)
    {
        $announcemnet=AdmitCard::find($id)->delete();
        return redirect('admidCard');

    }
    // public function PostOption(){
    //     return view('result.result',compact('post'));

    // }
  
}
