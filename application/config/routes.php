<?php
defined('BASEPATH') OR exit('No direct script access allowed');


$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
/* USUARIO COMUN */
$route['Inicio'] = 'Welcome/iniciarSesion';
$route['Bienvenido'] = 'InicioController/bienvenido';
$route['nuevoPrograma'] = 'ProgramaController/insertarPrograma';
$route['ActividadDetalle'] = 'ActividadesController/insertActividadDetalle';
$route['Actividades'] = 'ActividadesController/getActividades';



/* ADMINISTRADOR */

$route['BienvenidoAdmin'] = 'InicioController/bienvenidoAdministrador';


/* ADMINISTRADOR PROGRAMA */
$route['Municipios'] = 'MunicipioController/getMunicipios';
$route['Municipio/Programa/(:any)'] = 'ProgramaController/vistaPrograma/$1';
$route['Programa/Nuevo'] = 'ProgramaController/crearPrograma';
$route['Obtener/Programa'] = 'ProgramaController/obtenerPrograma';
$route['Modificar/Programa'] = 'ProgramaController/modificarPrograma';
$route['Eliminar/Programa'] = 'ProgramaController/eliminarPrograma';


/* ADMINISTRADOR COMPONENTES */
$route['Programa/Componente/(:any)'] = 'ComponenteController/index/$1';
$route['Componente/Nuevo'] = 'ComponenteController/crearComponente';
$route['Obtener/Componente'] = 'ComponenteController/obtenerComponente';
$route['Modificar/Componente'] = 'ComponenteController/modificarComponente';
$route['Eliminar/Componente'] = 'ComponenteController/eliminarComponente';

/* ADMINISTRADOR ACTIVIDADES */
$route['Componente/Actividad/(:any)/(:any)'] = 'ActividadController/index/$1/$2';
$route['Actividad/Nuevo'] = 'ActividadController/crearActividad';
$route['Obtener/Actividad'] = 'ActividadController/obtenerActividad';
$route['Modificar/Actividad'] = 'ActividadController/modificarActividad';
$route['Eliminar/Actividad'] = 'ActividadController/eliminarActividad';

/* ADMINISTRADOR FECHAS */
$route['Actividad/Fecha/(:any)/(:any)/(:any)'] = 'FechaController/index/$1/$2/$3';
$route['Fecha/Nuevo'] = 'FechaController/crearFecha';
$route['Obtener/Fecha'] = 'FechaController/obtenerFecha';
$route['Modificar/Fecha'] = 'FechaController/modificarFecha';


$route['Componente'] = 'ComponenteController/index';
$route['Componente/Nuevo/(:any)'] = 'ComponenteController/crearComponente';


/* ADMINISTRADOR USUARIOS */

$route['Usuarios'] = 'UsuarioController/index';
$route['Internos'] = 'UsuarioController/internos';
$route['CambiarStatus'] = 'UsuarioController/cambiarStatusTodosLosUsuarios';

/* ADMINISTRADOR UNIDADES */

$route['Unidades'] = 'UnidadesController/index';


/* ADMINISTRADOR REPORTE */

$route['Reporte/Programa/(:any)'] = 'ProgramaController/vistaReporte/$1';
$route['Reporte'] = 'ProgramaController/getActividadesPorUnidad'; 
$route['ReporteCliente'] = 'ProgramaController/getActividadesPorUnidadCliente'; 
$route['Reporte/Nuevo'] = 'InicioController/crearReporteFotografico';
$route['Reporte/Obtener'] = 'InicioController/obtenerReportesCargado';
$route['Evidencia/Eliminar'] = 'InicioController/eliminarActividad';
/* REPORTE DOCUMENTAL */
$route['Reporte/Documentos'] = 'ProgramaController/cargaDocumentos';
$route['Obtener/Documentos'] = 'ProgramaController/obtenerDocumetos';
$route['Delete/Documento'] = 'ProgramaController/eliminarDocumento';
$route['Obtener/Documento'] = 'ProgramaController/obtenerUnDocumento';
$route['Obtener/Doc/Admin'] = 'ProgramaController/obtenerDocumentosAdministrador';

/* REPORTE EN PDF */

$route['Reporte/PDF/(:any)/(:any)/(:any)'] = 'ReporteDOMController/index/$1/$2/$3';
$route['Reporte/PDF/Fotografico/(:any)/(:any)/(:any)'] = 'ReporteDOMController/reporteForografico/$1/$2/$3';

/* ANALITICOS OBRAS PUBLICAS */

$route['Analitico'] = 'AnaliticoObrasController/index';
$route['Nuevo/Analitico/Fism'] = 'AnaliticoObrasController/guardarAnaliticoFism';
$route['AnaliticoFortamun'] = 'AnaliticoObrasController/fortamun';
$route['Nuevo/Analitico/Forta'] = 'AnaliticoObrasController/guardarAnaliticoForta';
$route['Analitico/get'] = 'AnaliticoObrasController/obtenerAnalitico';
$route['AnaliticoFISM/update'] = 'AnaliticoObrasController/modificarAnaliticoFism';
$route['Analiticoforta/update'] = 'AnaliticoObrasController/modificarAnaliticoForta';
$route['Analitico/DeleteFISM'] = 'AnaliticoObrasController/eliminarAnalitico';


/* REPORTE ADMINISTRADOR ANALITICOS OBRAS PUBLICAS */

$route['Munucipio/Analiticos'] = 'MunicipioController/getMunicipioAnaliticos';
$route['Analitico/FISM/(:any)'] = 'AnaliticoObrasController/obtenerFISMAnaliticos/$1';
$route['Analitico/FORTA/(:any)'] = 'AnaliticoObrasController/obtenerFORTAAnaliticos/$1';
$route['Analitico/Filtro'] = 'AnaliticoObrasController/filtroObras';

$route['Analitico/FISM/PDF/(:any)/(:any)/(:any)/(:any)'] = 'ReporteDOMController/reporte_analitico_fism/$1/$2/$3/$4';

$route['Analitico/FORTAMUN/PDF/(:any)/(:any)/(:any)/(:any)'] = 'ReporteDOMController/reporte_analitico_forta/$1/$2/$3/$4';

