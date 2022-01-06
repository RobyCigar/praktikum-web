<?php

namespace App\Http\Controllers;

use App\Models\Anime;
use Illuminate\Http\Request;

class AnimeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $animes = Anime::all();
        return view('anime.index', compact('animes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('anime.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $anime = Anime::create([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return redirect()->route('anime.index')->with('success', 'Anime created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Anime  $anime
     * @return \Illuminate\Http\Response
     */
    public function show(Anime $anime)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Anime  $anime
     * @return \Illuminate\Http\Response
     */
    public function edit(Anime $anime)
    {
        return view('anime.edit', compact('anime'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Anime  $anime
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Anime $anime)
    {
        $anime->update([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return redirect()->route('anime.index')->with('warning', 'Anime updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Anime  $anime
     * @return \Illuminate\Http\Response
     */
    public function destroy(Anime $anime)
    {
        $anime->delete();

        return redirect()->route('anime.index')->with('danger', 'Anime deleted successfully.');
    }
}
