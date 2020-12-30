<?php

namespace App\Helpers\Snowflake;

class Sequencer {
    protected $lastTimeStamp = -1;
    protected $sequence = 0;

    public function getSequence(int $currentTime) {
        if ($this->lastTimeStamp === $currentTime) {
            ++$this->sequence;
            $this->lastTimeStamp = $currentTime;
            return $this->sequence;
        }
        $this->sequence = 0;
        $this->lastTimeStamp = $currentTime;
        return 0;
    }
    
}