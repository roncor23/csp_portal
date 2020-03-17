<template>
  <div class="body">
    <div >
      <div class="form-group d-flex justify-content-center">
            <h4 style="font-size:20px;color:#fff;text-align:center;padding:14px">Online Application <br><small>Nothing worth having comes easy!</small></h4>
      </div>  
      <div v-if="loading" class="se-pre-con"></div>
      <form-wizard @on-complete="onComplete" shape="circle" color="#2F4F4F">
          <tab-content title="Account Setup" icon="ti-user" :before-change="()=>validateStep('step1')">
              <step1 ref="step1" @on-validate="mergePartialModels"></step1>
          </tab-content>
          <tab-content title="Personal Information" icon="ti-id-badge" :before-change="()=>validateStep('step2')">
              <step2 ref="step2" @on-validate="mergePartialModels"></step2>
          </tab-content>
          <tab-content title="Family Background" icon="ti-view-list" :before-change="()=>validateStep('step3')">
              <step3 ref="step3" @on-validate="mergePartialModels"></step3>
          </tab-content>
          <tab-content title="Preferred School" icon="ti-home" :before-change="()=>validateStep('step4')">
              <step4 ref="step4" @on-validate="mergePartialModels"></step4>
          </tab-content>
          <tab-content title="Marginalized Group" icon="ti-layers-alt" :before-change="()=>validateStep('step5')">
              <step5 ref="step5" @on-validate="mergePartialModels"></step5>
          </tab-content>  
<!--           <tab-content title="Upload Required Documents" icon="ti-upload" :before-change="()=>validateStep('step6')">
              <step6 ref="step6" @on-validate="mergePartialModels"></step6>
          </tab-content>   -->  
      </form-wizard>
    </div>
  </div> 
  <!-- Content -->
<!--   <div class="main">
      <div class="jumbotron">
        <h1 style="color:red">System Maintenance Notice</h1>
        <p>Our system is undergoing a scheduled constructive maintenance to upgrade the system, and will be available on March 13, 2020 / 8:00AM.</p>
        <p>We regret for the inconvenience.</p>
      </div>
      <div class="jumbotron">
        <h1 style="color:red">ATTENTION !</h1>
        <P>Please provide a valid email using <a href="//www.gmail.com" target="_blank">gmail.com</a> or <a href="//www.yahoo.com">yahoo.com</a> before you register for this application to ensure that you will receive a verification code. Thanks!</P>
      </div>
  </div> -->
</template>
<style scoped>

.main {
  position: relative;
  display: block;
  top: 50px;
  left: 0;
  padding: 15px;
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

  .se-pre-con {
    position: fixed;
    left: 0px;
    top: 0px;
    width: 100%;
    height: 100%;
    z-index: 9999;
    background: url(/image/loading.gif) center no-repeat rgba(0, 196, 255, 0.2);
}

/* Extra small devices (phones, 600px and down) */
@media only screen and (max-width: 600px) {
  .body {
    height: 290vh;
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
import Vue from 'vue'
import axios from 'axios'
//local registration
import {FormWizard, TabContent} from '../vue-form-wizard'
import '../vue-form-wizard/dist/vue-form-wizard.min.css'


Vue.use(window.vuelidate.default);
const { required, minLength, maxLength, email, sameAs, numeric, alphaNum, alpha } = window.validators;



Vue.component("step1", {
    template: `<div>
                  <div class="form-row">
                    <div class="form-group col-md-6" v-bind:class="{ 'has-error': $v.userName.$error }">
                      <label >User name</label><span style="color:red">*</span>
                      <input type="text" class="form-control" placeholder="Ex: John" v-model.trim="userName" @input="$v.userName.$touch()">
                      <span class="text-danger" v-if="$v.userName.$error && !$v.userName.required">User name is required</span>
                      <span class="text-danger" v-if="$v.userName.$error && !$v.userName.alpha">Accepts only alphabet characters.</span>
                    </div>
                    <div class="form-group col-md-6" v-bind:class="{ 'has-error': $v.emailAddress.$error }">
                      <label>Email</label> <span style="color:red">*</span>
                      <input type="email" class="form-control" v-model.trim="emailAddress" placeholder="Please provide a valid email address" @input="$v.emailAddress.$touch()">
                      <span class="text-danger" v-if="$v.emailAddress.$error && !$v.emailAddress.required">Email address is required</span>
                      <span class="text-danger" v-if="$v.emailAddress.$error && !$v.emailAddress.email">This is not a valid email!</span>
                    </div>
                  </div>
                  <div class="form-row">
                    <div class="form-group col-md-6" v-bind:class="{ 'has-error': $v.password.$error }">
                      <label>Password</label> <span style="color:red">*</span>
                      <input type="password" class="form-control" placeholder="Password" v-model.trim="password" @input="$v.password.$touch()">
                      <span class="text-danger" v-if="$v.password.$error && !$v.password.required">Password is required</span>
                      <span class="text-danger" v-if="!$v.password.minLength">Password must have at least {{ $v.password.$params.minLength.min }} letters.</span>
                      <span class="text-danger" v-if="!$v.password.alphaNum">Password accept only alpha and numeric.</span> 
                    </div>
                    <div class="form-group col-md-6" v-bind:class="{ 'has-error': $v.confirmPassword.$error }">
                      <label>Confirm password</label><span style="color:red">*</span>
                      <input type="password" class="form-control" placeholder="Confirm Password" v-model.trim="confirmPassword" @input="$v.confirmPassword.$touch()">
                      <span class="text-danger" v-if="!$v.confirmPassword.sameAsPassword">Passwords must be identical.</span>
                    </div>
                  </div>
                   <span class="container" style="font-size:12px">Note: Fields marked with an asterisk (<span style="color:red">*</span>) are required.</span>   
        </div>`,
    data() {
        return {
            userName: "",
            password: "",
            confirmPassword: "",
            emailAddress: "",
            formData: {}
        }
    },
    validations: {
        userName: {
            required,
            alpha
        },
        password: {
            required,
            minLength: minLength(6),
            alphaNum
        },
        confirmPassword: {
            sameAsPassword: sameAs('password')
        },
        emailAddress: {
            required,
            email
        },
        form: ["userName", "emailAddress", "password", "confirmPassword"]
    },
    methods: {
        validate() {
            this.$v.form.$touch();
            var isValid = !this.$v.form.$invalid;
            this.$emit("on-validate", this.$data, isValid);
            return isValid;
        }
    }
});

Vue.component("step2", {
    template: `<div>
          <div class="form-row">
                            <div class="form-group col-md-3" v-bind:class="{ 'has-error': $v.lastName.$error }">
                             <span style="color:red">*</span><label style="float:left;font-size:12px;font-weight:bold">Last Name</label>
                              <input type="text" class="form-control" name="lname" id="lname" placeholder="Last name" v-model.trim="lastName" @input="$v.lastName.$touch()">
                              <span class="text-danger" v-if="$v.lastName.$error && !$v.lastName.required">Last name is required</span>
                            </div>
                            <div class="form-group col-md-3" v-bind:class="{ 'has-error': $v.firstName.$error }">
                              <span style="color:red">*</span><label style="float:left;font-size:12px;font-weight:bold">First Name</label>
                              <input type="text" class="form-control" name="fname" id="fname" placeholder="First name" v-model.trim="firstName" @input="$v.firstName.$touch()">
                              <span class="text-danger" v-if="$v.firstName.$error && !$v.firstName.required">First name is required</span>
                            </div>
                             <div class="form-group col-md-3" v-bind:class="{ 'has-error': $v.middleName.$error }">
                             <label style="float:left;font-size:12px;font-weight:bold">Middle Name</label>
                              <input type="text" class="form-control" name="mname" id="mname" placeholder="Middle name" v-model.trim="middleName" @input="$v.middleName.$touch()">
                              <span class="text-danger" v-if="$v.middleName.$error && !$v.middleName.alpha">Accepts only alphabet characters.</span>
                            </div>
                            <div class="form-group col-md-3" v-bind:class="{ 'has-error': $v.extensionName.$error }">
                              <label style="float:left;font-size:12px;font-weight:bold">Extension Name</label>
                              <input type="text" class="form-control" name="xname" id="xname" placeholder="Extension name" v-model.trim="extensionName" @input="$v.extensionName.$touch()">
                              <span class="text-danger" v-if="!$v.extensionName.minLength">Extension name must have at least {{ $v.extensionName.$params.minLength.min }} letters.</span>
                            </div>
                          </div>
                         <div class="form-row">
                            <div class="form-group col-md-3" v-bind:class="{ 'has-error': $v.dateOfBirth.$error }">
                              <span style="color:red">*</span><label style="float:left;font-size:12px;font-weight:bold">Date of Birth</label>
                              <input type="date" class="form-control" id="dateOfbirth" v-model.trim="dateOfBirth" @input="$v.dateOfBirth.$touch()">
                              <span class="text-danger" v-if="$v.dateOfBirth.$error && !$v.dateOfBirth.required">Date of birth is required</span>
                            </div>
                            <div class="form-group col-md-3" v-bind:class="{ 'has-error': $v.placeOfBirth.$error }">
                              <span style="color:red">*</span><label style="float:left;font-size:12px;font-weight:bold">Place of Birth</label>
                              <input type="text" class="form-control" id="placeOfbirth" placeholder="Ex: Butuan City" v-model.trim="placeOfBirth" @input="$v.placeOfBirth.$touch()">
                               <span class="text-danger" v-if="$v.placeOfBirth.$error && !$v.placeOfBirth.required">Place of birth is required</span>
                            </div>
                           <div class="form-group col-md-3" v-bind:class="{ 'has-error': $v.sex.$error }">
                              <span style="color:red">*</span><label style="float:left;font-size:12px;font-weight:bold">Gender</label>
                              <select id="sex" name="sex" class="form-control" v-model.trim="sex" @input="$v.sex.$touch()">
                                <option value="1">Male</option>
                                <option value="2">Female</option>
                              </select>
                              <span class="text-danger" v-if="$v.sex.$error && !$v.sex.required">Sex is required</span>
                            </div>
                            <div class="form-group col-md-3" v-bind:class="{ 'has-error': $v.civilStatus.$error }">
                              <span style="color:red">*</span><label style="float:left;font-size:12px;font-weight:bold">Civil Status</label>
                              <select id="civil_status" name="civil_status" class="form-control" v-model.trim="civilStatus" @input="$v.civilStatus.$touch()">
                                <option value="1">Single</option>
                                <option value="2">Married</option>
                                <option value="3">Separated</option>
                                <option value="5">Widowed</option>
                              </select>
                              <span class="text-danger" v-if="$v.civilStatus.$error && !$v.civilStatus.required">Civil status is required</span>
                            </div>
                          </div>
                          <div class="form-row">
                            <div class="form-group col-md-3" v-bind:class="{ 'has-error': $v.citizenship.$error }">
                              <span style="color:red">*</span><label style="float:left;font-size:12px;font-weight:bold">Citizenship</label>
                              <select id="citizenship" name="citizenship" class="form-control" v-model.trim="citizenship" @input="$v.citizenship.$touch()">
                                <option value="1">Filipino</option>
                              </select>
                              <span class="text-danger" v-if="$v.citizenship.$error && !$v.citizenship.required">Citizenship is required</span>
                            </div>
                            <div class="form-group col-md-3" v-bind:class="{ 'has-error': $v.mobileNumber.$error }">
                              <span style="color:red">*</span><label style="float:left;font-size:12px;font-weight:bold">Mobile Number</label>
                              <input type="text" class="form-control" id="mobile_number" name="mobile_number" placeholder="Ex: 0900..." v-model.trim="mobileNumber" @input="$v.mobileNumber.$touch()">
                              <span class="text-danger" v-if="$v.mobileNumber.$error && !$v.mobileNumber.required">Mobile number is required.</span>
                              <span class="text-danger" v-if="$v.mobileNumber.$error && !$v.mobileNumber.numeric">Accepts only numerics.</span>
                              <span class="text-danger" v-if="!$v.mobileNumber.minLength">Mobile number must have at least {{ $v.mobileNumber.$params.minLength.min }} numbers.</span>
                              <span class="text-danger" v-if="!$v.mobileNumber.maxLength">Mobile number must have maximum of{{ $v.mobileNumber.$params.maxLength.max }} numbers.</span>
                            </div>
                             <div class="form-group col-md-3" v-bind:class="{ 'has-error': $v.presentAddress.$error }">
                              <span style="color:red">*</span><label style="float:left;font-size:12px;font-weight:bold">Present Address</label>
                              <input type="text" class="form-control" id="present_address" name="present_address" placeholder="Ex: P-7 Ampayon..." v-model.trim="presentAddress" @input="$v.presentAddress.$touch()">
                              <span class="text-danger" v-if="$v.presentAddress.$error && !$v.presentAddress.required">Present address is required</span>
                            </div>
                            <div class="form-group col-md-3" v-bind:class="{ 'has-error': $v.city.$error }">
                              <span style="color:red">*</span><label style="float:left;font-size:12px;font-weight:bold">City</label>
                              <select id="city" name="city" class="form-control" v-model.trim="city" @input="$v.city.$touch()">
                                <option v-for="city in citys" v-bind:value="city.city_id">{{ city.mun_city_name }}</option>
                              </select>
                              <span class="text-danger" v-if="$v.city.$error && !$v.city.required">City is required</span>
                            </div>
                          </div>

                        <div class="form-row">

                            <div class="form-group col-md-3" v-bind:class="{ 'has-error': $v.barangay.$error }">
                              <span style="color:red">*</span><label style="float:left;font-size:12px;font-weight:bold">Barangay</label>
                              <select id="barangay" name="barangay" class="form-control" v-model.trim="barangay" @input="$v.barangay.$touch()">
                                <option v-for="brgy in brgys" v-bind:value="brgy.brgy_id">{{ brgy.name }}</option>
                              </select>
                              <span class="text-danger" v-if="$v.barangay.$error && !$v.barangay.required">Barangay is required</span>
                            </div>
                           <div class="form-group col-md-3" v-bind:class="{ 'has-error': $v.province.$error }">
                              <span style="color:red">*</span><label style="float:left;font-size:12px;font-weight:bold">Province</label>
                              <select id="province" name="province" class="form-control" v-model.trim="province" @input="$v.province.$touch()">                            
                                <option v-for="province in provinces" v-bind:value="province.province_id">{{ province.prov_name }}</option>
                              </select>
                              <span class="text-danger" v-if="$v.province.$error && !$v.province.required">Province is required</span>
                            </div>
                            <div class="form-group col-md-3" v-bind:class="{ 'has-error': $v.zipcode.$error }">
                              <span style="color:red">*</span><label style="float:left;font-size:12px;font-weight:bold">Zip Code</label>
                              <input type="text" class="form-control" id="zip_code" name="zip_code" placeholder="Ex: 8600" v-model.trim="zipcode" @input="$v.zipcode.$touch()">
                              <span class="text-danger" v-if="$v.zipcode.$error && !$v.zipcode.required">zipcode is required</span>
                              <span class="text-danger" v-if="$v.zipcode.$error && !$v.zipcode.numeric">Accepts only numerics.</span>
                            </div>
                            <div class="form-group col-md-3" v-bind:class="{ 'has-error': $v.fb_url.$error }">
                              <span style="color:red">*</span><label style="float:left;font-size:12px;font-weight:bold">Facebook profile</label>
                              <input type="text" class="form-control" id="fb_url" name="fb" placeholder="Ex: www.facebook.com/john_doe" v-model.trim="fb_url" @input="$v.fb_url.$touch()">
                              <span class="text-danger" v-if="$v.fb_url.$error && !$v.fb_url.required">Facebook profile is required</span>
                            </div>   
                          </div>
                           <span class="container" style="font-size:12px">Note: Fields marked with an asterisk (<span style="color:red">*</span>) are required.</span>   
        </div>`,
    data() {
        return {
            lastName: "",
            firstName: "",
            middleName: "",
            extensionName: "",
            dateOfBirth: "",
            placeOfBirth: "", 
            sex: "",
            civilStatus: "",
            citizenship: "",
            mobileNumber: "",
            presentAddress: "",
            city: "",
            barangay: "",
            province: "",
            zipcode: "",
            fb_url: "",
            provinces: {},
            citys: {},
            brgys: {}
        }
    },
    validations: {
          lastName: {
            required
        },
          firstName: {
            required
        },
          middleName: {
            alpha
        },
        extensionName: {
            minLength: minLength(2)
        },
          dateOfBirth: {
            required
        },
          placeOfBirth: {
            required
        },
          sex: {
            required
        },
          civilStatus: {
            required
        },
          citizenship: {
            required
        },
          mobileNumber: {
            required,
            numeric,
            minLength: minLength(11),
            maxLength: maxLength(11),
        },
          presentAddress: {
            required
        },
          city: {
            required
        },
          barangay: {
            required
        },
          province: {
            required
        },
          zipcode: {
            required,
            numeric
        },
          fb_url: {
            required,
        },
        form: ["lastName","firstName","dateOfBirth","placeOfBirth","sex","civilStatus","citizenship","mobileNumber","presentAddress","city","barangay","province","zipcode", "fb_url"]
    },
    methods: {
        validate() {
            this.$v.form.$touch();
            var isValid = !this.$v.form.$invalid;
            this.$emit("on-validate", this.$data, isValid);
            return isValid;
        },
        fetchProvince() {
            axios.get('fetch/province/').then(result => {

                this.provinces = result.data;

            }).catch(error => {
                console.log(error);
            });
        },
        fetchCity() {
            axios.get('fetch/city/').then(result => {

                this.citys = result.data;

            }).catch(error => {
                console.log(error);
            });
        },
        fetchBrgy() {
            axios.get('fetch/brgy/').then(result => {

                this.brgys = result.data;

            }).catch(error => {
                console.log(error);
            });
        }

    },
    async mounted() {
        this.fetchCity();
        this.fetchBrgy();
        this.fetchProvince();
    }
});

Vue.component("step3", {
    template: `<div>
                  <div class="form-row">
                      <div class="form-group col-md-3" v-bind:class="{ 'has-error': $v.fatherLastName.$error }">
                        <label style="float:left;font-size:12px;font-weight:bold">Father's Last Name </label>
                        <input type="text" class="form-control" id="flname" name="flname" placeholder="Last Name" v-model.trim="fatherLastName" @input="$v.fatherLastName.$touch()">
                        <span class="text-danger" v-if="$v.fatherLastName.$error && !$v.fatherLastName.alpha">Accepts only alphabet characters.</span>
                      </div>
                      <div class="form-group col-md-3" v-bind:class="{ 'has-error': $v.fatherFirstName.$error }">
                        <label style="float:left;font-size:12px;font-weight:bold">Father's First Name </label>
                        <input type="text" class="form-control" placeholder="First Name" v-model.trim="fatherFirstName" @input="$v.fatherFirstName.$touch()">
                         <span class="text-danger" v-if="$v.fatherFirstName.$error && !$v.fatherFirstName.alpha">Accepts only alphabet characters.</span>
                      </div>
                      <div class="form-group col-md-3" v-bind:class="{ 'has-error': $v.fatherMiddleName.$error }">
                        <label style="float:left;font-size:12px;font-weight:bold">Father's Middle Name </label>
                        <input type="text" class="form-control" placeholder="Middle Name" v-model.trim="fatherMiddleName" @input="$v.fatherMiddleName.$touch()">
                         <span class="text-danger" v-if="$v.fatherMiddleName.$error && !$v.fatherMiddleName.alpha">Accepts only alphabet characters.</span>
                      </div>
                      <div class="form-group col-md-3" v-bind:class="{ 'has-error': $v.fatherExtensionName.$error }">
                        <label style="float:left;font-size:12px;font-weight:bold">Father's Name Extension </label>
                        <input type="text" class="form-control" placeholder="Extension Name" v-model.trim="fatherExtensionName" @input="$v.fatherExtensionName.$touch()">
                         <span class="text-danger" v-if="$v.fatherExtensionName.$error && !$v.fatherExtensionName.alpha">Accepts only alphabet characters.</span>
                         <span class="text-danger" v-if="!$v.fatherExtensionName.minLength">Extension name must have at least {{ $v.fatherExtensionName.$params.minLength.min }} letters.</span>
                      </div>
                    </div>

                    <div class="form-row">

                      <div class="form-group col-md-3">
                        <label style="float:left;font-size:12px;font-weight:bold">Father's Occupation</label>
                        <input type="text" class="form-control" placeholder="Ex: Farmer" v-model.trim="fatherOccupation">
                      </div>
                      <div class="form-group col-md-3">
                        <label style="float:left;font-size:12px;font-weight:bold">Father's Employer </label>
                        <input type="text" class="form-control" placeholder="Employer" v-model.trim="fatherEmployer">
                      </div>
                      <div class="form-group col-md-3" v-bind:class="{ 'has-error': $v.fatherContact.$error }">
                          <label style="float:left;font-size:12px;font-weight:bold">Father's Contact #</label>
                          <input type="text" class="form-control"  placeholder="Ex: 0900..." v-model.trim="fatherContact" @input="$v.fatherContact.$touch()">
                           <span class="text-danger" v-if="$v.fatherContact.$error && !$v.fatherContact.numeric">Accepts only numbers.</span>
                            <span class="text-danger" v-if="!$v.fatherContact.minLength">Mobile number must have at least {{ $v.fatherContact.$params.minLength.min }} numbers.</span>
                            <span class="text-danger" v-if="!$v.fatherContact.maxLength">Mobile number must have maximum of{{ $v.fatherContact.$params.maxLength.max }} numbers.</span>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-3" v-bind:class="{ 'has-error': $v.motherLastName.$error }">
                        <label style="float:left;font-size:12px;font-weight:bold">Mother's Last Name </label>
                        <input type="text" class="form-control" placeholder="Last Name" v-model.trim="motherLastName" @input="$v.motherLastName.$touch()">
                         <span class="text-danger" v-if="$v.motherLastName.$error && !$v.motherLastName.alpha">Accepts only alphabet characters.</span>
                      </div>
                      <div class="form-group col-md-3" v-bind:class="{ 'has-error': $v.motherFirstName.$error }">
                        <label style="float:left;font-size:12px;font-weight:bold">Mother's First Name </label>
                        <input type="text" class="form-control" placeholder="First Name" v-model.trim="motherFirstName" @input="$v.motherFirstName.$touch()">
                         <span class="text-danger" v-if="$v.motherFirstName.$error && !$v.motherFirstName.alpha">Accepts only alphabet characters.</span>
                      </div>
                      <div class="form-group col-md-3" v-bind:class="{ 'has-error': $v.motherMiddleName.$error }">
                        <label style="float:left;font-size:12px;font-weight:bold">Mother's Middle Name </label>
                        <input type="text" class="form-control" placeholder="Middle Name" v-model.trim="motherMiddleName" @input="$v.motherMiddleName.$touch()">
                         <span class="text-danger" v-if="$v.motherMiddleName.$error && !$v.motherMiddleName.alpha">Accepts only alphabet characters.</span>
                      </div>
                      <div class="form-group col-md-3" v-bind:class="{ 'has-error': $v.motherExtensionName.$error }">
                        <label style="float:left;font-size:12px;font-weight:bold">Mother's Name Extension </label>
                        <input type="text" class="form-control" placeholder="Extension Name" v-model.trim="motherExtensionName" @input="$v.motherExtensionName.$touch()">
                         <span class="text-danger" v-if="$v.motherExtensionName.$error && !$v.motherExtensionName.alpha">Accepts only alphabet characters.</span>
                          <span class="text-danger" v-if="!$v.motherExtensionName.minLength">Extension name must have at least {{ $v.motherExtensionName.$params.minLength.min }} letters.</span>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-3">
                        <label style="float:left;font-size:12px;font-weight:bold">Mother's Occupation </label>
                        <input type="text" class="form-control" placeholder="Ex: Farmer" v-model.trim="motherOccupation">
                      </div>
                      <div class="form-group col-md-3">
                        <label style="float:left;font-size:12px;font-weight:bold">Mother's Employer </label>
                        <input type="text" class="form-control" placeholder="Employer" v-model.trim="motherEmployer">
                      </div>
                      <div class="form-group col-md-3" v-bind:class="{ 'has-error': $v.motherContact.$error }">
                          <label style="float:left;font-size:12px;font-weight:bold">Mother's Contact #</label>
                          <input type="text" class="form-control" placeholder="Ex: 0900..." v-model.trim="motherContact" @input="$v.motherContact.$touch()">
                           <span class="text-danger" v-if="$v.motherContact.$error && !$v.motherContact.numeric">Accepts only numbers.</span>
                           <span class="text-danger" v-if="!$v.motherContact.minLength">Mobile number must have at least {{ $v.motherContact.$params.minLength.min }} numbers.</span>
                            <span class="text-danger" v-if="!$v.motherContact.maxLength">Mobile number must have maximum of{{ $v.motherContact.$params.maxLength.max }} numbers.</span>
                      </div>
                      <div class="form-group col-md-3" v-bind:class="{ 'has-error': $v.sibblings.$error }" >
                          <span style="color:red">*</span><label style="float:left;font-size:12px;font-weight:bold">No. of Siblings in the family below 18 years old</label>
                          <select id="no_of_siblings" name="no_of_siblings" class="form-control" v-model="sibblings" @input="$v.sibblings.$touch()">
                            <option value="0">0</option>
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
                          <span class="text-danger" v-if="$v.sibblings.$error && !$v.sibblings.required">Number of sibblings is required</span>
                        </div>  
                    </div>                             
                  <span class="container" style="font-size:12px">Note: Fields marked with an asterisk (<span style="color:red">*</span>) are required.</span>          
                </div>

        </div>`,
    data() {
        return {
            fatherLastName: "",
            fatherFirstName: "",
            fatherMiddleName: "",
            fatherExtensionName: "",
            motherLastName: "",
            motherFirstName: "",
            motherMiddleName: "",
            motherExtensionName: "",
            fatherOccupation: "",
            motherOccupation: "",
            fatherEmployer: "",
            motherEmployer: "",
            fatherContact: "",
            motherContact: "",
            sibblings: ""
        }
    },
    validations: {
        fatherLastName: {

        },
          fatherFirstName: {

        },
          fatherMiddleName: {

        },
          fatherExtensionName: {
            minLength: minLength(2)
        },
          motherLastName: {
        },
          motherFirstName: {
        },
          motherMiddleName: {
        },
          motherExtensionName: {
            minLength: minLength(2)
        },
        motherEmployer: {
        },
        fatherEmployer: {
        },
          motherContact: {
            numeric,
            minLength: minLength(11),
            maxLength: maxLength(11)       
        },
          fatherContact: {
            numeric,
            minLength: minLength(11),
            maxLength: maxLength(11) 
        },
          sibblings: {
            required
        },
        form: ["fatherLastName","fatherFirstName","fatherMiddleName","fatherExtensionName","motherLastName","motherFirstName","motherMiddleName","motherExtensionName","motherContact","fatherContact","fatherEmployer","motherEmployer","sibblings"]
    },
    methods: {
        validate() {
            this.$v.form.$touch();
            var isValid = !this.$v.form.$invalid;
            this.$emit("on-validate", this.$data, isValid);
            return isValid;
        }
    }
});

Vue.component("step4", {
    template: `<div>
                      <div class="form-row">
                          <div class="form-group col-md-6" v-bind:class="{ 'has-error': $v.applicant_type.$error }">
                              <span style="color:red">*</span><label style="float:left;font-size:12px;font-weight:bold">Applicant Type</label>
                              <select id="applicant_type" name="applicant_type" class="form-control" v-model.trim="applicant_type" @input="$v.applicant_type.$touch()">
                                <option value="1">Incoming College Freshman</option>
                                <option value="3">College Earned Units</option>
                                <option value="4">ALS passer</option>
                                <option value="5">PEPT passer</option>
                              </select>
                              <span class="text-danger" v-if="$v.applicant_type.$error && !$v.applicant_type.required">Applicant type is required</span>
                          </div>
                         <div class="form-group col-md-6" v-bind:class="{ 'has-error': $v.schoolLastAttended.$error }">
                          <span style="color:red">*</span><label style="float:left;font-size:12px;font-weight:bold">Name of School Last Attended</label>
                          <input type="text" class="form-control" id="nsla" name="nsla" placeholder="Ex: Caraga State University" v-model.trim="schoolLastAttended" @input="$v.schoolLastAttended.$touch()">
                          <span class="text-danger" v-if="$v.schoolLastAttended.$error && !$v.schoolLastAttended.required">Name of School Last Attended is required</span>
                          <span class="text-danger" v-if="!$v.schoolLastAttended.minLength">Name of School Last Attended must have at least {{ $v.schoolLastAttended.$params.minLength.min }} letters.</span>
                        </div>   
                       </div>
                       <div class="form-row mt-2">
                        <div class="form-group col-md-6" v-bind:class="{ 'has-error': $v.schoolPreferred.$error }">
                          <span style="color:red">*</span><label style="float:left;font-size:12px;font-weight:bold">School Intended to enroll or enrolled in</label>
                          <select id="siteoei" name="siteoei" class="form-control" v-model.trim="schoolPreferred" @input="$v.schoolPreferred.$touch()">
                            <option v-for="hei in heis" v-bind:value="hei.hei_id">{{ hei.hei_name }}</option>
                          </select>
                          <span class="text-danger" v-if="$v.schoolPreferred.$error && !$v.schoolPreferred.alpha">Accepts only alphabet characters.</span>
                          <span class="text-danger" v-if="$v.schoolPreferred.$error && !$v.schoolPreferred.required">Name of School Preferred is required</span>
                        </div>
                        <div class="form-group col-md-6" v-bind:class="{ 'has-error': $v.degreeProgram.$error }">
                          <span style="color:red">*</span><label style="float:left;font-size:12px;font-weight:bold">Degree Program</label>
                          <select id="degree_program" name="degree_program" class="form-control" v-model.trim="degreeProgram" @input="$v.degreeProgram.$touch()">
                            <option v-for="program in programs" v-bind:value="program.course_id">{{ program.course_name }}</option>
                          </select>
                          <span class="text-danger" v-if="$v.degreeProgram.$error && !$v.degreeProgram.required">Degree Program is required</span>
                        </div>
                       </div>

                        <div class="form-row mt-2 mb-2">
                            <div class="form-group col-md-4">
                              <span class="container" style="font-size:12px">Note: Fields marked with an asterisk (<span style="color:red">*</span>) are required.</span>
                            </div>
                        </div>

        </div>`,
    data() {
        return {
            schoolLastAttended: "",
            schoolPreferred: "",
            degreeProgram: "",
            applicant_type: "",
            heis: {},
            programs: {}
        }
    },
    validations: {
        schoolLastAttended: {
            required,
            minLength: minLength(10)
        },
        schoolPreferred: {
            required
        },
        degreeProgram: {
            required

        },
        applicant_type: {
            required
        },

        form: ["schoolLastAttended", "schoolPreferred", "degreeProgram", "applicant_type"]
    },
    methods: {
        validate() {
            this.$v.form.$touch();
            var isValid = !this.$v.form.$invalid;
            this.$emit("on-validate", this.$data, isValid);
            return isValid;
        },
        fetchHei() {
            axios.get('fetch/hei/').then(result => {

                this.heis = result.data;

            }).catch(error => {
                console.log(error);
            });
        },
        fetchProgram() {
            axios.get('fetch/program/').then(result => {

                this.programs = result.data;

            }).catch(error => {
                console.log(error);
            });
        },
    },
    async mounted() {
        this.fetchHei();
        this.fetchProgram();
    }
});

Vue.component("step5", {
    template: `<div>
                      <div class="form-row">
                          <div class="form-group col-md-6" v-bind:class="{ 'has-error': $v.ips.$error }">
                              <span style="color:red">*</span><label style="float:left;font-size:12px;font-weight:bold">Indigenous Peoples (IP)</label><span v-if="ips == 1" style="color:#fff;font-size:14px; float:right">Note: Submit certification or valid I.D</span>
                              <select class="form-control" v-model.trim="ips" @input="$v.ips.$touch()">
                                <option value="1">Yes</option>
                                <option value="2">No</option>
                              </select>
                              <span class="text-danger" v-if="$v.ips.$error && !$v.ips.required">Indigenous Peoples is required</span>
                          </div>
                          <div class="form-group col-md-6" v-bind:class="{ 'has-error': $v.a_solo_parent.$error }">
                              <span style="color:red">*</span><label style="float:left;font-size:12px;font-weight:bold">Solo Parent</label><span v-if="a_solo_parent == 1" style="color:#fff;font-size:14px; float:right">Note: Submit certification or valid I.D</span>
                              <select class="form-control" v-model.trim="a_solo_parent" @input="$v.a_solo_parent.$touch()">
                                <option value="1">Yes</option>
                                <option value="2">No</option>
                              </select>
                              <span class="text-danger" v-if="$v.a_solo_parent.$error && !$v.a_solo_parent.required">Solo Parent is required</span>
                          </div>
                        </div>
                        <div class="form-row">
                          <div class="form-group col-md-6" v-bind:class="{ 'has-error': $v.senior_citizen.$error }">
                              <span style="color:red">*</span><label style="float:left;font-size:12px;font-weight:bold">Dependent of a Senior Citizen</label><span v-if="senior_citizen == 1" style="color:#fff;font-size:14px; float:right">Note: Submit certification or valid I.D</span>
                              <select class="form-control" v-model.trim="senior_citizen" @input="$v.senior_citizen.$touch()">
                                <option value="1">Yes</option>
                                <option value="2">No</option>
                              </select>
                              <span class="text-danger" v-if="$v.senior_citizen.$error && !$v.senior_citizen.required">Dependent of a Senior Citizen is required</span>
                          </div>
                          <div class="form-group col-md-6" v-bind:class="{ 'has-error': $v.pwd.$error }">
                              <span style="color:red">*</span><label style="float:left;font-size:12px;font-weight:bold">Person with Disability (PWD)</label><span v-if="pwd == 1" style="color:#fff;font-size:14px; float:right">Note: Submit certification or valid I.D</span>
                              <select class="form-control" v-model.trim="pwd" @input="$v.pwd.$touch()">
                                <option value="1">Yes</option>
                                <option value="2">No</option>
                              </select>
                              <span class="text-danger" v-if="$v.pwd.$error && !$v.pwd.required">Persons with Disability is required</span>
                          </div>
                        </div>
                        <div class="form-row">

                          <div class="form-group col-md-6" v-bind:class="{ 'has-error': $v.solo_parent.$error }">
                              <span style="color:red">*</span><label style="float:left;font-size:12px;font-weight:bold">Dependent of a Solo Parent</label><span v-if="solo_parent == 1" style="color:#fff;font-size:14px; float:right">Note: Submit certification or valid I.D</span>
                              <select class="form-control" v-model.trim="solo_parent" @input="$v.solo_parent.$touch()">
                                <option value="1">Yes</option>
                                <option value="2">No</option>
                              </select>
                              <span class="text-danger" v-if="$v.solo_parent.$error && !$v.solo_parent.required">Dependent of a Solo Parent is required</span>
                          </div>
                        
                       </div>


                       <div class="form-row mt-2 mb-2">
                            <div class="form-group col-md-6">
                                <p style="text-align:justify;font-size:12px">Submit the following documents to validate your application. <span style="text-decoration: underline"><a href="#" data-toggle="modal" data-target="#required_documents" style="color:#fff">click here</a></span></p>
                                 <p style="text-align:justify;font-size:12px">By clicking "Submit" you agree to the <span style="text-decoration: underline"><a href="#" data-toggle="modal" data-target="#terms_condition" style="color:#fff">terms and conditions.</a></span></p>       
                            </div>
                            <div class="form-group col-md-6">
                              <span class="container" style="font-size:12px">Note: Fields marked with an asterisk (<span style="color:red">*</span>) are required.</span>
                            </div>

                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="required_documents" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Required Documents</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <ul>
                                  <li>Application Form with signature and 1 pc 2x2 picture</li>
                                  <li>Certified true copy of birth certificate</li>
                                  <li>Academic requirements (any of the following)
                                    <ul>
                                        <li>High school report card for incoming freshmen students eligible for college</li>
                                        <li>Certified true copy of grades for Grade 11 and 1st semester of Grade 12 for graduating high school students</li>
                                    </ul>
                                  </li>
                                  <li>Income requirements (any of the following)
                                    <ul>
                                      <li>Latest Income Tax Return of parents/guardian</li>
                                      <li>Certificate of Tax Exemption from the BIR</li>
                                      <li>Certificate of Indigency from their Barangay</li>
                                      <li>Certificate / Case Study from DSWD</li>
                                      <li>Latest copy of contract or proof of income for children of OFW and seafarers</li>
                                    </ul>
                                  </li>
                                </ul>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              </div>
                            </div>
                          </div>
                        </div>

                        <!-- Modal -->
                        <div class="modal fade" id="terms_condition" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLongTitle">Terms & Conditions</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <p style="text-align:justify">I hereby certify that foregoing statements are true and correct. Any misinformation or witholding of information will automatically disqualify me from the CHED Scholarship Program. I am willing to refund the financial benefits receive if such information is discovered after acceptance of the award.

                                I hereby express my consent for the Commission on Higher Education to collect, record, organize, update or modify, retrieve, consult, use, consolidate, block, erase or destruct my personal data as part of my information. I hereby affirm my right to be informed, object to processing, access, and  rectify, suspend or withdraw my personal data and be indemnified in case of damages pursuant to the provisions of the Republic Act No.10173 of the Philippines, Data Privacy Act of 2012 and its corresponding Implementing Rules and Regulations.   
                                </p>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                              </div>
                            </div>
                          </div>
                        </div>
        </div>`,
    data() {
        return {
            pwd: "",
            ips: "",
            senior_citizen: "",
            solo_parent: "",
            a_solo_parent: ""
        }
    },
    validations: {
        pwd: {
            required
        },
        ips: {
            required
        },
        senior_citizen: {
            required
        },
        solo_parent: {
            required
        },
        a_solo_parent: {
            required
        },

        form: ["pwd", "ips","senior_citizen","a_solo_parent", "solo_parent"]
    },
    methods: {
        validate() {
            this.$v.form.$touch();
            var isValid = !this.$v.form.$invalid;
            this.$emit("on-validate", this.$data, isValid);
            return isValid;
        },
        fetchHei() {
            axios.get('fetch/hei/').then(result => {

                this.heis = result.data;

            }).catch(error => {
                console.log(error);
            });
        },
        fetchProgram() {
            axios.get('fetch/program/').then(result => {

                this.programs = result.data;

            }).catch(error => {
                console.log(error);
            });
        },
    },
    async mounted() {
        this.fetchHei();
        this.fetchProgram();
    }
});

// Vue.component("step6", {
//     template: `<div>
                  // <div class="form-row">
                  //   <div class="form-group col-md-6" >
                  //     <label >Birth certificate (Certified true copy)</label><span style="color:red">*</span>
                  //     <span v-if="valid_birth_certificate" style="color:#fff;font-size:14px; float:right">Valid file.</span>  
                  //     <span v-if="invalid_birth_certificate" style="color:red;font-size:14px; float:right">Invalid file (only pdf extension)</span>              
                  //      <input class="form-control-file" type="file" id="file_birth_certificate" ref="file_birth_certificate" @change="addFileBirth()" style="border: 1px solid #fff">
                  //   </div>
                  //   <div class="form-group col-md-6">
                  //       <label>Income Requirements</label><span style="color:red">*</span>  
                  //       <select id="select_income" name="select_income" class="form-control" v-model="select_income" @change="income_requirements_func()">
                  //         <option value="1">Latest Income Tax Return of parents/guardian</option>
                  //         <option value="2">Certificate of Tax Exemption from the BIR</option>
                  //         <option value="3">Certificate of Indigence from their Barangay or DSWD</option>
                  //         <option value="4">Case Study from DSWD</option>
                  //         <option value="5">Latest copy of contract or proof of income for children of OFW and seafarers</option>
                  //       </select>
                  //   </div>
                  // </div>
                  // <div class="form-row">
                  //     <div class="form-group col-md-6">
                  //       <label >Grade Requirements (Certified true copy)</label><span style="color:red">*</span>  
                  //       <select id="select_grade" name="select_grade" class="form-control" v-model="select_grade" @change="grade_requirements_func()">
                  //         <option value="1">High school report card for incoming freshmen students eligible for college</option>
                  //         <option value="2">Grade 11 and 1st semester of Grade 12 for graduating high school students</option>
                  //         <option value="3">ALS graduate</option>
                  //       </select>
                  //     </div>

                  //     <div class="form-group col-md-6" v-if="select_income == 1">
                  //       <label >Latest Income Tax Return of parents/guardian</label><span style="color:red">*</span>              
                  //       <span v-if="valid_itr" style="color:#fff;font-size:14px; float:right">Valid file.</span>  
                  //       <span v-if="invalid_itr" style="color:red;font-size:14px; float:right">Invalid file (only pdf extension)</span>   
                  //        <input v-if="uploadITR" class="form-control-file" id="file_itr" type="file" ref="file_itr" @change="addFileITR()" style="border: 1px solid #fff">
                  //     </div>

                  //     <div class="form-group col-md-6" v-if="select_income == 2">
                  //       <label >Certificate of Tax Exemption from the BIR</label><span style="color:red">*</span>
                  //       <span v-if="valid_tax_excemption" style="color:#fff;font-size:14px; float:right">Valid file.</span>  
                  //       <span v-if="invalid_tax_excemption" style="color:red;font-size:14px; float:right">Invalid file (only pdf extension)</span>                 
                  //        <input v-if="uploadTaxExemption" class="form-control-file" id="file_certificate_of_tax_exemption" type="file" ref="file_certificate_of_tax_exemption" @change="addFileCertificate_Of_Tax_Excemption()" style="border: 1px solid #fff">
                  //     </div>

                  //     <div class="form-group col-md-6" v-if="select_income == 3">
                  //       <label >Certificate of Indigence from their Barangay or DSWD</label><span style="color:red">*</span>
                  //       <span v-if="valid_indigence" style="color:#fff;font-size:14px; float:right">Valid file.</span>  
                  //       <span v-if="invalid_indigence" style="color:red;font-size:14px; float:right">Invalid file (only pdf extension)</span>                 
                  //        <input v-if="uploadIndigence" class="form-control-file" type="file" id="file_certificate_of_indigence" ref="file_certificate_of_indigence" @change="addFileCertificate_Of_Indigence()" style="border: 1px solid #fff">
                  //     </div>

                  //     <div class="form-group col-md-6" v-if="select_income == 4">
                  //       <label >Case Study from DSWD</label><span style="color:red">*</span>
                  //       <span v-if="valid_case_study" style="color:#fff;font-size:14px; float:right">Valid file.</span>  
                  //       <span v-if="invalid_case_study" style="color:red;font-size:14px; float:right">Invalid file (only pdf extension)</span>                 
                  //        <input v-if="uploadCaseStudy" class="form-control-file" type="file" id="file_case_study" ref="file_case_study" @change="addFileCase_Study()" style="border: 1px solid #fff">
                  //     </div>

                  //     <div class="form-group col-md-6" v-if="select_income == 5">
                  //       <label >Latest copy of contract or proof of income for children of OFW and seafarers</label><span style="color:red">*</span>
                  //       <span v-if="valid_seafarers" style="color:#fff;font-size:14px; float:right">Valid file.</span>  
                  //       <span v-if="invalid_seafarers" style="color:red;font-size:14px; float:right">Invalid file (only pdf extension)</span>                 
                  //        <input v-if="uploadSeaFarers" class="form-control-file" type="file" id="file_seafarers" ref="file_seafarers" @change="addFileSeafarers()" style="border: 1px solid #fff">
                  //     </div>

                  // </div>

                  // <div class="form-row">

                  //   <div class="form-group col-md-6" v-if="select_grade == 3">
                  //     <label>ALS Grade</label><span style="color:red">*</span>
                  //     <span v-if="valid_als" style="color:#fff;font-size:14px; float:right">Valid file.</span>  
                  //     <span v-if="invalid_als" style="color:red;font-size:14px; float:right">Invalid file (only pdf extension)</span>                 
                  //      <input class="form-control-file" v-if="uploadALS" type="file" id="file_als" ref="file_als" @change="addFileALS()" style="border: 1px solid #fff">
                  //   </div>

                  //   <div class="form-group col-md-6" v-if="select_grade == 2">
                  //     <label>Certified true copy of grades for grade 11</label><span style="color:red">*</span>
                  //     <span v-if="valid_grade11" style="color:#fff;font-size:14px; float:right">Valid file.</span>  
                  //     <span v-if="invalid_grade11" style="color:red;font-size:14px; float:right">Invalid file (only pdf extension)</span>                 
                  //      <input class="form-control-file" v-if="uploadGrade11" type="file" id="file_grade11" ref="file_grade11" @change="addFileGrade11()" style="border: 1px solid #fff">
                  //   </div>

                  //   <div class="form-group col-md-6" v-if="select_grade == 1">
                  //     <label >High School Report Card</label><span style="color:red">*</span>
                  //     <span v-if="valid_highschool" style="color:#fff;font-size:14px; float:right">Valid file.</span>  
                  //     <span v-if="invalid_highschool" style="color:red;font-size:14px; float:right">Invalid file (only pdf extension)</span>                 
                  //     <input class="form-control-file" v-if="uploadhighschool" type="file" id="file_highschool" ref="file_highschool" @change="addFileHighSchool()" style="border: 1px solid #fff">
                  //   </div>

                  // </div>



                  // <div class="form-row">
                  //   <div class="form-group col-md-6" v-if="select_grade == 2">
                  //     <label >Certified true copy of grades for grade 12 (1st semester) </label><span style="color:red">*</span>
                  //     <span v-if="valid_grade12" style="color:#fff;font-size:14px; float:right">Valid file.</span>  
                  //     <span v-if="invalid_grade12" style="color:red;font-size:14px; float:right">Invalid file (only pdf extension)</span>                 
                  //      <input class="form-control-file" v-if="uploadGrade12" type="file" id="file_grade12" ref="file_grade12" @change="addFileGrade12()" style="border: 1px solid #fff">
                  //   </div>
                  // </div>

                  //  <span class="container" style="font-size:12px">Note: Fields marked with an asterisk (<span style="color:red">*</span>) are required.</span>   
//         </div>`,
//     data() {
//         return {
//             birth_certificate: '',
//             grade11: '',
//             grade12: '',
//             income_requirements: '',
//             other: '',
//             select_grade: '',
//             select_income: '',
//             valid_birth_certificate: false,
//             valid_grade11: false,
//             valid_grade12: false,
//             valid_highschool: false,
//             valid_itr: false,
//             valid_tax_excemption: false,
//             valid_indigence: false,
//             valid_case_study: false,
//             valid_seafarers: false,
//             valid_als: false,
//             invalid_birth_certificate: false,
//             invalid_grade11: false,
//             invalid_grade12: false,
//             invalid_highschool: false,
//             invalid_itr: false,
//             invalid_tax_excemption: false,
//             invalid_indigence: false,
//             invalid_case_study: false,
//             invalid_seafarers: false,
//             invalid_als: false,
//             uploadGrade11: true,
//             uploadGrade12: true,
//             uploadhighschool: true,
//             uploadIndigence: true,
//             uploadITR: true,
//             uploadSeaFarers: true,
//             uploadCaseStudy: true,
//             uploadTaxExemption: true,
//             uploadALS: true,
//             formData: {}
//         }
//     },
//     validations: {


//         form: []
//     },
//     methods: {

//           validate() {
//               this.$v.form.$touch();
//               var isValid = !this.$v.form.$invalid;
//               this.$emit("on-validate", this.$data, isValid);
//               return isValid;
//           },

      //     addFileALS() {

      //       this.valid_als = false;
      //       this.invalid_als = false;
      //       $('#file_als').css('border-color','');
      //       var file = $('#file_als').val();
      //       var ext = ['pdf'];

      //       if(file) {

      //       var get_ext = file.split('.');

      //       get_ext = get_ext.reverse();

      //       if($.inArray ( get_ext[0].toLowerCase(), ext) > -1) {
            
      //         if(this.$refs.file_als.files[0].size > 999999) {
      
      //             swal("Opps!", "File size required less than 1mb.", "error");
      //             return false;

      //         }else{
      //             this.valid_als = true;
      //             $('#file_als').css('border-color','#fff');
      //             this.attachmentALS = this.$refs.file_als.files[0];
      //             console.log(this.attachmentALS);
      //             return false;

      //         }

      //       } else {
      //         this.invalid_als = true;
      //         $('#file_als').css('border-color','red');
      //         return false;
      //       }

      //       console.log(file);

      //       }
      
      //   },
      //   addFileBirth() {

      //       this.valid_birth_certificate = false;
      //       this.invalid_birth_certificate = false;
      //       $('#file_birth_certificate').css('border-color','');
      //       var file = $('#file_birth_certificate').val();
      //       var ext = ['pdf'];

      //       if(file) {

      //       var get_ext = file.split('.');

      //       get_ext = get_ext.reverse();

      //       if($.inArray ( get_ext[0].toLowerCase(), ext) > -1) {
            
      //         if(this.$refs.file_birth_certificate.files[0].size > 999999) {
      
      //             swal("Opps!", "File size required less than 1mb.", "error");
      //             return false;

      //         }else{
      //             this.valid_birth_certificate = true;
      //             $('#file_birth_certificate').css('border-color','#fff');
      //             this.attachmentBirthCertificate = this.$refs.file_birth_certificate.files[0];
      //             console.log(this.attachmentBirthCertificate);
      //             return false;

      //         }

      //       } else {
      //         this.invalid_birth_certificate = true;
      //         $('#file_birth_certificate').css('border-color','red');
      //         return false;
      //       }

      //       console.log(file);

      //       }
      
      //   },
      //   addFileITR() {

      //       this.valid_itr = false;
      //       this.invalid_itr = false;
      //       $('#file_itr').css('border-color','');
      //       var file = $('#file_itr').val();
      //       var ext = ['pdf'];

      //       if(file) {

      //       var get_ext = file.split('.');

      //       get_ext = get_ext.reverse();

      //       if($.inArray ( get_ext[0].toLowerCase(), ext) > -1) {
            
      //         if(this.$refs.file_itr.files[0].size > 999999) {
      
      //             swal("Opps!", "File size required less than 1mb.", "error");
      //             return false;

      //         }else{
      //             this.valid_itr = true;
      //             $('#file_itr').css('border-color','#fff');
      //             this.attachmentITR = this.$refs.file_itr.files[0];
      //             console.log(this.attachmentITR);
      //             return false;

      //         }

      //       } else {
      //         this.invalid_itr = true;
      //         $('#file_itr').css('border-color','red');
      //         return false;
      //       }

      //       console.log(file);

      //       }
      
      //   },
      //   addFileCertificate_Of_Tax_Excemption() {

      //       this.valid_tax_excemption = false;
      //       this.invalid_tax_excemption = false;
      //       $('#file_certificate_of_tax_exemption').css('border-color','');
      //       var file = $('#file_certificate_of_tax_exemption').val();
      //       var ext = ['pdf'];

      //       if(file) {

      //       var get_ext = file.split('.');

      //       get_ext = get_ext.reverse();

      //       if($.inArray ( get_ext[0].toLowerCase(), ext) > -1) {
            
      //         if(this.$refs.file_certificate_of_tax_exemption.files[0].size > 999999) {
      
      //             swal("Opps!", "File size required less than 1mb.", "error");
      //             return false;

      //         }else{
      //             this.valid_tax_excemption = true;
      //             $('#file_certificate_of_tax_exemption').css('border-color','#fff');
      //             this.attachmentCertificateExemption = this.$refs.file_certificate_of_tax_exemption.files[0];
      //             console.log(this.attachmentCertificateExemption);
      //             return false;
      //         }

      //       } else {
      //         this.invalid_tax_excemption = true;
      //         $('#file_certificate_of_tax_exemption').css('border-color','red');
      //         return false;
      //       }

      //       console.log(file);

      //       }
      
      //   },
      //   addFileCertificate_Of_Indigence() {

      //       this.valid_indigence = false;
      //       this.invalid_indigence = false;
      //       $('#file_certificate_of_indigence').css('border-color','');
      //       var file = $('#file_certificate_of_indigence').val();
      //       var ext = ['pdf'];

      //       if(file) {

      //       var get_ext = file.split('.');

      //       get_ext = get_ext.reverse();

      //       if($.inArray ( get_ext[0].toLowerCase(), ext) > -1) {
            
      //         if(this.$refs.file_certificate_of_indigence.files[0].size > 999999) {
      
      //             swal("Opps!", "File size required less than 1mb.", "error");
      //             return false;

      //         }else{
      //             this.valid_indigence = true;
      //             $('#file_certificate_of_indigence').css('border-color','#fff');
      //             this.attachmentCertificateIndigence = this.$refs.file_certificate_of_indigence.files[0];
      //             console.log(this.attachmentCertificateIndigence);
      //             return false;
      //         }

      //       } else {
      //         this.invalid_indigence = true;
      //         $('#file_certificate_of_indigence').css('border-color','red');
      //         return false;
      //       }

      //       console.log(file);
      
      //   }
      // },
      //   addFileCase_Study() {


      //       this.valid_case_study = false;
      //       this.invalid_case_study = false;
      //       $('#file_case_study').css('border-color','');
      //       var file = $('#file_case_study').val();
      //       var ext = ['pdf'];

      //       if(file) {

      //       var get_ext = file.split('.');

      //       get_ext = get_ext.reverse();

      //       if($.inArray ( get_ext[0].toLowerCase(), ext) > -1) {
            
      //         if(this.$refs.file_case_study.files[0].size > 999999) {
      
      //             swal("Opps!", "File size required less than 1mb.", "error");
      //             return false;

      //         }else{
      //             this.valid_case_study = true;
      //             $('#file_case_study').css('border-color','#fff');
      //             this.attachmentCaseStudy = this.$refs.file_case_study.files[0];
      //             console.log(this.attachmentCaseStudy);
      //             return false;
      //         }

      //       } else {
      //         this.invalid_case_study = true;
      //         $('#file_case_study').css('border-color','red');
      //         return false;
      //       }

      //       console.log(file);
      
      //     }
      
      //   },
      //   addFileSeafarers() {

      //       this.valid_seafarers = false;
      //       this.invalid_seafarers = false;
      //       $('#file_seafarers').css('border-color','');
      //       var file = $('#file_seafarers').val();
      //       var ext = ['pdf'];

      //       if(file) {

      //       var get_ext = file.split('.');

      //       get_ext = get_ext.reverse();

      //       if($.inArray ( get_ext[0].toLowerCase(), ext) > -1) {
            
      //         if(this.$refs.file_seafarers.files[0].size > 999999) {
      
      //             swal("Opps!", "File size required less than 1mb.", "error");
      //             return false;

      //         }else{
      //             this.valid_seafarers = true;
      //             $('#file_seafarers').css('border-color','#fff');
      //             this.attachmentSeaFarers = this.$refs.file_seafarers.files[0];
      //             console.log(this.attachmentSeaFarers);
      //             return false;
      //         }

      //       } else {
      //         this.invalid_seafarers = true;
      //         $('#file_seafarers').css('border-color','red');
      //         return false;
      //       }

      //       console.log(file);
      
      //     }
      
      //   },
      //   addFileGrade11() {

      //       this.valid_grade11 = false;
      //       this.invalid_grade11 = false;
      //       $('#file_grade11').css('border-color','');
      //       var file = $('#file_grade11').val();
      //       var ext = ['pdf'];

      //       if(file) {

      //       var get_ext = file.split('.');

      //       get_ext = get_ext.reverse();

      //       if($.inArray ( get_ext[0].toLowerCase(), ext) > -1) {
            
      //         if(this.$refs.file_grade11.files[0].size > 999999) {
      
      //             swal("Opps!", "File size required less than 1mb.", "error");
      //             return false;

      //         }else{
      //             this.valid_grade11 = true;
      //             $('#file_grade11').css('border-color','#fff');
      //             this.attachmentGrade11 = this.$refs.file_grade11.files[0];
      //             console.log(this.attachmentGrade11);
      //             return false;
      //         }

      //       } else {
      //         this.invalid_grade11 = true;
      //         $('#file_grade11').css('border-color','red');
      //         return false;
      //       }

      //       console.log(file);
      
      //     }
      
      //   },
      //   addFileHighSchool() {

      //       this.valid_highschool = false;
      //       this.invalid_highschool = false;
      //       $('#file_highschool').css('border-color','');
      //       var file = $('#file_highschool').val();
      //       var ext = ['pdf'];

      //       if(file) {

      //       var get_ext = file.split('.');

      //       get_ext = get_ext.reverse();

      //       if($.inArray ( get_ext[0].toLowerCase(), ext) > -1) {
            
      //         if(this.$refs.file_highschool.files[0].size > 999999) {
      
      //             swal("Opps!", "File size required less than 1mb.", "error");
      //             return false;

      //         }else{
      //             this.valid_highschool = true;
      //             $('#file_highschool').css('border-color','#fff');
      //             this.attachmentHighSchool = this.$refs.file_highschool.files[0];
      //             console.log(this.attachmentHighSchool);
      //             return false;
      //         }

      //       } else {
      //         this.invalid_highschool = true;
      //         $('#file_highschool').css('border-color','red');
      //         return false;
      //       }

      //       console.log(file);
      
      //     }
      
      //   },
      //   addFileGrade12() {

      //       this.valid_grade12 = false;
      //       this.invalid_grade12 = false;
      //       $('#file_grade12').css('border-color','');
      //       var file = $('#file_grade12').val();
      //       var ext = ['pdf'];

      //       if(file) {

      //       var get_ext = file.split('.');

      //       get_ext = get_ext.reverse();

      //       if($.inArray ( get_ext[0].toLowerCase(), ext) > -1) {
            
      //         if(this.$refs.file_grade12.files[0].size > 999999) {
      
      //             swal("Opps!", "File size required less than 1mb.", "error");
      //             return false;

      //         }else{
      //             this.valid_grade12 = true;
      //             $('#file_grade12').css('border-color','#fff');
      //             this.attachmentGrade12 = this.$refs.file_grade12.files[0];
      //             console.log(this.attachmentGrade12);
      //             return false;
      //         }

      //       } else {
      //         this.invalid_grade12 = true;
      //         $('#file_grade12').css('border-color','red');
      //         return false;
      //       }

      //       console.log(file);
      
      //     }
      
      //   },
      //   grade_requirements_func() {

      //    this.valid_highschool = false;
      //    this.invalid_highschool = false;
      //    this.valid_grade12 = false;
      //    this.valid_grade11 = false;
      //    this.valid_als = false;
      //    this.invalid_grade11 = false;
      //    this.invalid_grade12 = false;
      //    this.invalid_als = false;
      //    this.uploadGrade11 = false;
      //    this.uploadGrade12 = false;
      //    this.uploadhighschool = false;
      //    this.uploadALS = false;
      //    this.$nextTick(() => {
      //       this.uploadGrade11 = true;
      //       this.uploadGrade12 = true;
      //       this.uploadhighschool = true;
      //       this.uploadALS = true;
      //    });
      //    return false;

      //  },
      // income_requirements_func() {

      //   this.valid_seafarers = false;
      //   this.invalid_seafarers = false;
      //   this.valid_indigence = false;
      //   this.invalid_indigence = false;
      //   this.valid_itr = false;
      //   this.invalid_itr = false;
      //   this.valid_case_study = false;
      //   this.invalid_case_study = false;
      //   this.valid_tax_excemption = false;
      //   this.invalid_tax_excemption = false;
      //   this.uploadIndigence = false;
      //   this.uploadITR = false;
      //   this.uploadCaseStudy = false;
      //   this.uploadTaxExemption = false;
      //   this.uploadSeaFarers = false;

      //    this.$nextTick(() => {
      //       this.uploadIndigence = true;
      //       this.uploadITR = true;
      //       this.uploadCaseStudy = true;
      //       this.uploadTaxExemption = true;
      //       this.uploadSeaFarers = true;
      //    });
      //    return false;

      //  },




//     }
// });

 export default {
    data() {
      return {
        applicationModel: {},
        success: false,
        loading: false,
        formData: {}
      }
    },
     methods: {

    onComplete: function() {
          this.formData = new FormData();
          this.formData.append('userName', this.applicationModel.userName);
          this.formData.append('emailAddress', this.applicationModel.emailAddress);
          this.formData.append('password', this.applicationModel.password);
          this.formData.append('lastName', this.applicationModel.lastName);
          this.formData.append('firstName', this.applicationModel.firstName);
          this.formData.append('middleName', this.applicationModel.middleName);
          this.formData.append('extensionName', this.applicationModel.extensionName);
          this.formData.append('dateOfBirth', this.applicationModel.dateOfBirth);
          this.formData.append('placeOfBirth', this.applicationModel.placeOfBirth);
          this.formData.append('sex', this.applicationModel.sex);
          this.formData.append('civilStatus', this.applicationModel.civilStatus);
          this.formData.append('citizenship', this.applicationModel.citizenship);
          this.formData.append('mobileNumber', this.applicationModel.mobileNumber);
          this.formData.append('presentAddress', this.applicationModel.presentAddress);
          this.formData.append('city', this.applicationModel.city);
          this.formData.append('barangay', this.applicationModel.barangay);
          this.formData.append('province', this.applicationModel.province);
          this.formData.append('zipcode', this.applicationModel.zipcode);
          this.formData.append('fb_url', this.applicationModel.fb_url);
          this.formData.append('fatherLastName', this.applicationModel.fatherLastName);
          this.formData.append('fatherFirstName', this.applicationModel.fatherFirstName);
          this.formData.append('fatherMiddleName', this.applicationModel.fatherMiddleName);
          this.formData.append('fatherExtensionName', this.applicationModel.fatherExtensionName);
          this.formData.append('motherOccupation', this.applicationModel.motherOccupation);
          this.formData.append('fatherOccupation', this.applicationModel.fatherOccupation);
          this.formData.append('motherEmployer', this.applicationModel.motherEmployer);
          this.formData.append('fatherEmployer', this.applicationModel.fatherEmployer);
          this.formData.append('motherContact', this.applicationModel.motherContact);
          this.formData.append('fatherContact', this.applicationModel.fatherContact);
          this.formData.append('sibblings', this.applicationModel.sibblings);
          this.formData.append('schoolLastAttended', this.applicationModel.schoolLastAttended);
          this.formData.append('schoolPreferred', this.applicationModel.schoolPreferred);
          this.formData.append('degreeProgram', this.applicationModel.degreeProgram);
          this.formData.append('applicant_type', this.applicationModel.applicant_type);
          this.formData.append('ips', this.applicationModel.ips);
          this.formData.append('senior_citizen', this.applicationModel.senior_citizen);
          this.formData.append('a_solo_parent', this.applicationModel.a_solo_parent);
          this.formData.append('solo_parent', this.applicationModel.solo_parent);
          this.formData.append('pwd', this.applicationModel.pwd);

          this.formData.append('file_grade11', this.applicationModel.attachmentGrade11);
          this.formData.append('file_grade12', this.applicationModel.attachmentGrade12);
          this.formData.append('file_als', this.applicationModel.attachmentALS);
          this.formData.append('file_seafarers', this.applicationModel.attachmentSeaFarers);
          this.formData.append('file_case_study', this.applicationModel.attachmentCaseStudy);
          this.formData.append('file_certificate_of_indigence', this.applicationModel.attachmentCertificateIndigence);
          this.formData.append('file_certificate_of_tax_exemption', this.applicationModel.attachmentCertificateExemption);
          this.formData.append('file_highschool', this.applicationModel.attachmentHighSchool);
          this.formData.append('file_birth_certificate', this.applicationModel.attachmentBirthCertificate);
          this.formData.append('file_itr', this.applicationModel.attachmentITR);

          // this.loading = true;
          // axios.post('applicant/register/', this.formData, {headers: {'content-Type': 'multipart/form-data'}})
          //   .then(response => {

          //        if(response.data === 0) { //Applicants already in the system.
          //         this.$swal.fire({
          //           icon: 'error',
          //           title: 'Opps...',
          //           text: 'You are already registered in the system. Contact CHEDRO coordinator for your concern or Visit CHED CARAGA Regional Office, Ampayon Butuan City..',
          //           footer: `<h4>Contact #:<h4 style="color:blue">&nbsp; 0912-089-2045</h4></h4>`
          //         })
          //         this.loading = false;
          //         return false;
          //       }
          //       if(response.data === 2) { //Email already in used.
          //         this.$swal.fire({
          //           icon: 'error',
          //           title: 'Opps...',
          //           text: 'Email address is already in used in this system. Please try new one.',
          //         })
          //         this.loading = false;
          //         return false;
          //       }
          //       this.loading = false;
          //       this.$swal.fire({
          //         icon: 'success',
          //         title: 'Great...',
          //         text: `Application successfully submitted! A verification code sent to ${response.data.email}. Please check your email and verify your account, you must login first.`
          //         // footer: `<h3>Reference #:<h3 style="color:red">&nbsp;${response.data.reference_no}</h3></h3>`
          //       })
          //       this.$router.push({name: 'login', params: {successRegistrationRedirect: true}})

              
          //   })
          //   .catch(error => {
          //       this.errors = error.response.data.errors;
          //       console.log(this.errors);
          //   });

          console.log(this.applicationModel.attachmentBirthCertificate);
      },
     validateStep(name) {
         var refToValidate = this.$refs[name];
         return refToValidate.validate();
     },
     mergePartialModels(model, isValid) {
         if (isValid) {
             // merging each step model into the final model
             this.applicationModel = Object.assign({}, this.applicationModel, model);

         }
     },
     note() {
      
       this.$swal.fire({
          showCloseButton: true,
          confirmButtonText:
            '<i class="fa fa-thumbs-up"></i> Okay',
          imageUrl: 'image/flowchart.png',
          imageWidth: 500,
          imageHeight: 450,
          width: 500,
          imageAlt: 'Custom image',
        })
     }
    },
    async mounted() {
      this.note();
    },
    components: {
      FormWizard,
      TabContent
    }

  }
</script>