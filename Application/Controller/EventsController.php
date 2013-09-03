<?php

class EventsController extends Controller
{
    public $usesModels = array('Event');

    public function view()
    {
        $event = new Event($this->data[0]);
        return new View('event_view', $event);
    }
}