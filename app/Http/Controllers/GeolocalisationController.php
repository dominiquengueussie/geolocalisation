<?php

namespace App\Http\Controllers;

use App\Models\Geolocalisation;
use Illuminate\Http\Request;

class GeolocalisationController extends Controller
{
    public function index()
    {    $Geolocal = Geolocalisation::all();
        return view('index', compact('Geolocal'));
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'nom' => 'required',

            ]
        );
        $geo = new Geolocalisation();
        $geo->nom = $request->nom;
        $geo->email = $request->email;
        $geo->latitude = $request->latitude;
        $geo->longitude = $request->longitude;
        $save = $geo->save();

        if ($save) {
            return back()->with('success', 'activité créer avec succès');
        } else {
            return back()->with('fail', 'Echec de création');
        }
    }

    public function show($id){

             $geo = Geolocalisation::findOrFail($id);
            return view('show', compact('geo'));
    }
}
