<template>
    <div id="body">
        <nav class="navbar navbar-expand navbar-dark bg-dark static-top">

        <a class="navbar-brand mr-1" href="#">CSP / Kto12</a>

        <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#" @click="sidebarToggle">
          <i class="fas fa-bars"></i>
        </button>

        <!-- Navbar Search -->
        <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
         
        </form>

        <!-- Navbar -->
        <ul class="navbar-nav ml-auto ml-md-0">
          <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-bell fa-fw"></i>
              <span class="badge badge-danger">9+</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="alertsDropdown">
              <a class="dropdown-item" href="#">Action</a>
              <a class="dropdown-item" href="#">Another action</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Something else here</a>
            </div>
          </li>
          <li class="nav-item dropdown no-arrow mx-1">
            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-envelope fa-fw"></i>
              <span class="badge badge-danger">7</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="messagesDropdown">
              <a class="dropdown-item" href="#">Action</a>
              <a class="dropdown-item" href="#">Another action</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Something else here</a>
            </div>
          </li>
          <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
              <i class="fas fa-user-circle fa-fw"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
              <a class="dropdown-item" href="#">Settings</a>
              <a class="dropdown-item" href="#">Activity Log</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#" @click.prevent="$auth.logout()">Logout</a>
            </div>
          </li>
        </ul>

      </nav>

      <div id="wrapper" style="background-color:#dcdcdc" >

        <!-- Sidebar -->
        <ul class="sidebar navbar-nav">
          <li class="nav-item active" @click="dashboard">
            <a class="nav-link" style="cursor:pointer">
              <i class="fas fa-fw fa-tachometer-alt"></i>
              <span>Dashboard</span>
            </a>
          </li>
          <li class="nav-item" @click="action_list">
            <a class="nav-link"id="pagesDropdown" style="cursor:pointer">
              <i class="fas fa-list-alt"></i>
              <span>Action list</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="fas fa-fw fa-chart-area"></i>
              <span>Charts</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="fas fa-fw fa-table"></i>
              <span>Tables</span></a>
          </li>
        </ul>

        <div id="content-wrapper" v-show="content_wrapper">

          <div class="container-fluid">

            <!-- Breadcrumbs-->
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="#">Dashboard</a>
              </li>
              <li class="breadcrumb-item active">Overview</li>
            </ol>

            <!-- Icon Cards-->
            <div class="row">
              <div class="col-xl-3 col-sm-6 mb-3">
                <div class="card text-white bg-primary o-hidden h-100">
                  <div class="card-body">
                    <div class="card-body-icon">
                      <i class="fas fa-fw fa-comments"></i>
                    </div>
                    <div class="mr-5">26 New Messages!</div>
                  </div>
                  <a class="card-footer text-white clearfix small z-1" href="#">
                    <span class="float-left">View Details</span>
                    <span class="float-right">
                      <i class="fas fa-angle-right"></i>
                    </span>
                  </a>
                </div>
              </div>
              <div class="col-xl-3 col-sm-6 mb-3">
                <div class="card text-white bg-warning o-hidden h-100">
                  <div class="card-body">
                    <div class="card-body-icon">
                      <i class="fas fa-fw fa-list"></i>
                    </div>
                    <div class="mr-5">11 New Tasks!</div>
                  </div>
                  <a class="card-footer text-white clearfix small z-1" href="#">
                    <span class="float-left">View Details</span>
                    <span class="float-right">
                      <i class="fas fa-angle-right"></i>
                    </span>
                  </a>
                </div>
              </div>
              <div class="col-xl-3 col-sm-6 mb-3">
                <div class="card text-white bg-success o-hidden h-100">
                  <div class="card-body">
                    <div class="card-body-icon">
                      <i class="fas fa-fw fa-shopping-cart"></i>
                    </div>
                    <div class="mr-5">123 New Orders!</div>
                  </div>
                  <a class="card-footer text-white clearfix small z-1" href="#">
                    <span class="float-left">View Details</span>
                    <span class="float-right">
                      <i class="fas fa-angle-right"></i>
                    </span>
                  </a>
                </div>
              </div>
              <div class="col-xl-3 col-sm-6 mb-3">
                <div class="card text-white bg-danger o-hidden h-100">
                  <div class="card-body">
                    <div class="card-body-icon">
                      <i class="fas fa-fw fa-life-ring"></i>
                    </div>
                    <div class="mr-5">13 New Tickets!</div>
                  </div>
                  <a class="card-footer text-white clearfix small z-1" href="#">
                    <span class="float-left">View Details</span>
                    <span class="float-right">
                      <i class="fas fa-angle-right"></i>
                    </span>
                  </a>
                </div>
              </div>
            </div>

            <!-- Area Chart Example-->
            <div class="card mb-3">
              <div class="card-header">
                <i class="fas fa-chart-area"></i>
                Area Chart Example</div>
              <div class="card-body">

  <div class="container">
    <line-chart
      v-if="loaded"
      :chartdata="chartdata" />
  </div>
              </div>
              <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
            </div>
            
          </div>
          <!-- /.container-fluid -->

        </div>
        <!-- /.content-wrapper -->
        <AdminActionList v-show="ActionListTable"></AdminActionList>

      </div>
      <!-- /#wrapper -->

      <!-- Scroll to Top Button-->
      <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
      </a>

      <!-- Logout Modal-->
      <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
              <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
              </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
              <a class="btn btn-primary" href="login.html">Logout</a>
            </div>
          </div>
        </div>
      </div>
    </div>
</template>

<script>

  import axios from 'axios'
  import AdminActionList from '../../pages/admin/table/ActionList.vue'


  import LineChart from '../../pages/admin/chart/LineChart.js'

  export default {

    data() {
      return {

        content_wrapper: true,
        ActionListTable: false,

        loaded: false,
        chartdata: null,
        labels: null

      }
    },
    methods: {

      sidebarToggle() {
        $('.sidebar').toggleClass("toggled");
      },

      action_list() {
        
        this.content_wrapper = false;
        this.ActionListTable = true;

      },

      dashboard() {
        this.ActionListTable = false;
        this.content_wrapper = true;
      },


    },

    async mounted () {
      this.loaded = false
      // try {
        
      //   this.chartdata = this.datacollection = {
      //     labels: [1, 2],
      //     datasets: [
      //       {
      //         label: 'Done',
      //         backgroundColor: 'red',
      //         data: [16]
      //       }, {
      //         label: 'Not Yet Done',
      //         backgroundColor: '#f87979',
      //         data: [15]
      //       }
      //     ]
      //   }
      //   this.loaded = true
      // } catch (e) {
      //   console.error(e)
      // }

             axios.get('fetch/action_list/').then(result => {

                    this.downloads = result.data.action_list.map(download => download.id)
                    this.chartdata = {
                      labels: ["1st week","2nd week","3rd week"],
                      datasets: [
                        {
                          label: 'Data One',
                          backgroundColor: '#f87979',
                          data: [50.2,50.4,50.36]
                        }]
                    }

                    console.log(this.chartdata);
                    this.loaded = true
                }).catch(error => {
                    console.log(error);
                });



    },
    components: {
      AdminActionList,
      LineChart
    }
  }
</script>