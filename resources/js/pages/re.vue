<template>
    <div class="container">
       <div class="justify-content-center align-items-center row">
        <a href="/"><img class="w3-bar-item" :src="logo" id="logo"></a>
      </div>  
        <div class="justify-content-center align-items-center row" style="margin-top:20px">
            <h1 style="font-size:24px;  letter-spacing: -.5px; color:#696969; margin-top:0">Signup to Senebu</h1>
            <div class="col-lg-12 col-md-12 col-sm-12 justify-content-center align-items-center row">
                <div class="card card-default col-md-3 col-lg-3 col-sm-3 ">
                    <div class="card-body">
                        <div class="alert alert-danger" v-if="has_error && !success">
                            <p v-if="error == 'registration_validation_error'">Error, Incorrect email or password!</p>
                            <p v-else>Error, Incorrect email or password!</p>
                        </div>
                        <form autocomplete="off" @submit.prevent="register" v-if="!success" method="POST">
                            <div class="form-group" v-bind:class="{ 'has-error': has_error && errors.name }">
                                <label for="name" style="font-weight:bold">Username</label>
                                <input type="name" id="name" class="form-control" placeholder="John doe" v-model="name">
                                <span class="help-block" v-if="has_error && errors.name">{{ errors.name }}</span>
                            </div>
                            <div class="form-group" v-bind:class="{ 'has-error': has_error && errors.email }">
                                <label for="email" style="font-weight:bold">E-mail</label>
                                <input type="email" id="email" class="form-control" placeholder="user@example.com" v-model="email">
                                <span class="help-block" v-if="has_error && errors.email">{{ errors.email }}</span>
                            </div>
                            <div class="form-group" v-bind:class="{ 'has-error': has_error && errors.password }">
                                <label for="password" style="font-weight:bold">Password</label>
                                <input type="password" id="password" class="form-control" v-model="password">
                                <span class="help-block" v-if="has_error && errors.password">{{ errors.password }}</span>
                            </div>
                            <div class="form-group" v-bind:class="{ 'has-error': has_error && errors.password }">
                                <label for="password_confirmation" style="font-weight:bold">Confirmation password</label>
                                <input type="password" id="password_confirmation" class="form-control" v-model="password_confirmation">
                            </div>
                            <div class="form-group">
                                <p style="text-align:justify;">By clicking "Sign up" you agree to the <span style="text-decoration: underline"><a href="/">terms of use</a></span> and <span style="text-decoration: underline"><a href="/policies-rules">privacy policy</a></span> from Senebu.</p>
                            </div>
                            <button type="submit" class="btn" style="background-color:#6495ED; color:#fff">Signup</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
  export default {
    data() {
      return {
        name: '',
        name: '',
        email: '',
        password: '',
        password_confirmation: '',
        has_error: false,
        error: '',
        errors: {},
        success: false,
        logo: 'image/logo2_re.png',
      }
    },
    methods: {
      register() {
        var app = this
        this.$auth.register({
          data: {
            name: app.name,
            email: app.email,
            password: app.password,
            password_confirmation: app.password_confirmation
          },
          success: function () {
            app.success = true
            this.$router.push({name: 'login', params: {successRegistrationRedirect: true}})
          },
          error: function (res) {
            console.log(res.response.data.errors)
            app.has_error = true
            app.error = res.response.data.error
            app.errors = res.response.data.errors || {}
          }
        })
      }
    }
  }
</script>