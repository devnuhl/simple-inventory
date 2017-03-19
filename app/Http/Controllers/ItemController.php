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
        //
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
        //
        $item = new Item;
        if ($request->get('id')) {
            $item = Item::find($request->get('id'));
        }

        $item->label = $request->get('label');
        $item->description = $request->get('description');
        $item->container_id = $request->get('container_id');
        $item->save();

        if (isset($request->meta_label)) {
            $request->item_id = $item->id;
            $con = new MetaController;
            $con->store($request);
        } else if (isset($request->meta_id)) {
            \App\Meta::find($request->meta_id)->delete();
        }

        return redirect("/container/{$item->container_id}");
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
        //
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
        $item->delete();
        return redirect("/container/{$container_id}");
    }
}
