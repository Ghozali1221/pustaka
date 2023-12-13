<?php

namespace App\View\Components;

use Illuminate\View\Component;

class HistoryTable extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $dataHistory;
    public function __construct($dataHistory)
    {
        $this->dataHistory = $dataHistory;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.history-table');
    }
}
