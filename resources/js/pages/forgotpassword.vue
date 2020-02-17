<template>
  <div class="background">
  <div v-if="loading" class="se-pre-con"></div>
  <div class="container main">
    <div class="login-block">
        <div class="container1">
            <div class="row">
              <div class="col-md-4 login-sec">           
                  <h4 class="text-center">Forgot your password?</h4>
                  <p class="text-center"><small>Please enter <span style="border:1px solid #3490dc; border-top:none; border-left:none;border-right:none">birthdate</span> and <span style="border:1px solid #3490dc; border-top:none; border-left:none;border-right:none">phone number</span> registered.</small></p>
                  <form class="login-form" autocomplete="off" @submit.prevent="reset" method="post">
                    <div class="alert alert-danger" v-if="has_error">
                      <p class="text-center">Incorrect email or password.</p>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1" class="text-uppercase">Birthdate</label>
                      <input type="date" class="form-control" id="birthdate" v-model="birthdate" required>
                      
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1" class="text-uppercase">Phone number</label>
                      <input type="number" class="form-control" id="phone_number" v-model="phone_number" required>
                    </div>
                    
                    
                      <div class="form-check">
                      <button type="submit" class="btn btn-login float-right">RESET PASSWORD</button>
                    </div> 
                  </form>
          <div class="copy-text"><p class="small mb-4 mb-lg-0">&copy; CSP 2020. All Rights Reserved.</p></div>
              </div>
              <div class="col-md-8 col-xl-8 banner-sec">
                        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                             <ol class="carousel-indicators">
                                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                              </ol>
                        <div class="carousel-inner" role="listbox">
                          <div class="carousel-item active">
                            <img class="d-block img-fluid" :src="slide1" alt="First slide">
                            <div class="carousel-caption d-none d-md-block">
                              <div class="banner-text">
                                  <h2>This is First Slide</h2>
                                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation</p>
                              </div>  
                        </div>
                          </div>
                          <div class="carousel-item">
                            <img class="d-block img-fluid" :src="slide2" alt="Second slide">
                            <div class="carousel-caption d-none d-md-block">
                              <div class="banner-text">
                                  <h2>This is Second Slide</h2>
                                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation</p>
                              </div>  
                          </div>
                          </div>
                          <div class="carousel-item">
                            <img class="d-block img-fluid" :src="slide3" alt="Third slide">
                            <div class="carousel-caption d-none d-md-block">
                              <div class="banner-text">
                                  <h2>This is Heaven</h2>
                                  <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation</p>
                              </div>  
                          </div>
                        </div>
                      </div>             
                </div>
              </div>
          </div>
          </div>
      </div>
  </div>
</div>
</template>
<style scoped>

div {
  font-family: 'Lato', 'Helvetica Neue', Helvetica, Arial, sans-serif;
}

h1,
h2,
h3,
h4,
h5,
h6 {
  font-family: 'Lato', 'Helvetica Neue', Helvetica, Arial, sans-serif;
  font-weight: 700;
}

.img-fluid {
  width: 100%;
}

.logo {
  height: 40px;
  width: 40px;
}



.container1 {
  background: #fff;
  border-radius: 10px;
  box-shadow: 15px 20px 0px rgba(0, 0, 0, 0.1);
}

.carousel-inner {
  border-radius: 0 10px 10px 0;
}

.carousel-caption {
  text-align: left;
  left: 5%;
}

.login-sec {
  padding: 50px 30px;
  position: relative;
}

.login-sec .copy-text {
  position: absolute;
  width: 80%;
  bottom: 20px;
  font-size: 13px;
  text-align: center;
}

.login-sec .copy-text i {
  color: #FEB58A;
}

.login-sec .copy-text a {
  color: #E36262;
}

.login-sec h2 {
  margin-bottom: 30px;
  font-weight: 800;
  font-size: 30px;
  color: #3490dc;
}

.login-sec h2:after {
  content: " ";
  width: 100px;
  height: 5px;
  background: #3490dc;
  display: block;
  margin-top: 20px;
  border-radius: 3px;
  margin-left: auto;
  margin-right: auto
}

.btn-login {
  background: #3490dc;
  color: #fff;
  font-weight: 600;
}

.banner-text {
  width: 70%;
  position: absolute;
  bottom: 40px;
  padding-left: 20px;
}

.banner-text h2 {
  color: #fff;
  font-weight: 600;
}

.banner-text h2:after {
  content: " ";
  width: 100px;
  height: 5px;
  background: #FFF;
  display: block;
  margin-top: 20px;
  border-radius: 3px;
}

.banner-text p {
  color: #fff;
}

/* Extra large devices (large laptops and desktops, 1366px and up) */
@media only screen and (max-width: 1366px) {

  .background {
    /* fallback for old browsers */
    background: -webkit-linear-gradient(to bottom, #5bc0de, );
    /* Chrome 10-25, Safari 5.1-6 */
    background: linear-gradient(to bottom, #5bc0de, #3498db);
    /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    width: 100%;
    height: 667px;
    position: absolute;
  }

  .main {
   
   margin-top: 72px;
  }
  .login-block {

    width: 100%;
 
  }


  .container1 {
    background: #fff;
    border-radius: 10px;
    box-shadow: 15px 20px 0px rgba(0, 0, 0, 0.1);
  }

  .carousel-inner {
    border-radius: 0 10px 10px 0;
  }

  .carousel-caption {
    text-align: left;
    left: 5%;
  }

  .login-sec {
    padding: 50px 30px;
    position: relative;
  }

  .login-sec .copy-text {
    position: absolute;
    width: 80%;
    bottom: 20px;
    font-size: 13px;
    text-align: center;
  }

  .login-sec .copy-text i {
    color: #FEB58A;
  }

  .login-sec .copy-text a {
    color: #E36262;
  }

  .login-sec h2 {
    margin-bottom: 30px;
    font-weight: 800;
    font-size: 30px;
    color: #3490dc;
  }

  .login-sec h2:after {
    content: " ";
    width: 100px;
    height: 5px;
    background: #3490dc;
    display: block;
    margin-top: 20px;
    border-radius: 3px;
    margin-left: auto;
    margin-right: auto
  }

  .btn-login {
    background: #3490dc;
    color: #fff;
    font-weight: 600;
  }

  .banner-text {
    width: 70%;
    position: absolute;
    bottom: 40px;
    padding-left: 20px;
  }

  .banner-text h2 {
    color: #fff;
    font-weight: 600;
  }

  .banner-text h2:after {
    content: " ";
    width: 100px;
    height: 5px;
    background: #FFF;
    display: block;
    margin-top: 20px;
    border-radius: 3px;
  }

  .banner-text p {
    color: #fff;
  }

}



/* Extra large devices (large laptops and desktops, 1367px and up) */
@media only screen and (min-width: 1367px) {

  .background {
    /* fallback for old browsers */
    background: -webkit-linear-gradient(to bottom, #5bc0de, );
    /* Chrome 10-25, Safari 5.1-6 */
    background: linear-gradient(to bottom, #5bc0de, #3498db);
    /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    width: 1900px;
    height: 979px;
    position: absolute;
  }

  .main {
   
   margin-top: 220px;
  }
  .login-block {

    width: 100%;
 
  }

  .container1 {
    background: #fff;
    border-radius: 10px;
    box-shadow: 15px 20px 0px rgba(0, 0, 0, 0.1);
  }

  .carousel-inner {
    border-radius: 0 10px 10px 0;
  }

  .carousel-caption {
    text-align: left;
    left: 5%;
  }

  .login-sec {
    padding: 50px 30px;
    position: relative;
  }

  .login-sec .copy-text {
    position: absolute;
    width: 80%;
    bottom: 20px;
    font-size: 13px;
    text-align: center;
  }

  .login-sec .copy-text i {
    color: #FEB58A;
  }

  .login-sec .copy-text a {
    color: #E36262;
  }

  .login-sec h2 {
    margin-bottom: 30px;
    font-weight: 800;
    font-size: 30px;
    color: #3490dc;
  }

  .login-sec h2:after {
    content: " ";
    width: 100px;
    height: 5px;
    background: #3490dc;
    display: block;
    margin-top: 20px;
    border-radius: 3px;
    margin-left: auto;
    margin-right: auto
  }

  .btn-login {
    background: #3490dc;
    color: #fff;
    font-weight: 600;
  }

  .banner-text {
    width: 70%;
    position: absolute;
    bottom: 40px;
    padding-left: 20px;
  }

  .banner-text h2 {
    color: #fff;
    font-weight: 600;
  }

  .banner-text h2:after {
    content: " ";
    width: 100px;
    height: 5px;
    background: #FFF;
    display: block;
    margin-top: 20px;
    border-radius: 3px;
  }

  .banner-text p {
    color: #fff;
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


</style>

<script>
import axios from 'axios';

  export default {
    data() {
      return {
        birthdate: '',
        phone_number: '',
        formData: {},
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
    reset: function() {

    		$('#birthdate').css('border-color','');
        $('#phone_number').css('border-color','');  
        this.loading = true;
    		this.formData = new FormData();
            this.formData.append('birthdate', this.birthdate);
            this.formData.append('phone_number', this.phone_number);

            axios.post('reset/password', this.formData, {headers: {'Content-Type': 'multipart/form-data'}})
                .then(response => {

 					if(response.data === 0) {

 						$('#birthdate').css('border-color','red');
          				$('#phone_number').css('border-color','red');  

 						this.$swal.fire({
		                  icon: 'error',
		                  title: 'Opps...',
		                  text: 'Incorrect birthdate or phone number.'
		                })
		                return false;
 					}
          this.loading = false;
 				         	this.$swal.fire({
	                  icon: 'success',
	                  title: 'Great...',
	                  text: `Password reset successfully! New password sent to ${response.data.email}.`,
	                })
	                this.reset_form();
	                this.$router.push({name: 'login', params: {successRegistrationRedirect: true}})

                })
                .catch(error => {
                    this.errors = error.response.data.errors;
                    console.log(this.errors);
                });

          


   
      },
      reset_form() {
      	this.birthdate = '';
      	this.phone_number = '';
      }
    }
  }
</script>