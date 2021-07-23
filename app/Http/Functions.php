<?php
function getRoleUserArraykey($mode, $id){
	$roles = ['0' => 'Usuario Normal',
			  '1' => 'Administrador'];
	if (!is_null($mode)):
		return $roles;
	else:
		return $roles[$id];
	endif;
}
function getUserStatusArrayKey($mode, $id){
	$status =['0' => 'Activo',
			  '100'=>'Suspendido'
		];
	if (!is_null($mode)):
		return $status;
	else:
		return $status[$id];
	endif;
	return $status[$id];
}
function getFormulariosArray(){
	$a = [
		'1' => 'FORMULARIO DE BOMBEROS',
		'2' => 'FORMULARIO DE AUXILIOS',
		'3' => 'SERVICIOS EXTRAORDINARIOS'
	];
	return $a;
}

function getMesArray(){
	$a = [
		'1' => 'ENERO',
		'2' => 'FEBRERO',
		'3' => 'MARZO',
		'4' => 'ABRIL',
		'5' => 'MAYO',
		'6' => 'JUNIO',
		'7' => 'JULIO',
		'8' => 'AGOSTO',
		'9' => 'SEPTIEMBRE',
		'10' => 'OCTUBRE',
		'11' => 'NOVIEMBRE',
		'12' => 'DICIEMBRE',
	];
	return $a;
}
function getMesArrayKey($id){
	$a = [
		'1' => 'ENERO',
		'2' => 'FEBRERO',
		'3' => 'MARZO',
		'4' => 'ABRIL',
		'5' => 'MAYO',
		'6' => 'JUNIO',
		'7' => 'JULIO',
		'8' => 'AGOSTO',
		'9' => 'SEPTIEMBRE',
		'10' => 'OCTUBRE',
		'11' => 'NOVIEMBRE',
		'12' => 'DICIEMBRE',
	];
	return $a[$id];
}
function getDepartamentoArray(){
	$a = [
		'1' => 'ORURO',
		'2' => 'COCHABAMBA',
		'3' => 'POTOSI',
		'4' => 'TARIJA',
		'5' => 'CHUQUISACA',
		'6' => 'SANTA CRUZ',
		'7' => 'BENI',
		'8' => 'LA PAZ',
		'9' => 'PANDO'
	];
	return $a;
}
function getDepartamentoArrayKey($id){
	$a = [
		'1' => 'ORURO',
		'2' => 'COCHABAMBA',
		'3' => 'POTOSI',
		'4' => 'TARIJA',
		'5' => 'CHUQUISACA',
		'6' => 'SANTA CRUZ',
		'7' => 'BENI',
		'8' => 'LA PAZ',
		'9' => 'PANDO'
	];
	return $a[$id];
}	
function getGeneroArray(){
	$a = ['1' => 'VARÓN','2' => 'MUJER'];
	return $a;
}
function getGeneroArrayKey($id){
	$a = ['1' => 'VARÓN','2' => 'MUJER'];
	return $a[$id];
}
function getTemperanciaArray(){
	$a = ['0' => 'SOBRIO',
		'1' => 'EBRIO',
		'2'=> 'EFECTOS DE DROGAS'];
	return $a; 
}
function getTemperanciaArrayKey($id){
	$a = ['0' => 'SOBRIO',
		'1' => 'EBRIO',
		'2'=> 'EFECTOS DE DROGAS'];
	return $a[$id]; 
}

function getProvinciaArray(){
	$b = [
		'1' => 'ABELITURRALDE','2' => 'ABUNA','3' => 'ALONSO DE IBAÑEZ','4' => 'ANDRES IBAÑEZ','5' => 'ANGEL SANDOVAL','6' => 'ANICETO ARCE','7' => 'ANTONIO QUIJARRO','8' => 'ARANI','9' => 'AROMA','10' => 'ATAHUALLPA','11' => 'AVILES','12' => 'AYOPAYA','13' => 'AZURDUY','14' => 'BAUTISTA SAAVEDRA','15' => 'BELISARIO BOETO','16' => 'BERNARDINO BILBAO RIOJA','17' => 'BOLIVAR','18' => 'BURNET O´CONNOR','19' => 'CAMACHO','20' => 'CAMPERO','21' => 'CAPINOTA','22' => 'CARANAVI','23' => 'CARANGAS','24' => 'CARRASCO','25' => 'CERCADO','26' => 'CHAPARE','27' => 'CHARCAS','28' => 'CHAYANTA','29' => 'CHIQUITOS','30' => 'CORDILLERA','31' => 'CORNELIO SAAVEDRA','32' => 'DANIEL CAMPOS','33' => 'EDUARDO AVAROA','34' => 'ENRIQUE BALDIVIESO','35' => 'ESTEBAN ARCE','36' => 'FEDERICO ROMAN','37' => 'FLORIDA','38' => 'FRANZ TAMAYO','39' => 'GERMAN BUSCH','40' => 'GERMAN JORDAN','41' => 'GRAN CHACO','42' => 'GUALBERTO VILLARROEL','43' => 'GUARAYOS','44' => 'HERNANDO SILES','45' => 'HUMAITA','46' => 'ICHILO','47' => 'INGAVI','48' => 'INQUISIVI','49' => 'ITENEZ','50' => 'JOSE BALLIVIAN','51' => 'JOSE MANUEL PANDO','52' => 'JOSE MARIA LINARES','53' => 'LADISLAO CABRERA','54' => 'LARECAJA','55' => 'LITORAL DE ATACAMA','56' => 'LOAYZA','57' => 'LOMA ALTA','58' => 'LOS ANDES','59' => 'LUIS CALVO','60' => 'MADRE DE DIOS','61' => 'MAMORE','62' => 'MANCO KAPAC','63' => 'MANUEL MARIA CABALLO','64' => 'MANURIPI','65' => 'MARBAN','66' => 'MENDEZ','67' => 'MIZQUE','68' => 'MODESTO OMISTE','69' => 'MOXOS','70' => 'MUÑECAS','71' => 'MURILLO','72' => 'NICOLAS SUAREZ','73' => 'NOR CARANGAS','74' => 'NOR CHICHAS','75' => 'NOR CINTI','76' => 'NOR LIPEZ','77' => 'NOR YUNGAS','78' => 'ÑUFLO DE CHAVEZ','79' => 'OBISPO SANTIESTEVAN','80' => 'OMASUYO','81' => 'OROPEZA','82' => 'ORURO','83' => 'PACAJES','84' => 'PANTALEON DALENCE','85' => 'POOPO','86' => 'PUERTO DE MEJILLONES','87' => 'PUNATA','88' => 'QUILLACOLLO','89' => 'RAFAEL BUSTILLOS','90' => 'SAJAMA','91' => 'SAN PEDRO DE TOTORA','92' => 'SARAH','93' => 'SEBASTIAN PAGADOR','94' => 'SUD CARANGAS','95' => 'SUD CINTI','96' => 'SUD YUNGAS','97' => 'SUD CHICHAS','98' => 'SUD LIPEZ','99' => 'TAPACARI','100' => 'TIRAQUE','101' => 'TOMAS BARRON','102' => 'TOMAS FRIAS','103' => 'TOMINA','104' => 'VACA DIEZ','105' => 'VALLEGRANDE','106' => 'VELASCO','107' => 'WARNES','108' => 'YACUMA','109' => '','110' => 'YAMPARAEZ','111' => 'ZUDAÑEZ',

	];
	return $b;
}
function getProvinciaArrayKey($id){
	$a = [
		'1' => 'ABELITURRALDE','2' => 'ABUNA','3' => 'ALONSO DE IBAÑEZ','4' => 'ANDRES IBAÑEZ','5' => 'ANGEL SANDOVAL','6' => 'ANICETO ARCE','7' => 'ANTONIO QUIJARRO','8' => 'ARANI','9' => 'AROMA','10' => 'ATAHUALLPA','11' => 'AVILES','12' => 'AYOPAYA','13' => 'AZURDUY','14' => 'BAUTISTA SAAVEDRA','15' => 'BELISARIO BOETO','16' => 'BERNARDINO BILBAO RIOJA','17' => 'BOLIVAR','18' => 'BURNET O´CONNOR','19' => 'CAMACHO','20' => 'CAMPERO','21' => 'CAPINOTA','22' => 'CARANAVI','23' => 'CARANGAS','24' => 'CARRASCO','25' => 'CERCADO','26' => 'CHAPARE','27' => 'CHARCAS','28' => 'CHAYANTA','29' => 'CHIQUITOS','30' => 'CORDILLERA','31' => 'CORNELIO SAAVEDRA','32' => 'DANIEL CAMPOS','33' => 'EDUARDO AVAROA','34' => 'ENRIQUE BALDIVIESO','35' => 'ESTEBAN ARCE','36' => 'FEDERICO ROMAN','37' => 'FLORIDA','38' => 'FRANZ TAMAYO','39' => 'GERMAN BUSCH','40' => 'GERMAN JORDAN','41' => 'GRAN CHACO','42' => 'GUALBERTO VILLARROEL','43' => 'GUARAYOS','44' => 'HERNANDO SILES','45' => 'HUMAITA','46' => 'ICHILO','47' => 'INGAVI','48' => 'INQUISIVI','49' => 'ITENEZ','50' => 'JOSE BALLIVIAN','51' => 'JOSE MANUEL PANDO','52' => 'JOSE MARIA LINARES','53' => 'LADISLAO CABRERA','54' => 'LARECAJA','55' => 'LITORAL DE ATACAMA','56' => 'LOAYZA','57' => 'LOMA ALTA','58' => 'LOS ANDES','59' => 'LUIS CALVO','60' => 'MADRE DE DIOS','61' => 'MAMORE','62' => 'MANCO KAPAC','63' => 'MANUEL MARIA CABALLO','64' => 'MANURIPI','65' => 'MARBAN','66' => 'MENDEZ','67' => 'MIZQUE','68' => 'MODESTO OMISTE','69' => 'MOXOS','70' => 'MUÑECAS','71' => 'MURILLO','72' => 'NICOLAS SUAREZ','73' => 'NOR CARANGAS','74' => 'NOR CHICHAS','75' => 'NOR CINTI','76' => 'NOR LIPEZ','77' => 'NOR YUNGAS','78' => 'ÑUFLO DE CHAVEZ','79' => 'OBISPO SANTIESTEVAN','80' => 'OMASUYO','81' => 'OROPEZA','82' => 'ORURO','83' => 'PACAJES','84' => 'PANTALEON DALENCE','85' => 'POOPO','86' => 'PUERTO DE MEJILLONES','87' => 'PUNATA','88' => 'QUILLACOLLO','89' => 'RAFAEL BUSTILLOS','90' => 'SAJAMA','91' => 'SAN PEDRO DE TOTORA','92' => 'SARAH','93' => 'SEBASTIAN PAGADOR','94' => 'SUD CARANGAS','95' => 'SUD CINTI','96' => 'SUD YUNGAS','97' => 'SUD CHICHAS','98' => 'SUD LIPEZ','99' => 'TAPACARI','100' => 'TIRAQUE','101' => 'TOMAS BARRON','102' => 'TOMAS FRIAS','103' => 'TOMINA','104' => 'VACA DIEZ','105' => 'VALLEGRANDE','106' => 'VELASCO','107' => 'WARNES','108' => 'YACUMA','109' => '','110' => 'YAMPARAEZ','111' => 'ZUDAÑEZ',

	];
	return $a[$id];
}
function getAuxiliosArray(){
	$c = [
		'1' => 'INCENDIO ESTRUCTURAL A) ELÉCTRICO',
		'2' => 'INCENDIO ESTRUCTURAL B) FUGA DE GAS NATURAL',
		'3' => 'INCENDIO ESTRUCTURAL C) FUGA DE G.L.P.',
		'4' => 'INCENDIO ESTRUCTURAL D) FORTUITO O ACCIDENTAL',
		'5' => 'INCENDIO EN SURTIDORES',
		'6' => 'INCENDIO VEHICULAR POR LÍQUIDO INFLAMABLE',
		'7' => 'INCENDIO VEHICULAR POR G.N.V.',
		'8' => 'INCENDIO VEHICULAR OTROS',
		'9' => 'INCENDIO FORESTAL',
		'10' => 'FUGA DE GAS NATURAL',
		'11' => 'FUGA DE G.L.P. (GARRAFA)',
		'12' => 'DERRAME DE MATERIAL PELIGROSO MAT. PEL.',
		'13' => 'MUERTE POR DESCARGAS ELÉCTRICA',
		'14' => 'INUNDACIONES',
		'15' => 'DERRUMBES',
		'16' => 'RESCATE DE PERSONAS',
		'17' => 'RESCATE DE BIENES',
		'18' => 'RESCATE DE CADÁVERES',
		'19' => 'RESCATE DE ANIMALES',
		'20' => 'REDUCCIÓN DE ANIMALES PELIGROSOS',
		'21' => 'CASO DE ABEJAS',
		'22' => 'INTERVENCIÓN EN SUCESOS NO COMUNES',
		'23' => 'AMENAZA DE BOMBA (FALSAS ALARMAS)',
		'24' => 'AMENAZA DE ARTEFACTOS EXPLOSIVOS',
		'25' => 'DESACTIVACIÓN DE ARTEFACTOS EXPLOSIVOS',
		'26' => 'ARTEFACTOS EXPLOSIVOS SIMULADOS',
		'27' => 'ARTEFACTOS EXPLOSIVOS DETONADOS',
		'28' => 'INVESTIGACIÓN POST. EXPLOSIONES',
		'29' => 'ARTEFACTOS EXPLOSIVOS DESBARATADOS',
		'30' => 'TRABAJOS ByL',
		'31' => 'CASOS REGISTRADOS PERO NO INTERVENIDOS',
		'32' => 'SERVICIOS VARIOS'
		

	];
	return $c;
}
function getAuxiliosArrayKey($id){
	$c = [
		'1' => 'INCENDIO ESTRUCTURAL A) ELÉCTRICO',
		'2' => 'INCENDIO ESTRUCTURAL B) FUGA DE GAS NATURAL',
		'3' => 'INCENDIO ESTRUCTURAL C) FUGA DE G.L.P.',
		'4' => 'INCENDIO ESTRUCTURAL D) FORTUITO O ACCIDENTAL',
		'5' => 'INCENDIO EN SURTIDORES',
		'6' => 'INCENDIO VEHICULAR POR LÍQUIDO INFLAMABLE',
		'7' => 'INCENDIO VEHICULAR POR G.N.V.',
		'8' => 'INCENDIO VEHICULAR OTROS',
		'9' => 'INCENDIO FORESTAL',
		'10' => 'FUGA DE GAS NATURAL',
		'11' => 'FUGA DE G.L.P. (GARRAFA)',
		'12' => 'DERRAME DE MATERIAL PELIGROSO MAT. PEL.',
		'13' => 'MUERTE POR DESCARGAS ELÉCTRICA',
		'14' => 'INUNDACIONES',
		'15' => 'DERRUMBES',
		'16' => 'RESCATE DE PERSONAS',
		'17' => 'RESCATE DE BIENES',
		'18' => 'RESCATE DE CADÁVERES',
		'19' => 'RESCATE DE ANIMALES',
		'20' => 'REDUCCIÓN DE ANIMALES PELIGROSOS',
		'21' => 'CASO DE ABEJAS',
		'22' => 'INTERVENCIÓN EN SUCESOS NO COMUNES',
		'23' => 'AMENAZA DE BOMBA (FALSAS ALARMAS)',
		'24' => 'AMENAZA DE ARTEFACTOS EXPLOSIVOS',
		'25' => 'DESACTIVACION DE ARTEFACTOS EXPLOSIVOS',
		'26' => 'ARTEFACTOS EXPLOSIVOS SIMULADOS',
		'27' => 'ARTEFACTOS EXPLOSIVOS DETONADOS',
		'28' => 'INVESTIGACIÓN POST. EXPLOSIONES',
		'29' => 'ARTEFACTOS EXPLOSIVOS DESBARATADOS',
		'30' => 'TRABAJOS ByL',
		'31' => 'CASOS REGISTRADOS PERO NO INTERVENIDOS',
		'32' => 'SERVICIOS VARIOS'
		

	];
	return $c[$id];
}
function getOcurridosArray(){
	$d = [
		'1' => 'DOMICILIO PARTICULAR',
		'2' => 'INSTITUCIONES PUBLICAS Y PRIVADAS',
		'3' => 'LOCAL DE EXPENDIDO DE BEBIDAS',
		'4' => 'CENTRO COMERCIAL',
		'5' => 'CALLES Y AVENIDAS',
		'6' => 'CENTROS EDUCATIVOS',
		'7' => 'PLAZAS Y PARQUES',
		'8' => 'BOSQUES',
		'9' => 'VEHICULOS',
		'10' => 'OTROS'
	];
	return $d;
}
function getOcurridosArrayKey($id){
	$d = [
		'1' => 'DOMICILIO PARTICULAR',
		'2' => 'INSTITUCIONES PUBLICAS Y PRIVADAS',
		'3' => 'LOCAL DE EXPENDIDO DE BEBIDAS',
		'4' => 'CENTRO COMERCIAL',
		'5' => 'CALLES Y AVENIDAS',
		'6' => 'CENTROS EDUCATIVOS',
		'7' => 'PLAZAS Y PARQUES',
		'8' => 'BOSQUES',
		'9' => 'VEHICULOS',
		'10' => 'OTROS'
	];
	return $d[$id];
}
function getRemitidoArray(){
	$d = [
		'1' => 'CLINICAS',
		'2' => 'HOSPITALES',
		'3' => 'MATERNIDAD',
		'4' => 'POSTA DE SALUD',
		'5' => 'CENTRO DE SALUD',
		'6' => 'ENFERMERIA',
		'7' => 'MORGUE'
	];
	return $d;
}
function getRemitidoArrayKey($id){
	$d = [
		'1' => 'CLINICAS',
		'2' => 'HOSPITALES',
		'3' => 'MATERNIDAD',
		'4' => 'POSTA DE SALUD',
		'5' => 'CENTRO DE SALUD',
		'6' => 'ENFERMERIA',
		'7' => 'MORGUE'
	];
	return $d[$id];
}
function getEpiArray(){
	$d = [
		'1' => 'FELCC',
		'2' => 'FELCV',
		'3' => 'FELCN',
		'4' => 'TRANSITO',
		'5' => 'DIPROVE',
		'6' => 'UNID. DE CONCILIACION CIUDADANA',
		'7' => 'MINISTERIO PUBLICO'
	];
	return $d;
}
function getEpiArrayKey($id){
	$d = [
		'1' => 'FELCC',
		'2' => 'FELCV',
		'3' => 'FELCN',
		'4' => 'TRANSITO',
		'5' => 'DIPROVE',
		'6' => 'UNID. DE CONCILIACION CIUDADANA',
		'7' => 'MINISTERIO PUBLICO'
	];
	return $d[$id];
}
function getAuxilios(){
	$e =[
	'1' => 'AUXILIO A HERIDOS Y LESIONADOS POR AGRESIÓN',
	'2' => 'AUXILIO A HERIDOS Y LESIONADOS EN ACCIDENTES DE TRANSITO',
	'3' => 'RESCATE DE CADAVER EN ACCIDENTES DE TRANSITO',
	'4' => 'AUXILIO A HERIDOS Y LESIONADOS EN ACCIDENTES VARIOS',
	'5' => 'AUXILIO A HERIDOS POR ARMA DE FUEGO',
	'6' => 'AUXILIO A HERIDOS POR MORDEDURAS DE CAN',
	'7' => 'AUXILIO A PERSONAS ENFERMAS (VARIOS)',
	'8' => 'AUXILIO A PERSONAS DESMAYADAS',
	'9' => 'CASOS DE MATERNIDAD',
	'10' => 'DÉBILES MENTALES',
	'11' => 'AUXILIO A LACTANTES',
	'12' => 'OBJETOS RECUPERADOS',
	'13' => 'AUXILIO A PERSONAS EXTRAVIADAS',
	'14' => 'AUXILIO A HERIDOS POR INTOXICACIÓN (ALCOHOLICA Y/O ÓRGANOS FOSF.)',
	'15' => 'FALSAS LLAMADAS Y/O VERIFICADAS',
	'16' => 'CASOS REGISTRADOS PERO NO INTERVENIDOS',
	'17' => 'AUXILIO EN DISTURBIOS CIVILES',
	];
	return $e;
}
function getAuxiliosKey($id){
	$e =[
	'1' => 'AUXILIO A HERIDOS Y LESIONADOS POR AGRESIÓN',
	'2' => 'AUXILIO A HERIDOS Y LESIONADOS EN ACCIDENTES DE TRANSITO',
	'3' => 'RESCATE DE CADAVER EN ACCIDENTES DE TRANSITO',
	'4' => 'AUXILIO A HERIDOS Y LESIONADOS EN ACCIDENTES VARIOS',
	'5' => 'AUXILIO A HERIDOS POR ARMA DE FUEGO',
	'6' => 'AUXILIO A HERIDOS POR MORDEDURAS DE CAN',
	'7' => 'AUXILIO A PERSONAS ENFERMAS (VARIOS)',
	'8' => 'AUXILIO A PERSONAS DESMAYADAS',
	'9' => 'CASOS DE MATERNIDAD',
	'10' => 'DÉBILES MENTALES',
	'11' => 'AUXILIO A LACTANTES',
	'12' => 'OBJETOS RECUPERADOS',
	'13' => 'AUXILIO A PERSONAS EXTRAVIADAS',
	'14' => 'AUXILIO A HERIDOS POR INTOXICACIÓN (ALCOHOLICA Y/O ÓRGANOS FOSF.)',
	'15' => 'FALSAS LLAMADAS Y/O VERIFICADAS',
	'16' => 'CASOS REGISTRADOS PERO NO INTERVENIDOS',
	'17' => 'AUXILIO EN DISTURBIOS CIVILES',
	];
	return $e[$id];
}
function getCapacidad(){
	$d = [
		'0' => 'NO ESPECIFICADA',
		'1' => 'NEUROMOTORA',
		'2' => 'VISUAL',
		'3' => 'AUDITIVA',
		'4' => 'LENGUAJE',
		'5' => 'INTELECTUAL',
		'6' => 'OTRA'
	];
	return $d;
}
function getCapacidadKey($id){
	$d = [
		'0' => 'NO ESPECIFICADA',
		'1' => 'NEUROMOTORA',
		'2' => 'VISUAL',
		'3' => 'AUDITIVA',
		'4' => 'LENGUAJE',
		'5' => 'INTELECTUAL',
		'6' => 'OTRA'
	];
	return $d[$id];
}
function getRemitido(){
	$d = [
		'1' => 'CLINICAS',
		'2' => 'HOSPITALES',
		'3' => 'DOMICILIO',
		'4' => 'MORGUE',
		'5' => 'QUEMADOS',
		'6' => 'MATERNIDAD',
		'7' => 'DEFENSORIA DE LA NIÑEZ',
		'8' => 'ALBERGUES'
	];
	return $d;
}
function getRemitidoKey($id){
	$d = [
		'1' => 'CLINICAS',
		'2' => 'HOSPITALES',
		'3' => 'DOMICILIO',
		'4' => 'MORGUE',
		'5' => 'QUEMADOS',
		'6' => 'MATERNIDAD',
		'7' => 'DEFENSORIA DE LA NIÑEZ',
		'8' => 'ALBERGUES'
	];
	return $d[$id];
}

function getTipo(){
	$d = [
		'1' => 'ARTÍSTICOS Y FOLKLÓRICOS',
		'2' => 'CALAMIDADES, SINIESTROS',
		'3' => 'CÍVICOS',
		'4' => 'DEPORTIVOS',
		'5' => 'DESASTRES NATURALES',
		'6' => 'EMERGENCIAS',
		'7' => 'ENTREGA DE CITACION',
		'8' => 'MANDAMIENTO DE APREHENSION',
		'9' => 'PLAN  OPERATIVO',
		'10' => 'PLAN SEGURIDAD BANCARIA, VALORES Y AREAS DE COMERCIO',
		'11' => 'PLAN CONTRAVANDO DE CARBURANTES',
		'12' => 'PLAN RECUPERACION DE ESPACION PUBLICOS',
		'13' => 'PLAN RESPUESTA INMEDIATA DE LA FUERZA POLICIAL',
		'14' => 'PLAN ROBO DE VEHICULOS',
		'15' => 'PLAN SEGURIDAD CONTRA EL CONSUMO DE ALCOHOL Y DROGAS',
		'16' => 'PLAN SEGURIDAD ESTUDIANTIL',
		'17' => 'PLAN SEGURIDAD VIAL',
		'18' => 'PLAN TUKUY RIKUY',
		'19' => 'PLAN TURISTA SEGURO',
		'20' => 'PLAN UNIDAD MÓVIL DE VIDEO VIGILANCIA - UMOVI',
		'21' => 'RELIGIOSOS',
		'22' => 'SEG. FÍSICA Y PROTECCIÓN A DIGNATARIOS',
		'23' => 'SINIESTROS',
		'24' => 'VARIOS'

	];
	return $d;
}
function getTipoKey($id){
	$d = [
		'1' => 'ARTÍSTICOS Y FOLKLÓRICOS',
		'2' => 'CALAMIDADES, SINIESTROS',
		'3' => 'CÍVICOS',
		'4' => 'DEPORTIVOS',
		'5' => 'DESASTRES NATURALES',
		'6' => 'EMERGENCIAS',
		'7' => 'ENTREGA DE CITACION',
		'8' => 'MANDAMIENTO DE APREHENSION',
		'9' => 'PLAN  OPERATIVO',
		'10' => 'PLAN SEGURIDAD BANCARIA, VALORES Y AREAS DE COMERCIO',
		'11' => 'PLAN CONTRAVANDO DE CARBURANTES',
		'12' => 'PLAN RECUPERACION DE ESPACION PUBLICOS',
		'13' => 'PLAN RESPUESTA INMEDIATA DE LA FUERZA POLICIAL',
		'14' => 'PLAN ROBO DE VEHICULOS',
		'15' => 'PLAN SEGURIDAD CONTRA EL CONSUMO DE ALCOHOL Y DROGAS',
		'16' => 'PLAN SEGURIDAD ESTUDIANTIL',
		'17' => 'PLAN SEGURIDAD VIAL',
		'18' => 'PLAN TUKUY RIKUY',
		'19' => 'PLAN TURISTA SEGURO',
		'20' => 'PLAN UNIDAD MOVIL DE VIDEO VIGILANCIA - UMOVI',
		'21' => 'RELIGIOSOS',
		'22' => 'SEG. FÍSICA Y PROTECCIÓN A DIGNATARIOS',
		'23' => 'SINIESTROS',
		'25' => 'VARIOS'

	];
	return $d[$id];
}

function getRemitidoExtra(){
	$d = [
		'0' => 'NO REFIERE',
		'1' => 'FELCC',
		'2' => 'FELCV',
		'3' => 'FELCN',
		'4' => 'TRANSITO',
		'5' => 'DIPROVE',
		'6' => 'UNID. DE CONCILIACION CIUDADANA',
		'7' => 'MINISTERIO PUBLICO',
	];
	return $d;
}
function getRemitidoExtraKey($id){
	$d = [
		'0' => 'NO REFIERE',
		'1' => 'FELCC',
		'2' => 'FELCV',
		'3' => 'FELCN',
		'4' => 'TRANSITO',
		'5' => 'DIPROVE',
		'6' => 'UNID. DE CONCILIACION CIUDADANA',
		'7' => 'MINISTERIO PUBLICO',
	];
	return $d[$id];
}
function getEstadoActivo(){
	$d = [
		'1' => 'BUENO',
		'2' => 'REGULAR',
		'3' => 'MALO',
		'4' => 'EN DESUSO',

	];
	return $d;
}
function getEstadoActivoKey($id){
	$d = [
		'1' => 'BUENO',
		'2' => 'REGULAR',
		'3' => 'MALO',
		'4' => 'EN DESUSO',

	];
	return $d[$id];
}
function getEstadoVehiculo(){
	$d = [
		'1' => 'NUEVO',
		'2' => 'REGULAR',
		'3' => 'MALO',
		'4' => 'MALO EN DESUSO'

	];
	return $d;
}
function getEstadoVehiculokey($id){
	$d = [
		'1' => 'NUEVO',
		'2' => 'REGULAR',
		'3' => 'MALO',
		'4' => 'MALO EN DESUSO'

	];
	return $d[$id];
}
function kvfj($json, $key){
	if($json == null):
		return null;
	else:
		$json = $json;
		$json = json_decode($json, true);
		if(array_key_exists($key, $json)):
			return $json[$key];
		else:
			return null;
		endif;
	endif;
}
function user_permisos(){
	$p = [
		'dashboard' => [
			'icon' => '<i class="fas fa-home"></i>',
			'title' => 'Módulo de Inicio:',
			'keys' => 	[
						'dashboard' => 'Puede ver la pantalla de Inicio.',
						'dashboard_ver_estadisticas' => 'Puede ver las estadísticas rápidas.',
		 				]
		],
		'usuarios' => [
			'icon' => '<i class="fas fa-user-friends"></i>',
			'title' => 'Módulo de Usuarios:',
			'keys' => 	[
						'usuarios' =>'Puede administrar el Módulo Usuarios.',
						'usuarios_edit' =>'Puede editar la información de Usuarios.',
						'usuarios_banear' =>'Puede banear Usuarios.',
						'usuarios_permiso' =>'Puede dar permisos a los Usuarios.',
						'usuarios_eliminar' =>'Puede eliminar Usuarios.'
		 				]
		],
		'personal' => [
			'icon' => '<i class="fas fa-user-tie"></i>',
			'title' => 'Módulo de Personal:',
			'keys' => 	[
						'personal' =>'Puede administrar el Módulo Personal.',
						'personal_add' =>'Puede añadir un nuevo Personal.',
						'personal_edit' =>'Puede editar Información del Personal.',
						'personal_ver' =>'Puede ver información del Personal.',
						'personal_eliminar' =>'Puede eliminar de la lista de Personal.',
						'personal_buscar' =>'Puede buscar en la lista del Personal.'
		 				]
		],
		'activos' => [
			'icon' => '<i class="fas fa-boxes"></i>',
			'title' => 'Módulo de Activos:',
			'keys' => 	[
						'activos' =>'Puede administrar el Módulo Activos.',
						'activos_add' =>'Puede añadir nuevos Activos.',
						'activos_edit' =>'Puede editar la información de los Activos.',
						'activos_ver' =>'Puede ver la información de los Activos.',
						'activos_eliminar' =>'Puede eliminar de la lista de los Activos.',
						'activos_buscar' =>'Puede buscar en la lista de Activos.'
		 				]
		],
		'vehiculos' => [
			'icon' => '<i class="fas fa-truck-pickup"></i>',
			'title' => 'Módulo de Parqueo Automotor:',
			'keys' => 	[
						'vehiculos' =>'Puede administrar el Módulo P. Automotor.',
						'vehiculos_add' =>'Puede añadir nuevos Vehículos.',
						'vehiculos_edit' =>'Puede editar la información de los Vehículos.',
						'vehiculos_ver' =>'Puede ver la información de los Vehículos.',
						'vehiculos_eliminar' =>'Puede eliminar de la lista de los Vehículos.',
						'vehiculos_buscar' =>'Puede buscar en la lista de Vehículos.'
		 				]
		],
		'casos' => [
			'icon' => '<i class="fas fa-exclamation-triangle"></i>',
			'title' => 'Módulo de Casos:',
			'keys' => 	[
						'casos' =>'Puede administrar los formularios de casos.',
						'añadir_caso' =>'Puede añadir casos a los formularios.',
						'editar_caso' =>'Puede editar casos de los formularios.',
						'eliminar_caso' =>'Puede eliminar casos de los formulario.',
						'ver_caso' =>'Puede ver los detalles de los casos.',
		 				]
		],
		'config' => [
			'icon' => '<i class="fas fa-cogs"></i>',
			'title' => 'Módulo de Configuraciones:',
			'keys' => 	[
						'config' =>'Puede administrar el Módulo de Configuraciones',
		 				]
		],




	];
	return $p;

}
function getTipoPersonalkey(){
	$d = [
		'1' => 'CURSO',
		'2' => 'SEMINARIO',
		'3' => 'CONGRESO',
		'4' => 'OTROS',
	];
	return $d;
}
function getTipoPersonalkeyArray($id){
	$d = [
		'1' => 'CURSO',
		'2' => 'SEMINARIO',
		'3' => 'CONGRESO',
		'4' => 'OTROS',
	];
	return $d[$id];
}
