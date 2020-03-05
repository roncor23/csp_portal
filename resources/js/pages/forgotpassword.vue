<template>
  <div class="body">
  <div class="wrapper">
    <div v-if="loading" class="se-pre-con"></div>
    <form class="form-signin" autocomplete="off" @submit.prevent="reset" method="post">
        <div class="form-group d-flex justify-content-center" style="padding:10px">
          <img class="logo mr-2" :src="logo">
          <label style="font-size:15px">CHED SCHOLARSHIP PROGRAM</label>
        </div>       
      <div class="form-group">
          <label>Birthdate</label>
          <input type="date" class="form-control" id="birthdate" required="" autofocus="" v-model="birthdate" />
      </div>
      <div class="form-group">
          <label>Phone number</label>
          <input type="number" class="form-control" id="phone_number" required="" v-model="phone_number" placeholder="Phone number" @input="$v.phone_number.$touch"/> 
          <p class="mt-2" v-if="$v.phone_number.$dirty" style="font-size:12px">
            <span class="text-danger" v-if="!$v.phone_number.minLength">Mobile number must have at least {{ $v.phone_number.$params.minLength.min }} numbers.</span>
            <span class="text-danger" v-if="!$v.phone_number.maxLength">Mobile number must have maximum of{{ $v.phone_number.$params.maxLength.max }} numbers.</span>
          </p>
      </div>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Reset</button>  
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
import Vue from 'vue'
import axios from 'axios'

Vue.use(window.vuelidate.default);
const { required, minLength, email, sameAs, numeric, alphaNum, alpha } = window.validators;

  export default {
    data() {
      return {
        birthdate: '',
        phone_number: '',
        formData: {},
        slide1: 'image/slide1.png',
        slide2: 'image/slide2.png',
        slide3: 'image/slide3.png',
        logo: 'image/logo.png',
        loading: false
      }
    },
    validations: {

    birthdate: {

    },
    phone_number: {
      minLength: validators.minLength(11),
      maxLength: validators.maxLength(11)
    },

  },

    mounted() {
      //
    },

    methods: {
    reset: function() {
      //   if (this.$v.$invalid) return;
    		// $('#birthdate').css('border-color','');
      //   $('#phone_number').css('border-color','');  
      //   this.loading = true;
    		// this.formData = new FormData();
      //       this.formData.append('birthdate', this.birthdate);
      //       this.formData.append('phone_number', this.phone_number);

      //       axios.post('reset/password', this.formData, {headers: {'Content-Type': 'multipart/form-data'}})
      //           .then(response => {

 					// if(response.data === 0) {
      //         this.loading = false;
 					// 	$('#birthdate').css('border-color','red');
      //     	$('#phone_number').css('border-color','red');  

 					// 	this.$swal.fire({
		    //               icon: 'error',
		    //               title: 'Opps...',
		    //               text: 'Incorrect birthdate or phone number.'
		    //             })
		    //             return false;
 					// }
      //     this.loading = false;
 				 //         	this.$swal.fire({
	     //              icon: 'success',
	     //              title: 'Great...',
	     //              text: `Password reset successfully! New password sent to ${response.data.email}.`,
	     //            })
	     //            this.reset_form();
	     //            this.$router.push({name: 'login', params: {successRegistrationRedirect: true}})

      //           })
      //           .catch(error => {
      //               this.errors = error.response.data.errors;
      //               console.log(this.errors);
      //           });

          
                 this.$swal.fire({
                    icon: 'error',
                    title: 'Opps...',
                    text: 'This feature is not available right now! Forgot your password? Visit CHED CARAGA Regional Office, Ampayon Butuan City.'
                  })

   
      },
      reset_form() {
      	this.birthdate = '';
      	this.phone_number = '';
      }
    }
  }
</script>