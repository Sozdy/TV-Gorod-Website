<?php

namespace App\Http\Controllers;

use App\Models\Poll;
use App\Models\PollAnswer;
use Illuminate\Http\Request;

class PollController extends Controller
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
        $polls = Poll::orderBy("id", "desc")
            ->paginate(25);

        $polls->map(function ($item) {
            $item->editRoute = '/admin/polls/' . $item->id . '/edit';
            $item->deleteRoute = '/admin/polls/' . $item->id;
        });

        return view("admin.pages.polls.index", ["polls" => $polls]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.pages.polls.create");
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
            'question' => 'required',
            'answers' => 'required'
        ]);

        $poll = Poll::create($request->all());

        $answers = explode("\r\n", $request->answers);

        foreach ($answers as $answer) {
            $answer = trim($answer);

            if (mb_strlen($answer) < 1)
                continue;

            PollAnswer::create([
                "text" => $answer,
                "poll_id" => $poll->id,
                "votes" => 0
            ]);
        }

        $request->flash();

        return redirect("/admin/polls")->with("success", "Операция успешно выполнена!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Poll  $poll
     * @return \Illuminate\Http\Response
     */
    public function show(Poll $poll)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Poll  $poll
     * @return \Illuminate\Http\Response
     */
    public function edit(Poll $poll)
    {
        return redirect()->back()->with("error", "К сожалению, невозможно редактировать объект данного типа, т.к. тогда варианты ответов и результаты опроса будут сброшены")->withInput();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Poll  $poll
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Poll $poll)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Poll  $poll
     * @return \Illuminate\Http\Response
     */
    public function destroy(Poll $poll)
    {
        PollAnswer::where("poll_id", $poll->id)->delete();
        $poll->delete();
        
        return redirect()->back()->with("success", "Операция успешно выполнена!")->withInput();
    }

    public function vote (Request $request) {
        PollAnswer::whereId($request->answer)->increment('votes');
    }
}
