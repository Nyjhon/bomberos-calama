<?php

Route::prefix('/admin')->group(function(){
	Route::get('/','Admin\DashboardController@getDashboard')->name('dashboard');
	Route::post('/casos','Admin\DashboardController@getDashboardCasos')->name('dashboard');
	//Modulo de confifuraciones
	Route::get('/config','Admin\ConfigController@getConfig')->name('config');
	Route::post('/config','Admin\ConfigController@postConfig')->name('config');
	Route::post('/config/slider/add','Admin\ConfigController@postSliderAdd')->name('config');
	Route::get('/config/slider/{id}/editar','Admin\ConfigController@getSliderEdit')->name('config');
	Route::post('/config/slider/{id}/editar','Admin\ConfigController@postSliderEdit')->name('config');
	Route::get('/config/slider/{id}/eliminar','Admin\ConfigController@getSliderEliminar')->name('config');


	//Modulo de Usuarios
	Route::get('/usuarios/{status}','Admin\UserController@getUsers')->name('usuarios');
	Route::get('/usuarios/{id}/editar','Admin\UserController@getUsersEdit')->name('usuarios_edit');
	Route::post('/usuarios/{id}/editar','Admin\UserController@postUsersEdit')->name('usuarios_edit');
	Route::get('/usuarios/{id}/banear','Admin\UserController@getUsersBanear')->name('usuarios_banear');
	Route::get('/usuarios/{id}/permiso','Admin\UserController@getUsersPermiso')->name('usuarios_permiso');
	Route::post('/usuarios/{id}/permiso','Admin\UserController@postUsersPermiso')->name('usuarios_permiso');
	Route::get('/usuarios/{id}/eliminar','Admin\UserController@getUsersEliminar')->name('usuarios_eliminar');

	//Modulo de Casos
	//- modulos de Bomberos
	Route::get('/casos/bomberos','Admin\casos\BomberosController@getBomberosHome')->name('casos'); 
	Route::get('/casos/addBomberos','Admin\casos\BomberosController@getBomberosAdd')->name('añadir_caso');
	Route::post('/casos/bomberos','Admin\casos\BomberosController@postBomberosAdd')->name('añadir_caso');
	Route::get('/casos/bomberos/{id}/editar','Admin\casos\BomberosController@getBomberosEdit')->name('editar_caso');
	Route::post('/casos/bomberos/{id}/editar','Admin\casos\BomberosController@postBomberosEdit')->name('editar_caso');
	Route::get('/casos/bomberos/{id}/eliminar','Admin\casos\BomberosController@getBomberosEliminar')->name('eliminar_caso');
	Route::get('/casos/bomberos/{id}/ver','Admin\casos\BomberosController@getBomberosVer')->name('ver_caso');
	Route::post('/casos/bomberos/buscar','Admin\casos\BomberosController@postBomberosBuscar')->name('casos');
	Route::post('/casos/bomberos/exportar_fecha','Admin\casos\BomberosController@postBomberosExportar_fecha')->name('casos');
	Route::post('/casos/bomberos/exportar_mes','Admin\casos\BomberosController@postBomberosExportar_mes')->name('casos');
	Route::post('/casos/bomberos/{id}/word','Admin\casos\BomberosController@getDownloadWORD')->name('casos');
	Route::post('/casos/bomberos/estadistica{id}/word','Admin\casos\BomberosController@getDownloadWORD')->name('casos');

	//- modulos de Auxilios
	Route::get('/casos/auxilios','Admin\casos\AuxiliosController@getAuxiliosHome')->name('casos');
	Route::get('/casos/addAuxilios','Admin\casos\AuxiliosController@getAuxiliosAdd')->name('añadir_caso');
	Route::post('/casos/auxilios','Admin\casos\AuxiliosController@postAuxiliosAdd')->name('añadir_caso');
	Route::get('/casos/auxilios/{id}/editar','Admin\casos\AuxiliosController@getAuxiliosEdit')->name('editar_caso');
	Route::post('/casos/auxilios/{id}/editar','Admin\casos\AuxiliosController@postAuxiliosEdit')->name('editar_caso');
	Route::get('/casos/auxilios/{id}/eliminar','Admin\casos\AuxiliosController@getAuxiliosEliminar')->name('eliminar_caso');
	Route::get('/casos/auxilios/{id}/ver','Admin\casos\AuxiliosController@getAuxiliosVer')->name('ver_caso');
	Route::post('/casos/auxilios/buscar','Admin\casos\AuxiliosController@postAuxiliosBuscar')->name('casos');
	Route::post('/casos/auxilios/{id}/word','Admin\casos\AuxiliosController@getDownloadWORD')->name('casos');
	Route::post('/casos/auxilios/exportar_fecha','Admin\casos\AuxiliosController@postAuxiliosExportar_fecha')->name('casos');
	Route::post('/casos/auxilios/exportar_mes','Admin\casos\AuxiliosController@postAuxiliosExportar_mes')->name('casos');

		//- modulos de Extraordinarios
	Route::get('/casos/extraordinarios','Admin\casos\ExtraordinariosController@getExtraordinariosHome')->name('casos');
	Route::get('/casos/addExtraordinarios','Admin\casos\ExtraordinariosController@getExtraordinariosAdd')->name('añadir_caso');
	Route::post('/casos/extraordinarios','Admin\casos\ExtraordinariosController@postExtraordinariosAdd')->name('añadir_caso');
	Route::get('/casos/extraordinarios/{id}/editar','Admin\casos\ExtraordinariosController@getExtraordinariosEdit')->name('editar_caso');
	Route::post('/casos/extraordinarios/{id}/editar','Admin\casos\ExtraordinariosController@postExtraordinariosEdit')->name('editar_caso');
	Route::get('/casos/extraordinarios/{id}/eliminar','Admin\casos\ExtraordinariosController@getExtraordinariosEliminar')->name('eliminar_caso');
	Route::get('/casos/extraordinarios/{id}/ver','Admin\casos\ExtraordinariosController@getExtraordinariosVer')->name('ver_caso');
	Route::post('/casos/extraordinarios/buscar','Admin\casos\ExtraordinariosController@postExtraordinariosBuscar')->name('casos');
	Route::post('/casos/extraordinarios/exportar_fecha','Admin\casos\ExtraordinariosController@postExtraordinariosExportar_fecha')->name('casos');
	Route::post('/casos/extraordinarios/exportar_mes','Admin\casos\ExtraordinariosController@postExtraordinariosExportar_mes')->name('casos');
	
	//Modulo de Personal
	Route::get('/personal/{genero}','Admin\PersonalController@getPersonal')->name('personal');
	Route::get('/personal/{genero}/add','Admin\PersonalController@getPersonalAdd')->name('personal_add');
	Route::post('/personal/{genero}/add','Admin\PersonalController@postPersonalAdd')->name('personal_add');
	Route::get('/personal/{id}/editar','Admin\PersonalController@getPersonalEdit')->name('personal_edit');
	Route::post('/personal/{id}/editar','Admin\PersonalController@postPersonalEdit')->name('personal_edit');
	Route::get('/personal/{id}/eliminar','Admin\PersonalController@getPersonalEliminar')->name('personal_eliminar');
	Route::get('/personal/{id}/ver','Admin\PersonalController@getPersonalVer')->name('personal_ver');
	Route::post('/personal/buscar','Admin\PersonalController@postPersonalBuscar')->name('personal_buscar');

	Route::post('/personal/{ci}/curso','Admin\PersonalController@postPersonalCursos')->name('personal_ver');
	Route::post('/personal/{ci}/experiencia','Admin\PersonalController@postPersonalExperiencia')->name('personal_ver');
	Route::post('/personal/{ci}/reconocimiento','Admin\PersonalController@postPersonalReconocimiento')->name('personal_ver');
	Route::post('/personal/{ci}/atenuante','Admin\PersonalController@postPersonalAtenuante')->name('personal_ver');
	Route::post('/personal/{ci}/agravante','Admin\PersonalController@postPersonalAgravante')->name('personal_ver');

	Route::post('/personalverC/{ci}/editar/{id}','Admin\PersonalController@postPersonalCursoEdit')->name('personal_ver');
	Route::post('/personalverE/{ci}/editar/{id}','Admin\PersonalController@postPersonalExperienciaEdit')->name('personal_ver');
	Route::post('/personalverR/{ci}/editar/{id}','Admin\PersonalController@postPersonalReconocimientoEdit')->name('personal_ver');
	Route::post('/personalverAT/{ci}/editar/{id}','Admin\PersonalController@postPersonalAtenuanteEdit')->name('personal_ver');
	Route::post('/personalverAG/{ci}/editar/{id}','Admin\PersonalController@postPersonalAgravanteEdit')->name('personal_ver');

	Route::get('/personalverC/{id}/eliminar','Admin\PersonalController@getPersonalCursoEliminar')->name('personal_ver');
	Route::get('/personalverE/{id}/eliminar','Admin\PersonalController@getPersonalExperienciaEliminar')->name('personal_ver');
	Route::get('/personalverR/{id}/eliminar','Admin\PersonalController@getPersonalReconocimientoEliminar')->name('personal_ver');
	Route::get('/personalverAT/{id}/eliminar','Admin\PersonalController@getPersonalAtenuanteEliminar')->name('personal_ver');
	Route::get('/personalverAG/{id}/eliminar','Admin\PersonalController@getPersonalAgravanteEliminar')->name('personal_ver');
	Route::get('/personal/{id}/word','Admin\PersonalController@getDownloadWORD')->name('personal_ver');
	Route::get('/personal/{genero}/excel','Admin\PersonalController@getDownloadEXCEL')->name('personal_ver');



	//Modulo de Activos Fijos
	Route::get('/activos/{estado}','Admin\ActivosController@getActivos')->name('activos');
	Route::get('/activos/{estado}/add','Admin\ActivosController@getActivosAdd')->name('activos_add');
	Route::post('/activos/{estado}/add','Admin\ActivosController@postActivosAdd')->name('activos_add');
	Route::get('/activos/{id}/editar','Admin\ActivosController@getActivosEdit')->name('activos_edit');
	Route::post('/activos/{codigo}/editar/{id}','Admin\ActivosController@postActivosEdit')->name('activos_edit');
	Route::get('/activos/{id}/eliminar','Admin\ActivosController@getActivosEliminar')->name('activos_eliminar');
	Route::get('/activos/{id}/ver','Admin\ActivosController@getActivosVer')->name('activos_ver');
	Route::post('/activos/buscar','Admin\ActivosController@postActivosBuscar')->name('activos_buscar');
	Route::get('/activos/{id}/word','Admin\ActivosController@getDownloadWORD')->name('activos_ver');
	Route::get('/activos/{estado}/excel','Admin\ActivosController@getDownloadEXCEL')->name('activos_ver');


	//Modulos de Vehiculos 
	Route::get('/vehiculos/{estado}','Admin\VehiculosController@getVehiculos')->name('vehiculos');
	Route::get('/vehiculos/{estado}/add','Admin\VehiculosController@getVehiculosAdd')->name('vehiculos_add');
	Route::post('/vehiculos/{estado}/add','Admin\VehiculosController@postVehiculosAdd')->name('vehiculos_add');
	Route::get('/vehiculos/{id}/editar','Admin\VehiculosController@getVehiculosEdit')->name('vehiculos_edit');
	Route::post('/vehiculos/{id}/editar','Admin\VehiculosController@postVehiculosEdit')->name('vehiculos_edit');
	Route::get('/vehiculos/{id}/ver','Admin\VehiculosController@getVehiculosVer')->name('vehiculos_ver');
	Route::post('/vehiculos/buscar','Admin\VehiculosController@postVehiculosBuscar')->name('vehiculos_buscar');
	Route::get('/vehiculos/{id}/eliminar','Admin\VehiculosController@getVehiculosEliminar')->name('vehiculos_eliminar');

	Route::get('/vehiculosverM/{id}/eliminar','Admin\VehiculosController@getVehiculosVerMEliminar')->name('vehiculos_ver');
	Route::get('/vehiculosverD/{id}/eliminar','Admin\VehiculosController@getVehiculosVerDEliminar')->name('vehiculos_ver');
	Route::get('/vehiculosverR/{id}/eliminar','Admin\VehiculosController@getVehiculosVerREliminar')->name('vehiculos_ver');
	Route::get('/vehiculosverO/{id}/eliminar','Admin\VehiculosController@getVehiculosVerOEliminar')->name('vehiculos_ver');

	Route::post('/vehiculosverM/{sigla}/editar/{id}','Admin\VehiculosController@postVehiculosVerMEdit')->name('vehiculos_ver');
	Route::post('/vehiculosverD/{sigla}/editar/{id}','Admin\VehiculosController@postVehiculosVerDEdit')->name('vehiculos_ver');
	Route::post('/vehiculosverR/{sigla}/editar/{id}','Admin\VehiculosController@postVehiculosVerREdit')->name('vehiculos_ver');
	Route::post('/vehiculosverO/{sigla}/editar/{id}','Admin\VehiculosController@postVehiculosVerOEdit')->name('vehiculos_ver');
	
	Route::post('/vehiculos/{sigla}/ver/mantenimiento','Admin\VehiculosController@postVehiculosVerMantenimiento')->name('vehiculos_ver');
	Route::post('/vehiculos/{sigla}/ver/documentos','Admin\VehiculosController@postVehiculosVerDocumentos')->name('vehiculos_ver');
	Route::post('/vehiculos/{sigla}/ver/requerimiento','Admin\VehiculosController@postVehiculosVerRequerimiento')->name('vehiculos_ver');
	Route::post('/vehiculos/{sigla}/ver/otros','Admin\VehiculosController@postVehiculosVerOtros')->name('vehiculos_ver');

	Route::get('/vehiculos/{id}/word/{sigla}','Admin\VehiculosController@getDownloadWORD')->name('vehiculos_ver');
	Route::get('/vehiculos/{estado}/excel','Admin\VehiculosController@getDownloadEXCEL')->name('vehiculos_ver');



});