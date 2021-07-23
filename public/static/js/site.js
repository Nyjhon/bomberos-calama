var base = location.protocol+'//'+location.host;
var route = document.getElementsByName('routeName')[0].getAttribute('content');

document.addEventListener('DOMContentLoaded', function(){

	var slider = new MDSlider;
	var form_avatar_change = document.getElementById('form_avatar_change');
	var btn_avatar = document.getElementById('btn_avatar');
	var avatar_change_overlay = document.getElementById('avatar_change_overlay');
	var input_file_avatar = document.getElementById('input_file_avatar');
	if(btn_avatar){
		btn_avatar.addEventListener('click', function(e){
			e.preventDefault();
			input_file_avatar.click();
		})
	}
	if(input_file_avatar){
		input_file_avatar.addEventListener('change', function(){
			var load_img = '<img src= "'+base+'/static/imagenes/loader_white.svg"/>';
			avatar_change_overlay.innerHTML = load_img;
			avatar_change_overlay.style.display = 'flex';
			form_avatar_change.submit();
		})
	}
	slider.show();
});