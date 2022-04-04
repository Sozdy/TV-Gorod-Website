import{ localStorageService } from "./localStorageService"

const currentPollId = $(".poll-form").attr('id') ? $(".poll-form").attr('id').slice(5) : 0

if (localStorageService.getItem('lastVotedPoll') == currentPollId){
    $(".poll-form").hide();
    $(".poll-results").show();
}

window.pollVote = function (caller, pollId) {
    $.post('/polls/vote', $(caller).serialize());

    localStorageService.clearAllItems()
    localStorageService.setItem('lastVotedPoll', pollId)

    $(".poll-form").hide();
    $(".poll-results").show();

    return false;
}
