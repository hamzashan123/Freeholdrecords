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
        $this->currentMonthEarning = Order::whereOrderStatus(Order::FINISHED)->whereMonth('created_at', date('m'))->sum('total');
        $this->currentAnnualEarning = Order::whereOrderStatus(Order::FINISHED)->whereYear('created_at', date('Y'))->sum('total');
        $this->currentMonthOrderNew = Order::whereOrderStatus(Order::NEW_ORDER)->whereMonth('created_at', date('m'))->count();
        $this->currentMonthOrderFinished = Order::whereOrderStatus(Order::FINISHED)->whereMonth('created_at', date('m'))->count();
        $this->users = User::all();
    }

    public function render()
    {

        return view('livewire.backend.dashboard-statistics-component');
    }
}
