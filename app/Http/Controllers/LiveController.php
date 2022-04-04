<?php

namespace App\Http\Controllers;

use App\Models\Live;
use Illuminate\Http\Request;

class LiveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $live = Live::orderBy("id", "desc")
            ->paginate(25);

        $live->map(function ($item) {
            $item->editRoute = '/admin/live/' . $item->id . '/edit';
            //$item->deleteRoute = '/admin/live/' . $item->id;
        });

        return view("admin.pages.live.index", ["lives" => $live]);
    }

    public function adminIndex()
    {
        $lives = Live::orderBy("id", "desc")
            ->paginate(25);

        $lives->map(function ($item) {
            $item->editRoute = '/admin/live/' . $item->id . '/edit';
            //$item->deleteRoute = '/admin/live/' . $item->id;
        });

        return view("admin.pages.live.index", ["lives" => $lives]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return;

        return view("admin.pages.live.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return;

        $request->validate([
            'link' => 'max:255',
        ]);

        $live = Live::create($request->except("_token"));

        return redirect("/admin/live")->with("success", "Операция успешно выполнена!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Live  $live
     * @return \Illuminate\Http\Response
     */
    public function show(Live $live)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Live  $live
     * @return \Illuminate\Http\Response
     */
    public function edit(Live $live)
    {
        return view("admin.pages.live.create", ["old" => $live]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Live  $live
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Live $live)
    {
        $live->update($request->all());

        return redirect()->to("/admin/live")->with("success", "Операция успешно выполнена!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Live  $live
     * @return \Illuminate\Http\Response
     */
    public function destroy(Live $live)
    {
        return;

        $live->delete();
        return redirect()->to("/admin/live")->with("success", "Операция успешно выполнена!");
    }
}
