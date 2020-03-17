<template>
    <div >
      <div v-if="loading" class="se-pre-con"></div>
      <div class="header">
        <a href="#" id="menu-action">
          <i class="fa fa-bars"></i>
          <span>Close</span>
        </a>
        <div >
          <img class="logo" :src="logo"> CSP
            <ul style="float:right;margin-right:30px;list-style-type:none;">           
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
          <li><a href="#"><i class="fas fa-home"></i><span>Home</span></a></li>
           <router-link to="/student-information"><li><a href="#"><i class="fas fa-user"></i><span>My Information</span></a></li></router-link>
          <router-link to="/student-status"><li><a href="#"><i class="fas fa-question"></i><span>Check Status</span></a></li></router-link>
          <router-link to="/student-dashboard/upload-documents"><li><a href="#"><i class="fas fa-upload"></i><span>Upload Documents</span></a></li></router-link>
        </ul>
      </div>

        <!-- Content -->
        <div class="main">
          <!--  -->
          <div class="jumbotron">
            <form class="col-md-12" method="post" action="foobar" @submit.prevent="upload_documents">
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label >Birth certificate (Certified true copy)</label><span style="color:red">*</span>
                      <span v-if="valid_birth_certificate" style="color:green;font-size:14px; float:right">Valid file.</span>  
                      <span v-if="invalid_birth_certificate" style="color:red;font-size:14px; float:right">Invalid file (only pdf extension)</span>              
                       <input class="form-control-file" type="file" id="file_birth_certificate" ref="file_birth_certificate" @change="addFileBirth()" style="border: 1px solid #ddd">
                    </div>
                    <div class="form-group col-md-6">
                        <label>Income Requirements</label><span style="color:red">*</span>  
                        <select id="select_income" name="select_income" class="form-control" v-model="select_income" @change="income_requirements_func()">
                          <option value="1">Latest Income Tax Return of parents/guardian</option>
                          <option value="2">Certificate of Tax Exemption from the BIR</option>
                          <option value="3">Certificate of Indigence from their Barangay or DSWD</option>
                          <option value="4">Case Study from DSWD</option>
                          <option value="5">Latest copy of contract or proof of income for children of OFW and seafarers</option>
                        </select>
                    </div>
                  </div>
                  <div class="form-row">
                      <div class="form-group col-md-6">
                        <label >Grade Requirements (Certified true copy)</label><span style="color:red">*</span>  
                        <select id="select_grade" name="select_grade" class="form-control" v-model="select_grade" @change="grade_requirements_func()">
                          <option value="1">High school report card for incoming freshmen students eligible for college</option>
                          <option value="2">Grade 11 and 1st semester of Grade 12 for graduating high school students</option>
                          <option value="3">ALS graduate</option>
                        </select>
                      </div>

                      <div class="form-group col-md-6" v-if="select_income == 1">
                        <label >Latest Income Tax Return of parents/guardian</label><span style="color:red">*</span>              
                        <span v-if="valid_itr" style="color:green;font-size:14px; float:right">Valid file.</span>  
                        <span v-if="invalid_itr" style="color:red;font-size:14px; float:right">Invalid file (only pdf extension)</span>   
                         <input v-if="uploadITR" class="form-control-file" id="file_itr" type="file" ref="file_itr" @change="addFileITR()" style="border: 1px solid #ddd">
                      </div>

                      <div class="form-group col-md-6" v-if="select_income == 2">
                        <label >Certificate of Tax Exemption from the BIR</label><span style="color:red">*</span>
                        <span v-if="valid_tax_excemption" style="color:green;font-size:14px; float:right">Valid file.</span>  
                        <span v-if="invalid_tax_excemption" style="color:red;font-size:14px; float:right">Invalid file (only pdf extension)</span>                 
                         <input v-if="uploadTaxExemption" class="form-control-file" id="file_certificate_of_tax_exemption" type="file" ref="file_certificate_of_tax_exemption" @change="addFileCertificate_Of_Tax_Excemption()" style="border: 1px solid #ddd">
                      </div>

                      <div class="form-group col-md-6" v-if="select_income == 3">
                        <label >Certificate of Indigence from their Barangay or DSWD</label><span style="color:red">*</span>
                        <span v-if="valid_indigence" style="color:green;font-size:14px; float:right">Valid file.</span>  
                        <span v-if="invalid_indigence" style="color:red;font-size:14px; float:right">Invalid file (only pdf extension)</span>                 
                         <input v-if="uploadIndigence" class="form-control-file" type="file" id="file_certificate_of_indigence" ref="file_certificate_of_indigence" @change="addFileCertificate_Of_Indigence()" style="border: 1px solid #ddd">
                      </div>

                      <div class="form-group col-md-6" v-if="select_income == 4">
                        <label >Case Study from DSWD</label><span style="color:red">*</span>
                        <span v-if="valid_case_study" style="color:green;font-size:14px; float:right">Valid file.</span>  
                        <span v-if="invalid_case_study" style="color:red;font-size:14px; float:right">Invalid file (only pdf extension)</span>                 
                         <input v-if="uploadCaseStudy" class="form-control-file" type="file" id="file_case_study" ref="file_case_study" @change="addFileCase_Study()" style="border: 1px solid #ddd">
                      </div>

                      <div class="form-group col-md-6" v-if="select_income == 5">
                        <label >Latest copy of contract or proof of income for children of OFW and seafarers</label><span style="color:red">*</span>
                        <span v-if="valid_seafarers" style="color:green;font-size:14px; float:right">Valid file.</span>  
                        <span v-if="invalid_seafarers" style="color:red;font-size:14px; float:right">Invalid file (only pdf extension)</span>                 
                         <input v-if="uploadSeaFarers" class="form-control-file" type="file" id="file_seafarers" ref="file_seafarers" @change="addFileSeafarers()" style="border: 1px solid #ddd">
                      </div>

                  </div>

                  <div class="form-row">

                    <div class="form-group col-md-6" v-if="select_grade == 3">
                      <label>ALS Grade</label><span style="color:red">*</span>
                      <span v-if="valid_als" style="color:green;font-size:14px; float:right">Valid file.</span>  
                      <span v-if="invalid_als" style="color:red;font-size:14px; float:right">Invalid file (only pdf extension)</span>                 
                       <input class="form-control-file" v-if="uploadALS" type="file" id="file_als" ref="file_als" @change="addFileALS()" style="border: 1px solid #ddd">
                    </div>

                    <div class="form-group col-md-6" v-if="select_grade == 2">
                      <label>Certified true copy of grades for grade 11</label><span style="color:red">*</span>
                      <span v-if="valid_grade11" style="color:green;font-size:14px; float:right">Valid file.</span>  
                      <span v-if="invalid_grade11" style="color:red;font-size:14px; float:right">Invalid file (only pdf extension)</span>                 
                       <input class="form-control-file" v-if="uploadGrade11" type="file" id="file_grade11" ref="file_grade11" @change="addFileGrade11()" style="border: 1px solid #ddd">
                    </div>

                    <div class="form-group col-md-6" v-if="select_grade == 1">
                      <label >High School Report Card</label><span style="color:red">*</span>
                      <span v-if="valid_highschool" style="color:green;font-size:14px; float:right">Valid file.</span>  
                      <span v-if="invalid_highschool" style="color:red;font-size:14px; float:right">Invalid file (only pdf extension)</span>                 
                      <input class="form-control-file" v-if="uploadhighschool" type="file" id="file_highschool" ref="file_highschool" @change="addFileHighSchool()" style="border: 1px solid #ddd">
                    </div>

                  </div>



                  <div class="form-row">
                    <div class="form-group col-md-6" v-if="select_grade == 2">
                      <label >Certified true copy of grades for grade 12 (1st semester) </label><span style="color:red">*</span>
                      <span v-if="valid_grade12" style="color:green;font-size:14px; float:right">Valid file.</span>  
                      <span v-if="invalid_grade12" style="color:red;font-size:14px; float:right">Invalid file (only pdf extension)</span>                 
                       <input class="form-control-file" v-if="uploadGrade12" type="file" id="file_grade12" ref="file_grade12" @change="addFileGrade12()" style="border: 1px solid #ddd">
                    </div>
                  </div>
                  <span class="container" style="font-size:12px">Note: Fields marked with an asterisk (<span style="color:red">*</span>) are required.</span> 
                   <button class="btn btn-primary" style="float:right">Upload Documents</button>
                 </form>
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

*:before,
*:after {
  -webkit-box-sizing: border-box;
  -moz-box-sizing: border-box;
  box-sizing: border-box;
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
        loading: false,
        logo: 'image/logo.png',
        logo: '../image/logo.png',
        birth_certificate: '',
        grade11: '',
        grade12: '',
        income_requirements: '',
        other: '',
        select_grade: '',
        select_income: '',
        valid_birth_certificate: false,
        valid_grade11: false,
        valid_grade12: false,
        valid_highschool: false,
        valid_itr: false,
        valid_tax_excemption: false,
        valid_indigence: false,
        valid_case_study: false,
        valid_seafarers: false,
        valid_als: false,
        invalid_birth_certificate: false,
        invalid_grade11: false,
        invalid_grade12: false,
        invalid_highschool: false,
        invalid_itr: false,
        invalid_tax_excemption: false,
        invalid_indigence: false,
        invalid_case_study: false,
        invalid_seafarers: false,
        invalid_als: false,
        uploadGrade11: true,
        uploadGrade12: true,
        uploadhighschool: true,
        uploadIndigence: true,
        uploadITR: true,
        uploadSeaFarers: true,
        uploadCaseStudy: true,
        uploadTaxExemption: true,
        uploadALS: true,
        formData: {}

      }
    },
    methods: {

      fetchUsername: function() {
          axios.get('applicant/fetch_user_name/').then(result => {

              this.username = result.data;
              console.log(this.username);

          }).catch(error => {
              console.log(error);
          });
      },
                addFileALS() {

            this.valid_als = false;
            this.invalid_als = false;
            $('#file_als').css('border-color','');
            var file = $('#file_als').val();
            var ext = ['pdf'];

            if(file) {

            var get_ext = file.split('.');

            get_ext = get_ext.reverse();

            if($.inArray ( get_ext[0].toLowerCase(), ext) > -1) {
            
              if(this.$refs.file_als.files[0].size > 999999) {
      
                  swal("Opps!", "File size required less than 1mb.", "error");
                  return false;

              }else{
                  this.valid_als = true;
                  $('#file_als').css('border-color','#ddd');
                  this.attachmentALS = this.$refs.file_als.files[0];
                  console.log(this.attachmentALS);
                  return false;

              }

            } else {
              this.invalid_als = true;
              $('#file_als').css('border-color','red');
              return false;
            }

            console.log(file);

            }
      
        },
        addFileBirth() {

            this.valid_birth_certificate = false;
            this.invalid_birth_certificate = false;
            $('#file_birth_certificate').css('border-color','');
            var file = $('#file_birth_certificate').val();
            var ext = ['pdf'];

            if(file) {

            var get_ext = file.split('.');

            get_ext = get_ext.reverse();

            if($.inArray ( get_ext[0].toLowerCase(), ext) > -1) {
            
              if(this.$refs.file_birth_certificate.files[0].size > 999999) {
      
                  swal("Opps!", "File size required less than 1mb.", "error");
                  return false;

              }else{
                  this.valid_birth_certificate = true;
                  $('#file_birth_certificate').css('border-color','#ddd');
                  this.attachmentBirthCertificate = this.$refs.file_birth_certificate.files[0];
                  console.log(this.attachmentBirthCertificate);
                  return false;

              }

            } else {
              this.invalid_birth_certificate = true;
              $('#file_birth_certificate').css('border-color','red');
              return false;
            }

            console.log(file);

            }
      
        },
        addFileITR() {

            this.valid_itr = false;
            this.invalid_itr = false;
            $('#file_itr').css('border-color','');
            var file = $('#file_itr').val();
            var ext = ['pdf'];

            if(file) {

            var get_ext = file.split('.');

            get_ext = get_ext.reverse();

            if($.inArray ( get_ext[0].toLowerCase(), ext) > -1) {
            
              if(this.$refs.file_itr.files[0].size > 999999) {
      
                  swal("Opps!", "File size required less than 1mb.", "error");
                  return false;

              }else{
                  this.valid_itr = true;
                  $('#file_itr').css('border-color','#ddd');
                  this.attachmentITR = this.$refs.file_itr.files[0];
                  console.log(this.attachmentITR);
                  return false;

              }

            } else {
              this.invalid_itr = true;
              $('#file_itr').css('border-color','red');
              return false;
            }

            console.log(file);

            }
      
        },
        addFileCertificate_Of_Tax_Excemption() {

            this.valid_tax_excemption = false;
            this.invalid_tax_excemption = false;
            $('#file_certificate_of_tax_exemption').css('border-color','');
            var file = $('#file_certificate_of_tax_exemption').val();
            var ext = ['pdf'];

            if(file) {

            var get_ext = file.split('.');

            get_ext = get_ext.reverse();

            if($.inArray ( get_ext[0].toLowerCase(), ext) > -1) {
            
              if(this.$refs.file_certificate_of_tax_exemption.files[0].size > 999999) {
      
                  swal("Opps!", "File size required less than 1mb.", "error");
                  return false;

              }else{
                  this.valid_tax_excemption = true;
                  $('#file_certificate_of_tax_exemption').css('border-color','#ddd');
                  this.attachmentCertificateExemption = this.$refs.file_certificate_of_tax_exemption.files[0];
                  console.log(this.attachmentCertificateExemption);
                  return false;
              }

            } else {
              this.invalid_tax_excemption = true;
              $('#file_certificate_of_tax_exemption').css('border-color','red');
              return false;
            }

            console.log(file);

            }
      
        },
        addFileCertificate_Of_Indigence() {

            this.valid_indigence = false;
            this.invalid_indigence = false;
            $('#file_certificate_of_indigence').css('border-color','');
            var file = $('#file_certificate_of_indigence').val();
            var ext = ['pdf'];

            if(file) {

            var get_ext = file.split('.');

            get_ext = get_ext.reverse();

            if($.inArray ( get_ext[0].toLowerCase(), ext) > -1) {
            
              if(this.$refs.file_certificate_of_indigence.files[0].size > 999999) {
      
                  swal("Opps!", "File size required less than 1mb.", "error");
                  return false;

              }else{
                  this.valid_indigence = true;
                  $('#file_certificate_of_indigence').css('border-color','#ddd');
                  this.attachmentCertificateIndigence = this.$refs.file_certificate_of_indigence.files[0];
                  console.log(this.attachmentCertificateIndigence);
                  return false;
              }

            } else {
              this.invalid_indigence = true;
              $('#file_certificate_of_indigence').css('border-color','red');
              return false;
            }

            console.log(file);
      
        }
      },
        addFileCase_Study() {


            this.valid_case_study = false;
            this.invalid_case_study = false;
            $('#file_case_study').css('border-color','');
            var file = $('#file_case_study').val();
            var ext = ['pdf'];

            if(file) {

            var get_ext = file.split('.');

            get_ext = get_ext.reverse();

            if($.inArray ( get_ext[0].toLowerCase(), ext) > -1) {
            
              if(this.$refs.file_case_study.files[0].size > 999999) {
      
                  swal("Opps!", "File size required less than 1mb.", "error");
                  return false;

              }else{
                  this.valid_case_study = true;
                  $('#file_case_study').css('border-color','#ddd');
                  this.attachmentCaseStudy = this.$refs.file_case_study.files[0];
                  console.log(this.attachmentCaseStudy);
                  return false;
              }

            } else {
              this.invalid_case_study = true;
              $('#file_case_study').css('border-color','red');
              return false;
            }

            console.log(file);
      
          }
      
        },
        addFileSeafarers() {

            this.valid_seafarers = false;
            this.invalid_seafarers = false;
            $('#file_seafarers').css('border-color','');
            var file = $('#file_seafarers').val();
            var ext = ['pdf'];

            if(file) {

            var get_ext = file.split('.');

            get_ext = get_ext.reverse();

            if($.inArray ( get_ext[0].toLowerCase(), ext) > -1) {
            
              if(this.$refs.file_seafarers.files[0].size > 999999) {
      
                  swal("Opps!", "File size required less than 1mb.", "error");
                  return false;

              }else{
                  this.valid_seafarers = true;
                  $('#file_seafarers').css('border-color','#ddd');
                  this.attachmentSeaFarers = this.$refs.file_seafarers.files[0];
                  console.log(this.attachmentSeaFarers);
                  return false;
              }

            } else {
              this.invalid_seafarers = true;
              $('#file_seafarers').css('border-color','red');
              return false;
            }

            console.log(file);
      
          }
      
        },
        addFileGrade11() {

            this.valid_grade11 = false;
            this.invalid_grade11 = false;
            $('#file_grade11').css('border-color','');
            var file = $('#file_grade11').val();
            var ext = ['pdf'];

            if(file) {

            var get_ext = file.split('.');

            get_ext = get_ext.reverse();

            if($.inArray ( get_ext[0].toLowerCase(), ext) > -1) {
            
              if(this.$refs.file_grade11.files[0].size > 999999) {
      
                  swal("Opps!", "File size required less than 1mb.", "error");
                  return false;

              }else{
                  this.valid_grade11 = true;
                  $('#file_grade11').css('border-color','#ddd');
                  this.attachmentGrade11 = this.$refs.file_grade11.files[0];
                  console.log(this.attachmentGrade11);
                  return false;
              }

            } else {
              this.invalid_grade11 = true;
              $('#file_grade11').css('border-color','red');
              return false;
            }

            console.log(file);
      
          }
      
        },
        addFileHighSchool() {

            this.valid_highschool = false;
            this.invalid_highschool = false;
            $('#file_highschool').css('border-color','');
            var file = $('#file_highschool').val();
            var ext = ['pdf'];

            if(file) {

            var get_ext = file.split('.');

            get_ext = get_ext.reverse();

            if($.inArray ( get_ext[0].toLowerCase(), ext) > -1) {
            
              if(this.$refs.file_highschool.files[0].size > 999999) {
      
                  swal("Opps!", "File size required less than 1mb.", "error");
                  return false;

              }else{
                  this.valid_highschool = true;
                  $('#file_highschool').css('border-color','#ddd');
                  this.attachmentHighSchool = this.$refs.file_highschool.files[0];
                  console.log(this.attachmentHighSchool);
                  return false;
              }

            } else {
              this.invalid_highschool = true;
              $('#file_highschool').css('border-color','red');
              return false;
            }

            console.log(file);
      
          }
      
        },
        addFileGrade12() {

            this.valid_grade12 = false;
            this.invalid_grade12 = false;
            $('#file_grade12').css('border-color','');
            var file = $('#file_grade12').val();
            var ext = ['pdf'];

            if(file) {

            var get_ext = file.split('.');

            get_ext = get_ext.reverse();

            if($.inArray ( get_ext[0].toLowerCase(), ext) > -1) {
            
              if(this.$refs.file_grade12.files[0].size > 999999) {
      
                  swal("Opps!", "File size required less than 1mb.", "error");
                  return false;

              }else{
                  this.valid_grade12 = true;
                  $('#file_grade12').css('border-color','#ddd');
                  this.attachmentGrade12 = this.$refs.file_grade12.files[0];
                  console.log(this.attachmentGrade12);
                  return false;
              }

            } else {
              this.invalid_grade12 = true;
              $('#file_grade12').css('border-color','red');
              return false;
            }

            console.log(file);
      
          }
      
        },
        grade_requirements_func() {

         this.valid_highschool = false;
         this.invalid_highschool = false;
         this.valid_grade12 = false;
         this.valid_grade11 = false;
         this.valid_als = false;
         this.invalid_grade11 = false;
         this.invalid_grade12 = false;
         this.invalid_als = false;
         this.uploadGrade11 = false;
         this.uploadGrade12 = false;
         this.uploadhighschool = false;
         this.uploadALS = false;
         this.$nextTick(() => {
            this.uploadGrade11 = true;
            this.uploadGrade12 = true;
            this.uploadhighschool = true;
            this.uploadALS = true;
         });
         return false;

       },
      income_requirements_func() {

        this.valid_seafarers = false;
        this.invalid_seafarers = false;
        this.valid_indigence = false;
        this.invalid_indigence = false;
        this.valid_itr = false;
        this.invalid_itr = false;
        this.valid_case_study = false;
        this.invalid_case_study = false;
        this.valid_tax_excemption = false;
        this.invalid_tax_excemption = false;
        this.uploadIndigence = false;
        this.uploadITR = false;
        this.uploadCaseStudy = false;
        this.uploadTaxExemption = false;
        this.uploadSeaFarers = false;

         this.$nextTick(() => {
            this.uploadIndigence = true;
            this.uploadITR = true;
            this.uploadCaseStudy = true;
            this.uploadTaxExemption = true;
            this.uploadSeaFarers = true;
         });
         return false;

       },
       upload_documents() {

          this.formData = new FormData();
          this.formData.append('file_grade11', this.attachmentGrade11);
          this.formData.append('file_grade12', this.attachmentGrade12);
          this.formData.append('file_als', this.attachmentALS);
          this.formData.append('file_seafarers', this.attachmentSeaFarers);
          this.formData.append('file_case_study', this.attachmentCaseStudy);
          this.formData.append('file_certificate_of_indigence', this.attachmentCertificateIndigence);
          this.formData.append('file_certificate_of_tax_exemption', this.attachmentCertificateExemption);
          this.formData.append('file_highschool', this.attachmentHighSchool);
          this.formData.append('file_birth_certificate', this.attachmentBirthCertificate);
          this.formData.append('file_itr', this.attachmentITR);

          if((this.attachmentGrade11 && this.attachmentGrade12 || this.attachmentALS || this.attachmentHighSchool) && (this.attachmentSeaFarers || this.attachmentCaseStudy || this.attachmentCertificateIndigence || this.attachmentCertificateExemption || this. attachmentITR) && this.attachmentBirthCertificate) {

          axios.post('applicant/upload_documents/', this.formData, {headers: {'Content-Type': 'multipart/form-data'}}).then(result => {

              if(result.data == 1) {
                  this.$swal.fire({
                    icon: 'success',
                    title: 'Great...',
                    text: `Uploaded successfully.`,
                  })
                  return false;
              }


          }).catch(error => {
              console.log(error);
          });

        }
         if(!this.attachmentBirthCertificate) {

            this.$swal.fire({
              icon: 'error',
              title: 'Opps...',
              text: `Birth certificate no file chosen.`,
            })

            return false;
         }

        if(!(this.attachmentGrade11 && this.attachmentGrade12) || this.attachmentHighSchool || this.attachmentALS) {

            this.$swal.fire({
              icon: 'error',
              title: 'Opps...',
              text: `Grade requirements no file chosen.`,
            })

            return false;
        }

        if(!(this.attachmentSeaFarers || this.attachmentCaseStudy || this.attachmentCertificateIndigence || this.attachmentCertificateExemption || this.attachmentITR) ) {

            this.$swal.fire({
              icon: 'error',
              title: 'Opps...',
              text: `Income requirements no file chosen.`,
            })

            return false;

       }


     }

    },
    async mounted() {
      this.fetchUsername();
    },
    components: {
      //
    }
  }
</script>