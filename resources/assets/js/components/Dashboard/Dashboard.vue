<template>
    <div class="box">
        <div class="box-header">
            <span class="fa fa-bar-chart"></span>
            <h3 class="box-title margin-r-5">Company Revenue Dashboard</h3>
            <hr class="divider">
        </div>
        <div class="box-body">
            <div class="col-md-12" style="text-align: center">
                <div class="row">
                    <div class="col-md-2">
                        <h2><b>$1,379,281,1</b></h2>
                        <p>Total Revenue</p>
                    </div>
                    <div class="col-md-2">
                        <h2><b>5,999</b></h2>
                        <p>Trips Booked</p>
                    </div>
                    <div class="col-md-2">
                        <h2><b>999</b></h2>
                        <p>New Boats</p>
                    </div>
                    <div class="col-md-2">
                        <h2><b>4,555</b></h2>
                        <p>new Boaters</p>
                    </div>
                    <div class="col-md-2">
                        <h2><b>6,4</b></h2>
                        <p>Avg Trip (hours)</p>
                    </div>
                    <div class="col-md-2">
                        <h2><b>19%</b></h2>
                        <p>30 Day Growth</p>
                    </div>
                </div>
            </div>

            <div class="col-md-12">
                <hr class="divider">
                <div class="row">
                    <div class="col-md-6">
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">Area Chart</h3>

                            </div>
                            <div class="box-body">
                                <line-chartline></line-chartline>
                            </div>
                            <!-- /.box-body -->
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">Area Chart</h3>

                            </div>
                            <div class="box-body">
                                <line-chartbar></line-chartbar>
                            </div>
                            <!-- /.box-body -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6">
                        <div class="box box-danger">
                            <div class="box-header with-border">
                                <h3 class="box-title">Latest Members</h3>

                                <div class="box-tools pull-right">
                                    <span class="label label-danger">8 New Members</span>
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body no-padding">
                                <ul class="users-list clearfix">
                                    <li>
                                        <img src="dist/img/user1-128x128.jpg" alt="User Image">
                                        <a class="users-list-name" href="#">Alexander Pierce</a>
                                        <span class="users-list-date">Today</span>
                                    </li>
                                    <li>
                                        <img src="dist/img/user8-128x128.jpg" alt="User Image">
                                        <a class="users-list-name" href="#">Norman</a>
                                        <span class="users-list-date">Yesterday</span>
                                    </li>
                                    <li>
                                        <img src="dist/img/user7-128x128.jpg" alt="User Image">
                                        <a class="users-list-name" href="#">Jane</a>
                                        <span class="users-list-date">12 Jan</span>
                                    </li>
                                    <li>
                                        <img src="dist/img/user6-128x128.jpg" alt="User Image">
                                        <a class="users-list-name" href="#">John</a>
                                        <span class="users-list-date">12 Jan</span>
                                    </li>
                                    <li>
                                        <img src="dist/img/user2-160x160.jpg" alt="User Image">
                                        <a class="users-list-name" href="#">Alexander</a>
                                        <span class="users-list-date">13 Jan</span>
                                    </li>
                                    <li>
                                        <img src="dist/img/user5-128x128.jpg" alt="User Image">
                                        <a class="users-list-name" href="#">Sarah</a>
                                        <span class="users-list-date">14 Jan</span>
                                    </li>
                                    <li>
                                        <img src="dist/img/user4-128x128.jpg" alt="User Image">
                                        <a class="users-list-name" href="#">Nora</a>
                                        <span class="users-list-date">15 Jan</span>
                                    </li>
                                    <li>
                                        <img src="dist/img/user3-128x128.jpg" alt="User Image">
                                        <a class="users-list-name" href="#">Nadia</a>
                                        <span class="users-list-date">15 Jan</span>
                                    </li>
                                </ul>
                                <!-- /.users-list -->
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer text-center">
                                <a href="javascript:void(0)" class="uppercase">View All Users</a>
                            </div>
                            <!-- /.box-footer -->
                        </div>
                    </div>
                    <div class="col-md-6">
                        <line-dougnut></line-dougnut>
                    </div>
                </div>

            </div>
        </div>
    </div>
</template>

<script>

   import LineChart from './LineChart.js'
   import barChart from './BarChart.js'
   import dougnut from './DougnutChart.js'

    export default {
        name: "Dashboard",
        components: {
            'line-chartline' : LineChart,
            'line-chartbar': barChart,
            'line-dougnut': dougnut
        }

    }


</script>

<style scoped>

</style>