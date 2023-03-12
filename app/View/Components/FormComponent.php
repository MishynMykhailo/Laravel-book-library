<?php

namespace App\View\Components;

use Illuminate\View\Component;

class FormComponent extends Component
{
    public $method;
    public $id;
    public $action;
    public $encType;
    public $book;
    public $author;
    public $delete;
    public $class;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($id,$method, $action,  $encType = 'multipart/form-data',$class=null, $book = null,$author=null,$delete=null)
    {
        $this->id=$id;
        $this->method = $method;
        $this->action = $action;
        $this->encType = $encType;
        $this->book=$book;
        $this->author=$author;
        $this->delete=$delete;
        $this->class=$class;

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {

        return view('components.form-component');
    }
}
