<div class="card bg-dark text-white">
    <h5 class="card-header" style="text-align: center">Admin DashBoard</h5>
    <div class="card-body" style="text-align: center">
        <h5 class="card-title">Welcome here {{session('admin_name')}}</h5>
        <a href="{{url('/admin/home')}}" class="btn btn-outline-light">Dashboard</a>
        <a href="{{url('/admin/client-list')}}" class="btn btn-outline-light">Client List</a>
        <a href="{{url('/admin/all-stories')}}" class="btn btn-outline-light">All Stories</a>
        <a class="btn btn-light btn-sm" href="{{url('/admin/logout')}}" style="text-align: right">Logout</a>
    </div>
</div>

