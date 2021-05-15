<?php

use App\Http\Controllers\BotManController;

$botman = resolve('botman');

$botman->hears('Hi', function ($bot) {
    $bot->reply('Hello !');
});
$botman->hears('Start conversation', BotManController::class.'@startConversation');

$botman->hears('.*hoe gaan dit.*', BotManController::class.'@startHowAreYouConversation');

$botman->hears('How are you', BotManController::class.'@startHowAreYouConversation');