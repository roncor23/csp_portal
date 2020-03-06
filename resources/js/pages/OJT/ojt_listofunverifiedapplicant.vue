<template>
    <div class="">
<div class="header">
  <a href="#" id="menu-action">
    <i class="fa fa-bars"></i>
    <span>Close</span>
  </a>
  <OJT-one-user-name></OJT-one-user-name>
  <div class="logo">
  OJT DASHBOARD
  </div>
</div>
<div class="sidebar">
    <ul>
      <router-link to="/OJT-dashboard"><li><a href="#"><i class="fas fa-home"></i><span>Home</span></a></li></router-link>
      <router-link to="/OJT-dashboard/list-of-unverified-applicants"><li><a href="#"><i class="fas fa-list-ul"></i><span>Unverified applicants</span></a></li></router-link>

    </ul>
</div>

<!-- Content -->
<div class="main">

    <div class="jumbotron">
       <ojt-list-of-unverified-applicant></ojt-list-of-unverified-applicant>
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

import Vue from 'vue';
import axios from 'axios';

Vue.use(window.vuelidate.default);
const { required, minLength, email, sameAs, numeric, alphaNum, alpha } = window.validators;


Vue.component("ojt-list-of-unverified-applicant", {
    template: `<div>
                <div style="float:right;margin-bottom:10px">
                  <span>Search:</span>&nbsp;<input type="text" v-model="search">
                </div>
                <div v-if="loading" class="loading">
                  Loading...
                </div>
                <div class="table-responsive" id="list_of_applicant">
                  <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style="font-size:9px">
                    <thead >
                      <tr>
                    <th>No.</th>
                    <th>Reference #</th>            
                    <th>Last Name</th>
                    <th>First Name</th>
                    <th>Middle Name</th>
                    <th>Ext. Name</th>
                    <th>Email</th>
                    <th>Gender</th>
                      </tr>
                    </thead>
                    <tfoot >
                      <tr>
                    <th>No.</th>
                    <th>Reference #</th>
                    <th>Last Name</th>
                    <th>First Name</th>
                    <th>Middle Name</th>
                    <th>Ext. Name</th>
                    <th>Email</th>
                    <th>Gender</th>
                      </tr>
                    </tfoot>  
            <tbody v-if="filteredBlogs.length > 0">
                    <tr class="table_data" v-for="(i,index) in pageOfItems" :key="i.index">
                        <td>{{index+1}}</td>
                        <td>{{i.reference_no}}</td>
                        <td>{{i.lname}}</td>
                        <td>{{i.fname}}</td>
                        <td>{{i.mname}}</td>
                        <td>{{i.xname}}</td>
                        <td>{{i.email}}</td>
                        <td v-if="i.gender === 1">MALE</td>
                        <td v-if="i.gender === 2">FEMALE</td>
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
                        <span style="font-weight:bold">Total Unverified Applicants: </span>{{filteredBlogs.length}}
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


        </div>`,

    data() {
        return {

          applicants: [],
          formData: {},
          search: '',
          countPage: 15,
          pageOfItems: [],
          selectedItem: {},
          brgys: {},
          citys: {},
          provinces: {},
          heis: {},
          programs: {},
          parent_income: '',
          gwa: '',
          verified_admin: '',
          type_of_disability: '',
          supported_by_solo_parent: '',
          ranking_remarks: '',
          admin_remarks: '',
          v_parentsincome: false,
          v_gwa: false,
          v_ay: false,
          v_verified_admin: false,
          loading: false,
          loader1: true,
          loader: false
          
        }
    },
    computed: {
        filteredBlogs: function() {

        var filter_search = this.search;

        return this.applicants.filter((applicants) => {

           return applicants.fname.match(filter_search) || applicants.lname.match(filter_search) || applicants.mname.match(filter_search) || applicants.xname.match(filter_search) || applicants.email.match(filter_search) || applicants.email.match(filter_search) || applicants.reference_no.match(filter_search);



        });
      }
    },

  methods: {

    print() {
      // Pass the element id here
      this.$htmlToPaper('list_of_applicant');

      },
    fetchApplicant: function() {
            this.loading = true;
            axios.get('OJT/fetch_unverified_applicant/').then(result => {
                this.loading = false;
                this.applicants = result.data;
                console.log(this.applicants);
                this.applicants.splice(index, 1);
            }).catch(error => {
                console.log(error);
            });
    },
    // fetchBrgy: function() {
    //     axios.get('ched_admin/fetch_brgy/').then(result => {

    //         this.brgys = result.data;

    //     }).catch(error => {
    //         console.log(error);
    //     });
    // },
    // fetchCity: function() {
    //     axios.get('ched_admin/fetch_city/').then(result => {

    //         this.citys = result.data;

    //     }).catch(error => {
    //         console.log(error);
    //     });
    // },
    // fetchProvince: function() {
    //     axios.get('ched_admin/fetch_province/').then(result => {

    //         this.provinces = result.data;

    //     }).catch(error => {
    //         console.log(error);
    //     });
    // },
    // fetchProgram: function() {
    //     axios.get('ched_admin/fetch_program/').then(result => {

    //         this.programs = result.data;

    //     }).catch(error => {
    //         console.log(error);
    //     });
    // },
    // fetchHEI: function() {
    //     axios.get('ched_admin/fetch_hei/').then(result => {

    //         this.heis = result.data;

    //     }).catch(error => {
    //         console.log(error);
    //     });
    // },

    onChangePage: function(pageOfItems) {
        // update page of items
        this.pageOfItems = pageOfItems;
    },
    editItem: function(i) {
      this.selectedItem = i;
    },
    updateData: function($id) {

          $('#parent_income').css('border-color','');
          $('#gwa').css('border-color','');  
          $('#verified_admin_id').css('border-color',''); 
          $('#ay').css('border-color','');  

          this.v_parentsincome = false;
          this.v_gwa = false;
          this.v_verified_admin = false;
          this.v_ay = false;
          this.loader1 = false;
          this.loader = true; 


          if(this.selectedItem.parent_income && this.selectedItem.gwa && this.selectedItem.verified_admin && this.selectedItem.ay) {

          this.formData = new FormData();
          this.formData.append('lname', this.selectedItem.lname);
          this.formData.append('fname', this.selectedItem.fname);
          this.formData.append('mname', this.selectedItem.mname);
          this.formData.append('xname', this.selectedItem.xname);
          this.formData.append('birthdate', this.selectedItem.birthdate);
          this.formData.append('place_of_birth', this.selectedItem.place_of_birth);
          this.formData.append('gender', this.selectedItem.gender);
          this.formData.append('civil_status', this.selectedItem.civil_status);
          this.formData.append('citizenship', this.selectedItem.citizenship);
          this.formData.append('contact', this.selectedItem.contact);
          this.formData.append('email', this.selectedItem.email);
          this.formData.append('present_address', this.selectedItem.present_address);
          this.formData.append('town_city_id', this.selectedItem.town_city);
          this.formData.append('brgy_id', this.selectedItem.brgy);
          this.formData.append('province', this.selectedItem.province);
          this.formData.append('zipcode', this.selectedItem.zipcode);
          this.formData.append('name_of_school_last_attended', this.selectedItem.name_of_school_last_attended);
          this.formData.append('hei_id', this.selectedItem.hei);
          this.formData.append('course_id', this.selectedItem.course);
          this.formData.append('applicant_type', this.selectedItem.applicant_type);
          this.formData.append('pwd_id', this.selectedItem.pwd);
          this.formData.append('type_of_disability', this.selectedItem.type_of_disability);
          this.formData.append('ips_id', this.selectedItem.ips);
          this.formData.append('forps_id', this.selectedItem.forps);
          this.formData.append('parent_income', this.selectedItem.parent_income);
          this.formData.append('supported_by_solo_parent', this.selectedItem.supported_by_solo_parent);
          this.formData.append('status', this.selectedItem.status);
          this.formData.append('verified_admin_id', this.selectedItem.verified_admin);
          this.formData.append('admin_remarks', this.selectedItem.admin_remarks);
          this.formData.append('ranking_status_id', this.selectedItem.ranking_status);
          this.formData.append('ranking_remarks', this.selectedItem.ranking_remarks);
          this.formData.append('gwa', this.selectedItem.gwa);
          this.formData.append('ay', this.selectedItem.ay);
          this.formData.append('senior_citizen', this.selectedItem.senior_citizen);
          this.formData.append('fb_url', this.selectedItem.fb_url);
          this.formData.append('applicant_solo_parent', this.selectedItem.applicant_solo_parent);
          axios.post('ched_admin/update_applicant/' + $id, this.formData, {headers: {'content-Type': 'multipart/form-data'}})
            .then(response => {


              if(response.data === 0) {
                $('#gwa').css('border-color','red');
                this.$swal.fire({
                  icon: 'error',
                  title: 'Opps...',
                  text: 'GWA too low!',
                })
                return false;
              }
               $('#applicantModal').click();
               this.fetchApplicant();
                this.$swal.fire({
                  icon: 'success',
                  title: 'Great...',
                  text: 'Validated Successfully!',
                })
                $('#applicantModal').click();
              
            })
            .catch(error => {
                this.errors = error.response.data.errors;
                console.log(this.errors);
            });

          }

          if(!this.selectedItem.parent_income) {
            $('#parent_income').css('border-color','red');
            this.v_parentsincome = true;
            return false;
          }

          if(!this.selectedItem.gwa) {
            $('#gwa').css('border-color','red');
            this.v_gwa = true;
            return false;
          }

          if(!this.selectedItem.verified_admin) {
            $('#verified_admin_id').css('border-color','red');
            this.v_verified_admin = true;
            return false;
          }

          if(!this.selectedItem.ay) {
            this.v_ay = true;
            $('#ay').css('border-color','red');
            return false;
          }
   
      },


  },
  async mounted() {
    this.fetchApplicant();

  }

});



Vue.component("OJT-one-user-name", {
    template: `<div>
            <ul class="" style="float:right;margin-right:30px;list-style-type:none; text-transform: uppercase;">           
              <!-- Dropdown -->
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown" style="color:#fff">
                  {{ username }} Profile
                </a>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="#" @click.prevent="$auth.logout()">Logout</a>
                  <router-link to="/OJT-dashboard/change-password"><a class="dropdown-item" href="#">Change Password</a></router-link>
                  <router-link to="/OJT-dashboard/reset-password"><a class="dropdown-item" href="#">Reset Password</a></router-link>
                  <router-link to="/OJT-dashboard/force-verified"><a class="dropdown-item" href="#">Force Verified</a></router-link>
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
          axios.get('OJT/fetch_user_name/').then(result => {

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