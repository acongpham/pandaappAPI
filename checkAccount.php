<?php
include 'config/dbcon.php';
$idCategory='1';
$useraccount='tunguyen';// set cứng, khi code thì truyền biến
$passwordaccount='12345678';// set cứng, khi code thì truyền biến
 $query="SELECT * FROM account WHERE usename='".$useraccount."' AND password='".$passwordaccount."' AND accountStatus=1";
 $data= mysqli_query($conn, $query);
 $arrAccount=array(); 
while ($row=mysqli_fetch_assoc($data)) {
	array_push($arrAccount, new Account(
		$row['roleId'],	
                $row['idShop'],	
		$row['usename'],
                $row['password'],	
                $row['name'],
                $row['phone_number'],	
                $row['address'],
                $row['gender'],	
                $row['email'],
                $row['DateOfBirth'],
                $row['accountStatus']	
                ));
}
     echo json_encode($arrAccount);
 class Account 
{
	
	function Account($roleId,$idShop,$usename,$password,$name,$phone_number,$address,$gender,$email,$DateOfBirth,$accountStatus)
	{
		$this->roleId=$roleId;
		$this->idShop=$idShop;
                $this->usename=$usename;
                $this->password=$password;
                $this->name=$name;
                $this->phone_number=$phone_number;
                $this->address=$address;
                $this->gender=$gender;
                $this->email=$email;
                $this->DateOfBirth=$DateOfBirth;
                $this->accountStatus=$accountStatus;
                  
	}
}
?>


