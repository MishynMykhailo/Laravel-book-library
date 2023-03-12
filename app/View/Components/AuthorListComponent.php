<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AuthorListComponent extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $author;
    public function __construct($author)
    {
        $this->author = $author;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.author-list-component');
    }
}
