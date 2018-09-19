<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth/login');
});
/*Admin File*/
//Route::group(['prefix'=>'file'],function(){    
    Route::post('file/upload','AdminFileController@uploadFile');
    Route::post('file/delete','AdminFileController@deleteFile');
//    Route::get('load/{id}','AdminMarkController@loadFile');
//});
Auth::routes();

//Route::get('home/',[=>'HomeController@index']);
//Route::get('', 'HomeController@index');
Route::get('inicio/',['as'=>'Home','uses'=>'HomeController@index']);
Route::get('/home', 'HomeController@index');
Route::get('usuarios/index','AdminUserController@index');

Route::get('documentos/',['as'=>'Documentos','uses'=>'DocumentoController@index']);
Route::get('documentos/enviados',['as'=>'DocumentosEnviados','uses'=>'DocumentoController@enviados']);
Route::get('documentos/recibidos',['as'=>'Documentos_recibidos','uses'=>'DocumentoController@recibidos']);
Route::get('documentos/DocEnviados',['as'=>'Documentos_enviados','uses'=>'DocumentoController@DocEnviados']);

Route::get('documentos/remitidos',['as'=>'Documentos_remitidos','uses'=>'DocumentoController@Remitidos']);
Route::get('documentos/creados',['as'=>'Documentos_creados','uses'=>'DocumentoController@Creados']);

Route::get('inicio1/',['as'=>'crear_1','uses'=>'HomeController@index1']); // crear nuevo
Route::get('documentos/create',['as'=>'CrearDocumento','uses'=>'DocumentoController@create']);


Route::get('create_documento/{id}','DocumentoController@create_documento'); 


Route::post('documentos/agregarDocumento','DocumentoController@AgregarDocumento' );
Route::post('documentos/agregarDocumentoConvocatoria','DocumentoController@AgregarDocumentoConvocatoria' );
Route::put('documentos/corregirDocumento/{id}','DocumentoController@CorregirDocumentos' );
Route::get('documentos/{id}','DocumentoController@GetSubcategoria');
Route::get('documentos/ItemSubcategoria/{id}','DocumentoController@GetItemSubcategoria');
Route::get('documentos/porfirmar/{id}','DocumentoController@PorFirmar');
Route::get('documentos/porcorrecion/{id}','DocumentoController@PorCorrecion');
Route::get('documentos/visto/{id}','DocumentoController@Visto');
Route::get('documentos/firmado/{id}','DocumentoController@Firmado');
Route::get('documentos/EnviarDocumento/{id}','DocumentoController@EnviarDocumento');
Route::get('documentos/corregir/{id}',['as'=>'CorregirDocumento','uses'=>'DocumentoController@CorregirDocumento']);
Route::post('documentos/ModificarDocumento','DocumentoController@ModificarDocumento' );
Route::get('ubicacion/index','UbicacionController@index');
Route::get('ubicacion/show/{id}','UbicacionController@show');
Route::get('ubicacionoficio/show/{id}','UbicacionOficioControllers@show');
Route::post('oficios/agregarOficio','OficioControllers@AgregarOficio');
Route::get('oficios/EnviarDocumento/{id}','OficioControllers@EnviarOficio');

Route::get('oficios/EnviarDocumentoContratacion/{id}','OficioControllers@EnviarOficiocontratacion');

Route::get('oficios/{id}/{idperfil}','OficioControllers@GetUser');
Route::get('oficios/visto/{id}','OficioControllers@Visto');

Route::get('oficioscontratacion/visto/{id}','OficioControllers@VistoContratacion');

Route::get('documentos/aprobar/{id}','OficioControllers@Firmar');
Route::get('oficioscontratacion/firmar/{id}','OficioControllers@FirmarContratacion');

Route::get('oficios1/firmar1/{id}','OficioControllers@EnviadoContratacion');

//Route::get('oficios/firmarcontratacion/{id}','OficioControllers@FirmarContratacion');

Route::get('preparaduria/',['as'=>'Preparaduria','uses'=>'PreparaduriaController@index']);
Route::get('preparaduria/create',['as'=>'CrearSolicitud','uses'=>'PreparaduriaController@create']);
Route::post('preparaduria/agregarPreparaduria',['as'=>'agregarPreparaduria','uses'=>'PreparaduriaController@agregarPreparaduria']);
Route::get('preparaduria/EnviarSolicitud/{id}','PreparaduriaController@EnviarSolicitud');
Route::get('preparaduria/EntregarSolicitud','PreparaduriaController@EntregarSolicitud');
Route::get('preparaduria/RemitirSolicitud','PreparaduriaController@RemitirSolicitud');
Route::get('preparaduria/visto/{id}','PreparaduriaController@Visto');
Route::get('preparaduria/rechazado/{id}','PreparaduriaController@Rechazado');
Route::put('preparaduria/rechazo/{id}',['as'=>'Rechazo','uses'=>'PreparaduriaController@Rechazo']);
Route::get('preparaduria/evaluar/{id}','PreparaduriaController@Evaluar');
Route::post('preparaduria/verificado','PreparaduriaController@Verificado');
Route::get('preparaduria/aprobado/{id}','PreparaduriaController@Aprobado');
Route::get('preparaduria/oficiorespuesta','PreparaduriaController@OficioRespuesta');
Route::post('preparaduria/agregarOficioPreparador','PreparaduriaController@agregarOficioPreparador');
Route::get('preparaduriaconcurso/index',['as'=>'PreparaduriaConcurso','uses'=>'ConcursoController@index']);
Route::get('preparaduriaconcurso/create',['as'=>'AperturarConcurso','uses'=>'ConcursoController@create']);
Route::post('preparaduriaconcurso/abierto',['as'=>'AbieroConcurso','uses'=>'ConcursoController@AperturarPreparaduria']);
Route::get('preparaduriaconcurso/cerrarconcurso',['as'=>'CerrarConcurso','uses'=>'ConcursoController@cerrar']);

Route::get('ubicacionpreparaduria/index','UbicacionPreparaduriaController@index');
Route::get('ubicacionpreparaduria/show/{id}','UbicacionPreparaduriaController@show');

Route::get('horario/index',['as'=>'horario','uses'=>'HorarioController@index']);
Route::get('horario/create/{id}',['as'=>'AsignarHorario','uses'=>'HorarioController@create']);
Route::post('horario/CargarHorario',['as'=>'CargarHorario','uses'=>'HorarioController@CargarHorario']);

Route::get('vista-html-pdf',[    'as'=>'vistaHTMLPDF',    'uses'=>'DocumentoController@vistaHTMLPDF']
);

Route::get('vista-html-pdf_convocatoria',[    'as'=>'vista-html-pdf_convocatoria',    'uses'=>'DocumentoController@vistaHTMLPDFConvocatoria']
);

Route::get('vista-html-pdf-porfirmar',[    'as'=>'vistaHTMLPDFPorFirmar',    'uses'=>'DocumentoController@vistaHTMLPDFPorFirmar']
);
Route::get('vista-html-pdf-firmado',[    'as'=>'vistaHTMLPDFFirmado',    'uses'=>'DocumentoController@vistaHTMLPDFFirmado']
);
Route::get('vista-html-pdf-preparaduria',[    'as'=>'vistaHTMLPDFPreparaduria',    'uses'=>'PreparaduriaController@vistaHTMLPDFPreparaduria']
);
Route::get('vista-html-pdf-preparaduria-verificado',[    'as'=>'vistaHTMLPDFPreparaduriaVerificado',    'uses'=>'PreparaduriaController@vistaHTMLPDFPreparaduriaVerificado']
);
Route::get('vista-html-pdf-preparaduria-solicitud-verificado',[    'as'=>'vistaHTMLPDFPreparaduriaSolicitudVerificado',    'uses'=>'PreparaduriaController@vistaHTMLPDFPreparaduriaSolicitudVerificado']
);

Route::get('vista-html-pdf-preparaduria-aprobado',[    'as'=>'vistaHTMLPDFPreparaduriaAprobado',    'uses'=>'PreparaduriaController@vistaHTMLPDFPreparaduriaAprobado']
);
Route::get('vista-html-pdf-preparaduria-rechazado',[    'as'=>'vistaHTMLPDFPreparaduriaRechazado',    'uses'=>'PreparaduriaController@vistaHTMLPDFPreparaduriaRechazado']
);
Route::get('vista-html-pdf-preparaduria-reprobado',[    'as'=>'vistaHTMLPDFPreparaduriaReprobado',    'uses'=>'PreparaduriaController@vistaHTMLPDFPreparaduriaReprobado']
);

Route::get('vista-html-pdf-oficio',[    'as'=>'Oficio',    'uses'=>'OficioControllers@Oficio']
);
Route::get('vista-html-pdf-oficiocontratacion',[    'as'=>'vistaHTMLPDFoficiocontratacion',    'uses'=>'OficioControllers@vistaHTMLPDFOficio']
);
Route::get('vista-html-pdf-oficio-firmado',[    'as'=>'OficioFirmado',    'uses'=>'OficioControllers@OficioFirmado']
); 

Route::get('vista-html-pdf-oficiocontratacion-firmado',[    'as'=>'OficioFirmado',    'uses'=>'OficioControllers@OficioFirmado']
);


Route::get('vista-html-plaza-pdf',[    'as'=>'Plazas',    'uses'=>'ConcursoController@Plazas']
);

Route::get('vista-html-requisitos-pdf',[    'as'=>'Requisitos',    'uses'=>'ConcursoController@Requisitos']
);
Route::get('vista-html-pdf-horario',[    'as'=>'HorarioClases',    'uses'=>'HorarioController@HorarioClases']
);
Route::get('vista-html-oficio-preparadores-pdf',[    'as'=>'OficioPreparadores',    'uses'=>'OficioControllers@OficioPreparadores']
);
Route::get('vista-html-pdf-factores',[    'as'=>'Factores',    'uses'=>'PreparaduriaController@Factores']
);
/*Profile*/
Route::group(['prefix' => 'profile'],function(){    
    Route::get('/','ProfileController@index');
    Route::post('save/{id}','ProfileController@store');
});

/*enviar circular*/

Route::post('circular/enviarcircular',['as'=>'enviarcircular','uses'=>'DocumentoController@EnviarDocumentocircular']);

/*Modulo Compras*/
Route::get('compras/',['as'=>'Compras','uses'=>'ComprasController@index']);
Route::get('compras/mostrar',['as'=>'ComprasMostrar','uses'=>'ComprasController@MostrarCompras']);
Route::get('compras/show/{id}',['as'=>'ComprasMostrar','uses'=>'ComprasController@show']);
Route::get('compras/showmateriales/{id}',['as'=>'ComprasMostrar','uses'=>'ComprasController@showMateriales']);
Route::get('compras/material/{id}',['as'=>'ComprasMaterial','uses'=>'ComprasController@Materiales']);
Route::get('compras/materialnew/{id}',['as'=>'ComprasMaterial','uses'=>'ComprasController@MaterialesNew']);
Route::post('compras/store',['as'=>'ComprasMostrar','uses'=>'ComprasController@GuargarSolicitudCompra']);
Route::post('compras/agrega',['as'=>'ComprasMostrar','uses'=>'ComprasController@AgregarSolicitudCompra']);
Route::get('solicitudcompras/eliminar/{id}','SolicitudComprasController@Destroy');
Route::post('material/GuardarMaterial',['as'=>'Materiales','uses'=>'MaterialController@GuargarMaterial']);
route::get('compras/borrador/{id}',['as'=>'ComprasBorrador','uses'=>'ComprasController@Borrador']);
route::get('compras/porautorizar/{id}',['as'=>'ComprasPorAutorizar','uses'=>'ComprasController@PorAutorizar']);
route::get('compras/editshow/{id}',['as'=>'ComprasEditShow','uses'=>'ComprasController@editshow']);
route::put('compras/modificarcompra/{id}',['as'=>'ComprasModificar','uses'=>'ComprasController@ModificarCompras']);
Route::get('material/',['as'=>'Material','uses'=>'MaterialController@index']);



/*RUTAS DEL USUARIO ADMIN*/
Route::get('usuarios/',['as'=>'Usuarios','uses'=>'UserController@index']);
Route::get('usuarios/create',['as'=>'CrearUsuarios','uses'=>'UserController@create']);
Route::post('usuarios/agregarUsuario', 'UserController@AgregarUsuario' );
Route::get('usuarios/municipio/{id}','UserController@GetMunicipios');
Route::get('usuarios/{id}','UserController@GetStates');
Route::get('usuarios/ciudad/{id}','UserController@GetCiudades');  
Route::get('usuarios/show/{id}',['as'=>'UsuariosShow','uses'=>'UserController@show']);
Route::get('usuarios/eliminar/{id}','UserController@Destroy');
Route::get('usuarios/modificar/{id}',['as'=>'ModificarUsuario','uses'=>'UserController@ModificarUsuario']);
Route::put('usuarios/modificarUsuario/{id}','UserController@EditarUsuario' );
Route::post('resetpassword','UserController@resetPassword');
/*************************/

