<template>
    <div>
        <form-wizard @on-complete="onComplete" shape="circle" color="#3498db">
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
<!--             <tab-content title="Preferred School" icon="ti-home">
                Here is your final model:
                <pre>{{applicationModel}}</pre>
            </tab-content> -->
        </form-wizard>
    </div>
</div>

</template>

<script>
import Vue from 'vue'
import axios from 'axios'
//local registration
import {FormWizard, TabContent} from '../vue-form-wizard'
import '../vue-form-wizard/dist/vue-form-wizard.min.css'


Vue.use(window.vuelidate.default);
const { required, minLength, email, sameAs, numeric, alphaNum, alpha } = window.validators;



Vue.component("step1", {
    template: `<div>
          <div class="form-group" v-bind:class="{ 'has-error': $v.userName.$error }">
            <label >User name</label><span style="color:red">*</span>
            <input class="form-control" v-model.trim="userName" @input="$v.userName.$touch()">
             <span class="help-block" v-if="$v.userName.$error && !$v.userName.required">User name is required</span>
          </div>

          <div class="form-group" v-bind:class="{ 'has-error': $v.password.$error }">
           <label>Password</label> <span style="color:red">*</span>
            <input type="password" class="form-control" v-model.trim="password" @input="$v.password.$touch()">
             <span class="help-block" v-if="$v.password.$error && !$v.password.required">Password is required</span>
             <span class="help-block" v-if="!$v.password.minLength">Password must have at least {{ $v.password.$params.minLength.min }} letters.</span>
             <span class="help-block" v-if="!$v.password.alphaNum">Password accept only alpha and numeric.</span>         
          </div>

         <div class="form-group" v-bind:class="{ 'has-error': $v.confirmPassword.$error }">
            <label>Confirm password</label><span style="color:red">*</span>
            <input type="password" class="form-control" v-model.trim="confirmPassword" @input="$v.confirmPassword.$touch()">
             <span class="help-block" v-if="$v.confirmPassword.$error && !$v.confirmPassword.required">Confirm password is required</span>
             <span class="help-block" v-if="!$v.confirmPassword.sameAsPassword">Passwords must be identical.</span>
          </div>

        </div>`,
    data() {
        return {
            userName: "",
            password: "",
            confirmPassword: ""
        }
    },
    validations: {
        userName: {
            required
        },
        password: {
            required,
            minLength: minLength(6),
            alphaNum
        },
        confirmPassword: {
            required,
            sameAsPassword: sameAs('password')
        },
        form: ["userName", "password", "confirmPassword"]
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
                              <span class="help-block" v-if="$v.lastName.$error && !$v.lastName.required">Last name is required</span>
                              <span class="help-block" v-if="$v.lastName.$error && !$v.lastName.alpha">Accepts only alphabet characters.</span>
                            </div>
                            <div class="form-group col-md-3" v-bind:class="{ 'has-error': $v.firstName.$error }">
                              <span style="color:red">*</span><label style="float:left;font-size:12px;font-weight:bold">First Name</label>
                              <input type="text" class="form-control" name="fname" id="fname" placeholder="First name" v-model.trim="firstName" @input="$v.firstName.$touch()">
                              <span class="help-block" v-if="$v.firstName.$error && !$v.firstName.required">First name is required</span>
                              <span class="help-block" v-if="$v.firstName.$error && !$v.firstName.alpha">Accepts only alphabet characters.</span>
                            </div>
                             <div class="form-group col-md-3" v-bind:class="{ 'has-error': $v.middleName.$error }">
                             <label style="float:left;font-size:12px;font-weight:bold">Middle Name</label>
                              <input type="text" class="form-control" name="mname" id="mname" placeholder="Middle name" v-model.trim="middleName" @input="$v.middleName.$touch()">
                              <span class="help-block" v-if="$v.middleName.$error && !$v.middleName.alpha">Accepts only alphabet characters.</span>
                            </div>
                            <div class="form-group col-md-3" v-bind:class="{ 'has-error': $v.extensionName.$error }">
                              <label style="float:left;font-size:12px;font-weight:bold">Extension Name</label>
                              <input type="text" class="form-control" name="xname" id="xname" placeholder="Extension name" v-model.trim="extensionName" @input="$v.extensionName.$touch()">
                              <span class="help-block" v-if="!$v.extensionName.minLength">Extension name must have at least {{ $v.extensionName.$params.minLength.min }} letters.</span>
                            </div>
                          </div>
                         <div class="form-row">
                            <div class="form-group col-md-3" v-bind:class="{ 'has-error': $v.dateOfBirth.$error }">
                              <span style="color:red">*</span><label style="float:left;font-size:12px;font-weight:bold">Date of Birth</label>
                              <input type="date" class="form-control" id="dateOfbirth" v-model.trim="dateOfBirth" @input="$v.dateOfBirth.$touch()">
                              <span class="help-block" v-if="$v.dateOfBirth.$error && !$v.dateOfBirth.required">Date of birth is required</span>
                            </div>
                            <div class="form-group col-md-3" v-bind:class="{ 'has-error': $v.placeOfBirth.$error }">
                              <span style="color:red">*</span><label style="float:left;font-size:12px;font-weight:bold">Place of Birth</label>
                              <input type="text" class="form-control" id="placeOfbirth" placeholder="Ex: Butuan City" v-model.trim="placeOfBirth" @input="$v.placeOfBirth.$touch()">
                               <span class="help-block" v-if="$v.placeOfBirth.$error && !$v.placeOfBirth.required">Place of birth is required</span>
                            </div>
                           <div class="form-group col-md-3" v-bind:class="{ 'has-error': $v.sex.$error }">
                              <span style="color:red">*</span><label style="float:left;font-size:12px;font-weight:bold">Gender</label>
                              <select id="sex" name="sex" class="form-control" v-model.trim="sex" @input="$v.sex.$touch()">
                                <option value="1">Male</option>
                                <option value="2">Female</option>
                              </select>
                              <span class="help-block" v-if="$v.sex.$error && !$v.sex.required">Sex is required</span>
                            </div>
                            <div class="form-group col-md-3" v-bind:class="{ 'has-error': $v.civilStatus.$error }">
                              <span style="color:red">*</span><label style="float:left;font-size:12px;font-weight:bold">Civil Status</label>
                              <select id="civil_status" name="civil_status" class="form-control" v-model.trim="civilStatus" @input="$v.civilStatus.$touch()">
                                <option value="1">Single</option>
                                <option value="2">Maried</option>
                                <option value="3">Separated</option>
                                <option value="4">Devorced</option>
                                <option value="5">Widowed</option>
                              </select>
                              <span class="help-block" v-if="$v.civilStatus.$error && !$v.civilStatus.required">Civil status is required</span>
                            </div>
                          </div>
                          <div class="form-row">
                            <div class="form-group col-md-3" v-bind:class="{ 'has-error': $v.citizenship.$error }">
                              <span style="color:red">*</span><label style="float:left;font-size:12px;font-weight:bold">Citizenship</label>
                              <select id="citizenship" name="citizenship" class="form-control" v-model.trim="citizenship" @input="$v.citizenship.$touch()">
                                <option value="1">Filipino</option>
                                <option value="2">American</option>
                              </select>
                              <span class="help-block" v-if="$v.citizenship.$error && !$v.citizenship.required">Citizenship is required</span>
                            </div>
                            <div class="form-group col-md-3" v-bind:class="{ 'has-error': $v.mobileNumber.$error }">
                              <span style="color:red">*</span><label style="float:left;font-size:12px;font-weight:bold">Mobile Number</label>
                              <input type="text" class="form-control" id="mobile_number" name="mobile_number" placeholder="Ex: 0900..." v-model.trim="mobileNumber" @input="$v.mobileNumber.$touch()">
                              <span class="help-block" v-if="$v.mobileNumber.$error && !$v.mobileNumber.required">Mobile number is required.</span>
                              <span class="help-block" v-if="$v.mobileNumber.$error && !$v.mobileNumber.numeric">Accepts only numerics.</span>
                              <span class="help-block" v-if="!$v.mobileNumber.minLength">Mobile number must have at least {{ $v.mobileNumber.$params.minLength.min }} numbers.</span>
                            </div>
                             <div class="form-group col-md-3" v-bind:class="{ 'has-error': $v.emailAddress.$error }">
                              <span style="color:red">*</span><label style="float:left;font-size:12px;font-weight:bold">E-mail Address</label>
                              <input type="text" class="form-control" id="email_address" name="email_address" placeholder="Ex: juandelacruz@test.com" v-model.trim="emailAddress" @input="$v.emailAddress.$touch()">
                              <span class="help-block" v-if="$v.emailAddress.$error && !$v.emailAddress.required">Email address is required</span>
                              <span class="help-block" v-if="$v.emailAddress.$error && !$v.emailAddress.email">This is not a valid email!</span>
                            </div>
                             <div class="form-group col-md-3" v-bind:class="{ 'has-error': $v.presentAddress.$error }">
                              <span style="color:red">*</span><label style="float:left;font-size:12px;font-weight:bold">Present Address</label>
                              <input type="text" class="form-control" id="present_address" name="present_address" placeholder="Ex: P-7 Ampayon..." v-model.trim="presentAddress" @input="$v.presentAddress.$touch()">
                              <span class="help-block" v-if="$v.presentAddress.$error && !$v.presentAddress.required">Present address is required</span>
                            </div>
                          </div>
                        <div class="form-row">
                            <div class="form-group col-md-3" v-bind:class="{ 'has-error': $v.city.$error }">
                              <span style="color:red">*</span><label style="float:left;font-size:12px;font-weight:bold">City</label>
                              <select id="city" name="city" class="form-control" v-model.trim="city" @input="$v.city.$touch()">
                                <option v-for="city in citys" v-bind:value="city.city_id">{{ city.mun_city_name }}</option>
                              </select>
                              <span class="help-block" v-if="$v.city.$error && !$v.city.required">City is required</span>
                            </div>
                            <div class="form-group col-md-3" v-bind:class="{ 'has-error': $v.barangay.$error }">
                              <span style="color:red">*</span><label style="float:left;font-size:12px;font-weight:bold">Barangay</label>
                              <select id="barangay" name="barangay" class="form-control" v-model.trim="barangay" @input="$v.barangay.$touch()">
                                <option v-for="brgy in brgys" v-bind:value="brgy.brgy_id">{{ brgy.name }}</option>
                              </select>
                              <span class="help-block" v-if="$v.barangay.$error && !$v.barangay.required">Barangay is required</span>
                            </div>
                           <div class="form-group col-md-3" v-bind:class="{ 'has-error': $v.province.$error }">
                              <span style="color:red">*</span><label style="float:left;font-size:12px;font-weight:bold">Province</label>
                              <select id="province" name="province" class="form-control" v-model.trim="province" @input="$v.province.$touch()">                            
                                <option v-for="province in provinces" v-bind:value="province.province_id">{{ province.prov_name }}</option>
                              </select>
                              <span class="help-block" v-if="$v.province.$error && !$v.province.required">Province is required</span>
                            </div>
                            <div class="form-group col-md-3" v-bind:class="{ 'has-error': $v.zipCode.$error }">
                              <span style="color:red">*</span><label style="float:left;font-size:12px;font-weight:bold">Zip Code</label>
                              <input type="text" class="form-control" id="zip_code" name="zip_code" placeholder="Ex: 8600" v-model.trim="zipCode" @input="$v.zipCode.$touch()">
                              <span class="help-block" v-if="$v.zipCode.$error && !$v.zipCode.required">Zipcode is required</span>
                              <span class="help-block" v-if="$v.zipCode.$error && !$v.zipCode.numeric">Accepts only numerics.</span>
                            </div>                        
                          </div>
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
            emailAddress: "",
            presentAddress: "",
            city: "",
            barangay: "",
            province: "",
            zipCode: "",
            provinces: {},
            citys: {},
            brgys: {}
        }
    },
    validations: {
          lastName: {
            required,
            alpha
        },
          firstName: {
            required,
            alpha
        },
          middleName: {
            required,
            alpha
        },
        extensionName: {
            minLength: minLength(3)
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
            minLength: minLength(11)
        },
          emailAddress: {
            required,
            email
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
          zipCode: {
            required,
            numeric
        },
        form: ["lastName","firstName","dateOfBirth","placeOfBirth","sex","civilStatus","citizenship","mobileNumber","emailAddress","presentAddress","city","barangay","province","zipCode"]
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
                console.log(this.provinces);

            }).catch(error => {
                console.log(error);
            });
        },
        fetchCity() {
            axios.get('fetch/city/').then(result => {

                this.citys = result.data;
                console.log(this.citys);

            }).catch(error => {
                console.log(error);
            });
        },
        fetchBrgy() {
            axios.get('fetch/brgy/').then(result => {

                this.brgys = result.data;
                console.log(this.brgys);

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
                              <label style="float:left;font-size:12px;font-weight:bold">Father Last Name </label>
                              <input type="text" class="form-control" id="flname" name="flname" placeholder="Last Name" v-model.trim="fatherLastName" @input="$v.fatherLastName.$touch()">
                              <span class="help-block" v-if="$v.fatherLastName.$error && !$v.fatherLastName.alpha">Accepts only alphabet characters.</span>
                            </div>
                            <div class="form-group col-md-3" v-bind:class="{ 'has-error': $v.fatherFirstName.$error }">
                              <label style="float:left;font-size:12px;font-weight:bold">Father First Name </label>
                              <input type="text" class="form-control" placeholder="First Name" v-model.trim="fatherFirstName" @input="$v.fatherFirstName.$touch()">
                               <span class="help-block" v-if="$v.fatherFirstName.$error && !$v.fatherFirstName.alpha">Accepts only alphabet characters.</span>
                            </div>
                            <div class="form-group col-md-3" v-bind:class="{ 'has-error': $v.fatherMiddleName.$error }">
                              <label style="float:left;font-size:12px;font-weight:bold">Father First Name </label>
                              <input type="text" class="form-control" placeholder="Middle Name" v-model.trim="fatherMiddleName" @input="$v.fatherMiddleName.$touch()">
                               <span class="help-block" v-if="$v.fatherMiddleName.$error && !$v.fatherMiddleName.alpha">Accepts only alphabet characters.</span>
                            </div>
                            <div class="form-group col-md-3" v-bind:class="{ 'has-error': $v.fatherExtensionName.$error }">
                              <label style="float:left;font-size:12px;font-weight:bold">Father Extension Name </label>
                              <input type="text" class="form-control" placeholder="Extension Name" v-model.trim="fatherExtensionName" @input="$v.fatherExtensionName.$touch()">
                               <span class="help-block" v-if="$v.fatherExtensionName.$error && !$v.fatherExtensionName.alpha">Accepts only alphabet characters.</span>
                               <span class="help-block" v-if="!$v.fatherExtensionName.minLength">Extension name must have at least {{ $v.fatherExtensionName.$params.minLength.min }} letters.</span>
                            </div>
                          </div>
                         <div class="form-row">
                            <div class="form-group col-md-3" v-bind:class="{ 'has-error': $v.motherLastName.$error }">
                              <label style="float:left;font-size:12px;font-weight:bold">Mother Last Name </label>
                              <input type="text" class="form-control" placeholder="Last Name" v-model.trim="motherLastName" @input="$v.motherLastName.$touch()">
                               <span class="help-block" v-if="$v.motherLastName.$error && !$v.motherLastName.alpha">Accepts only alphabet characters.</span>
                            </div>
                            <div class="form-group col-md-3" v-bind:class="{ 'has-error': $v.motherFirstName.$error }">
                              <label style="float:left;font-size:12px;font-weight:bold">Mother First Name </label>
                              <input type="text" class="form-control" placeholder="First Name" v-model.trim="motherFirstName" @input="$v.motherFirstName.$touch()">
                               <span class="help-block" v-if="$v.motherFirstName.$error && !$v.motherFirstName.alpha">Accepts only alphabet characters.</span>
                            </div>
                            <div class="form-group col-md-3" v-bind:class="{ 'has-error': $v.motherMiddleName.$error }">
                              <label style="float:left;font-size:12px;font-weight:bold">Mother Middle Name </label>
                              <input type="text" class="form-control" placeholder="Middle Name" v-model.trim="motherMiddleName" @input="$v.motherMiddleName.$touch()">
                               <span class="help-block" v-if="$v.motherMiddleName.$error && !$v.motherMiddleName.alpha">Accepts only alphabet characters.</span>
                            </div>
                            <div class="form-group col-md-3" v-bind:class="{ 'has-error': $v.motherExtensionName.$error }">
                              <label style="float:left;font-size:12px;font-weight:bold">Mother Extension Name </label>
                              <input type="text" class="form-control" placeholder="Extension Name" v-model.trim="motherExtensionName" @input="$v.motherExtensionName.$touch()">
                               <span class="help-block" v-if="$v.motherExtensionName.$error && !$v.motherExtensionName.alpha">Accepts only alphabet characters.</span>
                                <span class="help-block" v-if="!$v.motherExtensionName.minLength">Extension name must have at least {{ $v.motherExtensionName.$params.minLength.min }} letters.</span>
                            </div>
                          </div>
                          <div class="form-row">
                            <div class="form-group col-md-3">
                              <label style="float:left;font-size:12px;font-weight:bold">Mother Occupation </label>
                              <input type="text" class="form-control" placeholder="Ex: Farmer" v-model.trim="motherOccupation">
                            </div>
                            <div class="form-group col-md-3">
                              <label style="float:left;font-size:12px;font-weight:bold">Father Occupation</label>
                              <input type="text" class="form-control" placeholder="Ex: Farmer" v-model.trim="fatherOccupation">
                            </div>
                            <div class="form-group col-md-3">
                              <label style="float:left;font-size:12px;font-weight:bold">Mother Employer </label>
                              <input type="text" class="form-control" placeholder="Employer" v-model.trim="motherEmployer">
                            </div>
                            <div class="form-group col-md-3">
                              <label style="float:left;font-size:12px;font-weight:bold">Father Employer </label>
                              <input type="text" class="form-control" placeholder="Employer" v-model.trim="fatherEmployer">

                            </div>
                          </div>
                          <div class="form-row">
                            <div class="form-group col-md-3" v-bind:class="{ 'has-error': $v.motherContact.$error }">
                              <label style="float:left;font-size:12px;font-weight:bold">Mother Contact #</label>
                              <input type="text" class="form-control" placeholder="Ex: 0900..." v-model.trim="motherContact" @input="$v.motherContact.$touch()">
                               <span class="help-block" v-if="$v.motherContact.$error && !$v.motherContact.numeric">Accepts only alphabet characters.</span>
                            </div>
                            <div class="form-group col-md-3" v-bind:class="{ 'has-error': $v.fatherContact.$error }">
                              <label style="float:left;font-size:12px;font-weight:bold">Father Contact #</label>
                              <input type="text" class="form-control"  placeholder="Ex: 0900..." v-model.trim="fatherContact" @input="$v.fatherContact.$touch()">
                               <span class="help-block" v-if="$v.fatherContact.$error && !$v.fatherContact.numeric">Accepts only alphabet characters.</span>
                            </div>
                            <div class="form-group col-md-3">
                              <label style="float:left;font-size:12px;font-weight:bold">No. of Siblings in the family below 18 years old and below</label>
                              <select id="no_of_siblings" name="no_of_siblings" class="form-control" v-model="sibblings">
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
                             <div class="form-group col-md-3" v-bind:class="{ 'has-error': $v.solo_parent.$error }">
                              <span style="color:red">*</span><label style="float:left;font-size:12px;font-weight:bold">Solo Parent</label>
                              <select id="solo_parent" name="solo_parent" class="form-control" v-model.trim="solo_parent" @input="$v.solo_parent.$touch()">
                                <option value="1">Yes</option>
                                <option value="2">No</option>
                              </select>
                              <span class="help-block" v-if="$v.solo_parent.$error && !$v.solo_parent.required">Solo Parent is required</span>
                            </div>
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
            sibblings: "",
            solo_parent: ""
        }
    },
    validations: {
          fatherLastName: {
            alpha
        },
          fatherFirstName: {
            alpha
        },
          fatherMiddleName: {
            alpha
        },
          fatherExtensionName: {
            alpha,
            minLength: minLength(3)
        },
          motherLastName: {
            alpha
        },
          motherFirstName: {
            alpha
        },
          motherMiddleName: {
            alpha
        },
          motherExtensionName: {
            alpha,
            minLength: minLength(3)
        },
          motherContact: {
            numeric
        },
          fatherContact: {
            numeric
        },
          solo_parent: {
            required
        },


        form: ["solo_parent"]
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
                          <div class="form-group col-md-12" v-bind:class="{ 'has-error': $v.applicant_type.$error }">
                              <span style="color:red">*</span><label style="float:left;font-size:12px;font-weight:bold">Applicant Type</label>
                              <select id="applicant_type" name="applicant_type" class="form-control" v-model.trim="applicant_type" @input="$v.applicant_type.$touch()">
                                <option value="1">Incoming College Freshmen</option>
                                <option value="3">College Earned Units</option>
                                <option value="4">ALS passer</option>
                                <option value="5">PEPT passer</option>
                              </select>
                              <span class="help-block" v-if="$v.applicant_type.$error && !$v.applicant_type.required">Applicant type is required</span>
                          </div>
                         <div class="form-group col-md-12" v-bind:class="{ 'has-error': $v.schoolLastAttended.$error }">
                          <span style="color:red">*</span><label style="float:left;font-size:12px;font-weight:bold">Name of School Last Attended</label>
                          <input type="text" class="form-control" id="nsla" name="nsla" placeholder="Ex: Caraga State University" v-model.trim="schoolLastAttended" @input="$v.schoolLastAttended.$touch()">
                          <span class="help-block" v-if="$v.schoolLastAttended.$error && !$v.schoolLastAttended.required">Name of School Last Attended is required</span>
                          <span class="help-block" v-if="!$v.schoolLastAttended.minLength">Name of School Last Attended must have at least {{ $v.schoolLastAttended.$params.minLength.min }} letters.</span>
                        </div>   
                       </div>
                       <div class="form-row mt-2">
                        <div class="form-group col-md-12" v-bind:class="{ 'has-error': $v.schoolPreferred.$error }">
                          <span style="color:red">*</span><label style="float:left;font-size:12px;font-weight:bold">School Intended to enroll or enrolled in</label>
                          <select id="siteoei" name="siteoei" class="form-control" v-model.trim="schoolPreferred" @input="$v.schoolPreferred.$touch()">
                            <option v-for="hei in heis" v-bind:value="hei.hei_id">{{ hei.hei_name }}</option>
                          </select>
                          <span class="help-block" v-if="$v.schoolPreferred.$error && !$v.schoolPreferred.alpha">Accepts only alphabet characters.</span>
                          <span class="help-block" v-if="$v.schoolPreferred.$error && !$v.schoolPreferred.required">Name of School Preferred is required</span>
                        </div>
                       </div>
                       <div class="form-row mt-2">
                        <div class="form-group col-md-12" v-bind:class="{ 'has-error': $v.degreeProgram.$error }">
                          <span style="color:red">*</span><label style="float:left;font-size:12px;font-weight:bold">Degree Program</label>
                          <select id="degree_program" name="degree_program" class="form-control" v-model.trim="degreeProgram" @input="$v.degreeProgram.$touch()">
                            <option v-for="program in programs" v-bind:value="program.course_id">{{ program.course_name }}</option>
                          </select>
                          <span class="help-block" v-if="$v.degreeProgram.$error && !$v.degreeProgram.required">Degree Program is required</span>
                        </div>
                       </div>
                       <div class="form-row mt-2 mb-2">
                           <div class="form-group col-md-12">
                                <p style="text-align:justify;font-size:12px">By clicking "Submit" you agree to the <span style="text-decoration: underline"><a href="/">terms and conditions.</a></span></p>
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
                console.log(this.heis);

            }).catch(error => {
                console.log(error);
            });
        },
        fetchProgram() {
            axios.get('fetch/program/').then(result => {

                this.programs = result.data;
                console.log(this.programs);

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

 export default {
    data() {
      return {
        applicationModel: {}
      }
    },
     methods: {
    onComplete: function() {

            var app = this
            this.$auth.register({
              data: {
                username: app.applicationModel.userName,
                email: app.applicationModel.emailAddress,
                password: app.applicationModel.password,
                lastname: app.applicationModel.lastName,
                firstname: app.applicationModel.firstName,
                middlename: app.applicationModel.middleName,
                extensionname: app.applicationModel.extensionName,
                dateofbirth: app.applicationModel.dateOfBirth,
                placeofbirth: app.applicationModel.placeOfBirth,
                sex: app.applicationModel.sex,
                civilstatus: app.applicationModel.civilStatus,
                citizenship: app.applicationModel.citizenship,
                mobilenumber: app.applicationModel.mobileNumber,
                emailaddress: app.applicationModel.emailAddress,
                presentaddress: app.applicationModel.presentAddress,
                city: app.applicationModel.city,
                barangay: app.applicationModel.barangay,
                province: app.applicationModel.province,
                zipcode: app.applicationModel.zipCode,
                fatherlastname: app.applicationModel.fatherLastName,
                fatherfirstname: app.applicationModel.fatherFirstName,
                fathermiddlename: app.applicationModel.fatherMiddleName,
                fatherextensionname: app.applicationModel.fatherExtensionName,
                motherlastname: app.applicationModel.motherLastName,
                motherfirstname: app.applicationModel.motherFirstName,
                mothermiddlename: app.applicationModel.motherMiddleName,
                motherextensionname: app.applicationModel.motherExtensionName,
                motheroccupation: app.applicationModel.motherOccupation,
                fatheroccupation: app.applicationModel.fatherOccupation,
                motheremployer: app.applicationModel.motherEmployer,
                fatheremployer: app.applicationModel.fatherEmployer,
                mothercontact: app.applicationModel.motherContact,
                fathercontact: app.applicationModel.fatherContact,
                sibblings: app.applicationModel.sibblings,
                schoollastattended: app.applicationModel.schoolLastAttended,
                schoolpreferred: app.applicationModel.schoolPreferred,
                degreeprogram: app.applicationModel.degreeProgram,
                soloparent: app.applicationModel.solo_parent,
                applicanttype: app.applicationModel.applicant_type
              },
              success: function () {
                
                alert("Successfull register!");
                this.$router.push({name: 'login', params: {successRegistrationRedirect: true}})
              },
              error: function (res) {
                console.log(res.response.data.errors)
                app.has_error = true
                app.error = res.response.data.error
                app.errors = res.response.data.errors || {}
              }
            })
           
      

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
     // fetchCity() {
     //        axios.get('fetch/city/').then(result => {

     //            this.citys = result.data;
     //            console.log(this.citys);

     //        }).catch(error => {
     //            console.log(error);
     //        });
     // }
    },
    async mounted() {
        // this.fetchCity();
    },
    components: {
      FormWizard,
      TabContent
    }

  }
</script>