<?php

namespace App\Http\Controllers;

use App\Models\Contactlist;
use Illuminate\Http\Request;

class ContactlistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contactlist = Contactlist::paginate(10);
        return response()->json([
            'data' => $contactlist
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $contactlist = Contactlist::create([
            'firstName' => $request->firstName,
            'lastName' => $request->lastName,
            'numberPhone' => $request->numberPhone,
            'address' => $request->address
        ]);
        return response()->json([
            'data' => $contactlist
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Contactlist  $contactlist
     * @return \Illuminate\Http\Response
     */
    public function show(Contactlist $contactlist)
    {
        return response()->json([
            'data' => $contactlist
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Contactlist  $contactlist
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contactlist $contactlist)
    {
        $contactlist->firstName = $request->firstName;
        $contactlist->lastName = $request->lastName;
        $contactlist->numberPhone = $request->numberPhone;
        $contactlist->address = $request->address;
        $contactlist->save();

        return response()->json([
            'data' => $contactlist
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Contactlist  $contactlist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contactlist $contactlist)
    {
        $contactlist->delete();
        return response()->json([
            'data' => $contactlist
        ]);
    }
}
