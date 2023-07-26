



  <!-- price section -->

  <section class="price_section layout_padding">
    <div class="container">
      <div class="row">
        <div class="civ">

       
      <div class="heading_container">
        <h2>
          Our Jewellery Price
        </h2>
      </div> 
      <?php
            foreach($shwprod as $row) {
                ?>
<form method="post">
      <div class="price_container">
        <div class="box">
          <div class="name">
            <h6>
             <?php echo $row["product_id"];?>
            <input type="hidden" name="product_id" value="<?php echo $row["product_id"];?>">
                     
              <input type="hidden" name="qty" value="<?php echo $row["qty"];?>">
              <?php echo $row["productname"];?>
            <input type="hidden" name="productname" value="<?php echo $row["productname"];?>">
                     
              <input type="hidden" name="qty" value="<?php echo $row["qty"];?>">
                     
            </h6>
          </div>
          <div class="img-box">
             <img src="admin/<?php echo $row["pimage"];?>">
          </div>
        
          <div class="detail-box">
            <h5>
            Price <del><span style="color: #f7c17b">Rs</span> <span style=" color: #325662"><?php echo $row["oldprice"];?></span></del> <?php echo $row["offerprice"];?>
            </h5>
            <input type="hidden" name="subtotal" value="<?php echo $row["offerprice"];?>">
            <?php
                          if(!isset($_SESSION["customer_id"])) {
                              ?>
                     <div class="buy_bt"><a href="#" onclick="login()">Buy Now</a></div>
                     <?php
                          } else {
                              ?>
                              
                      <div class="buy_bt"><input type="submit" name="addtocart" value="Buy Now" class="btn btn-lg " style="background-color:#f7c17b"></div>
                      <?php
                          }
                ?>
          </div>
        </div>
                                    
        <?php
            }
       ?>
     </div>
          </div>
     </form>
      </div>
          </div>
          </div>
          <div class="d-flex justify-content-center">
            <a href="" class="price_btn">
              See More
            </a>
          </div>
        </div>
 
  </section>
         
  <!-- end price section -->
 

  
 <script>
     function login()     
     {
       alert('Are you add this cycle in Cart Login First')
       window.location='login-us';  
     }
    </script>

