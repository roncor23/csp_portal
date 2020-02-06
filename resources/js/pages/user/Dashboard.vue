<template>
    <div >
      <div v-if="loading" class="se-pre-con"></div>
      <div class="header">
        <a href="#" id="menu-action">
          <i class="fa fa-bars"></i>
          <span>Close</span>
        </a>
        <div class="logo">
          CSP

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
             <!--  <li><a href="#"><i class="fa fa-comments"></i><span>23</span></a></li>
              <li><a href="#"><i class="fa fa-bell-o"></i><span>98</span></a></li>
              <li><a href="#"><i data-show="show-side-navigation1" class="fa fa-bars show-side-btn"></i></a></li> -->
            </ul>

        </div>
      </div>
      <div class="sidebar">
        <ul>
          <li><a href="#"><i class="fas fa-home"></i><span>Home</span></a></li>
           <router-link to="/student-information"><li><a href="#"><i class="fas fa-user"></i><span>My Information</span></a></li></router-link>
          <router-link to="/student-status"><li><a href="#"><i class="fas fa-question"></i><span>Check Status</span></a></li></router-link>
        </ul>
      </div>

        <!-- Content -->
        <div class="main">

            <div class="jumbotron" style="background-color:#ff000024" v-for="applicant in applicants" v-if="applicant.confirm === 0">
              <p>Please check your email at <span><a href="#">{{applicant.email}}</a></span> with your code. Your code is 7 characters in length.</p><a href="#" @click="reSendCode"><i class="fas fa-recycle" style="padding:5px"></i>Resend code</a><a href="#"  @click="c_email"><i class="far fa-envelope" style="padding:5px"></i>Change email</a>
              <div class="form-row" >
                <div v-if="verify_code" class="form-group col-md-12">
                  <input class="form-control" type="text" id="ve_code" placeholder="Enter code.." v-model="v_code">
                  <p v-if="v_v_code" style="font-size:12px">
                    <span  style="color:red">Required.</span>
                  </p>
                  <button class="btn btn-primary mt-2" type="button" @click="verify">Verify</button>
                </div>
                <div v-if="change_email" class="form-group col-md-12">
                  <input class="form-control" type="text" id="ne_email" placeholder="Enter new email.." v-model="n_email">
                  <p v-if="v_n_email" style="font-size:12px">
                    <span  style="color:red">Required.</span>
                  </p>
                  <button class="btn btn-primary mt-2" type="button" @click="back">Back</button>
                  <button class="btn btn-primary mt-2" type="button" @click="new_email">Change Email</button>
                </div>
              </div>
            </div>

            <div class="jumbotron" v-for="applicant in applicants" v-if="applicant.confirm === 1">
              <h1>Hello, {{username}}!<a class="anchorjs-link" href="#hello,-world!"><span class="anchorjs-icon"></span></a></h1>
              <p>Thank you for applying scholarship. You're all ready to go!</p><br>
              <p>Welcome to our CSP portal dashboard, CSP portal makes it easier for students to track the real-time status for their application.</p>
            </div>

        </div>
</div>
</template>

<style scoped>

.se-pre-con {
    position: fixed;
    left: 0px;
    top: 0px;
    width: 100%;
    height: 100%;
    z-index: 9999;
    background: url(/image/loading.gif) center no-repeat rgba(0, 196, 255, 0.2);
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
import axios from 'axios';

  export default {
    data() {
      return {
        username: '',
        applicants: {},
        code: '',
        verify_code: true,
        change_email: false,
        n_email: '',
        formData: {},
        v_n_email: false,
        v_v_code: false,
        v_code: '',
        loading: false
      }
    },
    methods: {
      c_email() {
        this.verify_code = false;
        this.change_email = true;
      },
      back() {
        this.change_email = false;
        this.verify_code = true;
      },
      fetchApplicant: function() {

            axios.get('applicant/fetch_applicant/').then(result => {
                this.applicants = result.data;
                console.log(this.applicants);
                this.applicants.splice(index, 1);
                

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
      reSendCode: function() {
          this.loading = true;
          axios.post('applicant/resendcode/').then(result => {
                this.loading = false;
                this.$swal.fire({
                  icon: 'success',
                  title: 'Great...',
                  text: `A verification code has been sent to ${result.data}.`,
                })

          }).catch(error => {
              console.log(error);
          });
      },
      new_email: function() {

          this.formData = new FormData();
          this.formData.append('n_email', this.n_email);
          $('#ne_email').css('border-color','');
          this.v_n_email = false;
          if(this.n_email) {

          axios.post('applicant/new_email/', this.formData).then(result => {

            if(result.data === 1) {
                this.$swal.fire({
                  icon: 'success',
                  title: 'Great...',
                  text: `New email successfully changed.`,
                })
                this.fetchApplicant();
                this.reset();
            }

          }).catch(error => {
              console.log(error);
          });
        }
          if(!this.n_email) {
            $('#ne_email').css('border-color','red');
            this.v_n_email = true;
            return false;
          }
      },
      verify() {
          this.formData = new FormData();
          this.formData.append('v_code', this.v_code);
          $('#ve_code').css('border-color','');
          this.v_v_code = false;
          if(this.v_code) {

          axios.post('applicant/verify_code/', this.formData).then(result => {

            if(result.data === 0) {
                this.$swal.fire({
                  icon: 'error',
                  title: 'Opps...',
                  text: 'Incorrect code!',
                })
                $('#ve_code').css('border-color','red');
                this.v_v_code = false;
                return false;
            }

                this.$swal.fire({
                  icon: 'success',
                  title: 'Great...',
                  text: `You are successfully verified.`,
                })
                this.fetchApplicant();
                this.reset();

          }).catch(error => {
              console.log(error);
          });
        }
          if(!this.n_email) {
            $('#ve_code').css('border-color','red');
            this.v_v_code = true;
            return false;
          }
      },
      reset() {
        this.n_email = '';
        this.v_code = '';
      },
    },
    async mounted() {
      this.fetchUsername();
      this.fetchApplicant();
    },
    components: {
      //
    }
  }
</script>