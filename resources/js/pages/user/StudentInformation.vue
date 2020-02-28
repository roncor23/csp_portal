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
        <router-link to="/student-status"><li><a href="#"><i class="fas fa-question"></i><span>Check Status</span></a></li></router-link>
		  </ul>
		</div>

    

		<!-- Content -->

		<div class="main">
      <div class="jumbotron" style="background-color:#ff000024" v-for="applicant in applicants" v-if="applicant.confirm === 0">
         <p>Please check your email at <span><a href="#">{{applicant.email}}</a></span> with your code. Your code is 7 characters in length. Verify first before you use this portal. Thanks!</p>
      </div>
     <div class="jumbotron" v-for="applicant in applicants" v-if="applicant.confirm === 1">
      <div class="d-flex justify-content-start">
        <i class="fas fa-print" @click="print" style="cursor:pointer;padding:3px"><a href="#" style="padding:3px;color:#6495ED">Print</a></i>
        <i class="fas fa-edit" @click="editItem(applicant)" style="cursor:pointer;padding:3px" data-toggle="modal" data-target="#applicantModal"><a href="#" style="padding:3px;color:#6495ED">Edit</a></i>
      </div>
      <div id="applicant_information">     
          <div class="d-flex justify-content-end" style="margin-bottom:70px">
            <div class="d-flex justify-content-center" style="border:1px solid;height:200px;width:200px;position:absolute">
              <p style="font-size:12px;line-height: 0.7;margin-top:100px">2x2&nbsp;ID PICTURE</p>
            </div>
          </div>
          <div style="margin-bottom:120px">
            <img class="_logo" :src="form_logo" style="position:absolute;margin-left:300px">
            <p class="d-flex justify-content-center" style="font-size:14px;line-height: 0.01;">Office of the President of the Philippines</p>

            <p class="d-flex justify-content-center" style="font-size:14px;line-height: 0.01;">COMMISSION ON HIGHER EDUCATION</p>
            <P class="d-flex justify-content-center" style="font-size:14px;line-height: 0.01;">REGIONAL OFFICE XIII</P>
            <h4 class="d-flex justify-content-around" style="font-size:14px">CHED SCHOLARSHIP PROGRAM (CSP)</h4>
            <h4 class="d-flex justify-content-center" style="font-size:14px;line-height: 0.1;font-weight:bold">APPLICATION FORM</h4>
         </div>

  			<!-- Applicant Information -->
        <table class="table table-sm mt-4">
          <thead><tr style="font-size:14px;font-weight:bold;color:red"><th>REFERENCE #:&nbsp; {{applicant.reference_no}}</th><th></th><th></th><th></th></tr></thead>
          <thead><tr style="font-size:10px;font-weight:bold;color:blue"><th>PERSONAL INFORMATION</th><th></th><th></th><th></th></tr></thead>
          <thead>
            <tr style="font-size:10px">
              <th scope="col" style="width:25%">Last Name</th>
              <th scope="col" style="width:25%">First Name</th>
              <th scope="col" style="width:25%">Middle Name</th>
              <th scope="col" style="width:25%">Ext. Name</th>
            </tr>
          </thead>
          <tbody>
            <tr style="font-size:10px">     
              <td>{{applicant.lname}}</td>
              <td>{{applicant.fname}}</td>
              <td>{{applicant.mname}}</td>
              <td>{{applicant.xname}}</td>
            </tr>
          </tbody>
            <thead>
            <tr style="font-size:10px">
              <th scope="col">Date of Birth</th>
              <th scope="col">Place of Birth</th>
              <th scope="col">Gender</th>
              <th scope="col">Civil Status</th>
            </tr>
          </thead>
          <tbody>
            <tr style="font-size:10px">
              <td>{{applicant.birthdate}}</td>
              <td>{{applicant.place_of_birth}}</td>
              <td v-if="applicant.gender === 1">Male</td>
              <td v-if="applicant.gender === 2">Female</td>
              <td v-if="applicant.civil_status === 1">Single</td>
              <td v-if="applicant.civil_status === 2">Maried</td>
              <td v-if="applicant.civil_status === 3">Separated</td>
              <td v-if="applicant.civil_status === 4">Devorced</td>
              <td v-if="applicant.civil_status === 5">Widowed</td>
            </tr>
          </tbody>
          <thead>
            <tr style="font-size:10px">
              <th scope="col">Citizenship</th>
              <th scope="col">Mobile Number</th>
              <th scope="col">Email Address</th>
              <th scope="col">Present Address</th>
            </tr>
          </thead>
          <tbody>
            <tr style="font-size:10px">       
              <td v-if="applicant.citizenship === 1">Filipino</td>
              <td v-if="applicant.citizenship === 2">American</td>
              <td>{{applicant.contact}}</td>
              <td>{{applicant.email}}</td>
              <td>{{applicant.present_address}}</td>
            </tr>
          </tbody>
          <thead>
            <tr style="font-size:10px">
              <th scope="col">City</th>
              <th scope="col">Barangay</th>
              <th scope="col">Province</th>
              <th scope="col">Zipcode</th>
            </tr>
          </thead>
          <tbody>
            <tr style="font-size:10px">   
              <td v-for="city in citys" v-bind:value="city.city_id" v-if="applicant.town_city === city.city_id">{{city.mun_city_name}}</td>
              <td v-for="brgy in brgys" v-bind:value="brgy.brgy_id" v-if="applicant.brgy === brgy.brgy_id">{{brgy.name}}</td>
              <td v-for="province in provinces" v-bind:value="province.province_id" v-if="applicant.province === province.province_id">{{province.prov_name}}</td>
              <td>{{applicant.zipcode}}</td>
            </tr>
          </tbody>
          <thead>
            <tr style="font-size:10px">
              <th scope="col">Facebook profile</th><th></th><th></th><th></th>
            </tr>
          </thead>
          <tbody>
            <tr style="font-size:10px">   
              <td>{{applicant.fb_url}}</td>
            </tr>
          </tbody>
          <thead><tr style="font-size:10px;font-weight:bold;color:blue"><th>FAMILY BACKGROUND</th><th></th><th></th><th></th></tr></thead>
          <thead>
            <tr style="font-size:10px">
              <th scope="col">Father's Last Name</th>
              <th scope="col">Father's First Name</th>
              <th scope="col">Father's Middle Name</th>
              <th scope="col">Father's Name Ext.</th>
            </tr>
          </thead>
          <tbody>
            <tr style="font-size:10px">   
              <td>{{applicant.father_lname}}</td>
              <td>{{applicant.father_fname}}</td>
              <td>{{applicant.father_mname}}</td>
              <td>{{applicant.father_xname}}</td>
            </tr>
          </tbody>
          <thead>
            <tr style="font-size:10px">
              <th scope="col">Mother's Last Name</th>
              <th scope="col">Mother's First Name</th>
              <th scope="col">Mother's Middle Name</th>
              <th scope="col">Mother's Name Ext.</th>
            </tr>
          </thead>
          <tbody>
            <tr style="font-size:10px">   
              <td>{{applicant.mother_lname}}</td>
              <td>{{applicant.mother_fname}}</td>
              <td>{{applicant.mother_mname}}</td>
              <td>{{applicant.mother_xname}}</td>
            </tr>
          </tbody>
          <thead>
            <tr style="font-size:10px">
              <th scope="col">Mother's Occupation</th>
              <th scope="col">Father's Occupation</th>
              <th scope="col">Mother's Employer</th>
              <th scope="col">Father's Employer</th>
            </tr>
          </thead>
          <tbody>
            <tr style="font-size:10px">   
              <td>{{applicant.mother_occupation}}</td>
              <td>{{applicant.father_occupation}}</td>
              <td>{{applicant.mother_employer}}</td>
              <td>{{applicant.father_employer}}</td>
            </tr>
          </tbody>
          <thead>
            <tr style="font-size:10px">
              <th scope="col">Mother's Contact #</th>
              <th scope="col">Father's Contact #</th>
              <th scope="col">No. of Siblings</th>
            </tr>
          </thead>
          <tbody>
            <tr style="font-size:10px">   
              <td>{{applicant.mother_contact_number}}</td>
              <td>{{applicant.father_contact_number}}</td>
              <td>{{applicant.number_of_siblings}}</td>
            </tr>
          </tbody>
          <thead><tr style="font-size:10px;font-weight:bold;color:blue;border-style:none"><th>PREFERRED SCHOOL</th><th></th><th></th><th></th></tr></thead>
          <thead>
            <tr style="font-size:10px">
              <th scope="col">Applicant Type</th>
              <th scope="col">Name of School Last Attended</th>
              <th scope="col">School Intended to enroll</th>
              <th scope="col">Degree program</th>
            </tr>
          </thead>
          <tbody>
            <tr style="font-size:10px">   
              <td v-if="applicant.applicant_type === 1">Incoming College Freshmen</td>
              <td v-if="applicant.applicant_type === 3">College Earned Units</td>
              <td v-if="applicant.applicant_type === 4">ALS passer</td>
              <td v-if="applicant.applicant_type === 5">PEPT passer</td>      
              <td>{{applicant.name_of_school_last_attended}}</td>
              <td v-for="hei in heis" v-bind:value="hei.hei_id" v-if="applicant.hei === hei.hei_id">{{hei.hei_name}}</td>
              <td v-for="program in programs" v-bind:value="program.course_id" v-if="applicant.course === program.course_id">{{program.course_name}}</td>
            </tr>
          </tbody>
          <thead><tr style="font-size:10px;font-weight:bold;color:blue"><th>MARGINALIZED GROUP</th><th></th><th></th><th></th></tr></thead>
          <thead>
            <tr style="font-size:10px">
              <th scope="col">Indigenous Peoples (IP)</th>
              <th scope="col">Persons with Disability (PWDs)</th>
              <th scope="col">4ps</th>
              <th scope="col">Senior Citizen</th>
            </tr>
          </thead>
          <tbody>
            <tr style="font-size:10px">   
              <td v-if="applicant.ips === 1">Yes</td>
              <td v-if="applicant.ips === 2">No</td>
              <td v-if="applicant.pwd === 1">Yes</td>
              <td v-if="applicant.pwd === 2">No</td>
              <td v-if="applicant.forps === 1">Yes</td>
              <td v-if="applicant.forps === 2">No</td>
              <td v-if="applicant.senior_citizen === 1">Yes</td>
              <td v-if="applicant.senior_citizen === 2">No</td>
            </tr>
          </tbody>
          <thead>
            <tr style="font-size:10px">
              <th scope="col">Solo Parent</th>
              <th scope="col">Dependent to a Solo Parent</th>
              <th></th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <tr style="font-size:10px">   
              <td v-if="applicant.applicant_solo_parent === 1">Yes</td>
              <td v-if="applicant.supported_by_solo_parent === 1">Yes</td>
              <td v-if="applicant.applicant_solo_parent === 2">No</td>
              <td v-if="applicant.supported_by_solo_parent === 2">No</td>
            </tr>
          </tbody>
        </table>
        <div class="d-flex justify-content-start">
          <p style="font-size:10px;font-weight:bold">Evaluated/Processed by:</p>
        </div>
        <div class="d-flex flex-row mt-4">
          <div class="col-md-4">
            <p style="text-align:center;font-size:10px;margin:0;visibility:hidden">invisible</p>
            <p style="font-size:10px;border:1px solid;text-align:center;border-left:none;border-right:none;border-bottom:none">CSP Coordianator</p>
          </div>
          <div class="col-md-4" >
            <p style="text-align:center;font-size:10px;margin:0">{{applicant.app_created_at}}</p>
            <p  style="font-size:10px;border:1px solid; text-align:center;border-left:none;border-right:none;border-bottom:none">Applied Date</p>
          </div>
          <div class="col-md-4" >
            <p style="text-align:center;font-size:10px;margin:0;visibility:hidden">invisible</p>
            <p style="font-size:10px;border:1px solid;text-align:center;border-left:none;border-right:none;border-bottom:none">Student Signature(Over Printed Name)</p>
          </div>
        </div>  
        <div class="d-flex flex-row mt-4">
          <div class="col-md-4" >
            <p style="font-size:10px;border:1px solid;text-align:center;border-left:none;border-right:none;border-bottom:none">Date of submission of required documents</p>
          </div>
        </div>  
        <div class="d-flex flex-row mt-4">
          <div class="col-md-4">
            <div class="d-flex justify-content-center" style="position:absolute;margin-left:70px">
             <img :src="e_sign">
            </div>
            <div class="form-group" style="margin-top:40px">
            <p style="font-size:10px;border:1px solid;text-align:center;border-left:none;border-right:none;border-top:none;margin:0">Criseldo C. Calinawan, Ph.D, PECE</p>
            <p style="text-align:center;font-size:10px">CHED Regional Scholarship Coordinator</p>
           </div>
          </div>
          <div class="col-md-8">
            <div class="form-group" style="border: 1px solid; padding:10px">
              <h4 style="font-size:14px">SUBMIT APPLICATION TO CHED SCHOLARSHIP UNIT</h4>
                <ul style="font-size:10px">
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
          </div>
        </div>  
      </div>
     </div>
		</div>

              <!-- EDIT MODAL -->
              <div class="modal fade bd-example-modal-xl" id="applicantModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel" style="font-weight:bold">Applicant</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                     <form
                    class="form" id="" method="post" action="foobar"
                    @submit.prevent="updateData(selectedItem.id)"
                  >
                       <div class="form-row">
                        <div class="form-group col-md-2">
                          <span style="font-size:10px;font-weight:bold">Last Name</span>
                          <input type="text" id="lname" class="form-control" v-model="selectedItem.lname" disabled>
                        </div>
                        <div class="form-group col-md-2">
                          <span style="font-size:10px;font-weight:bold">First Name</span>
                          <input type="text" id="fname" class="form-control" v-model="selectedItem.fname" disabled>
                        </div>
                        <div class="form-group col-md-2">
                          <span style="font-size:10px;font-weight:bold">Middle Name</span>
                          <input type="text" id="mname" class="form-control" v-model="selectedItem.mname" disabled>
                        </div>
                         <div class="form-group col-md-2">
                          <span style="font-size:10px;font-weight:bold">Extension Name</span>
                          <input type="text" id="xname" class="form-control" v-model="selectedItem.xname" disabled>
                        </div>
                        <div class="form-group col-md-2">
                          <span style="font-size:10px;font-weight:bold">Date of Birth</span>
                          <input type="date" class="form-control" v-model="selectedItem.birthdate">
                        </div>
                        <div class="form-group col-md-2">
                          <span style="font-size:10px;font-weight:bold">Place of Birth</span>
                          <input type="text" id="place_of_birth" class="form-control" v-model="selectedItem.place_of_birth">
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="form-group col-md-2">
                          <span style="font-size:10px;font-weight:bold">Gender</span>
                           <select name="gender" class="form-control" v-model="selectedItem.gender">
                            <option value="1">Male</option>
                            <option value="2">Female</option>
                          </select>
                        </div>
                         <div class="form-group col-md-2">
                          <span style="font-size:10px;font-weight:bold">Civil Status</span>
                           <select name="civil_status" class="form-control" v-model="selectedItem.civil_status">
                            <option value="1">Single</option>
                            <option value="2">Maried</option>
                            <option value="3">Separated</option>
                            <option value="4">Devorced</option>
                            <option value="5">Widowed</option>
                          </select>
                        </div>
                        <div class="form-group col-md-2">
                          <span style="font-size:10px;font-weight:bold">Citizenship</span>
                          <select name="citizenship" class="form-control" v-model="selectedItem.citizenship">
                            <option value="1">Filipino</option>
                            <option value="2">American</option>
                          </select>
                        </div>
                        <div class="form-group col-md-2">
                          <span style="font-size:10px;font-weight:bold">Mobile Number</span>
                          <input type="text" id="mobile_number" class="form-control" v-model="selectedItem.contact">
                        </div>
                        <div class="form-group col-md-2">
                          <span style="font-size:10px;font-weight:bold">E-mail Address</span>
                          <input type="text" id="email" class="form-control" v-model="selectedItem.email">
                        </div>
                         <div class="form-group col-md-2">
                          <span style="font-size:10px;font-weight:bold">Present Address</span>
                          <input type="text" id="present_address" class="form-control" v-model="selectedItem.present_address">
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="form-group col-md-2">
                          <span style="font-size:10px;font-weight:bold">City</span>
                          <select name="town_city" class="form-control" v-model="selectedItem.town_city">
                            <option v-for="city in citys" v-bind:value="city.city_id">{{ city.mun_city_name }}</option>
                          </select>
                        </div>
                        <div class="form-group col-md-2">   
                          <span style="font-size:10px;font-weight:bold">Barangay</span>    
                          <select  name="barangay" class="form-control" v-model="selectedItem.brgy">
                            <option v-for="brgy in brgys" v-bind:value="brgy.brgy_id">{{ brgy.name }}</option>
                          </select>
                        </div>
                        <div class="form-group col-md-2">
                          <span style="font-size:10px;font-weight:bold">Province</span>
                           <select  name="province" class="form-control" v-model="selectedItem.province">
                            <option v-for="province in provinces" v-bind:value="province.province_id">{{ province.prov_name }}</option>
                          </select>
                        </div>
                        <div class="form-group col-md-2">
                          <span style="font-size:10px;font-weight:bold">Zipcode</span>
                          <input type="text" id="zipcode" class="form-control" v-model="selectedItem.zipcode">
                        </div>
                        <div class="form-group col-md-2">
                          <span style="font-size:10px;font-weight:bold">Last School Attended</span>
                          <input type="text" id="last_school_attended" class="form-control" v-model="selectedItem.name_of_school_last_attended">
                        </div>
                        <div class="form-group col-md-2">
                          <span style="font-size:10px;font-weight:bold">School Intended</span>
                          <select name="hei" class="form-control" v-model="selectedItem.hei">
                            <option v-for="hei in heis" v-bind:value="hei.hei_id">{{ hei.hei_name}}</option>
                          </select>
                        </div>
                      </div>
                      <div class="form-row">
                        <div class="form-group col-md-2">
                          <span style="font-size:10px;font-weight:bold">Degree Program</span>
                          <select name="course" class="form-control" v-model="selectedItem.course">
                            <option v-for="program in programs" v-bind:value="program.course_id">{{ program.course_name}}</option>
                          </select>
                        </div>
                        <div class="form-group col-md-2">
                          <span style="font-size:10px;font-weight:bold">Applicant Type</span>
                          <select name="applicant_type" class="form-control" v-model="selectedItem.applicant_type">
                            <option value="1">Incoming College Freshmen</option>
                            <option value="3">College Earned Units</option>
                            <option value="4">ALS passer</option>
                            <option value="5">PEPT passer</option>
                          </select>
                        </div>
                        <div class="form-group col-md-2">
                          <span style="font-size:10px;font-weight:bold">Father's Last Name</span>
                          <input type="text" class="form-control" v-model="selectedItem.father_lname">
                        </div> 
                         <div class="form-group col-md-2">
                          <span style="font-size:10px;font-weight:bold">Father's First Name</span>
                          <input type="text" class="form-control" v-model="selectedItem.father_fname">
                        </div> 
                         <div class="form-group col-md-2">
                          <span style="font-size:10px;font-weight:bold">Father's Middle Name</span>
                          <input type="text" class="form-control" v-model="selectedItem.father_mname">
                        </div> 
                         <div class="form-group col-md-2">
                          <span style="font-size:10px;font-weight:bold">Father's Name Extension</span>
                          <input type="text" class="form-control" v-model="selectedItem.father_ename">
                        </div>           
                      </div>
                      <div class="form-row">
                        <div class="form-group col-md-2">
                          <span style="font-size:10px;font-weight:bold">Mother's Last Name</span>
                          <input type="text" class="form-control" v-model="selectedItem.mother_lname">
                        </div> 
                         <div class="form-group col-md-2">
                          <span style="font-size:10px;font-weight:bold">Mother's First Name</span>
                          <input type="text" class="form-control" v-model="selectedItem.mother_fname">
                        </div> 
                         <div class="form-group col-md-2">
                          <span style="font-size:10px;font-weight:bold">Mother's Middle Name</span>
                          <input type="text" class="form-control" v-model="selectedItem.mother_mname">
                        </div> 
                         <div class="form-group col-md-2">
                          <span style="font-size:10px;font-weight:bold">Mother's Name Extension</span>
                          <input type="text" class="form-control" v-model="selectedItem.mother_ename">
                        </div> 
                        <div class="form-group col-md-2">
                          <span style="font-size:10px;font-weight:bold">Mother's Occupation</span>
                          <input type="text" class="form-control" v-model="selectedItem.mother_occupation">
                        </div>  
                        <div class="form-group col-md-2">
                          <span style="font-size:10px;font-weight:bold">Father's Occupation</span>
                          <input type="text" class="form-control" v-model="selectedItem.father_occupation">
                        </div>          
                      </div>
                      <div class="form-row">
                        <div class="form-group col-md-2">
                          <span style="font-size:10px;font-weight:bold">Mother's Employer</span>
                          <input type="text" class="form-control" v-model="selectedItem.mother_employer">
                        </div> 
                         <div class="form-group col-md-2">
                          <span style="font-size:10px;font-weight:bold">Father's Employer</span>
                          <input type="text" class="form-control" v-model="selectedItem.father_employer">
                        </div> 
                         <div class="form-group col-md-2">
                          <span style="font-size:10px;font-weight:bold">Mother's Contact #</span>
                          <input type="text" class="form-control" v-model="selectedItem.mother_contact_number">
                        </div> 
                         <div class="form-group col-md-2">
                          <span style="font-size:10px;font-weight:bold">Father's Contact #</span>
                          <input type="text" class="form-control" v-model="selectedItem.father_contact_number">
                        </div> 
                        <div class="form-group col-md-4">
                          <span style="font-size:10px;font-weight:bold">Number of siblings</span>
                          <select class="form-control" v-model="selectedItem.number_of_siblings">
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
                          </select>
                        </div>           
                      </div>
                      <div class="form-row">
                        <div class="form-group col-md-6">
                          <span style="font-size:10px;font-weight:bold">Facebook profile</span>
                          <input type="text" class="form-control" v-model="selectedItem.fb_url">
                        </div> 
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                      </div>
                      </form>
                    </div>
                  </div>
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
._logo {
  width: 60px;
  height: 60px;
}
</style>

<script>
import axios from 'axios';
import Vue from 'vue';
import VueHtmlToPaper from 'vue-html-to-paper';

const options = {
  name: '_blank',
  specs: [
    'fullscreen=yes',
    'titlebar=yes',
    'scrollbars=yes'
  ],
  styles: [
    'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css',
    'https://unpkg.com/kidlat-css/css/kidlat.css'
  ]
}
 
Vue.use(VueHtmlToPaper, options);
 

  export default {
    data() {
      return {
        applicants: {},
        citys: {},
        brgys: {},
        heis: {},
        programs: {},
        provinces: {},
        username: '',
        output: null,
        selectedItem: {},
        logo: 'image/logo.png',
        form_logo: 'image/form_logo.png',
        e_sign: 'image/calinawan.png'
      }
    },
    methods: {
      print() {
      // Pass the element id here
      this.$htmlToPaper('applicant_information');

      },
      fetchApplicant: function() {

            axios.get('applicant/fetch_applicant/').then(result => {
                this.applicants = result.data;          

            }).catch(error => {
                console.log(error);
            });
      },
      fetchCity: function() {
        axios.get('applicant/fetch_city/').then(result => {

            this.citys = result.data;

        }).catch(error => {
            console.log(error);
        });
      },
      fetchBrgy: function() {
        axios.get('applicant/fetch_brgy/').then(result => {

            this.brgys = result.data;

        }).catch(error => {
            console.log(error);
        });
      },
      fetchProvince: function() {
          axios.get('applicant/fetch_province/').then(result => {

              this.provinces = result.data;

          }).catch(error => {
              console.log(error);
          });
      },
      fetchProgram: function() {
          axios.get('applicant/fetch_program/').then(result => {

              this.programs = result.data;

          }).catch(error => {
              console.log(error);
          });
      },
      fetchHEI: function() {
          axios.get('applicant/fetch_hei/').then(result => {

              this.heis = result.data;

          }).catch(error => {
              console.log(error);
          });
      },
      fetchUsername: function() {
          axios.get('applicant/fetch_user_name/').then(result => {

              this.username = result.data;

          }).catch(error => {
              console.log(error);
          });
      },
      editItem: function(applicant) {
        this.selectedItem = applicant;
      },
      updateData: function($id) {

          $('#lname').css('border-color','');
          $('#fname').css('border-color','');   
          $('#place_of_birth').css('border-color','');  
          $('#mobile_number').css('border-color',''); 
          $('#email').css('border-color','');   
          $('#present_address').css('border-color',''); 
          $('#zipcode').css('border-color',''); 
          $('#last_school_attended').css('border-color','');    
 
        if(this.selectedItem.lname && this.selectedItem.fname && this.selectedItem.place_of_birth && this.selectedItem.contact && this.selectedItem.email && this.selectedItem.present_address && this.selectedItem.zipcode && this.selectedItem.name_of_school_last_attended) {

          this.formData = new FormData();
          this.formData.append('lname', this.selectedItem.lname);
          this.formData.append('fname', this.selectedItem.fname);
          this.formData.append('mname', this.selectedItem.mname);
          this.formData.append('xname', this.selectedItem.xname);
          this.formData.append('birthdate', this.selectedItem.birthdate);
          this.formData.append('place_of_birth', this.selectedItem.place_of_birth);
          this.formData.append('gender', this.selectedItem.gender);
          this.formData.append('civil_status', this.selectedItem.civil_status);
          this.formData.append('citizenship', this.selectedItem.citizenship);
          this.formData.append('contact', this.selectedItem.contact);
          this.formData.append('email', this.selectedItem.email);
          this.formData.append('present_address', this.selectedItem.present_address);
          this.formData.append('town_city_id', this.selectedItem.town_city);
          this.formData.append('brgy_id', this.selectedItem.brgy);
          this.formData.append('province', this.selectedItem.province);
          this.formData.append('zipcode', this.selectedItem.zipcode);
          this.formData.append('name_of_school_last_attended', this.selectedItem.name_of_school_last_attended);
          this.formData.append('hei_id', this.selectedItem.hei);
          this.formData.append('course_id', this.selectedItem.course);
          this.formData.append('applicant_type', this.selectedItem.applicant_type);
          this.formData.append('father_lname', this.selectedItem.father_lname);
          this.formData.append('father_fname', this.selectedItem.father_fname);
          this.formData.append('father_mname', this.selectedItem.father_mname);
          this.formData.append('father_xname', this.selectedItem.father_xname);
          this.formData.append('mother_lname', this.selectedItem.mother_lname);
          this.formData.append('mother_fname', this.selectedItem.mother_fname);
          this.formData.append('mother_mname', this.selectedItem.mother_mname);
          this.formData.append('mother_xname', this.selectedItem.mother_xname);
          this.formData.append('mother_occupation', this.selectedItem.mother_occupation);
          this.formData.append('father_occupation', this.selectedItem.father_occupation);
          this.formData.append('mother_employer', this.selectedItem.mother_employer);
          this.formData.append('father_employer', this.selectedItem.father_employer);
          this.formData.append('father_contact_number', this.selectedItem.father_contact_number);
          this.formData.append('mother_contact_number', this.selectedItem.mother_contact_number);
          this.formData.append('number_of_siblings', this.selectedItem.number_of_siblings);
          this.formData.append('fb_url', this.selectedItem.fb_url);
          axios.post('applicant/update_applicant/' + $id, this.formData, {headers: {'content-Type': 'multipart/form-data'}})
            .then(response => {
               this.fetchApplicant();

               if(response.data === 0) {

                  this.$swal.fire({
                    icon: 'error',
                    title: 'Opps...',
                    text: 'You cannot transfer to other school. Contact CHEDRO coordinator for your concern, at Caraga Regional Office, HEDC Bldg., CSU Main, Ampayon, Butuan City 8600, Philippines',
                  })
                  return false;
               }

               this.$swal.fire({
                  icon: 'success',
                  title: 'Great...',
                  text: 'Updated Successfully!',
                })

              $('#applicantModal').click();
              
               console.log(response.data);
            })
            .catch(error => {
                this.errors = error.response.data.errors;
                console.log(this.errors);
            });

         }

                   if(!this.selectedItem.lname) {
            $('#lname').css('border-color','red');
            return false;
          }
                   if(!this.selectedItem.fname) {
            $('#fname').css('border-color','red');
            return false;
          }

                  if(!this.selectedItem.place_of_birth) {
            $('#place_of_birth').css('border-color','red');
            return false;
          }
                   if(!this.selectedItem.contact) {
            $('#mobile_number').css('border-color','red');
            return false;
          }
                   if(!this.selectedItem.email) {
            $('#email').css('border-color','red');
            return false;
          }
                   if(!this.selectedItem.present_address) {
            $('#present_address').css('border-color','red');
            return false;
          }
                   if(!this.selectedItem.zipcode) {
            $('#zipcode').css('border-color','red');
            return false;
          }
                   if(!this.selectedItem.name_of_school_last_attended) {
            $('#last_school_attended').css('border-color','red');
            return false;
          }

      }

    },
    async mounted() {
      this.fetchApplicant();
      this.fetchUsername();
      this.fetchCity();
      this.fetchBrgy();
      this.fetchProvince();
      this.fetchProgram();
      this.fetchHEI();
    },
    components: {
      //
    }
  }
</script>