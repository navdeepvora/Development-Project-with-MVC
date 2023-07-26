<?php
error_reporting(0);
class model 
{
    public function __construct()
    {
        session_start();
        //database connectivity
        $conn=$this->connection=new mysqli("localhost","root","","shiva");
        if($conn)
        {
            //  echo "<h5>Connection stablished successfully</h5>";
        }
        else
        {
            die(mysqli_error($conn));
        }
    }

    //create member function for select data
    public function selectdata($table)
    {
        $select="select * from $table";
        $exe=mysqli_qurey($this->connection,$select);
        while($fetch=mysqli_fetch_array($exe))
        {
            $arr[]=$factch;
        }
        return $arr;
    }
     // create member function for select all data
     public function selectalldata($table)
     {
         $select="select * from $table";
         $exe=mysqli_query($this->connection,$select);
         while($fetch=mysqli_fetch_array($exe))
         {
             $arr[]=$fetch;
         }
         return $arr;
 
     }

      // create member function for join data tables
      public function joindata($table,$table1,$column,$customerid,$where)
      {
          $select="select * from $table join $table1 on $where where $column='$customerid'";
          $exe=mysqli_query($this->connection,$select);
          while($fetch=mysqli_fetch_array($exe))
          {
              $arr[]=$fetch;
          }
          return $arr;
  
      }

      // create a member function for change password
public function chngepasswordcustomer($table,$column,$opass,$npass,$cpass,$id)
{
    // select old  password 
    $id=$_SESSION["customer_id"];
    $select="select password from $table where $column='$id'";
    $exe=mysqli_query($this->connection,$select);
    $fetch=mysqli_fetch_array($exe);
    $pass=$fetch["password"];
    if($pass==$opass && $npass==$cpass)
    {
    $upd="update $table set password='$npass' where $column='$id'";
    $exe=mysqli_query($this->connection,$upd);    
    return true;
    }   
    else 
    {
        return false;
    } 

}

    //create member function for login
    public function login($table,$em,$pass)
    {
        $select="select * from $table where email='$em' and password='$pass'";
        $exe=mysqli_query($this->connection,$select);
        $fetch=mysqli_fetch_array($exe);
        $num_rows=mysqli_num_rows($exe);
        if($num_rows==1)
        {
            $_SESSION["customer_id"]=$fetch["customer_id"];
            $_SESSION["txt_email"]=$fetch["email"];
            $_SESSION["txt_name"]=$fetch["name"];
        
            return true;
        }
        else 
        {
            return false;
        }
    }

    // create a member function for insall data
   public function insalldata($table,$data)
   {
     //key convert array into value or string
     $column=array_keys($data);
     $column1=implode(",",$column);
     //values convert array into value or string
     $value=array_values($data);
     $value1=implode("','",$value);

     $insert="insert into $table($column1)values('$value1')";
     $exe=mysqli_query($this->connection,$insert);
     return $exe;
   } 

  //deleta data 
  public function deletdata($table,$id)
  {
    //key convert array into value or string
    $column=array_keys($id);
    $column1=implode(",",$column);
    //values convert array into value or string
    $value=array_values($id);
    $value1=implode(",",$value);

    $delete="delete from $table where $column1='$value1'";     
    $exe=mysqli_query($this->connection,$delete);
    return $exe;
  }

  // create a member function for update customer profile data
  public function updprofiledata($table,$path,$nm,$em,$mob,$add,$st,$column,$id)
  {
      $upd="update $table set photo='$path',name='$nm',email='$em',mobile='$mob',address='$add',state_id='$st' where $column='$id'"; 
      $exe=mysqli_query($this->connection,$upd);
      return $exe;

  }

  //create a member function forgetpassword 
  public function frgpassword($table,$column,$column1,$email)
  {
    $select="select $column from $table where $column1='$email'";
    $exe=mysqli_query($this->connection,$select);
    $num_rows=mysqli_num_rows($exe);
    $fetch=mysqli_fetch_array($exe);
    if($num_rows==1)
    // if($num_rows>0)
    {
      $pass=$fetch[$column];
      return $pass;
    }
    else 
    {
      return false;
    }

  }
  
   // create member function for join data tables
   public function joindata1($table,$table1,$table2,$where,$where1,$column,$customerid)
   {
       $select="select * from $table join $table1 on $where join $table2 on $where1  where $table1.$column='$customerid'";
       $exe=mysqli_query($this->connection,$select);
       while($fetch=mysqli_fetch_array($exe))
       {
           $arr[]=$fetch;
       }
       return $arr;

   }
  
// count cart after login as customer
public function selectcountcrt($table,$column,$id)
{
    $select="select count($column) as total_count from $table where $column='$id'";
    $exe=mysqli_query($this->connection,$select);
    while($fetch=mysqli_fetch_array($exe))
    {
        $arr[]=$fetch;
    }
    return $arr;

}

// subtotal of total cart items from  cart after login as customer
public function subtotalcrt($table,$column,$column1,$id)
{
    $select="select sum($column) as total from $table where $column1='$id'";
    $exe=mysqli_query($this->connection,$select);
    while($fetch=mysqli_fetch_array($exe))
    {
        $arr[]=$fetch;
    }
    return $arr;

}

// delete customer profile create a member function

public function deletedata($table,$id)
{
      //key convert array into value or string
      $column=array_keys($id);
      $column1=implode(",",$column);
      //values convert array into value or string
      $value=array_values($id);
      $value1=implode("','",$value);

      $delete="delete from $table where $column1='$value1'";
      $exe=mysqli_query($this->connection,$delete);
      return $exe;

}

// create a member function for logout as admin
public function logout()
{
    unset($_SESSION["customer_id"]);
    unset($_SESSION["txt_email"]);
    unset($_SESSION["txt_name"]);
    session_destroy();
    return true;
}
}


?>