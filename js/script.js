var xmlHttp=createXmlHttpRequestObject();
	
	function createXmlHttpRequestObject()
	{	var xmlHttp;
		
		if(window.ActiveXObject)
		{	try{	xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
					}
			catch(e){	xmlHttp=false;
						}
			
				}
		else
		{	try{	xmlHttp=new XMLHttpRequest();
					}
			catch(e){	xmlHttp=false;
						}
				}
		
		if(!xmlHttp)
		{	alert("network error.\n Please try again later.");
			}
		else
		{	return xmlHttp;
			}
		}
		
		function process()
		{	if(xmlHttp.readyState==0||xmlHttp.readyState==4)
			{	fname=encodeURIComponent(document.getElementById('Fname').value);
				sname=encodeURIComponent(document.getElementById('sname').value);
				address=encodeURIComponent(document.getElementById('address').value);
				email=encodeURIComponent(document.getElementById('email').value);			
				xmlHttp.open("GET",'front.php?fname='+fname+'&sname='+sname+'&address='+address+'&email='+email,true);
				xmlHttp.onreadystatechange=handleServerResponse;
				xmlHttp.send(null);
				}
			else
			{	setTimeout('process()',1000);
				}
			
			}