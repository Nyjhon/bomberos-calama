var base = location.protocol+'//'+location.host;
var route = document.getElementsByName('routeName')[0].getAttribute('content');

document.addEventListener('DOMContentLoaded',function(){
	var btn_buscar = document.getElementById('btn_buscar');
	var form_buscar =document.getElementById('form_buscar')
	if(btn_buscar)
	{
		btn_buscar.addEventListener('click', function(e){
			e.preventDefault();
			if (form_buscar.style.display === 'block') {
				form_buscar.style.display = 'none';
			}
			else{
				form_buscar.style.display = 'block';
			}
		});
	}

	route_active = document.getElementsByClassName('lk-'+route)[0].classList.add('active');

	btn_eliminar = document.getElementsByClassName('btn-eliminar');
	for(i=0; i < btn_eliminar.length; i++){
		btn_eliminar[i].addEventListener('click', eliminar_object);
	}

});

$(document).ready(function(){
	editor_init('editor');

})

function editor_init(field){
	CKEDITOR.replace(field,{
		toolbar:[
		{name: 'clipboard', items: ['Cut','Copy', '-', 'Undo','Redo']},
		{name: 'basicstyles', items: ['Bold','Italic','BulletedList','Strike']},
		{name: 'document', items: ['CodeSnippet','EmojiPanel','Preview']}
		]

	});
}
function eliminar_object(e){
	e.preventDefault();
	var object = this.getAttribute('data-object');
	var path = this.getAttribute('data-path');
	var url = base + '/' + path + '/' + object + '/eliminar';
	Swal.fire({
	  title: "¿Estás seguro de eliminar este objeto?",
	  text: "Recuerda que esta acción no podrá ser revertida.",
	  icon: "warning",
	  showCancelButton: true,
	}).then((result) => {
	  if (result.isConfirmed) {
	    window.location.href = url;
	  } 
	});
}