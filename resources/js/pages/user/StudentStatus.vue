<template>
    <div class="">
		<div class="header">
		  <a href="#" id="menu-action">
		    <i class="fa fa-bars"></i>
		    <span>Close</span>
		  </a>
		  <div>
		    <img class="logo" :src="logo"> CSP
		      <ul class="" style="float:right;margin-right:30px;list-style-type:none;">           
  		      <!-- Dropdown -->
  		      <li class="nav-item dropdown">
  		        <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown" style="color:#fff">
  		          {{username}} Profile
  		        </a>
  		        <div class="dropdown-menu">
  		          <a class="dropdown-item" href="#" @click.prevent="$auth.logout()">Logout</a>
                 <router-link to="/student-dashboard/change-password"><a class="dropdown-item" href="#">Change Password</a></router-link>
  		        </div>
  		      </li>
		      </ul>
		  </div>
		</div>
		<div class="sidebar">
		  <ul>
		    <router-link to="/student-dashboard"><li><a href="#"><i class="fas fa-home"></i><span>Home</span></a></li></router-link>
		    <router-link to="/student-information"><li><a href="#"><i class="fas fa-user"></i><span>My Information</span></a></li></router-link>
		    <li><a href="#"><i class="fas fa-question"></i><span>Check Status</span></a></li>
		    </ul>
		</div>
		<!-- Content -->
		<div class="main">
        <div class="jumbotron" style="background-color:#ff000024" v-for="applicant in applicants" v-if="applicant.confirm === 0">
           <p>Please check your email at <span><a href="#">{{applicant.email}}</a></span> with your code. Your code is 7 characters in length. Verify first before you use this portal. Thanks!</p>
        </div>
		    <div class="jumbotron" v-for="applicant in applicants" v-if="applicant.confirm === 1">
		      <span><h4 class="mb-4">School status:&nbsp;
            <span v-if="applicant.verified_hei === 3" style="color:blue">Not yet checked by HEI</span>
            <span v-if="applicant.verified_hei === 1" style="color:green">Enrolled</span>
            <span v-if="applicant.verified_hei === 2" style="color:red">Not Enrolled</span>
          </h4></span>
           <span v-if="applicant.verified_hei === 2"><h4 class="mb-4">School status remarks:&nbsp;
            <span style="color:red">{{applicant.hei_remarks}}</span>
          </h4></span>
		      <span><h4 class="mb-4">CHED status:&nbsp;
            <span v-if="applicant.verified_admin === null" style="color:blue">Not yet checked by CHED</span>
            <span v-if="applicant.verified_admin === 1" style="color:green">Validated</span>
            <span v-if="applicant.verified_admin === 2" style="color:red">Lacking documents</span>
            <span v-if="applicant.verified_admin === 3" style="color:red">Invalid application</span>
          </h4></span>
          <span v-if="applicant.verified_admin === 2"><h4 class="mb-4">CHED status remarks:&nbsp;
            <span style="color:red">{{applicant.admin_remarks}}</span>
          </h4></span>
           <span v-if="applicant.verified_admin === 3"><h4 class="mb-4">CHED status remarks:&nbsp;
            <span style="color:red">{{applicant.admin_remarks}}</span>
          </h4></span>
		      <span><h4>Ranking status:&nbsp;
            <span v-if="applicant.ranking_status === 1" style="color:blue">Ranking System Off</span>
            <span v-if="applicant.ranking_status === 2" style="color:green">Waiting for ranking</span>
            <span v-if="applicant.ranking_status === 3" style="color:green">Waiting list</span>
            <span v-if="applicant.ranking_status === 4" style="color:red">did not meet the requirements, please re-apply in the next round.</span>
            <span v-if="applicant.ranking_status === 5" style="color:green">Qualified as TDP</span>
            <span v-if="applicant.ranking_status === 6" style="color:green">Qualified as HALF PESFA</span>
            <span v-if="applicant.ranking_status === 7" style="color:green">Qualified as HALF SSP</span>
            <span v-if="applicant.ranking_status === 8" style="color:green">Qualified as FULL PESFA</span>
            <span v-if="applicant.ranking_status === 9" style="color:green">Qualified as FULL SSP</span>
          </h4></span>
		    </div>  
		</div>
    </div>
</template>

<style scoped>
.dropdown-item.active,
.dropdown-item:active {
  color: #fff;
  text-decoration: none;
  background-color: #dfe8f1;
}

a:hover {
  color: #1d68a7;
  text-decoration: none;
}



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
.logo {
  width: 30px;
  height: 30px;
}

.header {
  position: fixed;
  z-index: 10;
  top: 0;
  left: 0;
  background: #1c3961;
  width: 100%;
  height: 50px;
  line-height: 50px;
  color: #fff;
}

.header {
  text-transform: uppercase;
  letter-spacing: 1px;
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
  background: #1c3961;
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
  background-color: #1a3150;
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
import axios from 'axios'
  export default {
    data() {
      return {
        applicants: {},
        username: '',
        logo: 'image/logo.png'
      }
    },
    methods: {
      fetchApplicant: function() {

            axios.get('applicant/fetch_applicant/').then(result => {
                this.applicants = result.data;
                console.log(this.applicants);            

            }).catch(error => {
                console.log(error);
            });
      },
      fetchUsername: function() {
          axios.get('applicant/fetch_user_name/').then(result => {

              this.username = result.data;
              console.log(this.username);

          }).catch(error => {
              console.log(error);
          });
      },
    },
    async mounted() {
      this.fetchApplicant();
      this.fetchUsername();
    },
    components: {
      //
    }
  }
</script>