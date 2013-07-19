<?php  
	session_start(); 
   require 'validatecode.class.php';  //�Ȱ���������ʵ��·�����ʵ����������޸ġ�  
   $_vc = new ValidateCode();      //ʵ��һ������  
   $_vc->doimg();   
   $_SESSION['code'] = $_vc->getCode();//��֤�뱣�浽SESSION��  
   echo  $_vc->getCode();
?> 