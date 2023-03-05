<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Response;

class ResponseItem extends Component
{

    public $response;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($response)
    {
        $this->response = $response;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.response-item');
    }
}
