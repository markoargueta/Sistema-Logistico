function mostrartodo()
{
	var todo=document.getElementById('containertodo');
	var mes=document.getElementById('containermes');
	var dia=document.getElementById('containerdia');

	todo.style.display='block';
	mes.style.display='none';
	dia.style.display='none';
}


function mostrarmes()
{
	var todo=document.getElementById('containertodo');
	var mes=document.getElementById('containermes');
	var dia=document.getElementById('containerdia');

	todo.style.display='none';
	mes.style.display='block';
	dia.style.display='none';
}


function mostrardia()
{
	var todo=document.getElementById('containertodo');
	var mes=document.getElementById('containermes');
	var dia=document.getElementById('containerdia');

	todo.style.display='none';
	mes.style.display='none';
	dia.style.display='block';
}

