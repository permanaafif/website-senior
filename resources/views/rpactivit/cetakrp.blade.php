<!DOCTYPE html>
<html>
<head>
	<title>Membuat Laporan PDF Dengan DOMPDF Laravel</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 9pt;
		}
	</style>


	<table class='table table-bordered'>
		<thead>
			<tr>
				<th>No</th>
				<th>Nama</th>
				<th>Email</th>
				<th>Alamat</th>
				<th>Telepon</th>
				<th>Pekerjaan</th>
			</tr>
		</thead>
		<tbody>
			@php $i=1 @endphp
			@foreach($rps as $rp)
			<tr>
				<td>{{ $i++ }}</td>
				<td>{{$rp->nama}}</td>
				<td>{{$rp->email}}</td>
				<td>{{$rp->alamat}}</td>
				<td>{{$rp->telerpon}}</td>
				<td>{{$rp->pekerjaan}}</td>
			</tr>
			@endforeach
		</tbody>
	</table>

</body>
</html>
