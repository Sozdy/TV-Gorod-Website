<?php

namespace App\Http\Controllers;

use App\Models\Promo;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class PromoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $promo = Promo::orderBy("id", "desc")
            ->paginate(25);

        $promo->map(function ($item) {
            $item->editRoute = '/admin/promo/' . $item->id . '/edit';
            $item->deleteRoute = '/admin/promo/' . $item->id;
        });

        return view("admin.pages.promo.index", ["promos" => $promo]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.pages.promo.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'text' => 'max:255',
            'video_id' => 'max:255',
            'link' => 'max:255',
        ]);

        if (! $request->file('image'))
            abort(500, 'Could not upload image :(');

        $promo = Promo::create($request->all());

        $image = $request->file('image');
        $destinationPath = public_path('/img/promo');
        $image->move($destinationPath, $promo->id . ".gif");

        $request->flash();

        return redirect("/admin/promo")->with("success", "Операция успешно выполнена!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Promo  $promo
     * @return \Illuminate\Http\Response
     */
    public function show(Promo $promo)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Promo  $promo
     * @return \Illuminate\Http\Response
     */
    public function edit(Promo $promo)
    {
        return view("admin.pages.promo.create", ["old" => $promo]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Promo  $promo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Promo $promo)
    {
        $promo->update($request->all());

        if ($request->file('image')) {
            $image = $request->file('image');
            $destinationPath = public_path('/img/promo');
            $image->move($destinationPath, $promo->id . ".gif");
        }

        return redirect()->to("/admin/promo")->with("success", "Операция успешно выполнена!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Promo  $promo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Promo $promo)
    {
        $promo->delete();
        return redirect()->to("/admin/promo")->with("success", "Операция успешно выполнена!");
    }
}
