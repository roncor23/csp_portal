<template>
  <div>
      <div class="w3-top">
        <div class="w3-bar w3-white w3-wide w3-padding w3-card">
          <a class="navbar-brand" style="font-size:14px"><img class="logo" :src="logo"> CSP</a>
          <div class="w3-right">               
            <router-link to="/register"><button href="#projects" class="btn btn-primary">Apply Now</button></router-link>
            <router-link to="/login"><button href="#projects" class="btn btn-primary">Sign In</button></router-link>
          </div>
        </div>
      </div>
      <!-- Header -->
      <header class="w3-display-container w3-content w3-wide" style="max-width:1500px;" id="home">
        <img class="w3-image" :src="background" alt="Architecture" width="1500" height="800">
        <div class="w3-display-middle w3-margin-top w3-center">
          <h1 class="applicants w3-xxlarge w3-text-white"><span class="w3-padding w3-black w3-opacity-min"><b>APPLICANTS: 6,231</b></span> <span class="w3-hide-small w3-text-light-grey"></span></h1>
        </div>
      </header>
    <!-- Icons Grid -->
    <section class="features-icons bg-light text-center">
      <div class="container">
        <div class="row">
          <div class="col-lg-4">
            <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
              <div class="features-icons-icon d-flex">
                <i class="icon-screen-desktop m-auto text-primary fas fa-keyboard"></i>
              </div>
              <h3>Application period</h3>
                  <p style="text-align:justify">Start from March 1 to May 31 of every academic year after the effectivity of this CMO. Policies and Guidelines for CHED Scholarship Programs (CSPs) <a href="https://ched.gov.ph/wp-content/uploads/CMO-8-s.-2019-Policies-and-Guidelines-for-CHED-Scholarship-Programs-CSPs.pdf" target="_blank" style="color:#3490dc">click here. </a>Priority Courses for CHED Scholarship Programs (CSPs) for Academic Year 2019-2020 <a href="https://ched.gov.ph/wp-content/uploads/CMO-No.-05-Series-2019-Priority-Courses-for-CHED-Scholarship-Programs-CSPs-for-Academic-Year-2019-2020.pdf" target="_blank" style="color:#3490dc">click here.</a></p>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
              <div class="features-icons-icon d-flex">
                <i class="icon-layers m-auto text-primary fas fa-file-alt"></i>
              </div>
              <h3>Submit required documents</h3>

                <p style="text-align:justify"><span style="font-weight:bold">Citizenship: </span>Certified true copy of Birth Certificate (NSO).</p>
                <p style="text-align:justify"><span style="font-weight:bold">Academic: </span>Senior high school report card for incoming freshmen students eligible for college; and duly certified true copy of grades for Grade 11 and 1st semester of Grade 12 for graduating senior high school students.</p>
                <p style="text-align:justify"><span style="font-weight:bold">Financial: </span>The student-applicants shall submit <span style="border: 1px solid #3490dc; border-top:none;border-right:none;border-left:none">any</span> of the following documents: <span style="color:#3490dc">(a)</span> Latest Income Tax Return (ITR) of parents or guardian; <span style="color:#3490dc">(b)</span> Certifiacate of Tax Exemtion from the Bureau of Internal Revenue (BIR); <span style="color:#3490dc">(c)</span> Certificate of Indigence;</p>
                <p style="text-align:justify"><span style="font-weight:bold">Other documents: </span><span style="color:#3490dc">(a)</span> Certificate as dependent to a solo parent; <span style="color:#3490dc">(b)</span> Certificate of disability; <span style="color:#3490dc">(c)</span> Certificate of membership to indigenous community; <span style="color:#3490dc">(d)</span> Certificate of 4ps; <span style="color:#3490dc">(e)</span> Certificate of senior citizen.</p>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="features-icons-item mx-auto mb-0 mb-lg-3">
              <div class="features-icons-icon d-flex">
                <i class="icon-check m-auto text-primary fas fa-list-ul"></i>
              </div>
              <h3>Ranking</h3>
              <p style="text-align:justify">The ranking shall be used by the CHEDROs in selecting the most qualified applicants based on the requirements stated in Article VII hereof. The shall be made according to the following percentage distribution: (a) <span style="color:#3490dc">Academic Performance 70%</span>; (b) <span style="color:#3490dc">Annual Gross Income 30%</span> total of <span style="color:#3490dc">100%</span>; (c) Additional <span style="color:#3490dc">five (5) points</span> in the total score are given to applicants belonging to the special group of persons such as Underprivileged and Homeless Citizens, Persons with Disability (PWDs), Solo Parents, Senior Citizens, and Indigenous People (IPs). 
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- Image Showcases -->
    <section class="showcase">
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
    </section>
    <!-- Testimonials -->
    <section class="testimonials text-center bg-light">
      <div class="container">
        <h2 class="label mb-5">What people are saying...</h2>
        <div class="row">
          <div class="col-lg-4">
            <div class="testimonial-item mx-auto mb-5 mb-lg-0">
              <img class="img-fluid rounded-circle mb-3" :src="brisbane" alt="">
              <h5>Brisbane Q. Titular</h5>
              <p class="font-weight-light mb-0" style="text-align:justify">"The financial aid I got from CHED has helped me to survive my college education. I was able to pay my tuition. I was even able to keep the excess amount of the aid from my tuition to be used for my other school fees. I was even able to save money to be used for my internship at SunStar Davao wherein I have experienced how to be a real journalist in the real world where I have learned things which I cannot learn in the four corners of the classroom. That was just a dream come true."</p>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="testimonial-item mx-auto mb-5 mb-lg-0">
              <img class="img-fluid rounded-circle mb-3" src="img/testimonials-2.jpg" alt="">
              <h5>Fred S.</h5>
              <p class="font-weight-light mb-0">"Bootstrap is amazing. I've been using it to create lots of super nice landing pages."</p>
            </div>
          </div>
          <div class="col-lg-4">
            <div class="testimonial-item mx-auto mb-5 mb-lg-0">
              <img class="img-fluid rounded-circle mb-3" src="img/testimonials-3.jpg" alt="">
              <h5>Sarah W.</h5>
              <p class="font-weight-light mb-0">"Thanks so much for making these free resources available to us!"</p>
            </div>
          </div>
        </div>
      </div>
    </section>
 <!-- Footer -->
    <footer class="footer" style="background-color:#3490dc">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 h-100 text-center text-lg-left my-auto">
            <ul class="list-inline mb-2">
              <li class="list-inline-item">
                <a href="https://ched-caraga.com/" target="_blank" style="color:#fff">About</a>
              </li>
              <li class="list-inline-item">&sdot;</li>
              <li class="list-inline-item">
                <a href="https://ched-caraga.com/" target="_blank" style="color:#fff">Contact</a>
              </li>
            </ul>
            <p class="small mb-4 mb-lg-0" style="color:#fff">&copy; CSP 2020. All Rights Reserved.</p>
          </div>
          <div class="col-lg-6 h-100 text-center text-lg-right my-auto">
            <ul class="list-inline mb-0">
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
            </ul>
          </div>
        </div>
      </div>
    </footer>
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

img {
    vertical-align: middle;
}

img {
    border-style: none;
}

a.ic1:hover {color: #dcdcdc;}

.ic1 {
  color:  #fff;
}

.w3-image {
    max-width: 100%;
    height: auto;
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

.w3-top {
    top: 0;
}

.w3-top {
    position: fixed;
    width: 100%;
    z-index: 1;
}

.w3-right{float:right!important}

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

@media (min-width: 768px) {
  .showcase .showcase-text {
    padding: 7rem;
  }
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

@media only screen and (max-width: 768px) {
  /* For mobile phones: */
  [class*="col-"] {
    width: 100%;
  }

  .applicants {
    font-size: 10px;
  }
  .label {
    font-size: 24px;
  }
  .w3-display-container {
    margin-top: 50px;
  } 


}


</style>
<script>
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
        logo: 'image/ched_logo.png',
        background: 'image/background.png',
        brisbane: 'image/brisbane.jpg'

      }
      
    },
    methods: {

    },
    
    mounted() {
        
       
    },
   
    }
  
</script>