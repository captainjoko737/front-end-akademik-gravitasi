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

Route::get('/login', 'Auth\LoginController@login')->name('login');
Route::post('/login', 'Auth\LoginController@postLogin')->name('post.login');

Route::get('/admin', 'Auth\LoginController@admin')->name('admin');
Route::post('/admin', 'Auth\LoginController@postAdmin')->name('post.admin');

Route::group(['middleware' => ['authentications']], function () {
	
	Route::get('/', 'HomeController@index')->name('home');
	Route::get('/monitor-server', 'HomeController@monitor')->name('monitor.server');
	Route::get('/cpu', 'HomeController@cpu')->name('cpu');

	# - - - - - - - - - - - - - - D O S E N - - - - - - - - - - - - - - - #

	Route::get('/beranda/dosen', 'HomeController@dosen')->name('dashboard.dosen');

	Route::get('/jadwal_mengajar', 'dosen\Dosen@jadwalMengajar')->name('jadwal_mengajar');

	Route::get('/dosen/absensi', 'dosen\Dosen@getKrsDosen')->name('dosen.absensi');
	Route::get('/dosen/absensi/detail', 'dosen\Dosen@getAbsensiMahasiswa')->name('dosen.absensi.detail');
	Route::get('/dosen/absensi/detail/semester', 'dosen\Dosen@getAbsensiMahasiswaPerSmt')->name('dosen.absensi.detail.semester');
	Route::post('/dosen/absensi', 'dosen\Dosen@saveAbsensiMahasiswa')->name('save.dosen.absensi');

	Route::get('/dosen/nilai', 'dosen\Dosen@getKrsDosen')->name('dosen.nilai');
	Route::get('/dosen/nilai/detail', 'dosen\Dosen@getKhsMahasiswaPerSmt')->name('dosen.nilai.detail');
	Route::get('/dosen/nilai/detail/semester', 'dosen\Dosen@getKhsMahasiswaPerSmt')->name('dosen.nilai.detail.semester');
	Route::post('/dosen/nilai', 'dosen\Dosen@saveNilaiMahasiswa')->name('save.dosen.nilai');

	Route::get('/dosen/mahasiswa/semester', 'dosen\Dosen@getMahasiswaPerSemester')->name('dosen.mahasiswa.semester');
	Route::get('/dosen/daftar/mahasiswa/semester', 'dosen\Dosen@getDataMahasiswaPerSemester')->name('dosen.daftar.mahasiswa.semester');

	Route::group(['prefix' => 'dosen'], function () {
		Route::get('/updateProfile', 'dosen\Dosen@getUpdateProfile')->name('dosen.update.profile');
		Route::post('/updateProfile', 'dosen\Dosen@saveUpdateProfile')->name('dosen.update.profile.save');
		Route::get('/updatePhoto', 'dosen\Dosen@getUpdatePhoto')->name('dosen.update.photo');
		Route::post('/updatePhoto', 'dosen\Dosen@saveUpdatePhoto')->name('dosen.update.photo.save');
    });

	# - - - - - - - - - - - - - - E N D    D O S E N - - - - - - - - - - - - - - - #

	# - - - - - - - - - - - - - - M A H A S I S W A - - - - - - - - - - - - - - - #

	Route::get('/beranda/mahasiswa', 'HomeController@mahasiswa')->name('dashboard.mahasiswa');

	Route::get('/mahasiswa/krs', 'mahasiswa\Mahasiswa@getKrs')->name('mahasiswa.krs');
	Route::get('/mahasiswa/khs', 'mahasiswa\Mahasiswa@getKhs')->name('mahasiswa.khs');
	Route::get('/mahasiswa/absensi', 'mahasiswa\Mahasiswa@getAbsensi')->name('mahasiswa.absensi');

	Route::group(['prefix' => 'mahasiswa'], function () {
		Route::get('/updateProfile', 'mahasiswa\Mahasiswa@getUpdateProfile')->name('mahasiswa.update.profile');
		Route::post('/updateProfile', 'mahasiswa\Mahasiswa@saveUpdateProfile')->name('mahasiswa.update.profile.save');
		Route::get('/updatePhoto', 'mahasiswa\Mahasiswa@getUpdatePhoto')->name('mahasiswa.update.photo');
		Route::post('/updatePhoto', 'mahasiswa\Mahasiswa@saveUpdatePhoto')->name('mahasiswa.update.photo.save');
    });



	

	Route::get('/mahasiswa/repositori', 'mahasiswa\Mahasiswa@getRepositori')->name('mahasiswa.repositori');

	# - - - - - - - - - - - - - - E N D    M A H A S I S W A - - - - - - - - - - - - - - - #

	# - - - - - - - - - - - - - - A D M I N I S T R A T O R - - - - - - - - - - - - - - - #

	Route::group(['prefix' => 'admin'], function () {

		# - - - - - - - - - - - - - -  M A S T E R - - - - - - - - - - - - - - - #
		
		Route::group(['prefix' => 'dosen'], function () {
			Route::get('/', 'admin\Dosen@index')->name('admin.dosen.index');
			Route::get('/add', 'admin\Dosen@add')->name('admin.dosen.add');
			Route::get('/edit/{id}', 'admin\Dosen@edit')->name('admin.dosen.edit');
			Route::get('/changePassword/{id}', 'admin\Dosen@changePassword')->name('admin.dosen.changePassword');
			Route::post('/create', 'admin\Dosen@create')->name('admin.dosen.create');
			Route::post('/save', 'admin\Dosen@save')->name('admin.dosen.save');
			Route::post('/saveChangePassword', 'admin\Dosen@saveChangePassword')->name('admin.dosen.saveChangePassword');
			Route::delete('/delete', 'admin\Dosen@drop')->name('admin.dosen.delete');
			Route::get('/import', 'admin\Dosen@getImportCsv')->name('admin.import.dosen');
			Route::post('/import', 'admin\Dosen@saveImportCsv')->name('admin.import.dosen.save');
	    });

	    Route::group(['prefix' => 'mahasiswa'], function () {
			Route::get('/', 'admin\Mahasiswa@index')->name('admin.mahasiswa.index');
			Route::get('/add', 'admin\Mahasiswa@add')->name('admin.mahasiswa.add');
			Route::get('/edit/{id}', 'admin\Mahasiswa@edit')->name('admin.mahasiswa.edit');
			Route::get('/changePassword/{id}', 'admin\Mahasiswa@changePassword')->name('admin.mahasiswa.changePassword');
			Route::post('/create', 'admin\Mahasiswa@create')->name('admin.mahasiswa.create');
			Route::post('/save', 'admin\Mahasiswa@save')->name('admin.mahasiswa.save');
			Route::post('/saveChangePassword', 'admin\Mahasiswa@saveChangePassword')->name('admin.mahasiswa.saveChangePassword');
			Route::delete('/delete', 'admin\Mahasiswa@drop')->name('admin.mahasiswa.delete');
			Route::get('/import', 'admin\Mahasiswa@getImportCsv')->name('admin.import.mahasiswa');
			Route::post('/import', 'admin\Mahasiswa@saveImportCsv')->name('admin.import.mahasiswa.save');
	    });

	    Route::group(['prefix' => 'matakuliah'], function () {
			Route::get('/', 'admin\Matakuliah@index')->name('admin.matakuliah.index');
			Route::get('/add', 'admin\Matakuliah@add')->name('admin.matakuliah.add');
			Route::get('/edit/{id}', 'admin\Matakuliah@edit')->name('admin.matakuliah.edit');
			Route::post('/create', 'admin\Matakuliah@create')->name('admin.matakuliah.create');
			Route::post('/save', 'admin\Matakuliah@save')->name('admin.matakuliah.save');
			Route::delete('/delete', 'admin\Matakuliah@drop')->name('admin.matakuliah.delete');
			Route::get('/import', 'admin\Matakuliah@getImportCsv')->name('admin.import.matakuliah');
			Route::post('/import', 'admin\Matakuliah@saveImportCsv')->name('admin.import.matakuliah.save');
	    });

	    Route::group(['prefix' => 'program_studi'], function () {
			Route::get('/', 'admin\ProgramStudi@index')->name('admin.program_studi.index');
			Route::get('/add', 'admin\ProgramStudi@add')->name('admin.program_studi.add');
			Route::get('/edit/{id}', 'admin\ProgramStudi@edit')->name('admin.program_studi.edit');
			Route::post('/create', 'admin\ProgramStudi@create')->name('admin.program_studi.create');
			Route::post('/save', 'admin\ProgramStudi@save')->name('admin.program_studi.save');
			Route::delete('/delete', 'admin\ProgramStudi@drop')->name('admin.program_studi.delete');
	    });

	    Route::group(['prefix' => 'tahun_akademik'], function () {
			Route::get('/', 'admin\TahunAkademik@index')->name('admin.tahun_akademik.index');
			Route::get('/add', 'admin\TahunAkademik@add')->name('admin.tahun_akademik.add');
			Route::get('/edit/{id}', 'admin\TahunAkademik@edit')->name('admin.tahun_akademik.edit');
			Route::post('/create', 'admin\TahunAkademik@create')->name('admin.tahun_akademik.create');
			Route::post('/save', 'admin\TahunAkademik@save')->name('admin.tahun_akademik.save');
			Route::delete('/delete', 'admin\TahunAkademik@drop')->name('admin.tahun_akademik.delete');
	    });

	    # - - - - - - - - - - - - - - E N D  M A S T E R - - - - - - - - - - - - - - - #

    	# - - - - - - - - - - - - - - A K A D E M I K - - - - - - - - - - - - - - - #

	    Route::group(['prefix' => 'krs'], function () {
			Route::get('/', 'admin\KRS@index')->name('admin.krs.index');
			Route::get('/add', 'admin\KRS@add')->name('admin.krs.add');
			Route::get('/edit/{id}', 'admin\KRS@edit')->name('admin.krs.edit');
			Route::post('/create', 'admin\KRS@create')->name('admin.krs.create');
			Route::post('/save', 'admin\KRS@save')->name('admin.krs.save');
			Route::delete('/delete', 'admin\KRS@drop')->name('admin.krs.delete');

			Route::get('/import', 'admin\KRS@getImportCsv')->name('admin.import.krs');
			Route::post('/import', 'admin\KRS@saveImportCsv')->name('admin.import.krs.save');
	    });

	    Route::group(['prefix' => 'tahun_akademik_berjalan'], function () {
			Route::get('/', 'admin\TahunAkademikBerjalan@index')->name('admin.tahun_akademik_berjalan.index');
			Route::get('/edit/{id}', 'admin\TahunAkademikBerjalan@edit')->name('admin.tahun_akademik_berjalan.edit');
			Route::post('/save', 'admin\TahunAkademikBerjalan@save')->name('admin.tahun_akademik_berjalan.save');
	    });

	     Route::group(['prefix' => 'pengumuman'], function () {
			Route::get('/', 'admin\Pengumuman@index')->name('admin.pengumuman.index');
			Route::get('/add', 'admin\Pengumuman@add')->name('admin.pengumuman.add');
			Route::get('/edit/{id}', 'admin\Pengumuman@edit')->name('admin.pengumuman.edit');
			Route::post('/create', 'admin\Pengumuman@create')->name('admin.pengumuman.create');
			Route::post('/save', 'admin\Pengumuman@save')->name('admin.pengumuman.save');
			Route::delete('/delete', 'admin\Pengumuman@drop')->name('admin.pengumuman.delete');
	    });

	    Route::group(['prefix' => 'pengaturan'], function () {
			Route::get('/', 'admin\Pengaturan@index')->name('admin.pengaturan.index');
			Route::get('/add', 'admin\Pengaturan@add')->name('admin.pengaturan.add');
			Route::get('/edit/{id}', 'admin\Pengaturan@edit')->name('admin.pengaturan.edit');
			Route::post('/create', 'admin\Pengaturan@create')->name('admin.pengaturan.create');
			Route::post('/save', 'admin\Pengaturan@save')->name('admin.pengaturan.save');
			Route::delete('/delete', 'admin\Pengaturan@drop')->name('admin.pengaturan.delete');
	    });

	    # - - - - - - - - - - - - - - E N D A K A D E M I K - - - - - - - - - - - - - - - #

    });




	# - - - - - - - - - - - - - - E N D  A D M I N I S T R A T O R - - - - - - - - - - - - - - - #

	Route::post('/logout', 'Auth\LoginController@logout')->name('logout');

});




































