<?php

namespace App\Helpers\Snowflake;

class Snowflake {
    const TIMESTAMP_LENGTH = 43;
    const TYPE_LENGTH = 4;
    const MACHINEID_LENGTH = 5;
    const SEQUENCE_LENGTH = 11;
    const DEFAULT_EPOCH = 1577811600000;
    protected $type;
    protected $machineId;
    protected $epoch;
    protected $sequencer;

    public function __construct($type = 0, $machineId = -1) {
        $this->sequencer = new Sequencer();
        $this->type = $type % (2 ** self::TYPE_LENGTH);
        $this->epoch = self::DEFAULT_EPOCH;
        $this->machineId = ($machineId < 0 || $machineId >= 2 ** self::MACHINEID_LENGTH) ? env('MACHINE_ID', 0) : $machineId;
    }

    public function get() {
        $currentTime = $this->getCurrentMicrotime();
        while (($seq = $this->sequencer->getSequence($currentTime)) > (-1 ^ (-1 << self::SEQUENCE_LENGTH))) {
            usleep(1);
            $currentTime = $this->getCurrentMicrotime();
        }

        return (string) ((($currentTime - $this->epoch) << (self::SEQUENCE_LENGTH + self::MACHINEID_LENGTH + self::TYPE_LENGTH))
                | $this->type << (self::SEQUENCE_LENGTH + self::MACHINEID_LENGTH)
                | $this->machineId << (self::SEQUENCE_LENGTH)
                | $seq);
    }

    public function parse(int $id, bool $transform = false) : array {
        $id = decbin($id);

        $data = [
            'timestamp' => substr($id, 0, -(self::SEQUENCE_LENGTH + self::MACHINEID_LENGTH + self::TYPE_LENGTH)),
            'type'      => substr($id, -(self::SEQUENCE_LENGTH + self::MACHINEID_LENGTH + self::TYPE_LENGTH), self::TYPE_LENGTH),
            'machineId' => substr($id, -(self::SEQUENCE_LENGTH + self::MACHINEID_LENGTH), self::MACHINEID_LENGTH),
            'sequence'  => substr($id, -self::SEQUENCE_LENGTH),
        ];

        return $transform ? array_map(function ($value) { return bindec($value); }, $data) : $data;
    }

    public function getTimeStamp(int $id) {
        return $this->parse($id, true)['timestamp'] + $this->epoch;
    }

    public function getCurrentMicrotime() {
        return floor(microtime(true) * 1000) | 0;
    }

    public function setEpoch(int $epoch) {
        if ($epoch <= $this->getCurrentMicroTime() && $epoch + (2 ** self::TIMESTAMP_LENGTH) - 1 > $this->getCurrentMicrotime())
            $this->epoch = $epoch;
        return $this;
    }

    public function setNewSequencer() {
        $this->sequencer = new Sequencer();
        return $this;
    }
}