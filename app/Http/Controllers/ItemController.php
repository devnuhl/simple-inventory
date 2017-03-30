<?php

namespace App\Http\Controllers;

use App\Item;
use App\Meta;
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
        $item
            ->fill($request->all())
            ->save();

        if ($request->has('meta.label')) {
            $meta = new Meta;
            $meta
                ->fill($request->meta)
                ->item()
                ->associate($item)
                ->save();
        }

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
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
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
        $item->update($request->all());
        if ($request->has('meta.id')) {
            $meta = Meta::find($request->meta['id']);
        } else {
            $meta = new Meta;
        }

        if ($request->has('meta.label')) {
            $meta
                ->fill($request->meta)
                ->save();
        } else {
            $meta->delete();
        }

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

}
