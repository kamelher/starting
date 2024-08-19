<!-- Graph about meals per day over all restos-->
<div class="row">

    <section class="col-lg-9 connectedSortable ui-sortable">

        <div class="card">
            <div class="card-header ui-sortable-handle" style="cursor: move;">
                <h3 class="card-title">
                    <i class="fas fa-chart-pie mr-1"></i>
                    Monthly Meals
                </h3>
                <div class="card-tools">
                    <ul class="nav nav-pills ml-auto">
                        <li class="nav-item">
                            <a class="nav-link active " href="#sales-chart" data-toggle="tab">Chart</a>
                        </li>
                    </ul>
                </div>
            </div>


            <div class="card-body">
                <div class="tab-content p-0">
                    <div class="chart tab-pane active" id="sales-chart" style="position: relative; height: 300px;">
                        {!! $chart->container() !!}
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="col-lg-3 connectedSortable ui-sortable">

        <div class="card">
            <div class="card-header ui-sortable-handle" style="cursor: move;">
                <h3 class="card-title">
                    <i class="fas fa-chart-pie mr-1"></i>
                    Search per month
                </h3>
            </div>
            <div class="card-body">
                <div class="tab-content p-0">
                    <p class="text-center text-danger">Choose month and year</p>
                    <form action="{{route('home')}}" method="get">
                        @csrf
                        <div class="form-group row">
                            <label for="month" class="col-sm-4 col-form-label">Month</label>
                            <div class="col-sm-8">
                                <select name="month" id="month" class="form-control">
                                    <option value="---">--------</option>
                                    <option value="1">January</option>
                                    <option value="2">February</option>
                                    <option value="3">March</option>
                                    <option value="4">April</option>
                                    <option value="5">May</option>
                                    <option value="6">June</option>
                                    <option value="7">July</option>
                                    <option value="8">August</option>
                                    <option value="9">September</option>
                                    <option value="10">October</option>
                                    <option value="11">November</option>
                                    <option value="12">December</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="year" class="col-sm-4 col-form-label">Year</label>
                            <div class="col-sm-8">
                                <select name="year" id="year" class="form-control">
                                    <option value="---">--------</option>
                                    @for($i = 2024; $i <= date('Y'); $i++)
                                        <option value="{{$i}}">{{$i}}</option>
                                    @endfor
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-primary">Search</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
</div>
