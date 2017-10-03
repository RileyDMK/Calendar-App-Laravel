<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Calendar;
use App\Event;
class EventController extends Controller
{
    public function index()
    {
       $events = [];
       $data = Event::all();
       if($data->count()){
          foreach ($data as $key => $value) {
            $events[] = Calendar::event(
                $value->title,
                false,
                new \DateTime($value->start),
                new \DateTime($value->end.' +1 day')
            );
          }
       }

      $calendar = Calendar::addEvents($events);

      return view('calendar/mycalendar', compact('calendar'));
    }

    public function create()
    {
      
    }
}
