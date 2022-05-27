var xmlHttp = createXmlHttpRequestObject();

function createXmlHttpRequestObject(){
	var xmlHttp;

	if (window.ActiveXObject) {
		try{
			xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
		}
		catch(e){
			xmlHttp = false;
		}

	}else{
		try{
			xmlHttp = new XMLHttpRequest();
		}
		catch(e){
			xmlHttp = false;
		}
	}

	if (!xmlHttp){
		alert("object was'nt created");
	
	}else{
		return xmlHttp;
	}
}

function modal_process() {
	if (xmlHttp.readyState==0 || xmlHttp.readyState==4 ) {
		namein = document.getElementById("give_name").innerHTML;
		xmlHttp.open("GET","modal_php.php?namein=" + namein, true);
		xmlHttp.onreadystatechange=handleServerResponse;
		xmlHttp.send(null);
		alert(namein);

	}else{
		setTimeout('modal_process()',1000);
	}
}


function handleServerResponse() {
	if (xmlHttp.readyState==4) {
		if (xmlHttp.status==200) {
			xmlResponse = xmlHttp.responseXML;
			xmlDocumentElement = xmlResponse.documentElement;
			//name_out = xmlDocumentElement.firstChild.data;
			//alert(name_out);
			//heading = document.createElement("h4");
			//name = document.createTextNode(name_out);
			//heading.appendChild(name);
			//theD=getElementById("modal_name");
			//theD.appendChild(heading);
			image_location=xmlDocumentElement.firstChild.data;
			//description=xmlDocumentElement.thirdChild.data;
			//document.getElementById("modal_name").innerHTML = '<img src="'+ name_out +'">';
			document.getElementById("modal_image").innerHTML = '<img src="'+ image_location +'">';
			//document.getElementById("modal_description").innerHTML = '<p>' + description +'</p>';
			setTimeout('modal_process()',1000);
	}else{
		alert(xmlHttp.statusText);
	}
	}
}
