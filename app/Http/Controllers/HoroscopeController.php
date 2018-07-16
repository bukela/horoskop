<?php

namespace App\Http\Controllers;

use Session;
use App\Sign;
use App\Type;
use App\Schedule;
use App\Horoscope;
use App\Horoscopegroup;
use Illuminate\Http\Request;
use App\Http\Requests\HoroscopeAdd;

class HoroscopeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = $request->get('q');
        if($query) {
            $horoscopes = $query ? Horoscope::search($query)->orderBy('created_at','desc')->paginate(7) : Horosope::all();
            return view('horoscopes.index', compact('horoscopes'));
        } else {
            $horoscopes = Horoscope::orderBy('created_at','desc')->paginate(7);
            return view('horoscopes.index', compact('horoscopes'));
        }
        // $horoscopes = Horoscope::orderBy('created_at','desc')->paginate(7);
        // return view('horoscopes.index', compact('horoscopes'));
    }

    public function getHoro() {
        $horoscope = Horoscope::all();
        return $horoscope->load('sign','horoscopegroup');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $horogroups = Horoscopegroup::all();
        $signs = Sign::all();
        $types = Type::all();
        $schedules = Schedule::all();
        return view('horoscopes.create', compact('signs', 'types', 'horogroups', 'schedules'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(HoroscopeAdd $request)
    {
        // $this->validate($request, [
        //     'horoscopegroup_id' => 'required',
        //     'schedules' => 'required',
        //     'types' => 'reqiured',
        //     'sign_id' => 'required',
        //     'title' => 'required|max:255|unique:horoscopes',
        //     'short_description' => 'required'
        // ]);
        $horoscope = new Horoscope;
        $horoscope->title = $request->title;
        $horoscope->short_description = $request->short_description;
        $horoscope->sign_id = $request->sign_id;
        $horoscope->horoscopegroup_id = $request->horoscopegroup_id;
        $horoscope->save();

        $horoscope->schedules()->attach($request->schedules);
        $horoscope->types()->attach($request->types);

        Session::flash('success', 'Horoscope created successfully');
        return redirect(route('horoscopes'));
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Horoscope  $horoscope
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $horoscope = Horoscope::find($id);
        return view('horoscopes.show', compact('horoscope'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Horoscope  $horoscope
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $horoscope = Horoscope::find($id);
        $horo_groups = HoroscopeGroup::all();
        $signs = Sign::all();
        $types = Type::all();
        $schedules = Schedule::all();
        return view('horoscopes.edit', compact('horoscope','signs', 'types', 'horo_groups', 'schedules'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Horoscope  $horoscope
     * @return \Illuminate\Http\Response
     */
    public function update(HoroscopeAdd $request, $id)
    {
        $horoscope = Horoscope::find($id);
        $horoscope->title = $request->title;
        $horoscope->short_description = $request->short_description;
        $horoscope->sign_id = $request->sign_id;
        $horoscope->horoscopegroup_id = $request->horoscopegroup_id;
        $horoscope->save();

        $horoscope->schedules()->sync($request->schedules);
        $horoscope->types()->sync($request->types);


        Session::flash('success', 'Horoscope updated successfully');
        return redirect(route('horoscopes'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Horoscope  $horoscope
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $horoscope = Horoscope::find($id);
        $horoscope->delete();              
        $horoscope->schedules()->detach();
        $horoscope->types()->detach();

        Session::flash('success', 'Horoscope deleted');
        return redirect(route('horoscopes'));
    }
}
