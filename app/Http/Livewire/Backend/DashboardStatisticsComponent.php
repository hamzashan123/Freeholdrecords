<?php

namespace App\Http\Livewire\Backend;

use App\Models\Order;
use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use App\Models\User;
use App\Models\ConsultantUser;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DashboardStatisticsComponent extends Component
{
    public $currentMonthEarning = 0;
    public $currentAnnualEarning = 0;
    public $currentMonthOrderNew = 0;
    public $currentMonthOrderFinished = 0;

    public $users;
    public $orders;
    public $totalorders;
    public $categories;
    public $products;

    public function mount()
    {
        $this->users = User::where('id','!=', Auth::user()->id)->get();
        $this->orders = Order::where('user_id','=', Auth::user()->id)->get();
        $this->totalorders = Order::get();
        $this->categories = Category::get();
        $this->products = Product::get();
        
    }

    public function render()
    {

        return view('livewire.backend.dashboard-statistics-component');
    }
}
