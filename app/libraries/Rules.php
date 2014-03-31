<?php

class Rules
{
	// TODO: Group the common messages rule (DRY)
	// 
	// 
	static $customErrorMessages = array(
		'username.required'     => 'El nombre de usuario es requerido.',
		'username.regex'        => 'Nombre de usuario incorrecto. Debe ser mínimo de 4 caracteres, máximo de 15 caracteres, sólo acepta caracteres alfanúmericos y los símbolos _ y -.',
		'username.unique'       => 'El nombre de usuario ingresado ya existe. Intente con otro distinto.',
		'password.required'     => 'Contraseña requerida.',
		'password.regex'        => 'Contraseña incorrecta. De ser mínimo de 6 caracteres, máximo 15 caracteres, sólo acepta caracteres alfanúmericos y los símbolos @, *, # y _.',
		'passwordv.required'    => 'Confirmación de contraseña requerida.',
		'passwordv.same'        => 'Confirmación de contraseña no coincide con la contraseña ingresada.',
		'firstname.required'    => 'Nombre es requerido.',
		'firstname.min'         => 'Nombre demasiado corto. Mínimo de 3 caracteres.',
		'firstname.max'         => 'Nombre demasiado largo. Máximo de 50 caracteres.',
		'firstname.regex'       => 'Formato de nombre incorrecto.',
		'lastname.required'     => 'Apellido es requerido.',
		'lastname.min'          => 'Apellido demasiado corto. Mínimo de 3 caracteres.',
		'lastname.max'          => 'Apellido demasiado largo. Máximo de 50 caracteres.',
		'lastname.regex'        => 'Formato de apellido incorrecto.',
		'email.required'        => 'Correo electrónico es requerido.',
		'email.min'             => 'Correo electrónico demasiado corto. Mínimo de 6 caracteres.',
		'email.max'             => 'Correo electrónico demasiado largo. Máximo de 50 caracteres.',
		'email.unique'          => 'El correo electrónico ingresado ya existe en el sistema.',
		'email.email'           => 'Formato de correo electrónico incorrecto.',
		'phone.min'             => 'Número de teléfono incorrecto.',
		'phone.max'             => 'Número de teléfono incorrecto.',
		'phone.regex'           => 'Número de teléfono incorrecto.',
		'cellphone.min'         => 'Número de móvil incorrecto.',
		'cellphone.max'         => 'Número de móvil incorrecto.',
		'cellphone.regex'       => 'Número de móvil incorrecto.',
		'position.required'     => 'Posición es requerida.',
		'position.max'          => 'Sólo acepta 50 caracteres como máximo.',
		'company_name.required' => 'Nombre de empresa es requerido.',
		'company_name.max'      => 'Sólo acepta 50 caracteres como máximo.',
		'website.required'      => 'Website es requerido.',
		'website.max'           => 'Sólo acepta 100 caracteres como máximo.',
		'website.url'           => 'Formato de website incorrecto.',
		'address.required'      => 'Dirección es requerida.',
		'address.max'           => 'Sólo acepta 150 caracteres como máximo..',
		'description.required'  => 'Descripción de empresa es requerida.',
		'role.required'         => 'Debe elegir un rol.',
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
		'email'     => 'required|min:6|max:50|unique:users,email|email', 
		'phone'     => 'min:6|max:45|regex:/^\+?[0-9-()]+$/', 
		'cellphone' => 'min:6|max:45|regex:/^\+?[0-9-()]+$/', 
		'sex'       => 'required'
	);

	static $createAdminUserRules = array(
		'username'  => 'required|regex:/^[a-z0-9_-]{4,15}$/|unique:users,username', 
		'password'  => 'required|regex:/^([a-zA-Z0-9@*#_]{6,15})$/', 
		'passwordv' => 'required|same:password', 
		'firstname' => 'required|min:3|max:50|regex:/^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.\'-]+$/u', 
		'lastname'  => 'required|min:3|max:50|regex:/^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.\'-]+$/u', 
		'email'     => 'required|min:6|max:50|unique:users,email|email', 
		'sex'       => 'required',
		'role'      => 'required'
	);

	static $createAffiliateRules = array(
		'username'     => 'required|regex:/^[a-z0-9_-]{4,15}$/|unique:users,username', 
		'password'     => 'required|regex:/^([a-zA-Z0-9@*#_]{6,15})$/', 
		'passwordv'    => 'required|same:password', 
		'firstname'    => 'required|min:3|max:50|regex:/^[a-zA-ZàáâäãåąčćęèéêëėįìíîïłńòóôöõøùúûüųūÿýżźñçčšžÀÁÂÄÃÅĄĆČĖĘÈÉÊËÌÍÎÏĮŁŃÒÓÔÖÕØÙÚÛÜŲŪŸÝŻŹÑßÇŒÆČŠŽ∂ð ,.\'-]+$/u', 
		'email'        => 'required|min:6|max:50|unique:users,email|email', 
		'phone'        => 'min:6|max:45|regex:/^\+?[0-9-()]+$/', 
		'cellphone'    => 'min:6|max:45|regex:/^\+?[0-9-()]+$/', 
		'position'     => 'required|max:50',
		'company_name' => 'required|max:50',
		'website'      => 'required|max:100|url',
		'address'      => 'required|max:150',
		'description'  => 'required',
	);
}