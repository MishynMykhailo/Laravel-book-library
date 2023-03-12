<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ModalComponent extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $id;
    public $title;
    public $closeId;
    public $class;
    public $modalClass;
    public function __construct($id,$title,$closeId,$class,$modalClass=null)
    {
        $this->id=$id;
        $this->closeId=$closeId;
        $this->title=$title;
        $this->class=$class;
        $this->modalClass=$modalClass;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.modal-component');
    }
}
