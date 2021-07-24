<?php

function penyewa_form_validation()
{
	return [
		[
			'field' => 'nik',
			'label' => 'NIK',
			'rules' => 'required|is_unique[penduduk.nik]'
		],
		[
			'field' => 'nama',
			'label' => 'Nama',
			'rules' => 'required'
		],
		[
			'field' => 'ttl',
			'label' => 'Tanggal Lahir',
			'rules' => 'required'
		],
		[
			'field' => 'alamat',
			'label' => 'Alamat',
			'rules' => 'required'
		],
		[
			'field' => 'dusun',
			'label' => 'Dusun',
			'rules' => 'required'
		],
	];
}
