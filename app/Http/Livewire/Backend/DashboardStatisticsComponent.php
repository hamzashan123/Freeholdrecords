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

    public $totalSystemUsers = 0;
    public $totalUsers = 0;
    public $myUsers = 0;
    public $totalConsultantUsers = 0;
    public $forms360 = 0;
    public $employersform = 0;
    public $totalDraftApplications = 0;
    public $totalpublishedApplications = 0;


    public function mount()
    {
        $this->currentMonthEarning = Order::whereOrderStatus(Order::FINISHED)->whereMonth('created_at', date('m'))->sum('total');
        $this->currentAnnualEarning = Order::whereOrderStatus(Order::FINISHED)->whereYear('created_at', date('Y'))->sum('total');
        $this->currentMonthOrderNew = Order::whereOrderStatus(Order::NEW_ORDER)->whereMonth('created_at', date('m'))->count();
        $this->currentMonthOrderFinished = Order::whereOrderStatus(Order::FINISHED)->whereMonth('created_at', date('m'))->count();
    
    }

    public function render()
    {
        return view('livewire.backend.dashboard-statistics-component');
    }
}
