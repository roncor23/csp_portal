<template>
    <div class="">
<div class="header">
  <a href="#" id="menu-action">
    <i class="fa fa-bars"></i>
    <span>Close</span>
  </a>
  <ched-seven-user-name></ched-seven-user-name>
  <div class="logo">
  CHED COORDINATOR DASHBOARD
  </div>
</div>
<div class="sidebar">
    <ul>
      <router-link to="/ched-coordinator"><li><a href="#"><i class="fas fa-home"></i><span>Home</span></a></li></router-link>
      <router-link to="/ched-coordinator/list-of-applicants"><li><a href="#"><i class="fas fa-list-ul"></i><span>Applicants</span></a></li></router-link>
      <router-link to="/ched-coordinator/list-of-unverified-applicants"><li><a href="#"><i class="fas fa-list-ul"></i><span>Unverified applicants</span></a></li></router-link>
      <router-link to="/ched-coordinator/list-of-enrolled-applicants"><li><a href="#"><i class="fas fa-list-ul"></i><span>Enrolled Applicants</span></a></li></router-link>
      <router-link to="/ched-coordinator/list-of-not-enrolled-applicants"><li><a href="#"><i class="fas fa-list-ul"></i><span>Not Enrolled Applicants</span></a></li></router-link>
      <router-link to="/ched-coordinator/list-of-applicants-by-csp-rank"><li><a href="#"><i class="fas fa-list-ul"></i><span>CSP Rank</span></a></li></router-link>
      <router-link to="/ched-coordinator/list-of-applicants-by-tdp-rank"><li><a href="#"><i class="fas fa-list-ul"></i><span>TDP Rank</span></a></li></router-link>
      <router-link to="/ched-coordinator/list-of-heis"><li><a href="#"><i class="fas fa-list-ul"></i><span>HEIs</span></a></li></router-link>
    </ul>
</div>

<!-- Content -->
<div class="main">

    <div class="jumbotron">
       <ched-list-of-not-enrolled-applicant></ched-list-of-not-enrolled-applicant>


    </div>

</div>
    </div>
</template>

<style scoped>
*:before,
*:after {
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}
body {
  background: #f5f5f5;
  padding: 0;
  margin: 0;
}
i.fa {
  font-size: 16px;
}
p {
  font-size: 16px;
  line-height: 1.42857143;
}
.header {
  position: fixed;
  z-index: 10;
  top: 0;
  left: 0;
  background: #3498DB;
  width: 100%;
  height: 50px;
  line-height: 50px;
  color: #fff;
}
.header .logo {
  text-transform: uppercase;
  letter-spacing: 1px;
}
.header #menu-action {
  display: block;
  float: left;
  width: 60px;
  height: 50px;
  line-height: 50px;
  margin-right: 15px;
  color: #fff;
  text-decoration: none;
  text-align: center;
  background: rgba(0, 0, 0, 0.15);
  font-size: 13px;
  text-transform: uppercase;
  letter-spacing: 1px;
  -webkit-transition: all 0.2s ease-in-out;
  transition: all 0.2s ease-in-out;
}
.header #menu-action i {
  display: inline-block;
  margin: 0 5px;
}
.header #menu-action span {
  width: 0px;
  display: none;
  overflow: hidden;
  -webkit-transition: all 0.2s ease-in-out;
  transition: all 0.2s ease-in-out;
}
.header #menu-action:hover {
  background: rgba(0, 0, 0, 0.25);
}
.header #menu-action.active {
  width: 250px;
  -webkit-transition: all 0.2s ease-in-out;
  transition: all 0.2s ease-in-out;
}
.header #menu-action.active span {
  display: inline;
  width: auto;
  -webkit-transition: all 0.2s ease-in-out;
  transition: all 0.2s ease-in-out;
}
.sidebar {
  position: fixed;
  z-index: 10;
  left: 0;
  top: 50px;
  height: 100%;
  width: 60px;
  background: #3490dc;
  border-right: 1px solid #ddd;
  text-align: center;
  -webkit-transition: all 0.2s ease-in-out;
  transition: all 0.2s ease-in-out;
}
.sidebar:hover,
.sidebar.active,
.sidebar.hovered {
  width: 250px;
  -webkit-transition: all 0.2s ease-in-out;
  transition: all 0.2s ease-in-out;
}
.sidebar ul {
  list-style-type: none;
  padding: 0;
  margin: 0;
}
.sidebar ul li {
  display: block;
}
.sidebar ul li a {
  display: block;
  position: relative;
  white-space: nowrap;
  overflow: hidden;
  border-bottom: 1px solid #ddd;
  color: #fff;
  text-align: left;
}
.sidebar ul li a i {
  display: inline-block;
  width: 60px;
  height: 60px;
  line-height: 60px;
  text-align: center;
  -webkit-animation-duration: 0.7s;
  -moz-animation-duration: 0.7s;
  -o-animation-duration: 0.7s;
  animation-duration: 0.7s;
  -webkit-animation-fill-mode: both;
  -moz-animation-fill-mode: both;
  -o-animation-fill-mode: both;
  animation-fill-mode: both;
}
.sidebar ul li a span {
  display: inline-block;
  height: 60px;
  line-height: 60px;
}
.sidebar ul li a:hover {
  background-color: #2a87d4;
}
.main {
  position: relative;
  display: block;
  top: 50px;
  left: 0;
  padding: 15px;
  padding-left: 75px;
  -webkit-transition: all 0.2s ease-in-out;
  transition: all 0.2s ease-in-out;
}
.main.active {
  padding-left: 275px;
  -webkit-transition: all 0.2s ease-in-out;
  transition: all 0.2s ease-in-out;
}
.main .jumbotron {
  background-color: #fff;
  padding: 30px !important;
  border: 1px solid #dfe8f1;
  -webkit-border-radius: 3px;
  -moz-border-radius: 3px;
  border-radius: 3px;
}
.main .jumbotron h1 {
  font-size: 24px;
  margin: 0;
  padding: 0;
  margin-bottom: 12px;
}
@-webkit-keyframes swing {
  20% {
    -webkit-transform: rotate3d(0, 0, 1, 15deg);
    transform: rotate3d(0, 0, 1, 15deg);
  }
  40% {
    -webkit-transform: rotate3d(0, 0, 1, -10deg);
    transform: rotate3d(0, 0, 1, -10deg);
  }
  60% {
    -webkit-transform: rotate3d(0, 0, 1, 5deg);
    transform: rotate3d(0, 0, 1, 5deg);
  }
  80% {
    -webkit-transform: rotate3d(0, 0, 1, -5deg);
    transform: rotate3d(0, 0, 1, -5deg);
  }
  100% {
    -webkit-transform: rotate3d(0, 0, 1, 0deg);
    transform: rotate3d(0, 0, 1, 0deg);
  }
}
@keyframes swing {
  20% {
    -webkit-transform: rotate3d(0, 0, 1, 15deg);
    -ms-transform: rotate3d(0, 0, 1, 15deg);
    transform: rotate3d(0, 0, 1, 15deg);
  }
  40% {
    -webkit-transform: rotate3d(0, 0, 1, -10deg);
    -ms-transform: rotate3d(0, 0, 1, -10deg);
    transform: rotate3d(0, 0, 1, -10deg);
  }
  60% {
    -webkit-transform: rotate3d(0, 0, 1, 5deg);
    -ms-transform: rotate3d(0, 0, 1, 5deg);
    transform: rotate3d(0, 0, 1, 5deg);
  }
  80% {
    -webkit-transform: rotate3d(0, 0, 1, -5deg);
    -ms-transform: rotate3d(0, 0, 1, -5deg);
    transform: rotate3d(0, 0, 1, -5deg);
  }
  100% {
    -webkit-transform: rotate3d(0, 0, 1, 0deg);
    -ms-transform: rotate3d(0, 0, 1, 0deg);
    transform: rotate3d(0, 0, 1, 0deg);
  }
}
.swing {
  -webkit-transform-origin: top center;
  -ms-transform-origin: top center;
  transform-origin: top center;
  -webkit-animation-name: swing;
  animation-name: swing;
}
.bs-callout {
  padding: 20px;
  margin: 20px 0;
  border: 1px solid #eee;
  border-left-width: 5px;
  border-radius: 3px;
  background: white;
}
table {
  background: white;
}
.bs-callout h4 {
  margin-top: 0;
  margin-bottom: 5px;
}
.bs-callout p:last-child {
  margin-bottom: 0;
}
.bs-callout code {
  border-radius: 3px;
}
.bs-callout + .bs-callout {
  margin-top: -5px;
}
.bs-callout-default {
  border-left-color: #777;
}
.bs-callout-default h4 {
  color: #777;
}
.bs-callout-primary {
  border-left-color: #428bca;
}
.bs-callout-primary h4 {
  color: #428bca;
}
.bs-callout-success {
  border-left-color: #5cb85c;
}
.bs-callout-success h4 {
  color: #5cb85c;
}
.bs-callout-danger {
  border-left-color: #d9534f;
}
.bs-callout-danger h4 {
  color: #d9534f;
}
.bs-callout-warning {
  border-left-color: #f0ad4e;
}
.bs-callout-warning h4 {
  color: #f0ad4e;
}
.bs-callout-info {
  border-left-color: #5bc0de;
}
.bs-callout-info h4 {
  color: #5bc0de;
}



</style>

<script>

import Vue from 'vue'
import axios from 'axios'

Vue.use(window.vuelidate.default);
const { required, minLength, email, sameAs, numeric, alphaNum, alpha } = window.validators;



Vue.component("ched-list-of-not-enrolled-applicant", {
    template: `<div>
                <div style="float:right;margin-bottom:10px">
                  <span>Search:</span>&nbsp;<input type="text" v-model="search">
                </div>
                <div v-if="loading" class="loading">
                  Loading...
                </div>
                <div class="table-responsive">
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="font-size:9px">
                    <thead >
                      <tr>
                    <th>No.</th>
                    <th>Reference #</th>
                    <th>Year</th>
                    <th>Year Level</th>             
                    <th>Last Name</th>
                    <th>First Name</th>
                    <th>Middle Name</th>
                    <th>Ext. Name</th>
                    <th>Gender</th>
                    <th>GWA</th>
                    <th>Rank Points</th>
                    <th>Ranking Status</th>
                    <th>HEI Status</th>
                    <th>CHED Status</th>     
                    <th>ValidatedByCHED</th>
                    <th>CHEDLastUpdate</th>
                    <th>ValidatedByHEI</th>
                    <th>Action</th>
                      </tr>
                    </thead>
                    <tfoot >
                      <tr>
                    <th>No.</th>
                    <th>Reference #</th>
                    <th>Year</th>
                    <th>Year Level</th>
                    <th>Last Name</th>
                    <th>First Name</th>
                    <th>Middle Name</th>
                    <th>Ext. Name</th>
                    <th>Gender</th>
                    <th>GWA</th>
                    <th>Rank Points</th>
                    <th>Ranking Status</th>
                    <th>HEI Status</th>
                    <th>CHED Status</th>
                    <th>ValidatedByCHED</th>
                    <th>CHEDLastUpdate</th>
                    <th>ValidatedByHEI</th>
                    <th>Action</th>
                      </tr>
                    </tfoot>  
            <tbody v-if="filteredBlogs.length > 0">
                    <tr class="table_data" v-for="(i,index) in pageOfItems" :key="i.index">
                        <td>{{index+1}}</td>
                        <td>{{i.reference_no}}</td>
                        <td v-if="i.ay === null" style="color:blue">NOT YET SET BY CHED</td>
                        <td v-if="i.ay === 8">2020</td>
                        <td v-if="i.yr_lvl === null" style="color:blue">NOT YET SET BY HEI</td>
                        <td v-if="i.yr_lvl === 1">1st Year</td>
                        <td v-if="i.yr_lvl === 2">2nd Year</td>
                        <td v-if="i.yr_lvl === 3">3rd Year</td>
                        <td v-if="i.yr_lvl === 4">4th Year</td>
                        <td v-if="i.yr_lvl === 5">5th Year and above.</td>
                        <td>{{i.lname}}</td>
                        <td>{{i.fname}}</td>
                        <td>{{i.mname}}</td>
                        <td>{{i.xname}}</td>
                        <td v-if="i.gender === 1">MALE</td>
                        <td v-if="i.gender === 2">FEMALE</td>
                        <td v-if="i.gwa === null" style="color:blue">GWA NOT YET SET</td>
                        <td v-if="i.gwa != null">{{i.gwa}}</td>
                        <td v-if="i.rank_points === null" style="color:blue">RANKING POINTS NOT AVAILABLE</td>
                        <td v-if="i.rank_points != null" style="color:green">{{i.rank_points}}</td>
                        <td v-if="i.ranking_status === null" style="color:blue">NOT YET ASSIGN</td>
                        <td v-if="i.ranking_status === 1">Ranking System Off</td>
                        <td v-if="i.ranking_status === 2">WAITING FOR RANKING</td>
                        <td v-if="i.ranking_status === 3">WAITING LIST...</td>
                        <td v-if="i.ranking_status === 4">DID NOT MEET THE REQUIREMENTS, PLEASE RE-APPLY IN THE NEXT ROUND.</td>
                        <td v-if="i.ranking_status === 5">QUALIFIED AS TDP</td>
                        <td v-if="i.ranking_status === 6">QUALIFIED AS HALF PESFA</td>
                        <td v-if="i.ranking_status === 7">QUALIFIED AS FULL SSP</td>
                        <td v-if="i.ranking_status === 8">QUALIFIED AS FULL PESFA</td>
                        <td v-if="i.ranking_status === 9">QUALIFIED AS FULL SSP</td>
                        <td v-if="i.verified_hei === 3" style="color:blue">NOT YET CHECKED BY HEI</td>
                        <td v-if="i.verified_hei === 1" style="color:green">ENROLLED</td>
                        <td v-if="i.verified_hei === 2" style="color:red">NOT ENROLLED</td>
                        <td v-if="i.verified_admin === null" style="color:blue">NOT YET CHECKED BY CHED</td>
                        <td v-if="i.verified_admin === 1" style="color:green">VALIDATED</td>
                        <td v-if="i.verified_admin === 2" style="color:red">LACKING DOCUMENTS</td>
                        <td v-if="i.verified_admin === 3" style="color:red">INVALID APPLICATION</td>
                        <td v-if="i.validatedByCHED === null" style="color:blue">NOT YET VALIDATED BY CHED</td>
                        <td v-if="i.validatedByCHED != null">{{i.validatedByCHED}}</td>
                        <td>{{i.update_date}}</td>
                        <td v-if="i.validatedByHEI === null" style="color:blue">NOT YET VALIDATED BY HEI</td>
                        <td v-if="i.validatedByHEI != null">{{i.validatedByHEI}}</td>
                        <td>
                          <button type="button" class="btn btn-primary btn-sm" @click="editItem(i)" data-toggle="modal" data-target="#applicantModal"><i class="fas fa-pen-square"></i></button>
                        </td>
                    </tr> 
                    </tbody>
                    <tbody  v-else>
                       <tr>
                        <td colspan="16"><p style="color:red; text-align:center; font-size:12px">NO DATA FOUND!</p></td>
                       </tr>
                    </tbody>              
                    </table>
                    <div class="form-row">
                      <div class="form-group col-md-3">
                        <span style="font-weight:bold">Total Not Enrolled: </span>{{filteredBlogs.length}}
                      </div>
                      <div class="form-group col-md-3">
                      </div>
                      <div class="form-group col-md-6">
                        <nav aria-label="Page navigation" style="float:right">
                            <jw-pagination v-if="filteredBlogs.length" :items="filteredBlogs"  :pageSize="countPage" :maxPages="5" @changePage="onChangePage"></jw-pagination> 
                        </nav>
                      </div>
                     </div>
                </div>         
                  </div>
                </div>
              </div>
        </div>`,

    data() {
        return {

          applicants: [],
          formData: {},
          search: '',
          countPage: 10,
          pageOfItems: [],
          loading: false      
        }
    },
    computed: {
        filteredBlogs: function() {

        var filter_search = this.search;

        return this.applicants.filter((applicants) => {

           return applicants.fname.match(filter_search) || applicants.lname.match(filter_search) || applicants.mname.match(filter_search) || applicants.xname.match(filter_search) || applicants.email.match(filter_search) || applicants.email.match(filter_search) || applicants.contact.match(filter_search) || applicants.reference_no.match(filter_search);

        });
      }
    },

  methods: {

    fetchNotEnrolledApplicant: function() { 
            this.loading = true;
            axios.get('ched_admin/fetch_not_enrolled_applicant/').then(result => {
                this.loading = false;
                this.applicants = result.data;
                this.applicants.splice(index, 1);
                

            }).catch(error => {
                console.log(error);
            });
    },
    onChangePage: function(pageOfItems) {
        // update page of items
        this.pageOfItems = pageOfItems;
    },



  },
  async mounted() {
    this.fetchNotEnrolledApplicant();

  }

});

Vue.component("ched-seven-user-name", {
    template: `<div>
            <ul class="" style="float:right;margin-right:30px;list-style-type:none; text-transform: uppercase;">           
              <!-- Dropdown -->
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown" style="color:#fff">
                  {{ username }} Profile
                </a>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="#" @click.prevent="$auth.logout()">Logout</a>
                  <router-link to="/ched-coordinator/change-password"><a class="dropdown-item" href="#">Change Password</a></router-link>
                </div>
              </li>
            </ul>
        </div>`,
    data() {
        return {
            username: ''
        }
    },

    methods: {
      fetchUsername: function() {
          axios.get('ched_admin/fetch_user_name/').then(result => {

              this.username = result.data;

          }).catch(error => {
              console.log(error);
          });
      }
    },
    async mounted() {
      this.fetchUsername();
    }
});


  export default {
    data() {
      return {
      }
    },
    methods: {

    },
    async mounted() {
     
    },
    components: {
      //
    }
  }
</script>