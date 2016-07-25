
var xmlHttp;
var idok=false;
var passwordok=false;
function checkID()//确认ID是否正确
{
var userid=document.getElementById("user").value;

createXMLHttpRequest();
xmlHttp.onreadystatechange=writeUserIDInfo;//绑定writeUserIDInfo函数;
var url="checkID.php?username="+userid;
xmlHttp.open("GET",url,true);//建立请求
xmlHttp.send(null);//发送请求
}


function writeUserIDInfo()
{
if(xmlHttp.readyState==4)//如果服务器返回内容显示用户名输入提示；
{
	if(xmlHttp.status==200)//如果完成请求处理
	{
var news=xmlHttp.responseText;
if(news==1)//如果账号存在
{
	idok=true;
	document.getElementById("idwrong").style.color="green";
	document.getElementById("idwrong").innerHTML="√";

	}
else//如果账号不存在
{
	idok=false;
	document.getElementById("idwrong").style.color="red";
	document.getElementById("idwrong").innerHTML="X";
}
		}
	}
}

function checkPassword()
{
	if(idok==true)
	{
		var userid=document.getElementById("user").value;
		var userpassword=document.getElementById("password").value;
		//alert(userid+userpassword);
		createXMLHttpRequest();
		xmlHttp.onreadystatechange=writeUserPasswordInfo;//绑定writeUserIDInfo函数;
		var postStr="password="+userpassword+"&username="+userid;
		var url="checkPassword.php";
		xmlHttp.open("POST",url,true);//建立请求
		xmlHttp.setRequestHeader("Content-Type","application/x-www-form-urlencoded");
		xmlHttp.send(postStr);//发送请求
	}
	else
		alert("用户不存在");
	}

	function writeUserPasswordInfo()
	{
	
	if(xmlHttp.readyState==4)//如果服务器返回内容显示用户名输入提示；
	{
		if(xmlHttp.status==200)//如果完成请求处理
		{
	var news=xmlHttp.responseText;

	if(news==1)
	{
		passwordok=true;
		document.getElementById("passwordwrong").style.color="green";
		document.getElementById("passwordwrong").innerHTML="√";

		}
	else
	{
		passwordok=false;
		document.getElementById("passwordwrong").style.color="red";
		document.getElementById("passwordwrong").innerHTML="X";
	}

			}

		}
	}


function createXMLHttpRequest()//不同的浏览器有不同的异步对象，
{
try{
xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");//IE浏览器异步交互对象
	
}catch(e)
{
try{

xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");//IE
	
}catch(e)
{

try{

xmlHttp=new XMLHttpRequest();//非IE

}catch(e)
{
alert("您的浏览器不支持AJAX异步交互");
}
}
}	
} 

