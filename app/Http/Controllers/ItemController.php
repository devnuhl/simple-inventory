<?php

namespace App\Http\Controllers;

use App\Item;
use App\Container;
use Illuminate\Http\Request;
use Collective\Html;
use Illuminate\Routing\Route;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // This could be useful if i want to have everything on
        // a page, with filters.
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\Container|null $container
     * @return \Illuminate\Http\Response
     */
    public function create($container = null)
    {
        //
        $item_container = $container;
        $options = [];
        foreach (Container::all() as $container) {
            $options[$container->id] = $container->label;
        }
        return view('form.item', ['container' => $item_container, 'options' => $options]);
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

        $item = new Item;
        $this->updateItem($request, $item);
        $item->save();

        $this->saveMeta($request, $item);

        return redirect("/item/{$item->id}/show");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show(Item $item)
    {
        //
        return view('item', ['item' => $item]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Item $item
     * @param  \App\Container|null $container
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item, Container $container = null)
    {
        $options = [];
        foreach (Container::all() as $container) {
            $options[$container->id] = $container->label;
        }
        return view('form.item', ['item' => $item, 'options' => $options]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        // Need to write and wrap in validators
        $this->updateItem($request, $item);
        $item->save();

        $this->saveMeta($request, $item);

        return redirect("/container/{$item->container_id}");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        //
        $container_id = $item->container_id;
        $item->metas->each(function ($meta) { $meta->delete(); });
        $item->delete();
        return redirect("/container/{$container_id}");
    }

    /**
     * Update local Item, since this is done in both store() and update().
     *
     * @param Request $request
     * @param Item $item
     */
    private function updateItem(Request $request, Item $item) {
        $item->label = $request->label;
        $item->description = $request->description;
        $item->container_id = $request->container_id;
    }

    /**
     * Chain save/update methods here, since they're used in two places.
     *
     * @param Request $request
     * @param Item $item
     */
    private function saveMeta(Request $request, Item $item)
    {
        // Need to write and wrap in validators (should be validated before calling this)
        if (isset($request->meta_label)) {
            $request->item_id = $item->id;
            $con = new MetaController;
            $con->store($request);
        } else if (isset($request->meta_id)) {
            \App\Meta::find($request->meta_id)->delete();
        }
    }
}
