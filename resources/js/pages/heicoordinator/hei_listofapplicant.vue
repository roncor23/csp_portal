<template>
    <div class="">
<div class="header">
  <a href="#" id="menu-action">
    <i class="fa fa-bars"></i>
    <span>Close</span>
  </a>
  <div class="logo">
  {{heiname}}

      <ul class="" style="float:right;margin-right:30px;list-style-type:none;">           
        <!-- Dropdown -->
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown" style="color:#fff">
            {{username}} Profile
          </a>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="#" @click.prevent="$auth.logout()">Logout</a>
            <router-link to="/hei-coordinator/change-password"><a class="dropdown-item" href="#">Change Password</a></router-link>
          </div>
        </li>
      </ul>

  </div>
</div>
<div class="sidebar">
    <ul>
      <router-link to="/hei-coordinator"><li><a href="#"><i class="fas fa-home"></i><span>Home</span></a></li></router-link>
      <router-link to="/hei-coordinator/list-of-applicants"><li><a href="#"><i class="fas fa-list-ul"></i><span>Applicants</span></a></li></router-link>
    </ul>
</div>

<!-- Content -->
<div class="main">

    <div class="jumbotron">
       <hei-list-of-applicant></hei-list-of-applicant>


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
  background: #fff;
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
  color: #444;
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
  background-color: #eee;
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



Vue.component("hei-list-of-applicant", {
    template: `<div>
                <div style="float:right;margin-bottom:10px">
                  <span>Search:</span>&nbsp;<input type="text" v-model="search">
                </div>
                <div class="table-responsive">
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="font-size:9px">
                    <thead >
                      <tr>
                    <th>No.</th>
                    <th>Reference #</th>
                    <th>Academic Year</th>
                    <th>Year Level</th>
                    <th>HEI Status</th>                
                    <th>Last Name</th>
                    <th>First Name</th>
                    <th>Middle Name</th>
                    <th>Ext. Name</th>
                    <th>Gender</th>
                    <th>Contact #</th>
                    <th>Email</th>
                    <th>ValidateddByHEI</th>
                    <th>Action</th>
                      </tr>
                    </thead>
                    <tfoot >
                      <tr>
                    <th>No.</th>
                    <th>Reference #</th>
                    <th>Academic Year</th>
                    <th>Year Level</th>
                    <th>HEI Status</th>
                    <th>Last Name</th>
                    <th>First Name</th>
                    <th>Middle Name</th>
                    <th>Ext. Name</th>
                    <th>Gender</th>
                    <th>Contact #</th>
                    <th>Email</th>
                    <th>ValidateddByHEI</th>
                    <th>Action</th>
                      </tr>
                    </tfoot>  
            <tbody v-if="filteredBlogs.length > 0">
                    <tr class="table_data" v-for="(i,index) in pageOfItems" :key="i.id">
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
                        <td v-if="i.verified_hei === 3" style="color:blue">NOT YET CHECK BY HEI</td>
                        <td v-if="i.verified_hei === 1" style="color:green">ENROLLED</td>
                        <td v-if="i.verified_hei === 2" style="color:red">NOT ENROLLED</td>
                        <td>{{i.lname}}</td>
                        <td>{{i.fname}}</td>
                        <td>{{i.mname}}</td>
                        <td>{{i.xname}}</td>
                        <td v-if="i.gender === 1">MALE</td>
                        <td v-if="i.gender === 2">FEMALE</td>
                        <td>{{i.contact}}</td>
                        <td>{{i.email}}</td>
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
                    <nav aria-label="Page navigation" style="float:right">
                        <jw-pagination v-if="filteredBlogs.length" :items="filteredBlogs"  :pageSize="countPage" :maxPages="3" @changePage="onChangePage"></jw-pagination> 
                    </nav>
                </div>

              <!-- EDIT MODAL -->
              <div class="modal fade bd-example-modal-xl" id="applicantModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel" style="font-weight:bold">Applicant</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                     <form
                    class="form" id="" method="post" action="foobar"
                    @submit.prevent="updateData(selectedItem.id)"
                  >
                       <div class="form-row">
                        <div class="form-group col-md-3">
                          <span style="font-size:10px;font-weight:bold">Last Name</span>
                          <input type="text" class="form-control" v-model="selectedItem.lname" disabled>
                        </div>
                        <div class="form-group col-md-3">
                          <span style="font-size:10px;font-weight:bold">First Name</span>
                          <input type="text" class="form-control" v-model="selectedItem.fname" disabled>
                        </div>
                        <div class="form-group col-md-3">
                          <span style="font-size:10px;font-weight:bold">Middle Name</span>
                          <input type="text" class="form-control" v-model="selectedItem.mname" disabled>
                        </div>
                         <div class="form-group col-md-3">
                          <span style="font-size:10px;font-weight:bold">Extension Name</span>
                          <input type="text" class="form-control" v-model="selectedItem.xname" disabled>
                        </div>
                      </div>

                      <div class="form-row">
                        <div class="form-group col-md-3">
                          <span style="font-size:10px;font-weight:bold">Date of Birth Name</span>
                          <input type="date" class="form-control" v-model="selectedItem.birthdate" disabled>
                        </div>
                        <div class="form-group col-md-3">
                          <span style="font-size:10px;font-weight:bold">Place of Birth</span>
                          <input type="text" class="form-control" v-model="selectedItem.place_of_birth" disabled>
                        </div>
                        <div class="form-group col-md-3">
                          <span style="font-size:10px;font-weight:bold">Gender</span>
                           <select name="gender" class="form-control" v-model="selectedItem.gender" disabled>
                            <option value="1">Male</option>
                            <option value="2">Female</option>
                          </select>
                        </div>
                         <div class="form-group col-md-3">
                          <span style="font-size:10px;font-weight:bold">Civil Status</span>
                           <select name="civil_status" class="form-control" v-model="selectedItem.civil_status" disabled>
                            <option value="1">Single</option>
                            <option value="2">Maried</option>
                            <option value="3">Separated</option>
                            <option value="4">Devorced</option>
                            <option value="5">Widowed</option>
                          </select>
                        </div>
                      </div>

                      <div class="form-row">
                        <div class="form-group col-md-3">
                          <span style="font-size:10px;font-weight:bold">Citizenship</span>
                          <select name="citizenship" class="form-control" v-model="selectedItem.citizenship" disabled>
                            <option value="1">Filipino</option>
                            <option value="2">American</option>
                          </select>
                        </div>
                        <div class="form-group col-md-3">
                          <span style="font-size:10px;font-weight:bold">Mobile Number</span>
                          <input type="text" class="form-control" v-model="selectedItem.contact" disabled>
                        </div>
                        <div class="form-group col-md-3">
                          <span style="font-size:10px;font-weight:bold">E-mail Address</span>
                          <input type="text" class="form-control" v-model="selectedItem.email" disabled>
                        </div>
                         <div class="form-group col-md-3">
                          <span style="font-size:10px;font-weight:bold">Present Address</span>
                          <input type="text" class="form-control" v-model="selectedItem.present_address" disabled>
                        </div>
                      </div>

                      <div class="form-row">
                        <div class="form-group col-md-3">
                          <span style="font-size:10px;font-weight:bold">City</span>
                          <select name="town_city" class="form-control" v-model="selectedItem.town_city" disabled>
                            <option v-for="city in citys" v-bind:value="city.city_id">{{ city.mun_city_name }}</option>
                          </select>
                        </div>
                        <div class="form-group col-md-3">   
                          <span style="font-size:10px;font-weight:bold">Barangay</span>    
                          <select  name="barangay" class="form-control" v-model="selectedItem.brgy" disabled>
                            <option v-for="brgy in brgys" v-bind:value="brgy.brgy_id">{{ brgy.name }}</option>
                          </select>
                        </div>
                        <div class="form-group col-md-3">
                          <span style="font-size:10px;font-weight:bold">Province</span>
                           <select  name="province" class="form-control" v-model="selectedItem.province" disabled>
                            <option v-for="province in provinces" v-bind:value="province.province_id">{{ province.prov_name }}</option>
                          </select>
                        </div>
                         <div class="form-group col-md-3">
                          <span style="font-size:10px;font-weight:bold">Zipcode</span>
                          <input type="text" class="form-control" v-model="selectedItem.zipcode" disabled>
                        </div>
                      </div>

                      <div class="form-row">
                        <div class="form-group col-md-3">
                          <span style="font-size:10px;font-weight:bold">School Intended to enroll</span>
                          <select name="hei" class="form-control" v-model="selectedItem.hei" disabled>
                            <option v-for="hei in heis" v-bind:value="hei.hei_id">{{ hei.hei_name}}</option>
                          </select>
                        </div>
                        <div class="form-group col-md-3">
                          <span style="font-size:10px;font-weight:bold">Degree Program</span>
                          <select name="course" class="form-control" v-model="selectedItem.course">
                            <option v-for="program in programs" v-bind:value="program.course_id">{{ program.course_name}}</option>
                          </select>
                        </div>
                        <div class="form-group col-md-3">
                          <span style="font-size:10px;font-weight:bold">Applicant Type</span>
                          <select name="applicant_type" class="form-control" v-model="selectedItem.applicant_type" disabled>
                            <option value="1">Incoming College Freshmen</option>
                            <option value="3">College Earned Units</option>
                            <option value="4">ALS passer</option>
                            <option value="5">PEPT passer</option>
                          </select>
                        </div>

                        <div class="form-group col-md-3">
                          <span style="font-size:10px;font-weight:bold">Year Level</span>
                          <select name="yr_lvl" id="yr_lvl" class="form-control" v-model="selectedItem.yr_lvl">
                            <option value="1">1st year</option>
                            <option value="2">2nd year</option>
                            <option value="3">3rd year</option>
                            <option value="4">4th year</option>
                            <option value="5">5th year and above</option>
                          </select>
                        </div> 
                  
                      </div>




                      <div class="form-row">
                        <div class="form-group col-md-3">
                          <span style="font-size:10px;font-weight:bold">HEI Status</span>
                          <select name="hei_status" id="verified_hei_id" class="form-control" v-model="selectedItem.verified_hei">
                            <option value="1">Enrolled</option>
                            <option value="2">Not Enrolled</option>
                          </select>
                        </div> 
                        <div class="form-group col-md-3">
                          <span style="font-size:10px;font-weight:bold">HEI Status Remarks</span>
                          <span style="font-size:10px;font-weight:bold"></span>
                          <input v-if="selectedItem.verified_hei == 3" type="text" class="form-control" v-model="selectedItem.hei_remarks" disabled>
                          <input v-if="selectedItem.verified_hei == 1" type="text" class="form-control" v-model="selectedItem.hei_remarks" disabled>
                          <input v-if="selectedItem.verified_hei == 2" type="text" class="form-control" v-model="selectedItem.hei_remarks">
                        </div>

                        <div class="form-group col-md-3">
                          <span style="font-size:10px;font-weight:bold">Applied Date</span>
                          <input type="text" class="form-control" v-model="selectedItem.created_at" disabled>
                        </div>
                      </div>

        
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                      </div>
                      </form>
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
          countPage: 5,
          pageOfItems: [],
          selectedItem: {},
          brgys: {},
          citys: {},
          provinces: {},
          heis: {},
          programs: {},
          yr_lvl: '',
          verified_hei: ''
          
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

    fetchApplicant: function() {

            axios.get('hei_coordinator/fetch_applicant/').then(result => {
                this.applicants = result.data;
                this.applicants.splice(index, 1);
                

            }).catch(error => {
                console.log(error);
            });
    },
    fetchBrgy: function() {
        axios.get('hei_coordinator/fetch_brgy/').then(result => {

            this.brgys = result.data;

        }).catch(error => {
            console.log(error);
        });
    },
    fetchCity: function() {
        axios.get('hei_coordinator/fetch_city/').then(result => {

            this.citys = result.data;

        }).catch(error => {
            console.log(error);
        });
    },
    fetchProvince: function() {
        axios.get('hei_coordinator/fetch_province/').then(result => {

            this.provinces = result.data;

        }).catch(error => {
            console.log(error);
        });
    },
    fetchProgram: function() {
        axios.get('hei_coordinator/fetch_program/').then(result => {

            this.programs = result.data;

        }).catch(error => {
            console.log(error);
        });
    },
    fetchHEI: function() {
        axios.get('hei_coordinator/fetch_hei/').then(result => {

            this.heis = result.data;

        }).catch(error => {
            console.log(error);
        });
    },
    onChangePage: function(pageOfItems) {
        // update page of items
        this.pageOfItems = pageOfItems;
    },
    editItem: function(i) {
      this.selectedItem = i;
    },
    updateData: function($id) {

          $('#yr_lvl').css('border-color','');
          $('#verified_hei_id').css('border-color','');   

          if(this.selectedItem.yr_lvl && this.selectedItem.verified_hei) {

          this.formData = new FormData();
          this.formData.append('yr_lvl', this.selectedItem.yr_lvl);
          this.formData.append('verified_hei_id', this.selectedItem.verified_hei);
          this.formData.append('hei_remarks', this.selectedItem.hei_remarks);

          axios.post('hei_coordinator/update_applicant/' + $id, this.formData, {headers: {'content-Type': 'multipart/form-data'}})
            .then(response => {
               this.fetchApplicant();
                this.$swal.fire({
                  icon: 'success',
                  title: 'Great...',
                  text: 'Updated Successfully!',
                })
               $("#applicantModal").modal("hide");

            })
            .catch(error => {
                this.errors = error.response.data.errors;
                console.log(this.errors);
            });

          }


          if(!this.selectedItem.yr_lvl) {
            $('#yr_lvl').css('border-color','red');
            return false;
          }

          if(!this.selectedItem.verified_hei) {
            $('#verified_hei_id').css('border-color','red');
            return false;
          }
   
      },
    resetForm: function() {


    },
  },
  async mounted() {
    this.fetchApplicant();
    this.fetchBrgy();
    this.fetchCity();
    this.fetchProvince();
    this.fetchProgram();
    this.fetchHEI();
  }

});


  export default {
    data() {
      return {
        username: '',
        heiname: ''
      }
    },
    methods: {
      fetchUsername: function() {
          axios.get('hei_coordinator/fetch_user_name/').then(result => {

              this.username = result.data;

          }).catch(error => {
              console.log(error);
          });
      },
      fetchHEIName: function() {
          axios.get('hei_coordinator/fetch_hei_name/').then(result => {

              this.heiname = result.data;

          }).catch(error => {
              console.log(error);
          });
      },
    },
    async mounted() {
      this.fetchHEIName();
      this.fetchUsername();
    },
    components: {
      //
    }
  }
</script>