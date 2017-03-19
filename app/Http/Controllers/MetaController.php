<?php

namespace App\Http\Controllers;

use App\Meta;
use Illuminate\Http\Request;

class MetaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        if ('' !== $request->get('meta_id')) {
            $meta = Meta::find($request->get('meta_id'));
        } else {
            $meta = new Meta;
        }
            $meta = new Meta;

        $meta->label = $request->get('meta_label');
        $meta->value = $request->get('meta_description');
        $meta->item_id = ($request->get('item_id') ?: $request->get('id'));
        $meta->save();

        return redirect("/container/{$meta->item->container_id}");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Meta  $meta
     * @return \Illuminate\Http\Response
     */
    public function show(Meta $meta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Meta  $meta
     * @return \Illuminate\Http\Response
     */
    public function edit(Meta $meta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Meta  $meta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Meta $meta)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Meta  $meta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Meta $meta)
    {
        //
    }
}
