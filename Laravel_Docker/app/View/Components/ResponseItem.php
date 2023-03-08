<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Response;
use App\Models\Thread;

class ResponseItem extends Component
{

    public $response;
    public $thread;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(Response $response, Thread $thread)
    {
        $this->response = $response;
        $this->thread = $thread;
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
