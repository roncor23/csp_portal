<template>
  <div class="body">
    <div class="wrapper">
      <div v-if="loading" class="se-pre-con"></div>
      <form class="form-signin" autocomplete="off" @submit.prevent="login" method="post">
          <div class="form-group d-flex justify-content-center" style="padding:10px">
            <img class="logo mr-2" :src="logo">
            <label style="font-size:15px">CHED SCHOLARSHIP PROGRAM</label>
          </div>       
          <div class="alert alert-danger" v-if="has_error">
             <p class="text-center">Incorrect email or password.</p>
          </div>
        <input type="text" class="form-control" name="username" placeholder="Email Address" required="" autofocus="" v-model="email" />
        <input type="password" class="form-control" name="password" placeholder="Password" required="" v-model="password" style="margin:0px" id="myInput"/> 
        <input class="mr-1 mt-3" type="checkbox" @click="showPassword"><span style="font-size:12px">Show Password</span>
        <div class="form-group">
            <small>If you forgot your password you can <router-link to="/forgot-password">reset it</router-link>. For new applicant you can <router-link to="/register">signup</router-link>.</small>   
        </div> 
        <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>  
        <p class="mt-4" style="text-align:center;font-size:12px">&copy; CSP 2020. All Rights Reserved.</p>
      </form>
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

.logo {
    width: 30px;
    height: 30px;
}

.wrapper {
  margin-top: 80px;
  margin-bottom: 80px;
}

.form-signin {
  max-width: 380px;
  padding: 15px 35px 45px;
  margin: 0 auto;
  background-color: #fff;
  border: 1px solid rgba(0, 0, 0, 0.1);
  box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
}
.form-signin .form-signin-heading,
.form-signin .checkbox {
  margin-bottom: 30px;
}
.form-signin .checkbox {
  font-weight: normal;
}
.form-signin .form-control {
  position: relative;
  font-size: 16px;
  height: auto;
  padding: 10px;
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
}
.form-signin .form-control:focus {
  z-index: 2;
}
.form-signin input[type="text"] {
  margin-bottom: -1px;
  border-bottom-left-radius: 0;
  border-bottom-right-radius: 0;
}
.form-signin input[type="password"] {
  margin-bottom: 20px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}
.body {
  height: 100vh;
  border:  1px solid #fff;
  background: linear-gradient(-45deg, #ff4da6, #4dd2ff, #1c3961, #23d5ab);
  background-size: 400% 400%;

}
@keyframes gradient {
  0% {
    background-position: 0% 50%;
  }
  50% {
    background-position: 100% 50%;
  }
  100% {
    background-position: 0% 50%;
  }
}

/* Extra large devices (large laptops and desktops, 1366px and up) */
@media only screen and (max-width: 1366px) {

.body {
  height: 100vh;
  border:  1px solid #fff;
  background: linear-gradient(-45deg, #ff4da6, #4dd2ff, #1c3961, #23d5ab);
  background-size: 400% 400%;

}

@keyframes gradient {
  0% {
    background-position: 0% 50%;
  }
  50% {
    background-position: 100% 50%;
  }
  100% {
    background-position: 0% 50%;
  }
}


}

/* Extra large devices (large laptops and desktops, 1367px and up) */
@media only screen and (min-width: 1367px) {

.body {
  height: 100vh;
  border:  1px solid #fff;
  background: linear-gradient(-45deg, #ff4da6, #4dd2ff, #1c3961, #23d5ab);
  background-size: 400% 400%;
}

@keyframes gradient {
  0% {
    background-position: 0% 50%;
  }
  50% {
    background-position: 100% 50%;
  }
  100% {
    background-position: 0% 50%;
  }
}

}

</style>

<script>
import axios from "axios"

  export default {
    data() {
      return {
        email: null,
        password: null,
        has_error: false,
        slide1: 'image/slide1.png',
        slide2: 'image/slide2.png',
        slide3: 'image/slide3.png',
        logo: 'image/logo.png',
        loading: false
      }
    },

    mounted() {
      //
    },

    methods: {
      login() {
        // get the redirect object
        var redirect = this.$auth.redirect()
        var app = this
        app.loading = true;
        this.$auth.login({
          params: {
            email: app.email,
            password: app.password
          },
          success: function() {
            this.loading = false;
            // handle redirection
            const redirectTo = redirect ? redirect.from.name : this.$auth.user().role === 2 ? 'ched_coordinator.dashboard' : this.$auth.user().role === 3 ? 'hei_coordinator.dashboard' :  this.$auth.user().role === 4 ? 'super_admin.dashboard' :  this.$auth.user().role === 5 ? 'OJT.dashboard' : 'dashboard'

            this.$router.push({name: redirectTo})
          },
          error: function() {
            app.has_error = true
            this.loading = false
          },
          rememberMe: true,
          fetchUser: true
        })
      },
      showPassword() {
      var x = document.getElementById("myInput");
        if (x.type === "password") {
          x.type = "text";
        } else {
          x.type = "password";
        }
      }
    },

  }
</script>