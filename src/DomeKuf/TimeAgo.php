<?php

namespace DomeKuf;

use \DateTime;

class TimeAgo
{
    /**
     * @var $diff DateInterval
     */
    private $diff;
    public function __construct($date)
    {
        $a = new DateTime();
        $a->setTimestamp($date);
        $now = new DateTime();
        $this->diff = $now->diff($a);
    }
    public function toString()
    {
        $map = [
            'y' => [
                'singular' => 'anno',
                'plural' => 'anni'
            ],
            'm' => [
                'singular' => 'mese',
                'plural' => 'mesi'
            ],
            'd' => [
                'singular' => 'giorno',
                'plural' => 'giorni'
            ],
            'h' => [
                'singular' => 'ora',
                'plural' => 'ore'
            ],
            'i' => [
                'singular' => 'minuto',
                'plural' => 'minuti'
            ],
            's' => [
                'singular' => 'secondo',
                'plural' => 'secondi'
            ]
        ];
        foreach($map as $key=>$word) {
            $time = $this->diff->$key;
            if ($time > 0) {
                $w = $word[$time>1?'plural':'singular'];
                return "Circa $time $w fa.";
            }
        }
        return "Troppo tempo fa.";
    }
}
