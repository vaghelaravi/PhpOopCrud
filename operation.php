<?php
 require_once('db.php');
class operation extends db
{
	public function select()
	{
		//$sql="SELECT * FROM student";

		$result = $this->connect()->prepare("select * from student order by enroll_no asc");
        $result->execute();
		if($result->rowCount()>0){
			while($row = $result->fetch()){
				$data[]=$row;
			}
			return $data;
			//jetlo data database mathi aave tene ek array ma index page ma mokle
		}
	}

	public function insert($data)
	{
		
		$enroll_no = $data['enroll_no'];
		$name = $data['name'];
	    $mobile = $data['mobile'];

		$res=$this->connect()->prepare("insert into student values(:enroll_no,:name, :mobile)");
		$res->bindparam(':enroll_no', $enroll_no);
		$res->bindparam(':name', $name);
		$res->bindparam(':mobile', $mobile);
		$res->execute();
		if ($res) {
			header('Location:index.php');
		}
		
	}

	public function selectOne($enroll_no)
	{


		$stmt = $this->connect()->prepare("select * from student where enroll_no =:enroll_no");
	    $stmt->bindparam(':enroll_no', $enroll_no);
		$stmt->execute();
		$res = $stmt->fetch(PDO::FETCH_ASSOC);
		return $res;

	}
	
	public function update($data,$id)
	{
		 $enroll_no = $data['enroll_no'];
		 $name = $data['name'];
	     $mobile = $data['mobile'];

		
         $res = $this->connect()->prepare("update student set enroll_no =:enroll_no1, name =:name, mobile =:mobile where enroll_no =:enroll_no");
         $res->bindparam(':enroll_no1', $enroll_no);
         $res->bindparam(':name', $name);
         $res->bindparam(':mobile', $mobile);
         $res->bindparam(':enroll_no', $id);
         $res->execute();
	      header('location:index.php');
		
     }

     public function delete($id)
     {
     	$res = $this->connect()->prepare("delete from student where enroll_no =:enroll_no");
	    $res->bindparam(':enroll_no', $id);
	    
	    $res->execute();
	    header('location:index.php');
     }
}
?>