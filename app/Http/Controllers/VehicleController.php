<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Vehicle;

class VehicleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $search = $request->query('search', '');
        $sort_col = $request->query('sort_col', 'id');
        $sort_dir = $request->query('sort_dir', 'asc');
        $per_page = $request->query('per_page', 10);

        $vehicles = DB::table('vehicles')
            ->where('name', 'like', '%'.$search.'%')
            ->orWhere('registration_number', 'like', '%'.$search.'%')
            ->orWhere('mileage', 'like', $search);

        $vehicles = $vehicles->orderBy($sort_col, $sort_dir);

        $vehicles = $vehicles->simplePaginate($per_page);

        return $vehicles;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|string|max:255',
            'registration_number'=>'required|string|max:255|unique:vehicles',
            'mileage'=>'required|numeric'
        ]);

        return Vehicle::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Vehicle::find($id);
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
        $request->validate([
            'name'=>'string|max:255',
            'registration_number'=>'string|max:255',
            'mileage'=>'numeric'
        ]);

        $vehicle = Vehicle::find($id);
        $vehicle->update($request->all());

        return $vehicle;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Vehicle::destroy($id) ? 'deleted' : 'failed to delete';
    }
}
