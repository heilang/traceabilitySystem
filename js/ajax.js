
function ajax_post(postStr,url)
{
	var ajax = false;
	//开始初始化XMLHttpRequest对象
	if(window.XMLHttpRequest) 
	{ 	//Mozilla 浏览器
		ajax = new XMLHttpRequest();
        if (ajax.overrideMimeType) 
		{	//设置MiME类别
            ajax.overrideMimeType("text/xml");
        }
	}
	else if (window.ActiveXObject) 
	{ 	// IE浏览器
		try 
		{
			ajax = new ActiveXObject("Msxml2.XMLHTTP");
    	} 
		catch (e) 
		{
        	try 
			{
            	ajax = new ActiveXObject("Microsoft.XMLHTTP");
            } 
			catch (e) {}
         }
	}
    if (!ajax) 
	{ 	// 异常，创建对象实例失败
		window.alert("不能创建XMLHttpRequest对象实例.");
		return false;
	}

	//通过Post方式打开连接
	ajax.open("POST", url, true);

	//定义传输的文件HTTP头信息
	ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");

	//发送POST数据
	ajax.send(postStr);

	//获取执行状态
	ajax.onreadystatechange = function() 
	{ 
   		//如果执行状态成功，那么就把返回信息写到指定的层里
   		if (ajax.readyState == 4 && ajax.status == 200) 
		{ 
    		var news=ajax.responseText;
if(news==1||news==0)
			respond_login(news);
			else
		if(news=="11"||news=="10")
			respond_message(news);
			else
			{
		if(news=="admin_ok")
		{
		alert("系统登录成功");
		window.location.href="admin_index.php";
		}
		else
		if(news=="admin_false")
		alert("系统登录失败");
			}
		if(news=="inser_sucess")
		{
		alert("插入成功");
location.reload();		
}
//alert(news);
			
   		} 
	} 
	}
	
	function ajax_get(url)
	{
	var ajax = false;
	//开始初始化XMLHttpRequest对象
	if(window.XMLHttpRequest) 
	{ 	//Mozilla 浏览器
		ajax = new XMLHttpRequest();
        if (ajax.overrideMimeType) 
		{	//设置MiME类别
            ajax.overrideMimeType("text/xml");
        }
	}
	else if (window.ActiveXObject) 
	{ 	// IE浏览器
		try 
		{
			ajax = new ActiveXObject("Msxml2.XMLHTTP");
    	} 
		catch (e) 
		{
        	try 
			{
            	ajax = new ActiveXObject("Microsoft.XMLHTTP");
            } 
			catch (e) {}
         }
	}
    if (!ajax) 
	{ 	// 异常，创建对象实例失败
		window.alert("不能创建XMLHttpRequest对象实例.");
		return false;
	}

	//通过Post方式打开连接
	ajax.open("GET", url, true);

	//定义传输的文件HTTP头信息
	//ajax.setRequestHeader("Content-Type","application/x-www-form-urlencoded");

	//发送POST数据
	ajax.send(null);

	//获取执行状态
	ajax.onreadystatechange = function() 
	{ 
   		//如果执行状态成功，那么就把返回信息写到指定的层里
   		if (ajax.readyState == 4 && ajax.status == 200) 
		{ 
		var news=ajax.responseText;

			
   		} 
	} 
	
	}
	function respond_login(news)
	{
	if(news==1)
			{
			alert("登陆成功");
			location.reload();
			}
			else
			if(news==0)
			alert("登录失败");
	
	}
	function respond_message(news)
	{
	if(news==11)
			{
			alert("留言成功");
			location.reload();
			}
			else
			if(news==10)
			alert("留言失败");
			
	
	}

