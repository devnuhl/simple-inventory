<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ContainerController extends Controller
{
    //

    public function list() {
        return view('containers', ['containers' => \App\Container::all()]);
    }

    public function show($container_id) {
        return view('container', ['container' => \App\Container::find($container_id)]);
    }
}
