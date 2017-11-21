<?php  if ( ! defined("BASEPATH")) exit("No direct script access allowed");
	function generate_sidemenu()
	{
		return '<li>	
		<a href="'.site_url('Home').'"><i class="fa fa-dashboard"></i> Dashboard</a>
	<li>
			<a href="#"><i class="fa fa-table fa-fw"></i>Table<span class="fa arrow"></span></a>
			<ul class="nav nav-second-level">
				<li>
					<a href="'.site_url('Dokter').'">Dokter</a>
				</li>
				<li>
					<a href="'.site_url('Member/data_member').'">Member</a>
				</li>
				<li>
					<a href="'.site_url('Obat').'">Obat</a>
				</li>
				<li>
					<a href="'.site_url('Staff').'">Staff</a>
				</li>
				<li>
					<a href="'.site_url('Waktutemu/data_waktutemu').'">Waktutemu</a>
				</li>
			</ul>
		</li>';
	}

