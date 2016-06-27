<?php
$conn = mysqli_connect("localhost", "root", "1234", "IA")or die ("mysql connect failed");
mysqli_query($conn, 'SET NAMES UTF8')or die ("error");

function insert_farmer_info($user_id,$name,$password,$address,$discription,$phone,$gender,$check_){
	$start_time = date('Y-m-d',time());
	$sql="insert into farmer_info(user_id,name,password,address,discription,phone,gender,start_time,check_) 
		value('$user_id','$name','$password','$address','$discription','$phone','$gender','$start_time','$check_');" ; 
	if(mysql_query($sql)){
		echo "insert success";
	} 
	else 
		echo "insert error";
}

//insert_farmer_info(11121,test_11,111,aaa,aaa,123,aa,true);




//���Ӵ�����Ϣ�ĺ���
function insert_greenhouse_info($name,$discription,$user_id,$start_time){
	//g_IdΪ��ǰ���е�����+1
	$sql_select = "select * from greenhouse_info;";
	$count = mysql_query($sql_select);
	$row = mysql_num_rows($count);
	$one = 1;
	$g_id = $row + $one;
	//����insert����
	$sql="insert into greenhouse_info(g_id,name,discription,user_id,start_time)
	value('$g_id','$name','$discription','$user_id','$start_time');" ;
	if(mysql_query($sql)){
		echo "insert success";
	}
	else
		echo "insert error";
}

//$start_time = date('Y-m-d',time());
//���ԣ�
//insert_greenhouse_info(002,aaa,1252981,$start_time);




//insert ͼƬ��Ϣ
function insert_picture_info($value,$picture_g_id){
	$sql_select = "select * from picture_info;";
	$count = mysql_query($sql_select);
	$row = mysql_num_rows($count);
	$one = 1;
	$gpic_id = $row + $one;
	$sql="insert into picture_info(gpic_id,value,picture_g_id)
	value('$gpic_id','$value','$picture_g_id');" ;
	if(mysql_query($sql)){
		echo "insert success";
	}
	else
		echo "insert error";
}

//����
//insert_picture_info(100010010101000100,1);




//insert ��������Ϣ
function insert_sensor_info($s_id,$name,$type,$g_id){
	$conn = mysqli_connect("localhost", "root", "1234", "IA")or die ("mysql connect failed");
	mysqli_query($conn, 'SET NAMES UTF8')or die ("error");
	$sql_select="update sensor_info set temperature = $name, humidity = $type, start_time = '$g_id'
	where sensor_id = '$s_id' " ;
	if(mysqli_query($conn, $sql_select)){
		echo "insert success";
	}
	else
		echo "insert error";
}

//����
insert_sensor_info('ss700', 88, 88, '2016年6月');




//insert ������ֵ��Ϣ
function insert_sensor_value($s_id,$value){
	$sql_select = "select * from sensor_value;";
	$count = mysql_query($sql_select);
	$row = mysql_num_rows($count);
	$one = 1;
	$sv_id = $row + $one;
	$time = date('Y-m-d H:i:s',time());
	$sql="insert into sensor_value(sv_id,s_id,value,time)
	value('$sv_id','$s_id','$value','$time');" ;
	if(mysql_query($sql)){
		echo "insert success";
	}
	else
		echo "insert error";
}

//����
//insert_sensor_value(1,121);




//insert ��Ʒ��Ϣ
function insert_product_info($p_id,$name,$type,$product_g_id,$start_time){
	$sql="insert into product_info(p_id,name,type,product_g_id,start_time)
	value('$p_id','$name','$type','$product_g_id','$start_time');" ;
	if(mysql_query($sql)){
		echo "insert success";
	}
	else
		echo "insert error";
}

//$start_time = date('Y-m-d',time());

//����
//insert_product_info(111,111,211,1,$start_time);





//insert ������Ϣ
function insert_production_info($po_id,$p_id,$end_time){
	$sql="insert into production_info(po_id,p_id,end_time)
	value('$po_id','$p_id','$end_time');" ;
	if(mysql_query($sql)){
		echo "insert success";
	}
	else
		echo "insert error";
}

//$start_time = date('Y-m-d',time());
//����
//insert_production_info(111,111,$start_time);





//insert ��������Ϣ
function insert_control_info($c_id,$name,$type,$control_g_id){
	$sql="insert into control_info(c_id,name,type,control_g_id)
			value('$c_id','$name','$type','$control_g_id');" ;
	if(mysql_query($sql)){
		echo "insert success";
	}
	else
		echo "insert error";
}


//����
//insert_control_info(112,aaa,111,1);





//insert ������ֵ��Ϣ
function insert_control_value($c_id,$value){
	$sql_select = "select * from control_value;";
	$count = mysql_query($sql_select);
	$row = mysql_num_rows($count);
	echo "$row</br>";
	$one = 1;
	$cv_id = $row + $one;
	$time = date('Y-m-d H:i:s',time());
	echo $sql="insert into control_value(cv_id,c_id,value,time)
	value('$cv_id','$c_id','$value','$time');" ;
	if(mysql_query($sql)){
		echo "insert success";
	}
	else
		echo "insert error";
}

//����
//insert_control_value(111,1234);




?> 