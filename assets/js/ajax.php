<script type="text/javascript">
	var MyTable = $('#list-data').dataTable({
		"paging": true,
		"lengthChange": true,
		"searching": true,
		"ordering": true,
		"info": true,
		"autoWidth": false
	});

	window.onload = function() {
		tampilPegawai();		
		tampilCakupan_Media();
		tampilKlasifikasi();
		tampilTipe_Berita();
		tampilJenis_User();
		tampilJenis_Media();
		tampilSebaran_Oplah();
		tampilBerita();
		tampilSebaran_Oplah_Kabupaten();
		tampilStatus();
		tampilRangking();
		tampilRangkingGlobal();
		tampilUsia();
		tampilWartawan();
		tampilUpdateBerita();
		tampilKhusus();
		tampilCetak();
		tampilKompetensi();
		tampilSps();
		tampilJumlahOplah();
		tampilExpired();
		<?php
		if ($this->session->flashdata('msg') != '') {
			echo "effect_msg();";
		}
		?>
	}

	function refresh() {
		MyTable = $('#list-data').dataTable();
	}

	function effect_msg_form() {
		// $('.form-msg').hide();
		$('.form-msg').show(1000);
		setTimeout(function() { $('.form-msg').fadeOut(1000); }, 3000);
	}

	function effect_msg() {
		// $('.msg').hide();
		$('.msg').show(1000);
		setTimeout(function() { $('.msg').fadeOut(1000); }, 3000);
	}

	function tampilPegawai() {
		$.get('<?php echo base_url('Pegawai/tampil'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-pegawai').html(data);
			refresh();
		});
	}

	var id_pegawai;
	$(document).on("click", ".konfirmasiHapus-pegawai", function() {
		id_pegawai = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataPegawai", function() {
		var id = id_pegawai;
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Pegawai/delete'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			tampilPegawai();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$(document).on("click", ".update-dataPegawai", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Pegawai/update'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-pegawai').modal('show');
		})
	})

	$('#form-tambah-pegawai').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Pegawai/prosesTambah'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilPegawai();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-pegawai").reset();
				$('#tambah-pegawai').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$(document).on('submit', '#form-update-pegawai', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Pegawai/prosesUpdate'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilPegawai();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-pegawai").reset();
				$('#update-pegawai').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$('#tambah-pegawai').on('hidden.bs.modal', function () {
		$('.form-msg').html('');
	})

	$('#update-pegawai').on('hidden.bs.modal', function () {
		$('.form-msg').html('');
	})

	//Merek
	function tampilMerek() {
		$.get('<?php echo base_url('Merek/tampil'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-merek').html(data);
			refresh();
		});
	}

	var id_merek;
	$(document).on("click", ".konfirmasiHapus-merek", function() {
		id_merek = $(this).attr("data-id_merek");
	})
	$(document).on("click", ".hapus-dataMerek", function() {
		var id = id_merek;
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Merek/delete'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			tampilKota();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$(document).on("click", ".update-dataMerek", function() {
		var id = $(this).attr("data-id_merek");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Merek/update'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-merek').modal('show');
		})
	})

	$(document).on("click", ".detail-dataMerek", function() {
		var id = $(this).attr("data-id_merek");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Merek/detail'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#tabel-detail').dataTable({
				"paging": true,
				"lengthChange": false,
				"searching": true,
				"ordering": true,
				"info": true,
				"autoWidth": false
			});
			$('#detail-merek').modal('show');
		})
	})

	$('#form-tambah-merek').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Merek/prosesTambah'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilMerek();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-merek").reset();
				$('#tambah-merek').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$(document).on('submit', '#form-update-merek', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Merek/prosesUpdate'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilKota();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-merek").reset();
				$('#update-merek').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$('#tambah-merek').on('hidden.bs.modal', function () {
		$('.form-msg').html('');
	})

	$('#update-merek').on('hidden.bs.modal', function () {
		$('.form-msg').html('');
	})

	//Kota
	function tampilKota() {
		$.get('<?php echo base_url('Kota/tampil'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-kota').html(data);
			refresh();
		});
	}

	var id_kota;
	$(document).on("click", ".konfirmasiHapus-kota", function() {
		id_kota = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataKota", function() {
		var id = id_kota;
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Kota/delete'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			tampilKota();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$(document).on("click", ".update-dataKota", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Kota/update'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-kota').modal('show');
		})
	})

	$(document).on("click", ".detail-dataKota", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Kota/detail'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#tabel-detail').dataTable({
				"paging": true,
				"lengthChange": false,
				"searching": true,
				"ordering": true,
				"info": true,
				"autoWidth": false
			});
			$('#detail-kota').modal('show');
		})
	})

	$('#form-tambah-kota').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Kota/prosesTambah'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilKota();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-kota").reset();
				$('#tambah-kota').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$(document).on('submit', '#form-update-kota', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Kota/prosesUpdate'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilKota();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-kota").reset();
				$('#update-kota').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$('#tambah-kota').on('hidden.bs.modal', function () {
		$('.form-msg').html('');
	})

	$('#update-kota').on('hidden.bs.modal', function () {
		$('.form-msg').html('');
	})

	//Kecamatan
	function tampilJenis_Media() {
		$.get('<?php echo base_url('Master/tampil_jenis_media'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data_jenis_media').html(data);
			refresh();
		});
	}

	//tipe berita
	function tampilTipe_Berita() {
		$.get('<?php echo base_url('Master/tampil_tipe_berita'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data_tipe_berita').html(data);
			refresh();
		});
	}

	//Desa
	function tampilJenis_User() {
		$.get('<?php echo base_url('Master/tampil_jenis_user'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data_jenis_user').html(data);
			refresh();
		});
	}

	//Kategori
	function tampilCakupan_Media() {
		$.get('<?php echo base_url('Master/tampil_cakupan_media'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data_cakupan_media').html(data);
			refresh();
		});
	}

	function tampilSebaran_Oplah() {
		$.get('<?php echo base_url('Master/tampil_sebaran_oplah'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data_sebaran_oplah').html(data);
			refresh();
		});
	}

	//Klasifikasi
	function tampilKlasifikasi() {
		$.get('<?php echo base_url('Master/tampilKlasifikasi'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-klasifikasi').html(data);
			refresh();
		});
	}
	function tampilSebaran_Oplah_Kabupaten() {
		$.get('<?php echo base_url('Master/tampil_sebaran_oplah_kabupaten'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data_sebaran_oplah_kabupaten').html(data);
			refresh();
		});
	}
	function tampilStatus() {
		$.get('<?php echo base_url('Master/tampil_status'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data_status').html(data);
			refresh();
		});
	}

	function tampilRangking() {
		$.get('<?php echo base_url('Master/tampil_rangking'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data_rangking').html(data);
			refresh();
		});
	}
	function tampilRangkingGlobal() {
		$.get('<?php echo base_url('Master/tampil_rangking_global'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data_rangking_global').html(data);
			refresh();
		});
	}
	function tampilUsia() {
		$.get('<?php echo base_url('Master/tampil_usia'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data_usia').html(data);
			refresh();
		});
	}
	function tampilWartawan() {
		$.get('<?php echo base_url('Master/tampil_wartawan'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data_wartawan').html(data);
			refresh();
		});
	}
	function tampilUpdateBerita() {
		$.get('<?php echo base_url('Master/tampil_update_berita'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data_update_berita').html(data);
			refresh();
		});
	}
	function tampilKhusus() {
		$.get('<?php echo base_url('Master/tampil_khusus'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data_khusus').html(data);
			refresh();
		});
	}
	function tampilCetak() {
		$.get('<?php echo base_url('Master/tampil_cetak'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data_cetak').html(data);
			refresh();
		});
	}
	function tampilKompetensi() {
		$.get('<?php echo base_url('Master/tampil_kompetensi'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data_kompetensi').html(data);
			refresh();
		});
	}
	function tampilSps() {
		$.get('<?php echo base_url('Master/tampil_sps'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data_sps').html(data);
			refresh();
		});
	}
	function tampilJumlahOplah() {
		$.get('<?php echo base_url('Master/tampil_jumlah_oplah'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data_jumlah_oplah').html(data);
			refresh();
		});
	}
	function tampilExpired() {
		$.get('<?php echo base_url('Master/tampil_expired'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data_expired').html(data);
			refresh();
		});
	}

	var id_klasifikasi;
	$(document).on("click", ".konfirmasiHapus-klasifikasi", function() {
		id_klasifikasi = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataKlasifikasi", function() {
		var id = id_klasifikasi;
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Master/deleteKlasifikasi'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			tampilKlasifikasi();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$(document).on("click", ".update-dataKlasifikasi", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Master/updateKlasifikasi'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-klasifikasi').modal('show');
		})
	})

	$('#form-tambah-klasifikasi').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Master/prosesTambahKlasifikasi'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilKlasifikasi();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-klasifikasi").reset();
				$('#tambah-klasifikasi').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$(document).on('submit', '#form-update-klasifikasi', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Master/prosesUpdateKlasifikasi'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilKlasifikasi();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-klasifikasi").reset();
				$('#update-klasifikasi').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$('#tambah-klasifikasi').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	$('#update-klasifikasi').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	//Posisi
	function tampilPosisi() {
		$.get('<?php echo base_url('Posisi/tampil'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-posisi').html(data);
			refresh();
		});
	}

	var id_posisi;
	$(document).on("click", ".konfirmasiHapus-posisi", function() {
		id_posisi = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataPosisi", function() {
		var id = id_posisi;
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Posisi/delete'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			tampilPosisi();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$(document).on("click", ".update-dataPosisi", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Posisi/update'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-posisi').modal('show');
		})
	})

	$(document).on("click", ".detail-dataPosisi", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Posisi/detail'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#tabel-detail').dataTable({
				"paging": true,
				"lengthChange": false,
				"searching": true,
				"ordering": true,
				"info": true,
				"autoWidth": false
			});
			$('#detail-posisi').modal('show');
		})
	})

	$('#form-tambah-posisi').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Posisi/prosesTambah'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilPosisi();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-posisi").reset();
				$('#tambah-posisi').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$(document).on('submit', '#form-update-posisi', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Posisi/prosesUpdate'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilPosisi();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-posisi").reset();
				$('#update-posisi').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$('#tambah-posisi').on('hidden.bs.modal', function () {
		$('.form-msg').html('');
	})

	$('#update-posisi').on('hidden.bs.modal', function () {
		$('.form-msg').html('');
	})

	//Berita
	function tampilBerita() {
		$.get('<?php echo base_url('Berita/tampil'); ?>', function(data) {
			MyTable.fnDestroy();
			$('#data-berita').html(data);
			refresh();
		});
	}

	var id_user;
	$(document).on("click", ".konfirmasiHapus-berita", function() {
		id_user = $(this).attr("data-id");
	})
	$(document).on("click", ".hapus-dataBerita", function() {
		var id = id_user;
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Berita/delete'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#konfirmasiHapus').modal('hide');
			tampilBerita();
			$('.msg').html(data);
			effect_msg();
		})
	})

	$(document).on("click", ".update-dataBerita", function() {
		var id = $(this).attr("data-id");
		
		$.ajax({
			method: "POST",
			url: "<?php echo base_url('Berita/update'); ?>",
			data: "id=" +id
		})
		.done(function(data) {
			$('#tempat-modal').html(data);
			$('#update-berita').modal('show');
		})
	})

	$('#form-tambah-berita').submit(function(e) {
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Berita/prosesTambah'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilBerita();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-tambah-berita").reset();
				$('#tambah-berita').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$(document).on('submit', '#form-update-berita', function(e){
		var data = $(this).serialize();

		$.ajax({
			method: 'POST',
			url: '<?php echo base_url('Berita/prosesUpdate'); ?>',
			data: data
		})
		.done(function(data) {
			var out = jQuery.parseJSON(data);

			tampilBerita();
			if (out.status == 'form') {
				$('.form-msg').html(out.msg);
				effect_msg_form();
			} else {
				document.getElementById("form-update-berita").reset();
				$('#update-berita').modal('hide');
				$('.msg').html(out.msg);
				effect_msg();
			}
		})
		
		e.preventDefault();
	});

	$('#tambah-berita').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})

	$('#update-berita').on('hidden.bs.modal', function () {
	  $('.form-msg').html('');
	})
	//</- berita ->
</script>