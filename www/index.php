<H2>just give me a jpg ,no php</H2>
<meta http-equiv="content-type" content="txt/html; charset=utf-8" />
<form action="" enctype="multipart/form-data" method="post" 
name="uploadfile">上传文件：<input type="file" name="upfile" />
<input type="submit" value="上传" /></form> 
<!--key在index.php中-->
<?php 
error_reporting(0);
$key = "key:uAMeHui4";
header("Content-type:text/html;charset=utf-8"); 
//print_r($_FILES["upfile"]); 
//.htaccess静态重写绕过
if(is_uploaded_file($_FILES['upfile']['tmp_name']))
{
$upfile=$_FILES["upfile"]; 
//获取数组里面的值 
$name=$upfile["name"];//上传文件的文件名 
$type=$upfile["type"];//上传文件的类型 
$size=$upfile["size"];//上传文件的大小 
$tmp_name=$upfile["tmp_name"];//上传文件的临时存放路径 
 
$valore=split("[.]",$name);
if(strtolower(substr($valore[1],0,3))=="php"||strtolower(substr($valore[1],0,2))=="ph")
{
echo "不允许上传的文件类型";
echo "<br>";
$okType=false; 
}
else
{
if(count($valore)>2)
{
$okType=false; 
echo "不允许上传的文件类型";
echo "<br>";
}
else
{
$okType=true; 
}
}
if($okType){
$error=$upfile["error"];//上传后系统返回的值 
echo "================<br/>"; 
echo "上传文件名称是：".$name."<br/>"; 
echo "上传文件类型是：".$type."<br/>"; 
echo "上传文件大小是：".$size."<br/>"; 
echo "上传后系统返回的值是：".$error."<br/>"; 
//上传文件存放的目录
move_uploaded_file($tmp_name,'up/'.$name); 
$destination="up/".$name; 
echo "================<br/>"; 
if($error==0){ 
echo "<br>图片预览:<br>"; 
echo "<img src=".$destination.">"; 
}elseif ($error==1){ 
echo "超过了文件大小，在php.ini文件中设置"; 
}elseif ($error==2){ 
echo "超过了文件的大小MAX_FILE_SIZE选项指定的值"; 
}elseif ($error==3){ 
echo "文件只有部分被上传"; 
}elseif ($error==4){ 
echo "没有文件被上传"; 
}else{ 
echo "上传文件大小为0"; 
} 
}else{ 
echo "请上传jpg,gif,png,bmp等格式的图片！"; 
} 
} 
?> 