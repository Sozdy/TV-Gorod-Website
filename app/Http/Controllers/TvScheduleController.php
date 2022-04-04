<?php

namespace App\Http\Controllers;

use App\Models\TvSchedule;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TvScheduleController extends Controller
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
        $tvSchedule = TvSchedule::orderBy("datetime", "desc")
            ->paginate(100);

        $tvSchedule->map(function ($item) {
            $item->created_at = Carbon::createFromDate($item->datetime);
            $item->editRoute = '/admin/tv-schedule/' . $item->id . '/edit';
            $item->deleteRoute = '/admin/tv-schedule/' . $item->id;
        });

        return view("admin.pages.tv-schedule.index", ["tv_schedule" => $tvSchedule]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.pages.tv-schedule.create");
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
            'schedule' => 'required',
        ]);

        $lines = explode("\r\n", $request->schedule);

        foreach ($lines as $line) {
            $fields = explode("\t", $line);

            if (count($fields) < 3)
                continue;

            TvSchedule::create([
                "datetime" => Carbon::createFromFormat("d.m.Y H:i", $fields[0]." ".$fields[1]),
                "program_name" => $fields[2],
                "age_rating" => count($fields) > 3 ? ($fields[3] == "" ? null : $fields[3]) : null
            ]);
        }

        $request->flash();

        return redirect("/admin/tv-schedule")->with("success", "Операция успешно выполнена!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TvSchedule  $tvSchedule
     * @return \Illuminate\Http\Response
     */
    public function show(TvSchedule $tvSchedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TvSchedule  $tvSchedule
     * @return \Illuminate\Http\Response
     */
    public function edit(TvSchedule $tvSchedule)
    {
        return view("admin.pages.tv-schedule.edit", ["old" => $tvSchedule]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TvSchedule  $tvSchedule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TvSchedule $tvSchedule)
    {
        $tvSchedule->update($request->all());

        return redirect()->to("/admin/tv-schedule")->with("success", "Операция успешно выполнена!");
    }

    public function destroy(TvSchedule $tvSchedule)
    {
        $tvSchedule->delete();

        return redirect()->back()->with("success", "Операция успешно выполнена!")->withInput();
    }
}
