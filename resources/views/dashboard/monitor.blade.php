@extends('layouts.appMonitor')

@section('content')
    <section id="main-wrapper">
        
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex">
                                <h4 class="card-title"><span class="lstick"></span>SERVER MONITOR</h4>
                                <ul class="list-inline m-b-0 ml-auto">
                                    <li>
                                        <h6 class="text-success"><i class="fa fa-circle font-10 m-r-10 "></i>Bandwith</h6> </li>
                                    <li>
                                        <h6 class="text-info"><i class="fa fa-circle font-10 m-r-10"></i>Disk</h6> </li>
                                    <li>
                                        <h6 class="text-danger"><i class="fa fa-circle font-10 m-r-10"></i>CPU</h6> </li>
                                </ul>
                            </div>
                            
                            <div class="website-visitor p-relative m-t-30" style="height:200px; width:100%;"></div>
                        </div>
                    </div>
                </div>
                
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Default Tab</h4>
                            <h6 class="card-subtitle">Use default tab with class <code>nav-tabs & tabcontent-border </code></h6>
                            
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Default Tab</h4>
                            <h6 class="card-subtitle">Use default tab with class <code>nav-tabs & tabcontent-border </code></h6>
                            
                        </div>
                    </div>
                </div>
            </div>

            <aside class="right-side-panel pull-left">
            
                    
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="stats">
                                <h1 class="">9062+</h1>
                                <h6 class="text-muted">Subscribe</h6>
                                <button class="btn btn-rounded btn-outline btn-secondary m-t-10 font-14">Check list</button>
                            </div>
                            <div class="stats-icon text-right ml-auto"><i class="fa fa-envelope display-5 op-3 text-dark"></i></div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="stats">
                                <h1 class="">9062+</h1>
                                <h6 class="text-muted">Subscribe</h6>
                                <button class="btn btn-rounded btn-outline btn-secondary m-t-10 font-14">Check list</button>
                            </div>
                            <div class="stats-icon text-right ml-auto"><i class="fa fa-envelope display-5 op-3 text-dark"></i></div>
                        </div>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex">
                            <div class="stats">
                                <h1 class="">9062+</h1>
                                <h6 class="text-muted">Subscribe</h6>
                                <button class="btn btn-rounded btn-outline btn-secondary m-t-10 font-14">Check list</button>
                            </div>
                            <div class="stats-icon text-right ml-auto"><i class="fa fa-envelope display-5 op-3 text-dark"></i></div>
                        </div>
                    </div>
                </div>
                    
                    
            </aside>
        </div>
        
    </section>
@endsection

@section('js')
<script type="text/javascript">
    var chart = new Chartist.Line('.website-visitor', {
      labels: ['1PLP', 2, 3, 4, 5, 6, 7, 8, '1PLP', 2, 3, 4, 5, 6, 7, 8, '1PLP', 2, 3, 4, 5, 6, 7, 8, '1PLP', 2, 3, 4, 5, 6, 7, 8],
      series: [
        [0, 5, 6, 8, 25, 9, 8, 24, 0, 5, 6, 8, 25, 9, 8, 24, 0, 5, 6, 8, 25, 9, 8, 24, 0, 5, 6, 8, 25, 9]
        , [0, 3, 1, 2, 8, 1, 5, 1]
      ]}, {
      low: 0,
      high: 28,
      showArea: true,
      fullWidth: true,
      plugins: [
        Chartist.plugins.tooltip()
      ],
        axisY: {
        onlyInteger: true
        , scaleMinSpace: 40    
        , offset: 20
        , labelInterpolationFnc: function (value) {
            return (value / 1);
        }
    },
    });
    // Offset x1 a tiny amount so that the straight stroke gets a bounding box
    // Straight lines don't get a bounding box 
    // Last remark on -> http://www.w3.org/TR/SVG11/coords.html#ObjectBoundingBox
    chart.on('draw', function(ctx) {  
      if(ctx.type === 'area') {    
        ctx.element.attr({
          x1: ctx.x1 + 0.001
        });
      }
    });

    // Create the gradient definition on created event (always after chart re-render)
    chart.on('created', function(ctx) {
      var defs = ctx.svg.elem('defs');
      defs.elem('linearGradient', {
        id: 'gradient',
        x1: 0,
        y1: 1,
        x2: 0,
        y2: 0
      }).elem('stop', {
        offset: 0,
        'stop-color': 'rgba(255, 255, 255, 1)'
      }).parent().elem('stop', {
        offset: 1,
        'stop-color': 'rgba(38, 198, 218, 1)'
      });
    });


    // $.ajax({url: "https://cloud.digitalocean.com/api/v1/droplets/154628884/statistics/cpu?period=hour", success: function(result){
    //   console.log(result)
    // }});

    $.ajax({

        type: 'GET',
        url: '{{ route("cpu") }}',
        cache: false,
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        success: function (rsp) {
            console.log(rsp)
        },
        error: function (err) {
            console.log('error'+err);
        }
    });




</script>
@endsection
