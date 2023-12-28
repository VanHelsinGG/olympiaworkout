<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Modal extends Component
{
    public $dismissable;
    public $title;
    public $dismissBtnColor;
    public $dismissBtnText;
    public $applyBtnColor;
    public $applyBtnText;

    /**
     * Create a new component instance.
     *
     * @param  string  $dismissable
     * @param  string  $title
     * @param  string  $dismissBtnColor
     * @param  string  $dismissBtnText
     * @param  string  $applyBtnColor
     * @param  string  $applyBtnText
     */
    public function __construct(
        $dismissable = 'true',
        $title = '',
        $dismissBtnColor = 'secondary',
        $dismissBtnText = 'Cancelar',
        $applyBtnColor = 'primary',
        $applyBtnText = 'Confirmar',
    ) {
        $this->dismissable = $dismissable;
        $this->title = $title;
        $this->dismissBtnColor = $dismissBtnColor;
        $this->dismissBtnText = $dismissBtnText;
        $this->applyBtnColor = $applyBtnColor;
        $this->applyBtnText = $applyBtnText;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View
     */
    public function render()
    {
        return view('components.modal');
    }
}
