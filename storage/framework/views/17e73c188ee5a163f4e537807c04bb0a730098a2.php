<?php $__env->startSection('template_title'); ?>
Dashboard
<?php $__env->stopSection(); ?>



<?php $__env->startSection('content'); ?>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">

        
                <h3><?php echo e(count(\App\Models\Order::where('created_at', '>=', \Carbon\Carbon::today())->get())); ?></h3>

                <p>Commandes aujourd'hui</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="<?php echo e(url("manager/orders")); ?>" class="small-box-footer">Plus d'info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3> <?php
            $todayRevenue = 0;
            foreach(\App\Models\Order::where('created_at', '>=', \Carbon\Carbon::today())->where('payment_status', true)->get() as $order){

              $todayRevenue = $todayRevenue + $order->amount;
            }
            ?>
          <?php echo e($todayRevenue); ?><sup style="font-size: 20px">€</sup></h3>

                <p>Revenue du jour</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="<?php echo e(url("manager/payments")); ?>" class="small-box-footer">Plus d'info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3><?php echo e(count(\App\Models\User::where('created_at', '>=', \Carbon\Carbon::today())->get())); ?></h3>

                <p>Nouveaux inscrits</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="<?php echo e(url("manager/users")); ?>" class="small-box-footer">Plus d'info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>356</h3>

                <p>Visiteurs uniques</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">Plus d'infos <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-7 connectedSortable">
            <!-- Custom tabs (Charts with tabs)-->
           

          
           <div class="card">
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                  <h3 class="card-title">Evolution des commandes</h3>
                  <a class="text-muted" href="<?php echo e(url("manager/orders")); ?>" title="Voir toutes les commandes"><i class="fa fa-eye"></i></a>
                </div>
              </div>
              <div class="card-body">
                <div class="d-flex">
                  <p class="d-flex flex-column">
                    <span class="text-bold text-lg">
                      
                 <?php echo e(count(\App\Models\Order::where('payment_status', true)->where('created_at', '>=', \Carbon\Carbon::now()->startOfMonth())->get())); ?> en décembre

                    </span>
                    <small>Répartition des commandes par jour</small>
                  </p>
                  <p class="ml-auto d-flex flex-column text-right">
                    <span class="text-success">
                      <i class="fas fa-arrow-up"></i> 33.1%
                    </span>
                    <small class="text-muted">cette semaine (<?php echo e(count(\App\Models\Order::where('payment_status', true)->where('created_at', '>=', \Carbon\Carbon::now()->startOfWeek())->get())); ?>)</small>
                  </p>
                </div>
                <!-- /.d-flex -->

                <div class="position-relative mb-4">
                  <canvas id="sales-chart" height="200"></canvas>
                </div>

                <div class="d-flex flex-row justify-content-end">
                  <span class="mr-2">
                    <i class="fas fa-square text-primary"></i> Shop
                  </span>

                  
                  <?php $__currentLoopData = \App\Models\Vente::where('status', 'active')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<span>
                    <i class="ml-1 fas fa-square " style="color: <?php echo e($vente->color_code); ?>"></i> <a href="<?php echo e(url("manager/ventes/$vente->id")); ?>" class="text-dark" target="_blank"><?php echo e($vente->name); ?></a>
                  </span>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
              </div>
            </div>
            <!-- /.card -->



           <div class="card">
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                  <h3 class="card-title">Plantes vendues</h3>
                  <a href="javascript:void(0);">Rapport</a>
                </div>
              </div>
              <div class="card-body">
                <div class="d-flex">
                  <p class="d-flex flex-column">
                    <span class="text-bold text-lg">
                      
                 345 en décembre

                    </span>
                    <small>Nombre de produits vendues depuis toujours</small>
                  </p>
                  <p class="ml-auto d-flex flex-column text-right">
                    <span class="text-warning">
                      <i class="fas fa-arrow-up"></i> 2.6%
                    </span>
                    <small class="text-muted">cette semaine (<?php echo e(count(\App\Models\Order::where('payment_status', true)->where('created_at', '>=', \Carbon\Carbon::now()->startOfWeek())->get())); ?>)</small>
                  </p>
                </div>
                <!-- /.d-flex -->

                <div class="position-relative mb-4">
                  <canvas id="sales-chart" height="200"></canvas>
                </div>

                <div class="d-flex flex-row justify-content-end">
                  <span class="mr-2">
                    <i class="fas fa-square text-primary"></i> Shop
                  </span>

                  
                  <?php $__currentLoopData = \App\Models\Vente::where('status', 'active')->get(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $vente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<span>
                    <i class="ml-1 fas fa-square " style="color: <?php echo e($vente->color_code); ?>"></i> <a href="<?php echo e(url("manager/ventes/$vente->id")); ?>" class="text-dark" target="_blank"><?php echo e($vente->name); ?></a>
                  </span>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
              </div>
            </div>
            <!-- /.card -->
            <!-- /.card -->
          </section>
          <!-- /.Left col -->
          <!-- right col (We are only adding the ID to make the widgets sortable)-->
          <section class="col-lg-5 connectedSortable">

           

            <!-- solid sales graph -->
            <div class="card bg-gradient-secondary">
              <div class="card-header border-0">
                <h3 class="card-title">
                  <i class="fas fa-th mr-1"></i>
                  Revenue de ces 15 derniers jours
                </h3>

                <div class="card-tools">
                  <button type="button" class="btn bg-secondary btn-sm" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn bg-secondary btn-sm" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <canvas class="chart" id="line-chart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
              <!-- /.card-body -->
              <div class="card-footer bg-transparent">
                <div class="row">
                 

                  <div class="col-12 text-center">
                    

                    <div class="text-white"> <?php
                  $weeklyRevenue = 0;

                  foreach(\App\Models\Order::where('payment_status', true)->whereBetween('created_at', [\Carbon\Carbon::now()->startOfWeek(), \Carbon\Carbon::now()->endOfWeek()])->get() as $order){

                  $weeklyRevenue += $order->amount;
                    
                  }
                  ?>

                  Cette semaine: <?php echo e($weeklyRevenue); ?>€ </div>
                  </div>

                  <div class="col-12 text-center">
                    

                    <div class="text-white"> <?php
                  $weeklyRevenue = 0;

                  foreach(\App\Models\Order::where('payment_status', true)->whereBetween('created_at', [\Carbon\Carbon::now()->startOfMonth(), \Carbon\Carbon::now()->endOfWeek()])->get() as $order){

                  $weeklyRevenue += $order->amount;
                    
                  }
                  ?>

                  En décembre: <?php echo e($weeklyRevenue); ?>€ </div>
                  </div>
                  
                  <!-- ./col -->
                  
                  <!-- ./col -->
                  
                  <!-- ./col -->
                </div>
                <!-- /.row -->
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->







            <!-- solid sales graph -->
            <div class="card bg-gradient-secondary">
              <div class="card-header border-0">
                <h3 class="card-title">
                  <i class="fa fa-users mr-1"></i>
                  Inscriptions ces 15 derniers jours
                </h3>

                <div class="card-tools">
                  <button type="button" class="btn bg-secondary btn-sm" data-card-widget="collapse">
                    <i class="fas fa-minus"></i>
                  </button>
                  <button type="button" class="btn bg-secondary btn-sm" data-card-widget="remove">
                    <i class="fas fa-times"></i>
                  </button>
                </div>
              </div>
              <div class="card-body">
                <canvas class="chart" id="line-chart-users" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>
              </div>
              <!-- /.card-body -->
              <div class="card-footer bg-transparent">
                <div class="row">
                 

                  <div class="col-12 text-center">
                    

                    <div class="text-white"> <?php
                  $weeklyRevenue = 0;

                  foreach(\App\Models\Order::where('payment_status', true)->whereBetween('created_at', [\Carbon\Carbon::now()->startOfWeek(), \Carbon\Carbon::now()->endOfWeek()])->get() as $order){

                  $weeklyRevenue += $order->amount;
                    
                  }
                  ?>

                  Cette semaine: 87 </div>
                  </div>

                  <div class="col-12 text-center">
                    

                    <div class="text-white"> <?php
                  $weeklyRevenue = 0;

                  foreach(\App\Models\Order::where('payment_status', true)->whereBetween('created_at', [\Carbon\Carbon::now()->startOfMonth(), \Carbon\Carbon::now()->endOfWeek()])->get() as $order){

                  $weeklyRevenue += $order->amount;
                    
                  }
                  ?>

                  Total: <?php echo e(count(\App\Models\User::all())); ?> </div>
                  </div>
                  
                  <!-- ./col -->
                  
                  <!-- ./col -->
                  
                  <!-- ./col -->
                </div>
                <!-- /.row -->
              </div>
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
           
          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>


    <!-- /.content -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('footer_scripts'); ?>

<?php 
 


?>

<script>


  $(function () {
  'use strict'

  var ticksStyle = {
    fontColor: '#495057',
    fontStyle: 'bold'
  }

  var mode      = 'index'
  var intersect = true

  var $salesChart = $('#sales-chart')
  var salesChart  = new Chart($salesChart, {
    type   : 'bar',
    data   : {
      labels  : ["<?php echo e(\Carbon\Carbon::today()->subDays(14)->toDateString()); ?>","<?php echo e(\Carbon\Carbon::today()->subDays(13)->toDateString()); ?>","<?php echo e(\Carbon\Carbon::today()->subDays(12)->toDateString()); ?>","<?php echo e(\Carbon\Carbon::today()->subDays(11)->toDateString()); ?>","<?php echo e(\Carbon\Carbon::today()->subDays(10)->toDateString()); ?>","<?php echo e(\Carbon\Carbon::today()->subDays(9)->toDateString()); ?>","<?php echo e(\Carbon\Carbon::today()->subDays(8)->toDateString()); ?>","<?php echo e(\Carbon\Carbon::today()->subDays(7)->toDateString()); ?>","<?php echo e(\Carbon\Carbon::today()->subDays(6)->toDateString()); ?>", "<?php echo e(\Carbon\Carbon::today()->subDays(5)->toDateString()); ?>", "<?php echo e(\Carbon\Carbon::today()->subDays(4)->toDateString()); ?>", "<?php echo e(\Carbon\Carbon::today()->subDays(3)->toDateString()); ?>", "<?php echo e(\Carbon\Carbon::today()->subDays(2)->toDateString()); ?>", "Hier", "Aujourd'hui"],
      datasets: [
      <?php

      foreach(\App\Models\Vente::where('status', 'active')->get() as $vente){
        echo("{");
        echo("backgroundColor:'" . $vente->color_code  . "',");
        echo("borderColor    : '". $vente->color_code  . "',");
        echo("data: [");
        echo(count(\App\Models\Order::where('payment_status', true)->where('cart', $vente->slug)->whereDate('created_at' , \Carbon\Carbon::today()->subDays(14))->get()) . ",");
        echo(count(\App\Models\Order::where('payment_status', true)->where('cart', $vente->slug)->whereDate('created_at' , \Carbon\Carbon::today()->subDays(13))->get()) . ",");
        echo(count(\App\Models\Order::where('payment_status', true)->where('cart', $vente->slug)->whereDate('created_at' , \Carbon\Carbon::today()->subDays(12))->get()) . ",");
        echo(count(\App\Models\Order::where('payment_status', true)->where('cart', $vente->slug)->whereDate('created_at' , \Carbon\Carbon::today()->subDays(11))->get()) . ",");
        echo(count(\App\Models\Order::where('payment_status', true)->where('cart', $vente->slug)->whereDate('created_at' , \Carbon\Carbon::today()->subDays(10))->get()) . ",");
        echo(count(\App\Models\Order::where('payment_status', true)->where('cart', $vente->slug)->whereDate('created_at' , \Carbon\Carbon::today()->subDays(9))->get()) . ",");
        echo(count(\App\Models\Order::where('payment_status', true)->where('cart', $vente->slug)->whereDate('created_at' , \Carbon\Carbon::today()->subDays(8))->get()) . ",");
        echo(count(\App\Models\Order::where('payment_status', true)->where('cart', $vente->slug)->whereDate('created_at' , \Carbon\Carbon::today()->subDays(7))->get()) . ",");
        echo(count(\App\Models\Order::where('payment_status', true)->where('cart', $vente->slug)->whereDate('created_at' , \Carbon\Carbon::today()->subDays(6))->get()) . ",");
        echo(count(\App\Models\Order::where('payment_status', true)->where('cart', $vente->slug)->whereDate('created_at' , \Carbon\Carbon::today()->subDays(5))->get()) . ",");
        echo(count(\App\Models\Order::where('payment_status', true)->where('cart', $vente->slug)->whereDate('created_at' , \Carbon\Carbon::today()->subDays(4))->get()) . ",");
        echo(count(\App\Models\Order::where('payment_status', true)->where('cart', $vente->slug)->whereDate('created_at' , \Carbon\Carbon::today()->subDays(3))->get()) . ",");
        echo(count(\App\Models\Order::where('payment_status', true)->where('cart', $vente->slug)->whereDate('created_at' , \Carbon\Carbon::today()->subDays(2))->get()) . ",");
        echo(count(\App\Models\Order::where('payment_status', true)->where('cart', $vente->slug)->whereDate('created_at' , \Carbon\Carbon::today()->subDays(1))->get()) . ",");
        echo(count(\App\Models\Order::where('payment_status', true)->where('cart', $vente->slug)->whereDate('created_at' , \Carbon\Carbon::today())->get()) . ",");
        echo("]");
        echo("},");
      }


      ?>
        {
          backgroundColor: '#007bff',
          borderColor    : '#007bff',
          data           : ["<?php echo e(count(\App\Models\Order::where('payment_status', true)->where('cart', "shop")->whereDate('created_at' , \Carbon\Carbon::today()->subDays(14))->get())); ?>","<?php echo e(count(\App\Models\Order::where('payment_status', true)->where('cart', "shop")->whereDate('created_at' , \Carbon\Carbon::today()->subDays(13))->get())); ?>","<?php echo e(count(\App\Models\Order::where('payment_status', true)->where('cart', "shop")->whereDate('created_at' , \Carbon\Carbon::today()->subDays(12))->get())); ?>","<?php echo e(count(\App\Models\Order::where('payment_status', true)->where('cart', "shop")->whereDate('created_at' , \Carbon\Carbon::today()->subDays(11))->get())); ?>","<?php echo e(count(\App\Models\Order::where('payment_status', true)->where('cart', "shop")->whereDate('created_at' , \Carbon\Carbon::today()->subDays(10))->get())); ?>","<?php echo e(count(\App\Models\Order::where('payment_status', true)->where('cart', "shop")->whereDate('created_at' , \Carbon\Carbon::today()->subDays(9))->get())); ?>","<?php echo e(count(\App\Models\Order::where('payment_status', true)->where('cart', "shop")->whereDate('created_at' , \Carbon\Carbon::today()->subDays(8))->get())); ?>","<?php echo e(count(\App\Models\Order::where('payment_status', true)->where('cart', "shop")->whereDate('created_at' , \Carbon\Carbon::today()->subDays(7))->get())); ?>","<?php echo e(count(\App\Models\Order::where('payment_status', true)->where('cart', "shop")->whereDate('created_at' , \Carbon\Carbon::today()->subDays(6))->get())); ?>","<?php echo e(count(\App\Models\Order::where('payment_status', true)->where('cart', "shop")->whereDate('created_at' , \Carbon\Carbon::today()->subDays(5))->get())); ?>","<?php echo e(count(\App\Models\Order::where('payment_status', true)->where('cart', "shop")->whereDate('created_at' , \Carbon\Carbon::today()->subDays(4))->get())); ?>","<?php echo e(count(\App\Models\Order::where('payment_status', true)->where('cart', "shop")->whereDate('created_at' , \Carbon\Carbon::today()->subDays(3))->get())); ?>","<?php echo e(count(\App\Models\Order::where('payment_status', true)->where('cart', "shop")->whereDate('created_at' , \Carbon\Carbon::today()->subDays(2))->get())); ?>","<?php echo e(count(\App\Models\Order::where('payment_status', true)->where('cart', "shop")->whereDate('created_at' , \Carbon\Carbon::today()->subDays(1))->get())); ?>","<?php echo e(count(\App\Models\Order::where('payment_status', true)->where('cart', "shop")->whereDate('created_at' , \Carbon\Carbon::today())->get())); ?>"]
        },
        
      ]
    },
    options: {
      maintainAspectRatio: false,
      tooltips           : {
        mode     : mode,
        intersect: intersect
      },
      hover              : {
        mode     : mode,
        intersect: intersect
      },
      legend             : {
        display: false
      },
      scales             : {
        yAxes: [{
          // display: false,
          gridLines: {
            display      : true,
            lineWidth    : '4px',
            color        : 'rgba(0, 0, 0, .2)',
            zeroLineColor: 'transparent'
          },
          ticks    : $.extend({
            beginAtZero: true,

            // Include a dollar sign in the ticks
            callback: function (value, index, values) {
              if (value >= 1000) {
                value /= 1000
                value += 'k'
              }
              //return '$' + value
              return value
            }
          }, ticksStyle)
        }],
        xAxes: [{
          display  : true,
          gridLines: {
            display: false
          },
          ticks    : ticksStyle
        }]
      }
    }
  })

// Sales graph chart
  var salesGraphChartCanvas = $('#line-chart').get(0).getContext('2d');
  //$('#revenue-chart').get(0).getContext('2d');

  var salesGraphChartData = {
    labels  : ["<?php echo e(\Carbon\Carbon::today()->subDays(14)->toDateString()); ?>","<?php echo e(\Carbon\Carbon::today()->subDays(13)->toDateString()); ?>","<?php echo e(\Carbon\Carbon::today()->subDays(12)->toDateString()); ?>","<?php echo e(\Carbon\Carbon::today()->subDays(11)->toDateString()); ?>","<?php echo e(\Carbon\Carbon::today()->subDays(10)->toDateString()); ?>","<?php echo e(\Carbon\Carbon::today()->subDays(9)->toDateString()); ?>","<?php echo e(\Carbon\Carbon::today()->subDays(8)->toDateString()); ?>","<?php echo e(\Carbon\Carbon::today()->subDays(7)->toDateString()); ?>","<?php echo e(\Carbon\Carbon::today()->subDays(6)->toDateString()); ?>", "<?php echo e(\Carbon\Carbon::today()->subDays(5)->toDateString()); ?>", "<?php echo e(\Carbon\Carbon::today()->subDays(4)->toDateString()); ?>", "<?php echo e(\Carbon\Carbon::today()->subDays(3)->toDateString()); ?>", "<?php echo e(\Carbon\Carbon::today()->subDays(2)->toDateString()); ?>", "Hier", "Aujourd'hui"],
    datasets: [
      {
        label               : 'Revenue journalier (€)',
        fill                : false,
        borderWidth         : 2,
        lineTension         : 0,
        spanGaps : true,
        borderColor         : '#efefef',
        pointRadius         : 3,
        pointHoverRadius    : 7,
        pointColor          : '#efefef',
        pointBackgroundColor: '#efefef',
        data                : ["<?php echo e(\App\Models\Order::where('payment_status', true)->whereDate('created_at' , \Carbon\Carbon::today()->subDays(14))->get()->sum('amount')); ?>","<?php echo e(\App\Models\Order::where('payment_status', true)->whereDate('created_at' , \Carbon\Carbon::today()->subDays(13))->get()->sum('amount')); ?>","<?php echo e(\App\Models\Order::where('payment_status', true)->whereDate('created_at' , \Carbon\Carbon::today()->subDays(12))->get()->sum('amount')); ?>","<?php echo e(\App\Models\Order::where('payment_status', true)->whereDate('created_at' , \Carbon\Carbon::today()->subDays(11))->get()->sum('amount')); ?>","<?php echo e(\App\Models\Order::where('payment_status', true)->whereDate('created_at' , \Carbon\Carbon::today()->subDays(10))->get()->sum('amount')); ?>","<?php echo e(\App\Models\Order::where('payment_status', true)->whereDate('created_at' , \Carbon\Carbon::today()->subDays(9))->get()->sum('amount')); ?>","<?php echo e(\App\Models\Order::where('payment_status', true)->whereDate('created_at' , \Carbon\Carbon::today()->subDays(8))->get()->sum('amount')); ?>","<?php echo e(\App\Models\Order::where('payment_status', true)->whereDate('created_at' , \Carbon\Carbon::today()->subDays(7))->get()->sum('amount')); ?>","<?php echo e(\App\Models\Order::where('payment_status', true)->whereDate('created_at' , \Carbon\Carbon::today()->subDays(6))->get()->sum('amount')); ?>","<?php echo e(\App\Models\Order::where('payment_status', true)->whereDate('created_at' , \Carbon\Carbon::today()->subDays(5))->get()->sum('amount')); ?>","<?php echo e(\App\Models\Order::where('payment_status', true)->whereDate('created_at' , \Carbon\Carbon::today()->subDays(4))->get()->sum('amount')); ?>","<?php echo e(\App\Models\Order::where('payment_status', true)->whereDate('created_at' , \Carbon\Carbon::today()->subDays(3))->get()->sum('amount')); ?>","<?php echo e(\App\Models\Order::where('payment_status', true)->whereDate('created_at' , \Carbon\Carbon::today()->subDays(2))->get()->sum('amount')); ?>","<?php echo e(\App\Models\Order::where('payment_status', true)->whereDate('created_at' , \Carbon\Carbon::today()->subDays(1))->get()->sum('amount')); ?>","<?php echo e(\App\Models\Order::where('payment_status', true)->whereDate('created_at' , \Carbon\Carbon::today())->get()->sum('amount')); ?>"]
      }
    ]
  }

  var salesGraphChartOptions = {
    maintainAspectRatio : false,
    responsive : true,
    legend: {
      display: false,
    },
    scales: {
      xAxes: [{
        ticks : {
          fontColor: '#efefef',
        },
        gridLines : {
          display : false,
          color: '#efefef',
          drawBorder: false,
        }
      }],
      yAxes: [{
        ticks : {
          stepSize: 5000,
          fontColor: '#efefef',
        },
        gridLines : {
          display : true,
          color: '#efefef',
          drawBorder: false,
        }
      }]
    }
  }

  // This will get the first returned node in the jQuery collection.
  var salesGraphChart = new Chart(salesGraphChartCanvas, { 
      type: 'line', 
      data: salesGraphChartData, 
      options: salesGraphChartOptions
    }
  )



// Sales graph chart
  var usersGraphChartCanvas = $('#line-chart-users').get(0).getContext('2d');
  //$('#revenue-chart').get(0).getContext('2d');

  var usersGraphChartData = {
    labels  : ["<?php echo e(\Carbon\Carbon::today()->subDays(14)->toDateString()); ?>","<?php echo e(\Carbon\Carbon::today()->subDays(13)->toDateString()); ?>","<?php echo e(\Carbon\Carbon::today()->subDays(12)->toDateString()); ?>","<?php echo e(\Carbon\Carbon::today()->subDays(11)->toDateString()); ?>","<?php echo e(\Carbon\Carbon::today()->subDays(10)->toDateString()); ?>","<?php echo e(\Carbon\Carbon::today()->subDays(9)->toDateString()); ?>","<?php echo e(\Carbon\Carbon::today()->subDays(8)->toDateString()); ?>","<?php echo e(\Carbon\Carbon::today()->subDays(7)->toDateString()); ?>","<?php echo e(\Carbon\Carbon::today()->subDays(6)->toDateString()); ?>", "<?php echo e(\Carbon\Carbon::today()->subDays(5)->toDateString()); ?>", "<?php echo e(\Carbon\Carbon::today()->subDays(4)->toDateString()); ?>", "<?php echo e(\Carbon\Carbon::today()->subDays(3)->toDateString()); ?>", "<?php echo e(\Carbon\Carbon::today()->subDays(2)->toDateString()); ?>", "Hier", "Aujourd'hui"],
    datasets: [
      {
        label               : 'Nouveaux inscrits',
        fill                : false,
        borderWidth         : 2,
        lineTension         : 0,
        spanGaps : true,
        borderColor         : '#efefef',
        pointRadius         : 3,
        pointHoverRadius    : 7,
        pointColor          : '#efefef',
        pointBackgroundColor: '#efefef',
        data                : ["<?php echo e(\App\Models\User::whereDate('created_at' , \Carbon\Carbon::today()->subDays(14))->get()->count()); ?>","<?php echo e(\App\Models\User::whereDate('created_at' , \Carbon\Carbon::today()->subDays(13))->get()->count()); ?>","<?php echo e(\App\Models\User::whereDate('created_at' , \Carbon\Carbon::today()->subDays(12))->get()->count()); ?>","<?php echo e(\App\Models\User::whereDate('created_at' , \Carbon\Carbon::today()->subDays(11))->get()->count()); ?>","<?php echo e(\App\Models\User::whereDate('created_at' , \Carbon\Carbon::today()->subDays(10))->get()->count()); ?>","<?php echo e(\App\Models\User::whereDate('created_at' , \Carbon\Carbon::today()->subDays(9))->get()->count()); ?>","<?php echo e(\App\Models\User::whereDate('created_at' , \Carbon\Carbon::today()->subDays(8))->get()->count()); ?>","<?php echo e(\App\Models\User::whereDate('created_at' , \Carbon\Carbon::today()->subDays(7))->get()->count()); ?>","<?php echo e(\App\Models\User::whereDate('created_at' , \Carbon\Carbon::today()->subDays(6))->get()->count()); ?>","<?php echo e(\App\Models\User::whereDate('created_at' , \Carbon\Carbon::today()->subDays(5))->get()->count()); ?>","<?php echo e(\App\Models\User::whereDate('created_at' , \Carbon\Carbon::today()->subDays(4))->get()->count()); ?>","<?php echo e(\App\Models\User::whereDate('created_at' , \Carbon\Carbon::today()->subDays(3))->get()->count()); ?>","<?php echo e(\App\Models\User::whereDate('created_at' , \Carbon\Carbon::today()->subDays(2))->get()->count()); ?>","<?php echo e(\App\Models\User::whereDate('created_at' , \Carbon\Carbon::today()->subDays(1))->get()->count()); ?>","<?php echo e(\App\Models\User::whereDate('created_at' , \Carbon\Carbon::today())->get()->count()); ?>"]
      }
    ]
  }

  var usersGraphChartOptions = {
    maintainAspectRatio : false,
    responsive : true,
    legend: {
      display: false,
    },
    scales: {
      xAxes: [{
        ticks : {
          fontColor: '#efefef',
        },
        gridLines : {
          display : false,
          color: '#efefef',
          drawBorder: false,
        }
      }],
      yAxes: [{
        ticks : {
          stepSize: 5000,
          fontColor: '#efefef',
        },
        gridLines : {
          display : true,
          color: '#efefef',
          drawBorder: false,
        }
      }]
    }
  }

  // This will get the first returned node in the jQuery collection.
  var usersGraphChart = new Chart(usersGraphChartCanvas, { 
      type: 'line', 
      data: usersGraphChartData, 
      options: usersGraphChartOptions
    }
  )


})








$(function () {

  'use strict'


  /* jVector Maps
   * ------------
   * Create a world map with markers
   */
  $('#world-map-markers').mapael({
      map: {
        name : "usa_states",
        zoom: {
          enabled: true,
          maxLevel: 10
        },
      },
    }
  );

})

</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.manager', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/florent/Dev/plantes-addict/webapp/development/v0.8-latest/resources/views/dashboardmanagement/show-dashboard.blade.php ENDPATH**/ ?>