<?php
  class DB
  {
  	private $server= "localhost";
  	private $usname= "root";
  	private $pswd= "";
  	private $dbname= "rashak";
  	public $c;

    public function __construct()
    {
    	$this->c= mysqli_connect($this->server, $this->usname, $this->pswd,$this->dbname);

    	if ($this->c)
    	{
    		//echo "Database connected";
    	}
    	else
    	{
    		//echo "db not connected".mysqli_error();
    	}
    	echo "<br><br>";
    }
    
    public function in($name, $pass)
    {
        $sel= "SELECT * FROM login WHERE name='$name' AND pass ='$pass'";
        // echo $sel;
		$res= mysqli_query($this->c,$sel);
        return $res;
    }
    public function disdes()
    {
        $sel= "select * from desig";
        $res= mysqli_query($this->c,$sel);
        return $res;
    }
    public function insdes($cat)
 	{
 		$ins= "insert into desig(name) values('$cat')";
 		$res= mysqli_query($this->c,$ins);
 		return $res;
 	}
    public function updes($a)
 	{
 		$ins= "select * from desig where d_di = $a";
		// echo $ins;
 		$res= mysqli_query($this->c,$ins);
 		return $res;
	}
    public function bupdes($a,$b)
 	{
 		$ins= "UPDATE desig SET name='$b' WHERE d_di = $a";
 		$res= mysqli_query($this->c,$ins);
 		return $res;
 	}

	public function upload($code, $name, $deg, $mo, $gmail, $date, $add, $data, $bg, $stat, $Aname)
	{
		// $insert = "insert into membersDetails192(m_name, designation, phone, dob, address, photos, aadharphotos, aadharno, status, updateby) values('$name', '$deg', '$mo', '$date', '$add', '$data', '$data1', '$adhar', '$stat', '$Aname')";
		$insert = "insert into membersDetails192(m_ID, m_name, designation, phone, email, dob, address, photos, BG, status, updateby) values('$code', '$name', '$deg', '$mo', '$gmail', '$date', '$add', '$data', '$bg', '$stat', '$Aname')";
		// echo $insert;
		$res= mysqli_query($this->c,$insert);
		return $res;
	}
	public function log($adm,$actio,$date,$tim)
	{
		// $ins1 = "INSERT INTO log815(admin, action, cdate, time ) VALUES (`$adm`, `$actio`, `$date`, `$tim`)";
		$ins1 = "INSERT INTO log815(admin, action, cdate, time) VALUES ('$adm','$actio','$date','$tim')";
		// echo $ins1." <br>";
		// echo $ins;
		$re= mysqli_query($this->c,$ins1);
		return $re;
		
	}
	public function dislog()
	{
		$ins= "select * from log815 ORDER BY `log815`.`cdate` DESC";
		$res= mysqli_query($this->c,$ins);
		return $res;
		
	}
	public function dismem()
	{
		$ins= "select * from membersdetails192 ORDER BY `membersdetails192`.`designation` ASC";
		$res= mysqli_query($this->c,$ins);
		return $res;
		
	}
	public function permem($a)
	{
		$ins= "select * from membersdetails192 where m_ID ='$a'";
		$res= mysqli_query($this->c,$ins);
		return $res;
		
	}
	public function updet($code, $name, $deg, $mo, $gmail, $date, $add, $data, $gb, $stat, $Aname,$id)
	{
		// $ins = "INSERT INTO log815(admin, action, cdate, time ) VALUES ('$adm','$actio','$date','$tim')";
		$ins = "UPDATE membersdetails192 SET m_ID='$code', m_name='$name',designation='$deg',phone='$mo', email='$gmail', dob='$date',address='$add',photos='$data',BG='$gb', status='$stat',updateby='$Aname' WHERE m_ID='$id' ";
		$re= mysqli_query($this->c,$ins);
		return $re;
	}
	public function del($code)
	{
		$q = "DELETE FROM `membersdetails192` WHERE m_ID = '$code' ";
		// echo $q;
			$delet = mysqli_query($this->c, $q);
			return $delet;
	}

  }
