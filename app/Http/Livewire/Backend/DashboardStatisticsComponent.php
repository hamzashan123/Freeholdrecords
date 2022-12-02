<?php

namespace App\Http\Livewire\Backend;

use App\Models\Order;
use Livewire\Component;
use Auth;
use App\Models\User;
use App\Models\ConsultantUser;
use Illuminate\Support\Facades\DB;

class DashboardStatisticsComponent extends Component
{
    public $currentMonthEarning = 0;
    public $currentAnnualEarning = 0;
    public $currentMonthOrderNew = 0;
    public $currentMonthOrderFinished = 0;

    public $users;

    public function mount()
    {
        $this->users = User::all();
    }

    public function render()
    {

        return view('livewire.backend.dashboard-statistics-component');
    }
}
