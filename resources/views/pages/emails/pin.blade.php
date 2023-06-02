<style>
    body{background-color: lightgray;}a{color: #205CD4;}.container {max-width: 1300px;margin: 0 auto;}.subscription-container{margin: 0 auto;display: flex;flex-direction: column;height: 100vh;justify-content: center;}.subscription-data{background-color: white;padding: 1rem 2rem;width: 70%;margin: 0 auto;}.subscription-content{padding: 2rem 0;}.subscription-heading h2{font-family: Roboto;font-size: 26px;font-weight: 400;margin: 1rem 0 3rem 0;}.subscription-content p, .footer-content p, .footer-bottom p{font-family: Roboto;font-size: 14px;font-weight: 400;color: #667085;}.regards-text{font-weight: 500;}.footer{padding: 1rem 0;}.footer-content, .footer-bottom{text-align: center;}@media only screen and (max-width:1023px){.subscription-container{height: auto;}}
</style>
<section class="container">
    <div class="subscription-container">
       <div class="subscription-data">
        <div class="logo">
          <img src="{{asset('/')}}/public/assets/images/savvyshoppr.png" alt="">
        </div>
        <div class="subscription-content">
          <div class="subscription-heading">
            <h2>Verification needed</h2>
          </div>
         <p>
          Hello,
          <br>
          <br>
          Thank you for registering with our service. As part of our security measures, we have sent you a one-time password (OTP) to verify your email address.
          <br>
          <br>
          Your OTP is {{$pin}}. Please enter this code to complete the verification process.
          <br>
          <br>
          Note that this OTP is only valid for a limited time, so please ensure you enter it before it expires.
          <br>
          <br>
          If you did not request this OTP or have any concerns about the security of your account, please contact us immediately.
          <br>
          <br>
          Thank you for your cooperation.
          <br>
          <br>
          <br>
          Best regards, <br>
          <span class="regards-text">Savvyshoppr</span>
         </p>
        </div>
        <hr>
        <div class="footer">
          <div class="footer-content">
             <p>If this wasn’t you, please ignore this email or contact our customer service center: <br> <a href="mailto:support@savvyshoppr.com">support@savvyshoppr.com</a> for further assistance.</p>
          </div>
          <div class="footer-bottom">
              <p>Copyright © Savvyshoppr. All rights reserved.</p>
          </div>
        </div>
       </div>
    </div>
  </section>
