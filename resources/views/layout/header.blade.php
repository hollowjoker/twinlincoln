<nav class="navbar navbar-expand-lg bg-dark navbar-dark fixed-top" id="mainNav">
    <a href="" class="navbar-brand">TwinLincoln</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive"  aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
                <a class="nav-link" href="{{ route('dashboard') }}">
                    <i class="fa fa-fw fa-dashboard"></i>
                    <span class="nav-link-text">Dashboard</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
                <a class="nav-link" href="index.html">
                    <i class="fa fa-fw fa-plus-square"></i>
                    <span class="nav-link-text">Add Product</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
                <a class="nav-link" href="index.html">
                    <i class="fa fa-fw fa-cubes"></i>
                    <span class="nav-link-text">Inventory</span>
                </a>
            </li>
            <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
                <a class="nav-link" href="{{ route('category') }} ">
                    <i class="fa fa-fw fa-plus-square"></i>
                    <span class="nav-link-text">Category</span>
                </a>
            </li>
        </ul>
        <ul class="navbar-nav sidenav-toggler">
            <li class="nav-item">
                <a class="nav-link text-center" id="sidenavToggler">
                    <i class="fa fa-fw fa-angle-left"></i>
                </a>
            </li>
        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a href="#" class="nav-link openTimein">
                    <i class="fa fa-clock-o"></i>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <i class="fa fa-shopping-cart"></i>
                </a>
            </li>
            <li class="nav-item">
                <a href="" class="nav-link">Good Morning Admin!</a>
            </li>
        </ul>
    </div>
</nav>

<div class="content-wrapper">
    @yield('content')
</div>


<!-- modal -->
<div class="modal fade" id="timeInModal" tabindex="-1" role="dialog" aria-labelledby="timeInModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="timeInModalLabel">Time In</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{ route('dashboard.attendance_save')}}" class="text-center">
                            <h3> {{ date('F d, Y') }} </h3>
                            <h1 class="display-4 mb-5"> {{ date('H:i A') }} </h1>
                            <div class="form-group text-left">
                                <label for="worker">Worker</label>
                                <select name="" id="worker" class="form-control"></select>
                                <input type="hidden" class="form-control" name="" id="attendance" value="{{ date('H:i a') }}"> 
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>

@section('pageJs')
    <script>
        $(function(){
            $('.openTimein').on('click',function(){
                $('#timeInModal').modal();
            });
        });
    </script>
@stop