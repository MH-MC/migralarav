$(document).ready(function (){
	confirmDelete();
	confirmDown();
	confirmUp();
	confirmRoleDelete();
});

function confirmDelete(){
	$(document).on('click','.confirm-delete',function(){
		var id = $(this).parent().parent().data('id');
		var username = $(this).parent().parent().data('username');
		var name = $(this).parent().parent().data('name');
		var url_base = $('#form-delete input[name="url_base"]').val()
		$('#form-delete').attr('action', url_base+"/"+id);
		$('#form-delete .usernameToDelete').text(username);
		$('#form-delete .nameToDelete').text(name);
		$('#form-delete input[name="id_toDelete"]').val(id);
	});
}

function confirmDown(){
	$(document).on('click','.confirm-down',function(){
		var id = $(this).parent().parent().data('id');
		var username = $(this).parent().parent().data('username');
		var name = $(this).parent().parent().data('name');
		var url_base = $('#form-down input[name="url_base"]').val()
		$('#form-down').attr('action', url_base+"/"+id);
		$('#form-down .usernameToDown').text(username);
		$('#form-down .nameToDown').text(name);
		$('#form-down input[name="id_toDown"]').val(id);
	});
}

function confirmUp(){
	$(document).on('click','.confirm-up',function(){
		var id = $(this).parent().parent().data('id');
		var username = $(this).parent().parent().data('username');
		var name = $(this).parent().parent().data('name');
		var url_base = $('#form-up input[name="url_base"]').val()
		$('#form-up').attr('action', url_base+"/"+id);
		$('#form-up .usernameToUp').text(username);
		$('#form-up .nameToUp').text(name);
		$('#form-up input[name="id_toUp"]').val(id);
	});
}

function confirmRoleDelete(){
	$(document).on('click','.confirm-role-delete',function(){
		var id = $(this).parent().parent().data('id');
		var name = $(this).parent().parent().data('name');
		var url_base = $('#form-delete input[name="url_base"]').val()
		$('#form-delete').attr('action', url_base+"/"+id);
		$('#form-delete .nameToDelete').text(name);
		$('#form-delete input[name="id_toDelete"]').val(id);
	});
}