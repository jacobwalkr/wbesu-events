<?php

class Event extends Model
{
    public $event;
    protected $usesRepositories = array('Core');

    public function __construct($id)
    {
        parent::__construct();

        $this->item = $this->repositories['Core']->FindRowById($id);
    }
}