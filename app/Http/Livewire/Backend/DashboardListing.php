<?php

namespace App\Http\Livewire\Backend;

use Livewire\Component;
use App\Models\User;
use Auth;

class DashboardListing extends Component
{



    public function mount()
    {
       
        
    }

    public function render()
    {
        return view('livewire.backend.dashboard-listing');
    }

    
}
