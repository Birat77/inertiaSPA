<?php

namespace App\Http\Controllers;

use Exception;
use Inertia\Inertia;
use App\Models\Organization;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class OrganizationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return Inertia::render('Organizations/Index', [
            'list' => Organization::groupBy('id')->get(['id', 'name', 'email', 'city']),
            // 'list' => DB::table('organizations')->groupBy('id')->paginate(10)->get(['id', 'name', 'email', 'city'])->toArray(),
            // 'create_url' => route('organizations.create')
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Organizations/Create');
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
            'name' => 'required',
            'email' => 'required',
            'city'  => 'required'
        ]);
        try {
            Organization::create($request->all());
            return redirect()->route('organizations.index')->with('successMessage', 'New Organization was successfully created.');
        } catch (Exception $e) {
            return $e->getMessage();
        }
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
        try {
            $organization = Organization::find($id);
        } catch (Exception $e) {
            return $e->getMessage();
        }
        return inertia('Organizations/Edit', ['organization' => $organization]);
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
        // $request->validate([
        //     'name' => 'required',
        //     'email' => 'required|unique:organizations',
        //     'city'  => 'required'
        // ]);
        try {
            Organization::find($id)->update($request->all());
            // return Redirect::route('orgnizations.index');
        } catch (Exception $e) {
            return $e->getMessage();
        }
        return redirect()->route('organizations.index')->with('successMessage', 'Organization was successfully updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd($id);
        try {
            Organization::find($id)->delete();
            // return "Oh Yeah";

            return redirect()->route('organizations.index')->with('successMessage', 'Organization was successfully deleted.');
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}
