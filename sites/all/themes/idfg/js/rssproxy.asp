<%
'On Error Resume Next

Response.ContentType = "text/xml"
Response.AddHeader "Content-Type", "text/xml;charset=UTF-8"
Response.CodePage = 65001
Response.CharSet = "UTF-8"

Dim url 

	url = "https://fishandgame.idaho.gov/content/"
    Dim tags 'Parameter of the page to get
    tags = Request("t") & ""

    Response.Write vbXmlHttp(url & tags)

FUNCTION vbXmlHttp(strURL)

	Dim xmlhttp, status, strReturn
			
		set xmlhttp = CreateObject("MSXML2.ServerXMLHTTP") 
			
		on error resume next 
				 
		xmlhttp.open "GET", strURL, false  
		xmlhttp.send ""  
		status = xmlhttp.status
					
				if err.number <> 0 or status <> 200 then 
						if status = 404 then 
								strReturn =  "Error: The page does not exist (404)." & status
						elseif status >= 401 and status < 402 then 
								strReturn =   "Error: Access denied (401)." & status
						elseif status >= 500 and status <= 600 then 
								strReturn =   "Error: 500 Internal Server Error on remote site." & status 
						else 
								strReturn =  "Error: The Server is unavailable. ["& status & "]" & "{error count : " & err.number & "}"
						end if 
				else 
								strReturn = xmlhttp.responseText
				end if  
			
		set xmlhttp = nothing 

	vbXmlHttp = strReturn
					
END FUNCTION
	
    'For Posting to get data
    ''http://www.developerfusion.co.uk/show/3272/2/
    'Dim xmlhttp As Object
    'Set xmlhttp = CreateObject("MSXML2.ServerXMLHTTP")
	
    '' Indicate that page that will receive the request and the
    '' type of request being submitted
    'xmlhttp.Open "POST", "http://localserver/test.asp", False
    '
    '' Indicate that the body of the request contains form data
    'xmlhttp.setRequestHeader "Content-Type", "application/x-www-form-urlencoded"
    '
    '' Send the data as name/value pairs
    'xmlhttp.send "Id=1&S=2"
    '
    'Set xmlhttp = Nothing
%>