<?php

namespace App\Conversations;

use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Outgoing\Question;
use Illuminate\Foundation\Inspiring;

class HowAreYouConversation extends Conversation
{
    /**
     * First question
     */
    public function askReason()
    {
        $sentence = $this->imFineReplies();

        $this->ask($sentence . " Hoe gaan dit met jou?", function (Answer $response) {

            $firstReply = "Ek dink ek verstaan gedeeltelik wat jy probeer sê met '"
                . $response->getText()
                . "'. Brei nog so 'n bietjie uit asb?";
            
            $this->ask(
                $firstReply,
                function (Answer $response) {                    
                    $this->say($this->closing());
                }
            );
            
        });

    }

    /**
     * Start the conversation
     */
    public function run()
    {
        $this->askReason();
    }

    public function imFineReplies()
    {
        $reply = [
            "Dit gaan so goed as dit beter gegaan het, was dis onwettig.",
            "Die lewe kon gerus maar 'n bietjie kakker gewees het.",
            "Hell dit gaan goed.",
            "Vandag voel ek 'n bietjie af.",
            "Nou dat jy vra, eintlik goed!",
            "Ek's 'n robot - dit gaan goed of sleg, daar is min in between.",
            "Wel dis baie lekker om van jou te hoor.",
            "Sjoe! Bietjie slaaperig.",
        ];
        return $reply[rand(0, count($reply))];
    }

    public function closing() {
        $reply = [
            'Mmmmm',
            'Ahhh',
            'Oee',
            'Lovely',
            'Sjoe'
        ];
        return $reply[rand(0, count($reply))];
    }
}
