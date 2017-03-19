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
        //
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
        //
        if (isset($request->meta_id)) {
            $meta = Meta::find($request->meta_id);
            return $this->update($request, $meta);
        }

        $meta = new Meta;

        $this->updateMeta($request, $meta);
        $meta->save();

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
        $this->updateMeta($request, $meta);
        $meta->save();

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
        $container_id = $meta->item->container_id;
        $meta->delete();
        return redirect("/container/{$container_id}");
    }

    /**
     * @param Request $request
     * @param Meta $meta
     */
    private function updateMeta(Request $request, Meta $meta)
    {
        $meta->label   = $request->meta_label ?: '';
        $meta->value   = $request->meta_value ?: '';
        $meta->item_id = ($request->item_id ?: $request->id);
    }
}
