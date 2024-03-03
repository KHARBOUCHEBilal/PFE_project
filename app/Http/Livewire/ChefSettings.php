<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ChefSettings extends Component
{   
    public $students_dashboard, $teachers_dashboard;
    public function render()
    {
        return view('livewire.chef-settings');
    }


    public function like()
    {
       
    }



}
