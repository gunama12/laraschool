<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Year;
use App\Http\Requests;
use Validator;

class YearController extends Controller
{
   public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
    	$years = Year::orderBy('id', 'asc')->paginate(10);
        return view('pages.year.year', [
    		'years' => $years
    	   ])
        ->with('i' , ($request->input('page', 1) - 1) * 10);
    }

    public function create()
    {
    	return view('pages.year.CreateYear');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), Year::$rules);
        if ($validator->fails()){
            return redirect('/year')->withErrors($validator);
        }
        
		$countYearExist = Year::where('name', $request->name)->where('semester', $request->semester)->count();
    	if($countYearExist > 0){
    		return redirect('/year')->with('error', 'Years and semester Are Already Exist')->withInput();
    	}
        
        Year::create($request->all());
        return redirect('/year')->with('success', 'Succes Insert Year Study data');
   		
    }

    public function delete(Year $year)
    {
    	$year->delete();
		return redirect('/year');
	}
}
