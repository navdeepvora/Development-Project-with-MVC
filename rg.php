
<div id="contact" class="contact">
  <div class="con_bg">
     <div class="container">
       <h2 class="" style="text-align: center;">
          Register Now
          <!-- <hr class="border border-1 bg-dark w-25"> -->
        </h2>
        <div class="row" style="margin-left: 0px;">
           <div class="col-md-10 offset-md-4">
              <form id="request" class="main_form" method="post">
                 <div class="row">
                 <div class="col-md-12 col-sm-12 mt-2 p-2">
                 <input type="file" class="email-bt" placeholder="Name" name="txt_img">
                    </div>
                    <div class="col-md-12 col-sm-12 mt-2 p-2">
                       <input class="contactus" placeholder="Name" type="text" name="txt_name"> 
                    </div>
                    <div class="col-md-12 col-sm-12 mt-2 p-2">
                       <input class="contactus" placeholder="Email" type="email" name="txt_email">                          
                    </div>
                    <div class="col-md-12 col-sm-12 mt-2 p-2">
                       <input class="contactus" placeholder="Password" type="password" name="txt_password">                          
                    </div>
                    <div class="col-md-12 col-sm-12 mt-2 p-2">
                       <input class="contactus" placeholder="Confirm Password" type="password" name="txt_conpassword">                          
                    </div>
                    <div class="col-md-12 col-sm-12 mt-2 p-2">
                       <input class="contactus" placeholder="Phone Number" type="number" name="txt_mob"> 
                    </div>
                    <div class="col-md-12 col-sm-12 mt-2 p-2">
                       <textarea class="contactus" placeholder="Address" type="text" name="txt_address"></textarea>                          
                    </div>
                    <div class="col-md-4 col-sm-6 mt-2 p-2">
                     <select name="txt_state"  class="email-bt1 form-control" placeholder="state" name="state">
                        <option value="">-select state-</option>
                        <?php 
                           foreach($stshw as $stshw1)
                           {
                         ?>
                         <option value="<?php echo $stshw1["state_id"];?>"><?php echo $stshw1["statename"];?></option>

                         <?php 
                           }
                        ?>
                       
                     </select>
                    </div>
                    <!-- <div class="col-md-12 mt-2">
                       <input class="contactusmess" placeholder="Message" type="type" Message="Name">
                    </div> -->
                    <div class="col-md-12 col-sm-12 mt-2">
                       <button class="send_btn btn btn-outline-success" type="submit" name="add_register">Send</button>
                    </div> 
                    <div class="form-group mt-2">
                      All ready have an account <a href="<?php echo $mainurl;?>login-us">Login In Here?</a>
                      </div>
                 </div>
              </form>
           </div>
        </div>
     </div>
  </div>
</div>