<div class="polling-block">

    <div class="polling-block__title">
        {{ \App\Models\Poll::orderBy("id", "desc")->first()->question }}
    </div>
    <form id="poll_{{\App\Models\Poll::orderBy("id", "desc")->first()->id}}" class="poll-form" action="/polls/vote" method="POST" onsubmit="pollVote(this, {{\App\Models\Poll::orderBy("id", "desc")->first()->id}}); return false;">
        {{ csrf_field() }}

        @foreach(\App\Models\PollAnswer::where("poll_id", \App\Models\Poll::orderBy("id", "desc")->first()->id)->get() as $pollAnswer)
            <div class="form-check">
                <input class="form-check-input" type="radio" name="answer" id="pollRadio{{ $number.$pollAnswer->id }}" value="{{ $pollAnswer->id }}">
                <label class="form-check-label" for="pollRadio{{ $number.$pollAnswer->id }}">
                    {{ $pollAnswer->text }}
                </label>
            </div>
        @endforeach

        <input type="submit" value="Проголосовать" class="btn-blue">
    </form>

    <div class="poll-results" style="display: none">
        <table>
            <?php
                $pollAnswers = \App\Models\PollAnswer::where("poll_id", \App\Models\Poll::orderBy("id", "desc")->first()->id)->get();
                $total_votes = $pollAnswers->sum('votes');
            ?>

            @foreach($pollAnswers as $pollAnswer)
                <tr class="form-check d-table-row">
                    <?php $percent = $total_votes > 0 ? round($pollAnswer->votes / $total_votes * 100) : 0 ?>
                    <td class="count pt-2 {{ $percent < 10 ? "gray" : ($percent > 35 ? "green" : "") }}">{{ $percent }}%</td>
                    <td class="form-check-label pt-2">
                        {{ $pollAnswer->text }}
                    </td>
                </tr>
            @endforeach
        </table>

        <div class="font-weight-bolder text-black-50 pt-4 pb-2 text-center small">
            Ваш голос принят
        </div>
    </div>
</div>
