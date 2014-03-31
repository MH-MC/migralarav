<?php

class Rules
{
	static $customErrorMessages = array(
		'username.required'  => 'El nombre de usuario es requerido.',
		'username.regex'     => 'Nombre de usuario incorrecto. Debe ser mínimo de 4 caracteres, máximo de 15 caracteres, sólo acepta caracteres alfanúmericos y los símbolos _ y -.',
		'username.unique'    => 'El nombre de usuario ingresado ya existe. Intente con otro distinto.',
		'password.required'  => 'Contraseña requerida.',
		'password.regex'     => 'Contraseña incorrecta. De ser mínimo de 6 caracteres, máximo 15 caracteres, sólo acepta caracteres alfanúmericos y los símbolos @, *, # y _.',
		'passwordv.required' => 'Confirmación de contraseña requerida.',
		'passwordv.same'     => 'Confirmación de contraseña no coincide con la contraseña ingresada.',
		'firstname.required' => 'Nombre es requerido.',
		'firstname.min'      => 'Nombre demasiado corto. Mínimo de 3 caracteres.',
		'firstname.max'      => 'Nombre demasiado largo. Máximo de 50 caracteres.',
		'firstname.regex'    => 'Formato de nombre incorrecto.',
		'lastname.required'  => 'Apellido es requerido.',
		'lastname.min'       => 'Apellido demasiado corto. Mínimo de 3 caracteres.',
		'lastname.max'       => 'Apellido demasiado largo. Máximo de 50 caracteres.',
		'lastname.regex'     => 'Formato de apellido incorrecto.',
		'email.required'     => 'Correo electrónico es requerido.',
		'email.min'          => 'Correo electrónico demasiado corto. Mínimo de 6 caracteres.',
		'email.max'          => 'Correo electrónico demasiado largo. Máximo de 50 caracteres.',
		'email.unique'       => 'El correo electrónico ingresado ya existe en el sistema.',
		'email.regex'        => 'Formato de correo electrónico incorrecto.',
		'phone.min'          => 'Número de teléfono incorrecto.',
		'phone.max'          => 'Número de teléfono incorrecto.',
		'phone.regex'        => 'Número de teléfono incorrecto.',
		'cellphone.min'      => 'Número de móvil incorrecto.',
		'cellphone.max'      => 'Número de móvil incorrecto.',
		'cellphone.regex'    => 'Número de móvil incorrecto.',
	);

	static $loginRules = array(
		'username' => 'required', 
		'password' => 'required'
	);

	static $createUserRules = array(
		'username'  => 'required|regex:/^[a-z0-9_-]{4,15}$/|unique:users,username', 
		'password'  => 'required|regex:/^([a-zA-Z0-9@*#_]{6,15})$/', 
		'passwordv' => 'required|same:password', 
		'firstname' => 'required|min:3|max:50|regex:/^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.\'-]+$/u', 
		'lastname'  => 'required|min:3|max:50|regex:/^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.\'-]+$/u', 
		'email'     => 'required|min:6|max:50|unique:users,email|regex:/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/', 
		'phone'     => 'min:6|max:45|regex:/^\+?[0-9-()]+$/', 
		'cellphone' => 'min:6|max:45|regex:/^\+?[0-9-()]+$/', 
		'sex'       => 'required'
	);
}