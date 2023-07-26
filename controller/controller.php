<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require_once("model/model.php");
class controller extends model
{
    public function __construct()
    {
        parent::__construct();
        {

    // fetch state in register form dynamic from shiva_state table
    $stshw=$this->selectalldata('shiva_state');
    // // fetch state in register form dynamic from shiva_state table
    // $stshw=$this->selectalldata('shiva_state');
    // add or store customer account in shiva_customer tables
    // email handeling
    try {

        if(isset($_POST["add_register"])) {
            require_once("PHPMailer.php");
            require_once("Exception.php");
            require_once("SMTP.php");

            date_default_timezone_set("asia/calcutta");
            $tmp_name=$_FILES["txt_img"]["tmp_name"];
            $path="uploads/customers/".$_FILES["txt_img"]["name"];
            move_uploaded_file($tmp_name, $path);
            $nm=$_POST["txt_name"];
            $em=$_POST["txt_email"];
            $pass=$_POST["txt_password"];
            $cpass=$_POST["txt_conpassword"];
            $mob=$_POST["txt_mob"];
            $add=$_POST["txt_address"];
            $st=$_POST["txt_state"];
            $adatetime=date("d/m/Y H:i:s a");
            if($pass==$cpass) {

                $mail = new PHPMailer(true);
                //Server settings
                $mail->SMTPDebug =false;                      //Enable verbose debug output
                $mail->isSMTP();                                            //Send using SMTP
                $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                $mail->Username   = 'voranavdeep999@gmail.com';                     //SMTP username
                $mail->Password   ='byrcjkrorutoxwgh';                               //SMTP password
                $mail->SMTPSecure = "TLS";            //Enable implicit TLS encryption
                $mail->Port       = 587;
                //Recipients
                $mail->setFrom('voranavdeep999@gmail.com', 'Thanks register Note sending emails');
                $mail->addAddress($_POST["txt_email"], 'Mailer');
                //Content
                $mail->isHTML(true);                                  //Set email format to HTML
                $mail->Subject = 'Thanks for Create Account with shiva ecommerce';
                $mail->Body    = "They’re easy to use for customers and harder to figure out for email harvesters. As you would expect, building an effective PHP email contact form isn’t hard at all. We’re going to explain the process step by step in this article."."<br>"."For more details contact us with"."Mobile numbers :9998003
    879"."<br>"."Email  us on <a href='mailto:info@gmail.com'>info@gmail.com</a>";
                $mail->send();

                $data=array("photo"=>$path,"name"=>$nm,"email"=>$em,"password"=>$pass,"mobile"=>$mob,"address"=>$add,"state_id"=>$st,"added_date_time"=>$adatetime);
                $chk=$this->insalldata('shiva_customer', $data);
                if($chk) {
                    echo "<script>
                alert('Your Account successfully created we send a welcome emailed also')
                window.location='login-us';
                </script>";
                }
            } else {
                echo "<script>
            alert('Your password and confirmed password does not matched try again')
            window.location='register-us';
            </script>";
            }
        }
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }

             // passsword change of customers here

    if(isset($_POST["change_password"])) {
        $id=$_SESSION["customer_id"];
        $opass=$_POST["txt_opass"];
        $npass=$_POST["txt_npass"];
        $cpass=$_POST["txt_cpass"];
        $chk=$this->chngepasswordcustomer('shiva_customer', 'customer_id', $opass, $npass, $cpass, $id);

        if($chk) {
            unset($_SESSION["customer_id"]);
            unset($_SESSION["txt_email"]);
            unset($_SESSION["txt_name"]);
            session_destroy();
            echo "<script>
        alert('Your Password Changed successfully')
        window.location='login-us';
        </script>";
        } else {
            echo "<script>
        alert('Your password , old password and confirmed password does not matched try again')
        window.location='changepassword-here';
        </script>";
        }
    }

    //delete customer
    if(isset($_GET["delete-account-id"])) {
        $delid=$_GET["delete-account-id"];
        $id=array("customer_id"=>$delid);
        $chk=$this->deletdata('shiva_customer', $id);
        if($chk) {
            unset($_SESSION["customer_id"]);
            unset($_SESSION["txt_email"]);
            unset($_SESSION["txt_name"]);
            session_destroy();
            echo "<script>
        alert('Your Password Changed successfully')
        window.location='./';
        </script>";
        }
    }

    // update customer profile data

    if(isset($_POST["upd_profile"])) {
        $id=$_SESSION["customer_id"];
        $tmp_name=$_FILES["txt_img"]["tmp_name"];
        $path="uploads/customers/".$_FILES["txt_img"]["name"];
        move_uploaded_file($tmp_name, $path);
        $nm=$_POST["txt_name"];
        $em=$_POST["txt_email"];
        $mob=$_POST["txt_mobile"];
        $add=$_POST["txt_address"];
        $st=$_POST["txt_state"];

        $chk=$this->updprofiledata('shiva_customer', $path, $nm, $em, $mob, $add, $st, 'customer_id', $id);
        if($chk) {
            echo "<script>
        alert('Your profile Updated successfully')
        window.location='manageprofile';
        </script>";
        } else {
            echo "<script>
        alert('Your profile Not  Updated successfully')
        window.location='manageprofile';
        </script>";
        }

    }

    //contect email

    try {
        if(isset($_POST["btnclk"])) {
            require_once("PHPMailer.php");
            require_once("Exception.php");
            require_once("SMTP.php");
            $nm=$_POST["Name"];
            $em=$_POST["Email"];
            $phone=$_POST["Phone"];
            $msg=$_POST["Message"];
            $mail = new PHPMailer(true);

            //Server settings
            $mail->SMTPDebug =false;                      //Enable verbose debug output
            $mail->isSMTP();                                            //Send using SMTP
            $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
            $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
            $mail->Username   = 'voranavdeep999@gmail.com';                     //SMTP username
            $mail->Password   = 'byrcjkrorutoxwgh';                               //SMTP password
            $mail->SMTPSecure = "TLS";            //Enable implicit TLS encryption
            $mail->Port       = 587;

            //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

            //Recipients
            $mail->setFrom($_POST["Email"], 'Contact us form details');
            $mail->addAddress('voranavdeep999@gmail.com', 'Mailer');
            //Add a recipient
            //  $mail->addAddress('ellen@example.com');               //Name is optional


            //Content
            $mail->isHTML(true);                                  //Set email format to HTML
            $mail->Subject = 'Contact us form email sending details';
            $mail->Body    = "Your name is:".$nm."<br>"."Customers email is :".$em."<br>"."Customers Phone is  :".$phone."<br>"."Customers message is :".$msg."<br>"."Contact forms have always been a pretty effective alternative to mailto links spread around webpages. And that’s still the case in 2022. 
 
     They’re easy to use for customers and harder to figure out for email harvesters. As you would expect, building an effective PHP email contact form isn’t hard at all. We’re going to explain the process step by step in this article."."<br>"."For more details contact us with"."Mobile numbers :9998003
     879"."<br>"."Email  us on <a href='mailto:info@gmail.com'>info@gmail.com</a>";
            //  $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();
            echo "<script>
     alert('Thanks for contact with us')
     window.location='./';
     </script>";

        }

    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }


    // view cart after login as customer 
if(isset($_SESSION["customer_id"]))
{
    $customerid=$_SESSION["customer_id"];
    $shwcrt=$this->joindata1('shiva_cart','shiva_customer','add_jewellery_product','shiva_cart.customer_id=shiva_customer.customer_id','shiva_cart.product_id=add_jewellery_product.product_id','customer_id',$customerid);
}


    //  manage profile

    if(isset($_SESSION["customer_id"])) {

        $customerid=$_SESSION["customer_id"];
        $shwprof=$this->joindata('shiva_customer', 'shiva_state', 'customer_id', $customerid, 'shiva_customer.state_id=shiva_state.state_id');

    }
}

// delete cart from viewcart  as customer login
if(isset($_GET["delete-cartid"]))
{
    $did=$_GET["delete-cartid"];
    $id=array("cart_id"=>$did);
    $chk=$this->deletedata('shiva_cart',$id);
    if($chk)
    {
        echo "<script>
        alert('Your Cart successfully Deleted from cart')
        window.location='viewcart';
        </script>";
    }
}

// count cart as customer login
if(isset($_SESSION["customer_id"]))
{
    $id=$_SESSION["customer_id"];
    $totalcartcount=$this->selectcountcrt('shiva_cart','customer_id',$id);
}

             //login customer here
if(isset($_POST["loginbtn"])) {

    $em=$_POST["txt_email"];
    $pass=$_POST["txt_password"];
    $chk=$this->login('shiva_customer', $em, $pass);

    if($chk) {
        echo "<script>
            alert('you are Logged in as customer successfully')
            window.location='./';
            </script>";

    } else {
        echo "<script>
        alert('your email and password are incorect try again')
        window.location='login-us';
        </script>";
    }
}

                         // forget password

                         if(isset($_POST["btnclk1"])) {
                             require_once("PHPMailer.php");
                             require_once("Exception.php");
                             require_once("SMTP.php");
                             $email=$_POST["txt_email"];

                             $mail = new PHPMailer(true);
                             //Server settings
                             $mail->SMTPDebug =false;                      //Enable verbose debug output
                             $mail->isSMTP();                                            //Send using SMTP
                             $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
                             $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
                             $mail->Username   = 'voranavdeep999@gmail.com';                     //SMTP username
                             $mail->Password   ='byrcjkrorutoxwgh';                               //SMTP password
                             $mail->SMTPSecure = "TLS";            //Enable implicit TLS encryption
                             $mail->Port       = 587;
                             //Recipients
                             $mail->setFrom('voranavdeep999@gmail.com', 'Forget Password');
                             $mail->addAddress($_POST["txt_email"], 'Mailer');
                             //Content
                             $mail->isHTML(true);                                  //Set email format to HTML
                             $pass=$this->frgpassword('shiva_customer', 'password', 'email', $email);
                             $mail->Subject = 'Forget Password for Shiva Ecommers';
                             $mail->Body = "Your password is :".$pass."<br>"."For any fraud Contact with admin Immediately on Mobile numbers :9998003
    879"."<br>"."Email  us on <a href='mailto:info@gmail.com'>info@gmail.com</a>";
                             $mail->send();
                             if($pass) {
                                 echo "<script>
        alert('We successfully send your password on your email address kindly checked and Login again')
        window.location='login-us';
        </script>";
                             }
                         }

                         // show all product on customer panel that will added by admin
                         $shwprod=$this->selectalldata('add_jewellery_product');
                         // add to cart by customers
                         if(isset($_POST["addtocart"])) {
                             date_default_timezone_set("Asia/Calcutta");
                             $customerid=$_SESSION["customer_id"];
                             $product_id=$_POST["product_id"];
                             $qty=$_POST["qty"];
                             $subtotal=$_POST["subtotal"];
                             $rdatetime=date("d/m/Y H:i:s a");
                             $data=array("customer_id"=>$customerid,"product_id"=>$product_id,"qty"=>$qty,"subtotal"=>$subtotal,"added_date_time"=>$rdatetime);
                             $chk=$this->insalldata('shiva_cart', $data);
                             if($chk) {
                                 echo "<script>
        alert('Your Product successfully added in cart')
        window.location='viewcart';
        </script>";
                             }
                         }


                         //logout admin logic
                         if(isset($_GET["logout-custmor"])) {
                             $logout=$this->logout();
                             if($logout) {
                                 echo "<script>
        alert('You are logout successfully as a admin')
        window.location='./';
        </script>";
                             }
                         }


                         // file loading here
                         if(isset($_SERVER["PATH_INFO"])) {
                             switch($_SERVER["PATH_INFO"]) {
                                 case'/':
                                     require_once("index.php");
                                     require_once("heder.php");
                                     require_once("slider.php");
                                     require_once("about.php");
                                     require_once("iteam.php");
                                     require_once("jewellery.php");
                                     require_once("ring&client_section.php");
                                     require_once("contact.php");
                                     require_once("footer.php");
                                     break;

                                 case'/about-us':
                                     require_once("index.php");
                                     require_once("sub_heder.php");
                                     require_once("about.php");
                                     require_once("footer.php");
                                     break;

                                case'/about-us':
                                    require_once("index.php");
                                    require_once("iteam.php");
                                    require_once("about.php");
                                    require_once("footer.php");
                                    break;

                                 case'/jewellery':
                                     require_once("index.php");
                                     require_once("sub_heder.php");
                                     require_once("jewellery.php");
                                     require_once("footer.php");
                                     break;

                                 case'/contact-us':
                                     require_once("index.php");
                                     require_once("sub_heder.php");
                                     require_once("contact.php");
                                     require_once("footer.php");
                                     break;

                                 case'/login-us':
                                     require_once("index.php");
                                     require_once("sub_heder.php");
                                     require_once("login.php");
                                     require_once("footer.php");
                                     break;

                                 case'/register-us':
                                     require_once("index.php");
                                     require_once("sub_heder.php");
                                     require_once("rg.php");
                                     require_once("footer.php");
                                     break;

                                 case'/manageprofile':
                                     require_once("index.php");
                                     require_once("sub_heder.php");
                                     require_once("manageprofile.php");
                                     require_once("footer.php");
                                     break;

                                 case'/changepassword-here':
                                     require_once("index.php");
                                     require_once("sub_heder.php");
                                     require_once("changepassword.php");
                                     require_once("footer.php");
                                     break;

                                 case'/forgetpassword-here':
                                     require_once("index.php");
                                     require_once("sub_heder.php");
                                     require_once("forgetpassword.php");
                                     require_once("footer.php");
                                     break;

                                 case'/viewcart':
                                     require_once("index.php");
                                     require_once("sub_heder.php");
                                     require_once("viewcart.php");
                                     require_once("footer.php");
                                     break;

                                case'/checkout':
                                     require_once("index.php");
                                     require_once("sub_heder.php");
                                     require_once("chekout.php");
                                     require_once("footer.php");
                                     break;

                                case'/PaymentSuccess':
                                     require_once("index.php");
                                     require_once("sub_heder.php");
                                     require_once("paymentsuccess.php");
                                     require_once("footer.php");
                                     break;

                                case'/PaymentFailure':
                                    require_once("index.php");
                                    require_once("sub_heder.php");
                                    require_once("paymentfailure.php");
                                    require_once("footer.php");
                                    break;

                                 default:
                                     require_once("index.php");
                                     require_once("heder.php");
                                     require_once("404.php");
                                     require_once("footer.php");
                                     break;
                             }
                         }
                     }
        }
$obj=new controller;
?>