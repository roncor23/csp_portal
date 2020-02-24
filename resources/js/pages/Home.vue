<template>
  <div>
      <div class="w3-bar1 w3-white1 w3-wide1" style="margin-top:50px">
        <div class="container-fluid">
          <a class="navbar-brand" ><img class="logo" :src="logo"></a>
          <a class="navbar-brand" style="float:right"><img class="logo" :src="logologo"></a>
        </div>
     </div>
      <!-- Navigation -->
      <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top w3-card">
        <div class="container">
          <a  href="#" style="color:#0000009e;text-decoration: none">APPLICANTS: {{ applicant_numbers }}</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
          <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item active">
                <a class="nav-link" href="#">HOME
                      <span class="sr-only">(current)</span>
                    </a>
              </li>
              <li class="nav-item">
                <router-link to="/register"><a class="nav-link" href="#">APPLY NOW</a></router-link>
              </li>
              <li class="nav-item">
                <router-link to="/login"><a class="nav-link" href="#">SIGN IN</a></router-link>
              </li>
            </ul>
          </div>
        </div>
      </nav>

      <header>
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
<!--             <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li> -->
          </ol>
          <div class="carousel-inner" role="listbox">
            <!-- Slide One - Set the background image for this slide in the line below -->
            <div class="carousel-item active" style="background-image: url('image/banner.png')">
              <div class="carousel-caption d-none d-md-block">
<!--                 <h2 class="display-4">First Slide</h2>
                <p class="lead">This is a description for the first slide.</p> -->
              </div>
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
              </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
              </a>
        </div>
      </header>

    <!-- Icons Grid -->
    <div class="features-icons bg-light text-center container-fluid">
      <div>
        <h1 style="margin-bottom:50px">Be a CHED Scholar</h1>
        <div class="row">
          <div class="col-lg-4 col-xl-4">
            <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
              <div class="features-icons-icon d-flex" >
                <i class="icon-screen-desktop m-auto  fas fa-keyboard" style="color:#1c3961"></i>
              </div>
              <h3>WHO CAN APPLY?</h3><br>
                <ul style="text-align:justify;margin-top:10px">
                  <li>Filipino citizen;</li>
                  <li>Graduating high school student/High school graduate with general weighted average (GWA) of at least 90%; and
                  </li>
                  <li>Parents/Guardians Annual Gross Income of Four Hundred Thousand Pesos (Php 400,000.00) and below.
                  </li>
                </ul>
            </div>
          </div>
          <div class="col-lg-4 col-xl-4">
            <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
              <div class="features-icons-icon d-flex">
                <i class="icon-layers m-auto fas fa-file-alt" style="color:#1c3961"></i>
              </div>
              <h3>HOW TO APPLY?</h3><br>
              <ul style="text-align:justify;margin-top:10px">
                <li>STEP1 REGISTER ONLINE</li>
                <li>STEP2 PRINT THE ACCOMPLISHED ONLINE APPLICATION FORM</li>
                <li>STEP3 SUBMIT THE FOLLOWING APPLICATION DOCUMENTS TO CHED SCHOLARSHIP UNIT:
                  <ul>
                    <li>Application Form with signature and 1 pc 2x2 picture</li>
                    <li>Certified true copy of birth certificate</li>
                    <li>High school report card for incoming freshmen students eligible for college</li>
                    <li>Certified true copy of grades for Grade 11 and 1st semester of Grade 12 for graduating high school students</li>
                    <li>ANY of the following documents:
                      <ul>
                        <li>Latest Income Tax Return of parents/guardian</li>
                        <li>Certificate of Tax Exemption from the BIR</li>
                        <li>Certificate of Indigency from their Barangay</li>
                      </ul>
                    </li>
                  </ul>
                </li>
        
              </ul>
            </div>
          </div>
          <div class="col-lg-4 col-xl-4">
            <div class="features-icons-item mx-auto mb-0 mb-lg-3">
              <div class="features-icons-icon d-flex">
                <i class="icon-check m-auto fas fa-list-ul" style="color:#1c3961"></i>
              </div>
              <h3>FOR QUESTIONS AND INQUIRIES?</h3>
              <ul style="text-align:justify;margin-top:10px">
                <li>Email:
                  <ul>
                    <li>admin@cspcaraga.com</li>
                    <li>chedcaragastufaps@ched.gov.ph</li>
                  </ul>
                </li>
                <li>Mobile: 0912-089-2045</li>
                <li>hotline: (085)815-3698</li>
                <li>Fax No.: (085)816-24-06</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Image Showcases -->
<!--     <div class="showcase" style="">
      <div class="container-fluid p-0">
        <div class="row no-gutters">

          <div class="col-lg-6 order-lg-2 text-white showcase-img" style="background-image: url('image/orientation.png');"></div>
          <div class="col-lg-6 order-lg-1 my-auto showcase-text">
            <h2 class="label">Scholars Orientation AY 2019-2020</h2>
            <p class="lead mb-0" style="text-align:justify">Newly improved, and full of great utility classes, Bootstrap 4 is leading the way in mobile responsive web development! All of the themes on Start Bootstrap are now using Bootstrap 4!</p>
          </div>

        </div>

        <div class="row no-gutters">
          <div class="col-lg-6 text-white showcase-img" style="background-image: url('image/ay2020.png');"></div>
          <div class="col-lg-6 my-auto showcase-text">
            <h2 class="label">Academic Year 2019-2020</h2>
            <p class="lead mb-0" style="text-align:justify">When you use a theme created by Start Bootstrap, you know that the theme will look great on any device, whether it's a phone, tablet, or desktop the page will behave responsively!</p>
          </div>
        </div>

        <div class="row no-gutters">
          <div class="col-lg-6 order-lg-2 text-white showcase-img" style="background-image: url('image/ongoing.png');"></div>
          <div class="col-lg-6 order-lg-1 my-auto showcase-text">
            <h2 class="label">Ongoing Scholars AY 2019-2020</h2>
            <p class="lead mb-0" style="text-align:justify">Newly improved, and full of great utility classes, Bootstrap 4 is leading the way in mobile responsive web development! All of the themes on Start Bootstrap are now using Bootstrap 4!</p>
          </div>
        </div>

      </div>
    </div> -->
    <!-- Testimonials -->
<!--     <div class="testimonials text-center bg-light container-fluid">
      <div>
        <h3 class="label mb-5">Success story</h3>
        <div class="row">
          <div class="col-lg-4">
            <div class="testimonial-item mx-auto mb-5 mb-lg-0">
              <img class="img-fluid rounded-circle mb-3" :src="brisbane" alt="">
            </div>
          </div>
          <div class="col-lg-8">
              <h4>Brisbane Q. Titular</h4>
              <p class="font-weight-light mb-0" style="text-align:justify">"The financial aid I got from CHED has helped me to survive my college education. I was able to pay my tuition. I was even able to keep the excess amount of the aid from my tuition to be used for my other school fees. I was even able to save money to be used for my internship at SunStar Davao wherein I have experienced how to be a real journalist in the real world where I have learned things which I cannot learn in the four corners of the classroom. That was just a dream come true."</p>
          </div>


        </div>
      </div>
    </div> -->
 <!-- Footer -->
    <footer class="footer" style="background-color:#1c3961">
      <div class="container">
        <div class="row">
          <div class="col-lg-6  col-xl-6 col-sm-6 h-100 text-center text-lg-left my-auto">
            <ul class="list-inline mb-2">
              <li class="list-inline-item">
                <a href="https://ched-caraga.com/" target="_blank" style="color:#fff">ABOUT</a>
              </li>
              <li class="list-inline-item">&sdot;</li>
              <li class="list-inline-item">
                <a href="https://ched-caraga.com/" target="_blank" style="color:#fff">CONTACT</a>
              </li>
            </ul>
            <small class="small mb-4 mb-lg-0" style="color:#fff">&copy; CSP 2020. All Rights Reserved.</small>

          </div>
          <div class="col-lg-6 col-xl-6 col-sm-6 h-100 text-center text-lg-right my-auto">
            <ul class="list-inline mb-0 mt-2">
              <li class="list-inline-item mr-3">
                <a class="ic1" href="https://www.facebook.com/stufaps.chedcaraga" target="_blank">
                  <i class="fab fa-facebook fa-2x fa-fw"></i>
                </a>
              </li>
              <li class="list-inline-item mr-3">
                <a class="ic1" href="#">
                  <i class="fas fa-envelope-square fa-2x fa-fw"></i>
                </a>
              </li>
              <li class="list-inline-item">
                <a class="ic1" href="#">
                  <i class="fab fa-chrome fa-2x fa-fw"></i>
                </a>
              </li>
              <li>
                
              </li>
            </ul>
          </div>
        </div>
      </div>
    </footer>
  </div>
</template>

<style scoped>

.carousel-item {
  height: 75vh;
  min-height: 350px;
  background: no-repeat center center scroll;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}


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

img {
    vertical-align: middle;
}

img {
    border-style: none;
}

a.ic1:hover {color: #dcdcdc;}

.logo {
    max-width: 100%;
    height: auto;
}

.ic1 {
  color:  #fff;
}


.w3-top {
    top: 0;
}
.w3-top {
    position: fixed;
    width: 100%;
    z-index: 1;
}


.w3-text-white, .w3-hover-text-white:hover {
    color: #fff!important;
}

.w3-xxlarge {
    font-size: 36px!important;
}

.w3-white, .w3-hover-white:hover {
    color: #000!important;
    background-color: #fff!important;
}

.w3-white1, .w3-hover-white:hover {
    color: #000!important;
    background-color: #1c3961!important;
}



.w3-right{float:right!important}

.w3-left{float:left!important}

.w3-content, .w3-auto {
    margin-left: auto;
    margin-right: auto;
}

.w3-tooltip, .w3-display-container {
    position: relative;
}

.w3-wide {
    letter-spacing: 4px;
}


.w3-margin-top {
    margin-top: 16px!important;
}

.w3-center {
    text-align: center!important;
}

.w3-display-middle {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%,-50%);
    -ms-transform: translate(-50%,-50%);
}

.w3-black, .w3-hover-black:hover {
    color: #fff!important;
    background-color: #000!important;
}

.w3-padding {
    padding: 8px 16px!important;
}



.w3-opacity-min {
    opacity: 0.75;
}


.w3-card, .w3-card-2 {
    box-shadow: 0 2px 5px 0 rgba(0,0,0,0.16), 0 2px 10px 0 rgba(0,0,0,0.12);
}

.w3-card1 {
    box-shadow: 0 2px 5px 0 rgba(0,0,0,0.16), 0 2px 10px 0 rgba(0,0,0,0.12);
}

.w3-bar {
    width: 100%;
    overflow: hidden;
}

.w3-bar1 {
    width: 100%;
    overflow: hidden;
}

.w3-bar .w3-button {
    white-space: normal;
}

.w3-bar .w3-bar-item {
    padding: 8px 16px;
    float: left;
    width: auto;
    border: none;
    display: block;
    outline: 0;
}


.showcase .showcase-text {
  padding: 3rem;
}

.showcase .showcase-img {
  min-height: 30rem;
  background-size: cover;
}


.features-icons {
  padding-top: 7rem;
  padding-bottom: 7rem;
}

.features-icons .features-icons-item {
  max-width: 20rem;
}

.features-icons .features-icons-item .features-icons-icon {
  height: 7rem;
}

.features-icons .features-icons-item .features-icons-icon i {
  font-size: 4.5rem;
}

.features-icons .features-icons-item:hover .features-icons-icon i {
  font-size: 5rem;
}

.testimonials {
  padding-top: 7rem;
  padding-bottom: 7rem;
}

.testimonials .testimonial-item {
  max-width: 18rem;
}

.testimonials .testimonial-item img {
  max-width: 12rem;
  box-shadow: 0px 5px 5px 0px #adb5bd;
}


footer.footer {
  padding-top: 2rem;
  padding-bottom: 2rem;
}


/* Extra small devices (phones, 600px and down) */
@media only screen and (max-width: 600px) {

  .carousel-item {
    height: auto;
    min-height: 350px;
    background: no-repeat center center scroll;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
  }

  

    .w3-image {
      margin-top: 45px;
    }

    .w3-padding {
    padding: 4px 8px!important;
    }

    b {
      font-size: 10px;
    }

}
/* Extra large devices (large laptops and desktops, 1366px and up) */
@media only screen and (max-width: 1366px) {

  h3 {
    font-size: 25px;
  }
  h4 {
    font-size:  25px;
  }
  p {
    font-size: 18px;
  }

  .w3-xxlarge {
      font-size: 30px!important;
  }
  .label {
    font-size: 30px;
  }

  .w3-image {
      width: 100%;
      height: auto;
  }

  .w3-bar {
    width: 100%;
    overflow: hidden;
  }

  .w3-bar .w3-button {
      white-space: normal;
  }

  .w3-bar .w3-bar-item {
      padding: 8px 16px;
      float: left;
      width: auto;
      border: none;
      display: block;
      outline: 0;
  }


  .showcase .showcase-text {
    padding: 3rem;
  }

  .showcase .showcase-img {
    min-height: 30rem;
    background-size: cover;
  }



  .features-icons {
    padding-top: 7rem;
    padding-bottom: 7rem;
  }

  .features-icons .features-icons-item {
    max-width: 22rem;
  }

  .features-icons .features-icons-item .features-icons-icon {
    height: 6rem;
  }

  .features-icons .features-icons-item .features-icons-icon i {
    font-size: 4rem;
  }

  .features-icons .features-icons-item:hover .features-icons-icon i {
    font-size: 5rem;
  }

  .testimonials {
    padding-top: 5rem;
    padding-bottom: 5rem;
  }

  .testimonials .testimonial-item {
    max-width: 20rem;
  }

  .testimonials .testimonial-item img {
    max-width: 16rem;
    box-shadow: 0px 5px 5px 0px #adb5bd;
  }


}

/* Extra large devices (large laptops and desktops, 1367px and up) */
@media only screen and (min-width: 1367px) {

  h3 {
    font-size: 30px;
  }
  h4 {
    font-size:  25px;
  }
  p {
    font-size: 25px;
  }

.carousel-item {

  min-height: 350px;
  background: no-repeat center center scroll;
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}


  .showcase .showcase-text {
    padding: 3rem;
  }

  .showcase .showcase-img {
    min-height: 45rem;
    background-size: cover;
  }



  .features-icons {
    padding-top: 7rem;
    padding-bottom: 7rem;
  }

  .features-icons .features-icons-item {
    max-width: 30rem;
  }

  .features-icons .features-icons-item .features-icons-icon {
    height: 7rem;
  }

  .features-icons .features-icons-item .features-icons-icon i {
    font-size: 6rem;
  }

  .features-icons .features-icons-item:hover .features-icons-icon i {
    font-size: 7rem;
  }

  .testimonials {
    padding-top: 7rem;
    padding-bottom: 7rem;
  }

  .testimonials .testimonial-item {
    max-width: 30rem;
  }

  .testimonials .testimonial-item img {
    max-width: 20rem;
    box-shadow: 0px 5px 5px 0px #adb5bd;
  }


}

</style>
<script>
import axios from 'axios';

  export default {
  data() {
    return {
      
        routes: {
          // UNLOGGED
          unlogged: [
            {
              name: 'Login',
              path: 'login'
            }
          ]     
        },
        logo: 'image/logologo.png',
        logologo: 'image/logologologo.png',
        background: 'image/background.png',
        brisbane: 'image/brisbane.png',
        applicant_numbers: ''

      }
      
    },
    methods: {
            fetchNumberOfApplicants: function() {
          axios.get('applicant/number_of_applicants/').then(result => {

              this.applicant_numbers = result.data;

          }).catch(error => {
              console.log(error);
          });
      }
    },
    
    mounted() {

        this.fetchNumberOfApplicants();
       
    },
   
    }
  
</script>