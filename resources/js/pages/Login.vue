<template>
<div class="container">
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
            const redirectTo = redirect ? redirect.from.name : this.$auth.user().role === 2 ? 'ched_coordinator.dashboard' : this.$auth.user().role === 3 ? 'hei_coordinator.dashboard' :  this.$auth.user().role === 4 ? 'super_admin.dashboard' : 'dashboard'

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

    <div style="margin-top:20px">
         <h2><p style="text-align:center">SCHOLARSHIP APPLICATION</p></h2>
                <!-- MultiStep Form -->
        <div class="row">

            <div class="col-md-12 col-md-offset-3">
                <form id="msform">
                    <!-- progressbar -->
                    <ul id="progressbar">
                        <li class="active">Account Set-up</li>
                        <li>Personal Information</li>
                        <li>Family Background</li> 
                        <li>Preferred School</li>          
                    </ul>
                    <!-- fieldsets -->
                    <fieldset>
                        <h2 class="fs-title">Account Set-up</h2>
                        <h3 class="fs-subtitle">Already a member? <a href="/login">Login</a></h3>
                        <input type="text" name="username" id="username" placeholder="Username"/>
                        <input type="email" name="email" id="email" placeholder="Email"/>
                        <input type="password" name="password" id="password" placeholder="Password"/>
                        <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm Password"/>
                        <input type="button" name="next" class="next action-button" value="Next" style="background-color:#007bff" />
                    </fieldset>
                    <fieldset >
                        <h2 class="fs-title">Personal Information</h2>
                        <h3 class="fs-subtitle">Tell us something more about you</h3>
                          <div class="form-row">
                            <div class="form-group col-md-3">
                              <label style="float:left;font-size:12px;font-weight:bold">Last Name</label>
                              <input type="text" class="form-control" name="lname" id="lname" placeholder="Last name">
                            </div>
                            <div class="form-group col-md-3">
                              <label style="float:left;font-size:12px;font-weight:bold">First Name</label>
                              <input type="text" class="form-control" name="fname" id="fname" placeholder="First name">
                            </div>
                             <div class="form-group col-md-3">
                              <label style="float:left;font-size:12px;font-weight:bold">Middle Name</label>
                              <input type="text" class="form-control" name="mname" id="mname" placeholder="Middle name">
                            </div>
                             <div class="form-group col-md-3">
                              <label style="float:left;font-size:12px;font-weight:bold">Extension Name</label>
                              <input type="text" class="form-control" name="xname" id="xname" placeholder="Extension name">
                            </div>
                          </div>
                         <div class="form-row">
                            <div class="form-group col-md-3">
                              <label style="float:left;font-size:12px;font-weight:bold">Date of Birth</label>
                              <input type="date" class="form-control" id="dateOfbirth">
                            </div>
                            <div class="form-group col-md-3">
                              <label style="float:left;font-size:12px;font-weight:bold">Place of Birth</label>
                              <input type="text" class="form-control" id="placeOfbirth" placeholder="Place of birth">
                            </div>
                           <div class="form-group col-md-3">
                              <label style="float:left;font-size:12px;font-weight:bold">Sex</label>
                              <select id="sex" name="sex" class="form-control">
                                <option selected>Choose...</option>
                                <option>...</option>
                              </select>
                            </div>
                            <div class="form-group col-md-3">
                              <label style="float:left;font-size:12px;font-weight:bold">Civil Status</label>
                              <select id="civil_status" name="civil_status" class="form-control">
                                <option selected>Choose...</option>
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
                              <label style="float:left;font-size:12px;font-weight:bold">Citizenship</label>
                              <select id="citizenship" name="citizenship" class="form-control">
                                <option selected>Choose...</option>
                                <option value="1">Filipino</option>
                                <option value="2">American</option>
                              </select>
                            </div>
                            <div class="form-group col-md-3">
                              <label style="float:left;font-size:12px;font-weight:bold">Mobile Number</label>
                              <input type="text" class="form-control" id="mobile_number" name="mobile_number" placeholder="+6300...">
                            </div>
                             <div class="form-group col-md-3">
                              <label style="float:left;font-size:12px;font-weight:bold">E-mail Address</label>
                              <input type="text" class="form-control" id="email_address" name="email_address" placeholder="johndoe@test.com">
                            </div>
                             <div class="form-group col-md-3">
                              <label style="float:left;font-size:12px;font-weight:bold">Present Address</label>
                              <input type="text" class="form-control" id="present_address" name="present_address" placeholder="P-7 Ampayon...">
                            </div>
                          </div>
                        <div class="form-row">
                            <div class="form-group col-md-3">
                              <label style="float:left;font-size:12px;font-weight:bold">City</label>
                              <select id="city" name="city" class="form-control">
                                <option selected>Choose...</option>
                                <option>...</option>
                              </select>
                            </div>
                            <div class="form-group col-md-3">
                              <label style="float:left;font-size:12px;font-weight:bold">Barangay</label>
                              <select id="barangay" name="barangay" class="form-control">
                                <option selected>Choose...</option>
                                <option>...</option>
                              </select>
                            </div>
                           <div class="form-group col-md-3">
                              <label style="float:left;font-size:12px;font-weight:bold">Province</label>
                              <select id="province" name="province" class="form-control">
                                <option selected>Choose...</option>
                                <option>...</option>
                              </select>
                            </div>
                            <div class="form-group col-md-3">
                              <label style="float:left;font-size:12px;font-weight:bold">Zip Code</label>
                              <input type="text" class="form-control" id="zip_code" name="zip_code" placeholder="Zip Code">
                            </div>
                          </div>
                          <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
                          <input type="button" name="next" class="next action-button" value="Next" style="background-color:#007bff" />
                    </fieldset>
                    <fieldset class="fieldset2">
                        <h2 class="fs-title">Family Backgound</h2>
                        <h3 class="fs-subtitle">Tell us something more about your family</h3>
                          <div class="form-row">
                            <div class="form-group col-md-3">
                              <label style="float:left;font-size:12px;font-weight:bold">Father Last Name </label>
                              <input type="text" class="form-control" id="flname" name="flname" placeholder="Last Name">
                            </div>
                            <div class="form-group col-md-3">
                              <label style="float:left;font-size:12px;font-weight:bold">Father First Name </label>
                              <input type="text" class="form-control" id="ffname" name="ffname" placeholder="First Name">
                            </div>
                             <div class="form-group col-md-3">
                              <label style="float:left;font-size:12px;font-weight:bold">Father Middle Name </label>
                              <input type="text" class="form-control" id="fmname" name="fmname" placeholder="Middle Name">
                            </div>
                             <div class="form-group col-md-3">
                              <label style="float:left;font-size:12px;font-weight:bold">Father Extension Name </label>
                              <input type="text" class="form-control" id="fxname" name="fxname" placeholder="Extension Name">
                            </div>
                          </div>
                         <div class="form-row">
                            <div class="form-group col-md-3">
                              <label style="float:left;font-size:12px;font-weight:bold">Mother Last Name </label>
                              <input type="text" class="form-control" id="mlname" name="mlname" placeholder="Last Name">
                            </div>
                            <div class="form-group col-md-3">
                              <label style="float:left;font-size:12px;font-weight:bold">Mother First Name </label>
                              <input type="text" class="form-control" id="mfname" name="mfname" placeholder="First Name">
                            </div>
                             <div class="form-group col-md-3">
                              <label style="float:left;font-size:12px;font-weight:bold">Mother Middle Name </label>
                              <input type="text" class="form-control" id="mmname" name="mmname" placeholder="Middle Name">
                            </div>
                             <div class="form-group col-md-3">
                              <label style="float:left;font-size:12px;font-weight:bold">Mother Extension Name </label>
                              <input type="text" class="form-control" id="mxname" name="mxname" placeholder="Extension Name">
                            </div>
                          </div>
                          <div class="form-row">
                            <div class="form-group col-md-3">
                              <label style="float:left;font-size:12px;font-weight:bold">Mother Occupation</label>
                              <input type="text" class="form-control" id="moccupation" name="moccupation" placeholder="Occupation">
                            </div>
                            <div class="form-group col-md-3">
                              <label style="float:left;font-size:12px;font-weight:bold">Father Occupation</label>
                              <input type="text" class="form-control" id="foccupation" name="foccupation" placeholder="Occupation">
                            </div>
                            <div class="form-group col-md-3">
                              <label style="float:left;font-size:12px;font-weight:bold">Mother Employer</label>
                              <input type="text" class="form-control" id="memployer" name="memployer" placeholder="Employer">
                            </div>
                            <div class="form-group col-md-3">
                              <label style="float:left;font-size:12px;font-weight:bold">Father Employer</label>
                              <input type="text" class="form-control" id="femployer" name="femployer" placeholder="Employer">
                            </div>
                          </div>
                          <div class="form-row">
                            <div class="form-group col-md-3">
                              <label style="float:left;font-size:12px;font-weight:bold">Mother Contact #</label>
                              <input type="text" class="form-control" id="mcontact" name="mcontact" placeholder="+6300...">
                            </div>
                             <div class="form-group col-md-3">
                              <label style="float:left;font-size:12px;font-weight:bold">Father Contact #</label>
                              <input type="text" class="form-control" id="fcontact" name="fcontact" placeholder="+6300...">
                            </div>
                            <div class="form-group col-md-6">
                              <label style="float:left;font-size:12px;font-weight:bold">No. of Siblings in the family below 18 years old and below</label>
                              <select id="no_of_siblings" name="no_of_siblings" class="form-control">
                                <option selected>Choose...</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                                <option value="11">11</option>
                                <option value="12">12</option>
                              </select>
                            </div>
                          </div>
                        <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
                        <input type="button" name="next" class="next action-button" value="Next" style="background-color:#007bff"/>
                    </fieldset>
                    <fieldset>
                        <h2 class="fs-title">Preferred School</h2>
                        <h3 class="fs-subtitle">Feel free to select your preferred school</h3>
                          <div class="form-row">
                             <div class="form-group col-md-12">
                              <label style="float:left;font-size:12px;font-weight:bold">Name of School Last Attended</label>
                              <input type="text" class="form-control" id="nsla" name="nsla" placeholder="Ex: Caraga State University">
                            </div>   
                           </div>
                           <div class="form-row mt-2">
                            <div class="form-group col-md-12">
                              <label style="float:left;font-size:12px;font-weight:bold">School Intended to enroll or enrolled in:</label>
                              <select id="siteoei" name="siteoei" class="form-control">
                                <option selected>Choose...</option>
                                <option>...</option>
                              </select>
                            </div>
                           </div>
                           <div class="form-row mt-2">
                            <div class="form-group col-md-12">
                              <label style="float:left;font-size:12px;font-weight:bold">Degree Program</label>
                              <select id="degree_program" name="degree_program" class="form-control">
                                <option selected>Choose...</option>
                                <option>...</option>
                              </select>
                            </div>
                           </div>
                           <div class="form-row mt-2 mb-2">
                               <div class="form-group col-md-12">
                                    <p style="text-align:justify;font-size:12px">By clicking "Submit" you agree to the <span style="text-decoration: underline"><a href="/">terms and conditions.</a></span></p>
                                </div>
                            </div>
                        <input type="button" name="previous" class="previous action-button-previous" value="Previous"/>
                        <input type="submit" name="submit" class="submit action-button" value="Submit" style="background-color:#007bff"/>
                    </fieldset>
                </form>
                <!-- link to designify.me code snippets -->
          <!--       <div class="dme_link">
                    <p><a href="http://designify.me/code-snippets-js/" target="_blank">More Code Snippets</a></p>
                </div> -->
                <!-- /.link to designify.me code snippets -->
            </div>
        </div>
        <!-- /.MultiStep Form -->
    </div>