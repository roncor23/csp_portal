<template>
<div class="container" style="margin-top:100px">
    <div class="login">
        <div class="login-screen">
            <div class="app-title">
                <h1>Login</h1>
            </div>
            <div class="alert alert-danger" v-if="has_error">
                <p>Incorrect email or password.</p>
            </div>
                <div class="login-form mb-4">
                    <form autocomplete="off" @submit.prevent="login" method="post">
                        <div class="control-group">
                        <input type="email" class="login-field" placeholder="email" id="email" v-model="email" required>
                        <label class="login-field-icon fui-user" for="login-name"></label>
                        </div>

                        <div class="control-group">
                        <input type="password" class="login-field" placeholder="password" id="password" v-model="password" required>
                        <label class="login-field-icon fui-lock" for="login-pass"></label>
                        </div>

                        <button class="btn btn-primary btn-large btn-block" style="color:#fff" type="submit">login</button>
                        <a class="login-link" href="#">&copy CSP 2019</a>
                    </form>
                </div>
            
        </div>
    </div>
</div>
</template>

<script>
  export default {
    data() {
      return {
        email: null,
        password: null,
        has_error: false
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
        this.$auth.login({
          params: {
            email: app.email,
            password: app.password
          },
          success: function() {
            // handle redirection
            const redirectTo = redirect ? redirect.from.name : this.$auth.user().role === 2 ? 'admin.dashboard' : 'dashboard'

            this.$router.push({name: redirectTo})
          },
          error: function() {
            app.has_error = true
          },
          rememberMe: true,
          fetchUser: true
        })
      }
    }
  }
</script>



<style scoped>

 .login {
margin: 20px auto;
width: 300px;
}
.login-screen {
background-color: #FFF;
padding: 20px;
border-radius: 5px
}

.app-title {
text-align: center;
color: #777;
}

.login-form {
text-align: center;
}
.control-group {
margin-bottom: 10px;
}

input {
text-align: center;
background-color: #ECF0F1;
border: 2px solid transparent;
border-radius: 3px;
font-size: 16px;
font-weight: 200;
padding: 10px 0;
width: 250px;
transition: border .5s;
}

input:focus {
border: 2px solid #3498DB;
box-shadow: none;
}

.btn {
  border: 2px solid transparent;
  background: #3498DB;
  color: #ffffff;
  font-size: 16px;
  line-height: 25px;
  padding: 10px 0;
  text-decoration: none;
  text-shadow: none;
  border-radius: 3px;
  box-shadow: none;
  transition: 0.25s;
  display: block;
  width: 250px;
  margin: 0 auto;
}

.btn:hover {
  background-color: #2980B9;
}

.login-link {
  font-size: 12px;
  color: #444;
  display: block;
    margin-top: 12px;
}
</style>
