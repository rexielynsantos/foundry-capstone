const elixir = require('laravel-elixir');

require('laravel-elixir-vue');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 |
 | Elixir provides a clean, fluent API for defining some basic Gulp tasks
 | for your Laravel application. By default, we are compiling the Sass
 | file for our application, as well as publishing vendor resources.
 |
 */

elixir((mix) => {            
    mix.webpack('/app.js')
    .styles([
		'./public/bootstrap/css/bootstrapValidator.css',
		'./public/plugins/fileinput/fileinput.css',
		'./public/plugins/fileinput/fileinput.min.css',
		'./public/plugins/fileinput/explorer/theme.css',
		'./public/plugins/datepicker/datepicker3.css',
		'./public/plugins/datatables/dataTables.bootstrap.css',
		'./public/plugins/datatables/jquery.dataTables.min.css',
		'./public/plugins/select2/select2.min.css',
		'./public/dist/css/AdminLTE.min.css',
		'./public/dist/css/skins/_all-skins.min.css',
		'./public/dist/css/style.css'
	], 'public/css/admin-lte.css')
    
    .scripts([
		'./public/js/bootstrapvalidator.min.js',
		'./public/bootstrap/js/jquery-ui.min.js',
		'./public/bootstrap/js/bootstrap.min.js',
		'./public/bootstrap/js/moment.min.js',
		'./public/bootstrap/js/validator.js',
		'./public/plugins/knob/jquery.knob.js', 
 		'./public/bootstrap/js/moment.min.js',
		'./public/plugins/fileinput/fileinput.js',
		'./public/plugins/fileinput/fileinput.min.js',
		'./public/plugins/fileinput/explorer/theme.js',
		'./public/locales/fr.js',
		'./public/locales/es.js',
		'./public/plugins/daterangepicker/daterangepicker.js',
		'./public/plugins/datepicker/bootstrap-datepicker.js',
		'./public/plugins/iCheck/icheck.min.js',
		'./public/plugins/slimScroll/jquery.slimscroll.min.js',
		'./public/plugins/datatables/jquery.dataTables.min.js',
		'./public/plugins/datatables/dataTables.bootstrap.min.js',
		'./public/plugins/input-mask/jquery.inputmask.js',
		'./public/plugins/input-mask/jquery.inputmask.date.extensions.js',
		'./public/plugins/input-mask/jquery.inputmask.extensions.js',
		'./public/plugins/fastclick/fastclick.js',
		'./public/plugins/select2/select2.full.min.js',
		'./public/js/noty/packaged/jquery.noty.packaged.min.js',
		'./public/dist/js/app.min.js',
	], 'public/js/admin-lte.js');
});