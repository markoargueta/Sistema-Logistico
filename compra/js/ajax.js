function enviarParametrosProducto()
{
	c = document.getElementById('cboCriterio_producto').value; 
	b = document.getElementById('txtDato_producto').value; 
	listarProductos(c,b);
}	

function listarProductos(c,b)
{
	var xmlhttp;			
	if(window.XMLHttpRequest){
		xmlhttp = new XMLHttpRequest();
	}else{
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}	
		
	xmlhttp.onreadystatechange= function(){	
		if(xmlhttp.readyState=4 && xmlhttp.status==200){
			document.getElementById("table_body_producto").innerHTML=xmlhttp.responseText;
		}
	}		
	xmlhttp.open("GET","buscar_producto.php?criterio="+c +"&busqueda="+b,true);
	xmlhttp.send();
}







function enviarParametrosProveedor()
{
	c = document.getElementById('cboCriterio_proveedor').value; 
	b = document.getElementById('txtDato_proveedor').value; 
	listarProveedores(c,b);
}	

function listarProveedores(c,b)
{
	var xmlhttp;			
	if(window.XMLHttpRequest){
		xmlhttp = new XMLHttpRequest();
	}else{
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}	
		
	xmlhttp.onreadystatechange= function(){	
		if(xmlhttp.readyState=4 && xmlhttp.status==200){
			document.getElementById("table_body_proveedor").innerHTML=xmlhttp.responseText;
		}
	}		
	xmlhttp.open("GET","buscar_proveedor.php?criterio="+c +"&busqueda="+b,true);
	xmlhttp.send();
}
