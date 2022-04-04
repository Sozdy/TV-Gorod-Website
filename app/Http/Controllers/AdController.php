<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class AdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ads = Ad::orderBy("id")
            ->paginate(25);

        $ads->map(function ($item) {
            $item->editRoute = '/admin/ads/' . $item->id . '/edit';
            $item->deleteRoute = '/admin/ads/' . $item->id;
        });

        return view("admin.pages.ads.index", ["ads" => $ads]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.pages.ads.create");
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
            'name' => 'required|max:255',
            'link' => 'required|max:255',
        ]);

        $request->merge([
            'is_active' => isset($request->is_active) && $request->file('image')
        ]);

        $ad = Ad::create($request->all());

        if ($request->file('image')) {
            $image = $request->file('image');
            $input['imagename'] = $ad->id . '.jpg';

            $destinationPath = public_path('/img/a-ds');
            $img = Image::make($image->getRealPath());
            $img->/*resize(640, 480, function ($constraint) {
                $constraint->aspectRatio();
            })->*/save($destinationPath . '/' . $input['imagename']);
        }

        $request->flash();

        return redirect()->to("/admin/ads")->with("success", "Операция успешно выполнена!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function show(Ad $ad)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function edit(Ad $ad)
    {
        return view("admin.pages.ads.create", ["old" => $ad]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ad $ad)
    {
        $request->validate([
            'name' => 'required|max:255',
            'link' => 'required|max:255',
        ]);

        $request->merge([
            'is_active' => isset($request->is_active)
        ]);

        $ad->update($request->all());

        if ($request->file('image')) {
            $image = $request->file('image');
            $input['imagename'] = $ad->id . '.jpg';

            $destinationPath = public_path('/img/a-ds');
            $img = Image::make($image->getRealPath());
            $img->/*resize(640, 480, function ($constraint) {
                $constraint->aspectRatio();
            })->*/save($destinationPath . '/' . $input['imagename']);
        }

        return redirect()->to("/admin/ads")->with("success", "Операция успешно выполнена!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ad  $ad
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ad $ad)
    {
        try {
            $ad->delete();
        } catch (\Exception $e) {
            return response("Ошибка при удалении!", 403);
        }

        return redirect()->to("/admin/ads")->with("success", "Операция успешно выполнена!");
    }
}
