<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Event;
use Mockery\Expectation;

class Calendar extends Component
{
    public $events = '';

    public function getevent()
    {
        $events = Event::select('id', 'title', 'start')->get();

        return  json_encode($events);
    }


    public function addevent($event)
    {
        $input['title'] = $event['title'];
        $input['start'] = $event['start'];
        Event::create($input);
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function eventDrop($event, $oldEvent)
    {
      try{


        $eventdata = Event::find($event['id']);
        $eventdata->start = $event['start'];
        $eventdata->save();

    }catch(\Exception $e){

        $this->dispatchBrowserEvent('eror_message');
    }
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function render()
    {
        $events = Event::select('id', 'title', 'start')->get();

        $this->events = json_encode($events);

        return view('livewire.calendar');
    }
}
