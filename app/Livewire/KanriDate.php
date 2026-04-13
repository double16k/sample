<?php

namespace App\Livewire;

use Livewire\Component;
use Carbon\Carbon;

class KanriDate extends Component
{

    public $year;
    public $month;
    public $calendar = [];
    
    public function mount()
    {
        $this->year = $year ?? Carbon::now()->year;
        $this->month = $month ?? Carbon::now()->month;
        $this->generateCalendar();
    }


    public function generateCalendar()
    {
        $startOfMonth = Carbon::createFromDate($this->year, $this->month, 1);
        $endOfMonth = $startOfMonth->copy()->endOfMonth();
        $startDayOfWeek = $startOfMonth->dayOfWeek;
        $totalDays = $endOfMonth->day;
 
        $this->calendar = [];
        $week = [];
 
        for ($i = 0; $i < $startDayOfWeek; $i++) {
            $week[] = null;
        }
 
        for ($day = 1; $day <= $totalDays; $day++) {
            $week[] = $day;
 
            if (count($week) == 7) {
                $this->calendar[] = $week;
                $week = [];
            }
        }
 
        if (count($week) > 0) {
            while (count($week) < 7) {
                $week[] = null;
            }
            $this->calendar[] = $week;
        }
    }


    public function previousMonth()
    {
        $this->month--;
        if ($this->month < 1) {
            $this->month = 12;
            $this->year--;
        }
        $this->generateCalendar();
    }


    public function nextMonth()
    {
        $this->month++;
        if ($this->month > 12) {
            $this->month = 1;
            $this->year++;
        }
        $this->generateCalendar();
    }


    public function render()
    {
        return view('livewire.kanri-date');
    }
}
