<?php

namespace App\Http\Controllers;

use App\Meta;
use App\Item;
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
        // Not sure there is any merit to this method.
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param Item $item
     * @return \Illuminate\Http\Response
     */
    public function create(Item $item)
    {
        //
        return view('form.meta', ['item' => $item]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Need to write and wrap in validators
        $meta = new Meta;
        $meta->fill($request->all())->save();

        return redirect("/item/{$meta->item_id}/show");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Meta  $meta
     * @return \Illuminate\Http\Response
     */
    public function show(Meta $meta)
    {
        // Useless without a context.
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Meta  $meta
     * @return \Illuminate\Http\Response
     */
    public function edit(Meta $meta)
    {
        return view('form.meta', ['meta' => $meta]);
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
        $meta->update($request->all());

        return redirect("/item/{$meta->item_id}/show");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Meta  $meta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Meta $meta)
    {
        $item_id = $meta->item_id;
        $meta->delete();
        return redirect("/item/{$item_id}/show");
    }

}
