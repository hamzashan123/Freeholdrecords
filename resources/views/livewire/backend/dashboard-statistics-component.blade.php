<style>
    .card-counter{
    box-shadow: 2px 2px 10px #DADADA;
    margin: 5px;
    padding: 20px 10px;
    background-color: #fff;
    height: 100px;
    border-radius: 5px;
    transition: .3s linear all;
  }

  .card-counter:hover{
    box-shadow: 4px 4px 20px #DADADA;
    transition: .3s linear all;
  }

  .card-counter.primary{
    background-color: #007bff;
    color: #FFF;
  }

  .card-counter.danger{
    background-color: #ef5350;
    color: #FFF;
  }  

  .card-counter.success{
    background-color: #66bb6a;
    color: #FFF;
  }  

  .card-counter.info{
    background-color: #26c6da;
    color: #FFF;
  }  

  .card-counter i{
    font-size: 5em;
    opacity: 0.2;
  }

  .card-counter .count-numbers{
    position: absolute;
    right: 35px;
    top: 20px;
    font-size: 32px;
    display: block;
  }

  .card-counter .count-name{
    color: white !important;
    position: absolute;
    right: 35px;
    top: 65px;
    font-style: italic;
    text-transform: capitalize;
    opacity: 0.5;
    display: block;
    font-size: 18px;
  }
</style>

<br />
@php 
    if(Auth::user()->hasRole('admin')){
        $users = $users->where('status', 'Active');
    }else{
        $users = $users->where('status', 'Active')->where('created_by',Auth::user()->id);
    }
    
@endphp

    <div class="row">
    <!-- @if(Auth::user()->hasRole('admin'))
    <div class="col-md-3">
      <div class="card-counter primary">
        <i class="fa fa-code-fork"></i>
        <span class="count-numbers">12</span>
        <span class="count-name">Total WholeSale Customers</span>
      </div>
    </div>
    @endif -->

    @if(Auth::user()->hasRole('user'))
    <div class="col-md-3">
      <div class="card-counter danger">
        <i class="fa fa-ticket"></i>
        <span class="count-numbers">{{ count($orders) }}</span>
        <span class="count-name">My Orders</span>
      </div>
    </div>
    @endif

    @if(Auth::user()->hasRole('admin'))
    <div class="col-md-3">
      <div class="card-counter danger">
        <i class="fa fa-database"></i>
        <span class="count-numbers"> {{ count($totalorders)}}</span>
        <span class="count-name">Total Orders</span>
      </div>
    </div>
    @endif

    @if(Auth::user()->hasRole('admin'))
    <div class="col-md-3">
      <div class="card-counter success">
        <i class="fa fa-database"></i>
        <span class="count-numbers"> {{ count($users)}}</span>
        <span class="count-name">Active Accounts</span>
      </div>
    </div>
    @endif
    @if(Auth::user()->hasRole('admin'))
    <div class="col-md-3">
      <div class="card-counter info">
        <i class="fa fa-users"></i>
        <span class="count-numbers"> {{count($users) }}</span>
        <span class="count-name">Users</span>
      </div>
    </div>
    @endif

  </div>


<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
