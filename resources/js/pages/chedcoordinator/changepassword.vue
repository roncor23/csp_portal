<template>
<div>
<div class="header">
  <a href="#" id="menu-action">
    <i class="fa fa-bars"></i>
    <span>Close</span>
  </a>
  <ched-eight-user-name></ched-eight-user-name>
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
        <admin-change-password></admin-change-password>
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


Vue.component("admin-change-password", {
    template: `<div>
                  <form
                    class="form" id="" method="post" action="foobar"
                    @submit.prevent="submit"
                  >

                            <div class="form-group ">
                              <label >Current</label><span style="color:red">*</span>
                              <input class="form-control" id="current" type="password" v-model="current" @input="$v.current.$touch">
                              <p v-if="$v.current.$dirty" style="font-size:12px">
                                <span v-if="!$v.current.required" style="color:red">Current password is required.</span>
                                <span v-if="!$v.current.minLength" style="color:red">Password must have at least {{ $v.current.$params.minLength.min }} letters.</span>
                              </p>
                            </div>
                            <div class="form-group ">
                              <label >New password</label><span style="color:red">*</span>
                              <input type="password" class="form-control" v-model="new_password" @input="$v.new_password.$touch">
                              <p v-if="$v.new_password.$dirty" style="font-size:12px">
                                <span v-if="!$v.new_password.required" style="color:red">New password is required.</span>
                                <span v-if="!$v.new_password.minLength" style="color:red">Password must have at least {{ $v.new_password.$params.minLength.min }} letters.</span>
                                <span v-if="!$v.new_password.alphaNum" style="color:red">Password accept only alpha and numeric.</span>   
                              </p>
                            </div>
                            <div class="form-group ">
                              <label >Confirm password</label><span style="color:red">*</span>
                              <input type="password" class="form-control" v-model="confirmPassword" @input="$v.confirmPassword.$touch">
                              <p v-if="$v.confirmPassword.$dirty" style="font-size:12px">
                                <span v-if="$v.confirmPassword.$error && !$v.confirmPassword.required" style="color:red">Confirm password is required</span>
                                <span v-if="!$v.confirmPassword.sameAsPassword" style="color:red">Passwords must be identical.</span>
                              </p>
                            </div>
          
                    <!-- Submit -->
                    <div class="form__group form__group--no-label form__group--button">
                      <button
                        type="submit" class="btn btn-primary" name="form-submit"
                        :disabled="$v.$invalid"
                      >Submit</button>
                    </div>
                  </form>

        </div>`,
    data() {
        return {

          current: '',
          new_password: '',
          confirmPassword: '',
          formData: {}
        }
    },
  validations: {

    current: {
      required: validators.required,
      minLength: validators.minLength(6)
    },
    new_password: {
      required: validators.required,
      minLength: validators.minLength(6),
      alphaNum
    },
    confirmPassword: {
        required,
        sameAsPassword: sameAs('new_password')
    }
  },
  methods: {
    submit: function() {

      if (this.$v.$invalid) return;

        this.formData = new FormData();
        this.formData.append('current', this.current);
        this.formData.append('new_password', this.new_password);

      axios.post('ched_admin/change_password/', this.formData).then(result => {

        if(result.data === 1) {
          $('#current').css('border-color','');
            this.$swal.fire({
              icon: 'success',
              title: 'Nice...',
              text: 'Password Successfully Changed!',
            })
          this.resetForm();
        }

        if(result.data === 0) {
            this.$swal.fire({
              icon: 'error',
              title: 'Opps...',
              text: 'Incorrect Password!',
            })
          $('#current').css('border-color','red');
        }

         
         

      }).catch(error => {
          console.log(error);
      });


     
    },

      resetForm() {
            this.formData = {};
            this.current = '';
            this.new_password = '';
            this.confirmPassword = '';
      },
  },
  async mounted() {

  }

});

Vue.component("ched-eight-user-name", {
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