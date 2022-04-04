<?php

namespace App\Http\Controllers;

use App\Models\TvProgram;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class TvProgramController extends Controller
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

    public function adminIndex()
    {
        $tvPrograms = TvProgram::orderBy("order")
            ->paginate(25);

        $tvPrograms->map(function ($item) {
            $item->active = $item->active ? true : false;
            $item->editRoute = '/admin/tv-programs/' . $item->id . '/edit';
            $item->deleteRoute = '/admin/tv-programs/' . $item->id;
        });

        return view("admin.pages.tv-programs.index", ["tv_programs" => $tvPrograms]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.pages.tv-programs.create");
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
            'name' => 'required|unique:news_categories|max:255',
            'playlist_id' => 'required|max:255',
            'order' => 'required|numeric',
        ]);

        if (! $request->file('image'))
            abort(500, 'Could not upload image :(');

        $program = TvProgram::create($request->all());

        $image = $request->file('image');
        $input['imagename'] = $program->id.'.jpg';

        $destinationPath = public_path('/img/programs');
        $img = Image::make($image->getRealPath());
        $img->resize(640, 480, function ($constraint) {
            $constraint->aspectRatio();
        })->save($destinationPath.'/'.$input['imagename']);

        $request->flash();

        return redirect("/admin/tv-programs")->with("success", "Операция успешно выполнена!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TvProgram  $tvProgram
     * @return \Illuminate\Http\Response
     */
    public function show(TvProgram $tvProgram)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TvProgram  $tvProgram
     * @return \Illuminate\Http\Response
     */
    public function edit(TvProgram $tvProgram)
    {
        return view("admin.pages.tv-programs.create", ["old" => $tvProgram]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TvProgram  $tvProgram
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TvProgram $tvProgram)
    {
        $request->merge(["active" => $request->active ?? false]);
        $tvProgram->update($request->all());

        if ($request->file('image')) {
            $image = $request->file('image');
            $input['imagename'] = $tvProgram->id . '.jpg';

            $destinationPath = public_path('/img/programs');
            $img = Image::make($image->getRealPath());
            $img->resize(640, 480, function ($constraint) {
                $constraint->aspectRatio();
            })->save($destinationPath . '/' . $input['imagename']);
        }

        return redirect()->to("/admin/tv-programs")->with("success", "Операция успешно выполнена!");
    }

    public function destroy(TvProgram $tvProgram)
    {
        $tvProgram->delete();

        return redirect()->back()->with("success", "Операция успешно выполнена!")->withInput();
    }
}
