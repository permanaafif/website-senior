<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>RPS</title>
    <style>
        body {
            font-family: "sans-serif";
        }

        .table-body {
            width: 100%;
            border-collapse: collapse;
            border: 1px solid black;
            margin-top: 20px;
            font-size: 12px;
        }

        .table-body tr th {
            border: 1px solid black;
        }

        .table-body tr td {
            border: 1px solid black;
        }
    </style>
</head>

<body>

    <table class="table-header" style="width: 100%; border-collapse: collapse; border: 1px solid black">
        <tr style="background-color: gainsboro">
            <td width="50px" align="center">
                <img src='img/logo-pnp.png' style="width: 60px; margin-left: 15px;" alt="">
            </td>
            <td align="center">
                <p><b>KEMENTERIAN PENDIDIKAN DAN KEBUDAYAAN</b></p>
                <p style="line-height: 7px"><b>POLITEKNIK NEGERI PADANG</b></p>
                <p style="line-height: 7px; font-size: 14px"><b>PUSAT PENINGKATAN DAN PENGEMBANGAN AKTIVITAS
                        INSTRUKSIONAL (P3AI)</b>
                </p>
            </td>
        </tr>
        <tr style="background-color: gainsboro; border-top: 1px solid black">
            <td align="center" colspan="2">
                <p><b>FORMULIR</b></p>
                <p style="line-height: 7px"><b>RENCANA PEMBELAJARAN SEMESTER (RPS)</b>
                </p>
            </td>
        </tr>
        <tr style="background-color: gainsboro; border-top: 1px solid black">
            <td align="center" colspan="2">
                <p><b>JURUSAN: {{ strtoupper($cetaks->jurusan->nama_jurusan ?? '-') }} PROGRAM STUDI:
                        {{ strtoupper($cetaks->prodi->nama_prodi ?? '-') }}</b></p>
            </td>
        </tr>
    </table>

    <table class="table-body">
        <tr>
            <td align="center" colspan="3"><b>MATA KULIAH</b></td>
            <td align="center"><b>SEMESTER</b></td>
            <td align="center"><b>SKS</b></td>
            <td align="center"><b>Kode MK</b></td>
            <td align="center"><b>Tanggal Penyusunan</b></td>
        </tr>
        <tr>
            <td align="center" colspan="3"><b>{{ $cetaks->matakuliah->matkul ?? '-' }}</b></td>
            <td align="center"><b>{{ $cetaks->matakuliah->semester ?? '-' }}</b></td>
            <td align="center"><b>{{ $cetaks->matakuliah->sks ?? '-' }}</b></td>
            <td align="center"><b>{{ $cetaks->matakuliah->kode_mk ?? '-' }}</b></td>
            <td align="center"><b></b></td>
        </tr>
        {{--  Judul  --}}
        <tr>
            <td align="center" rowspan="2"><b>OTORISASI</b></td>
            <td align="center" colspan="2">PENGEMBANGAN RPS:</td>
            <td align="center" colspan="2">KOORDINATOR PROGRAM STUDI</td>
            <td align="center" colspan="2">KETUA JURUSAN</td>
        </tr>
        {{--  TDD  --}}
        <tr>
            <td colspan="2">
                <p style="text-align: center; margin-top: 60px; margin-bottom: 10px">{{ $cetaks->user->nama  ?? '-' }}</p>
            </td>
            <td colspan="2" style="height: 70px">
                <p style="text-align: center; margin-top: 60px; margin-bottom: 10px">{{ $cetaks->jurusan->nama_kajur  ?? '-' }}</p>
            </td>
            <td colspan="2" style="height: 70px">
                <p style="text-align: center; margin-top: 60px; margin-bottom: 10px">{{ $cetaks->prodi->nama_kaprodi  ?? '-' }}</p>
            </td>
        </tr>
        {{--  Update Capaian Pembelajaran  --}}
        @foreach ($juduls as $judul)
            <tr>
                <td align="center" colspan="2" rowspan="15" style="padding: 0px 30px">
                    <b>{{ $judul->nama_judul ?? '-' }}
                    </b>
                </td>
                <td colspan="5" style="background-color: gainsboro">
                    CPL-PRODI (CAPAIAN PEMBELAJARAN PROGRAM STUDI) YANG
                    DIBEBANKAN PADA MATA KULIAH :
                </td>
            </tr>
            @foreach ($subjuduls as $subjudul)
                @if ($subjudul->judul_id == $judul->id)
                    <tr>
                        <td colspan="5">
                            {{ $loop->iteration }}. {{ $subjudul->nama_subjudul ?? '-' }}
                            @foreach ($kontens as $konten)
                                @if ($konten->subjudul_id == $subjudul->id)
                                    <p style="width: 100%; border-top: 1px solid black">
                                        {{ $konten->isi_konten ?? '-' }}
                                    </p>
                                @endif
                            @endforeach
                        </td>
                    </tr>
                @endif
            @endforeach
            <tr>
                <td colspan="5" style="background-color: gainsboro">
                    CPMK (CAPAIAN PEMBELAJARAN MATA KULIAH) :
                </td>
            </tr>
            @foreach ($capaians as $capaian)
                @if ($capaian->judul_id == $judul->id)
                    <tr>
                        <td colspan="2">
                            {{ $capaian->judul_capaian ?? '-' }}
                        </td>
                        <td colspan="3">
                            {{ $capaian->isi_capaian ?? '-' }}
                        </td>
                    </tr>
                @endif
            @endforeach
        @endforeach

        @foreach ($juduls2s as $juduls2)
            <tr>
                <td align="center" colspan="2" style="padding: 0px 30px">
                    <b>{{ $juduls2->nama_judul ?? '-' }}
                    </b>
                </td>
                <td colspan="5">
                    @foreach ($kontens as $kontent)
                        @if ($kontent->judul_id == $juduls2->id)
                            <p style="width: 100%;">
                                {{ $kontent->isi_konten ?? '-' }}
                            </p>
                        @endif
                    @endforeach
                </td>
            </tr>
        @endforeach

        @foreach ($juduls3s as $juduls3)
            <tr>
                <td align="center" colspan="2" style="padding: 0px 30px">
                    <b>{{ $juduls3->nama_judul ?? '-' }}
                    </b>
                </td>
                <td colspan="5">
                    @foreach ($kontens as $kontents)
                        @if ($kontents->judul_id == $juduls3->id)
                            <p style="width: 100%;">
                                {{ $kontents->isi_konten ?? '-' }}
                            </p>
                        @endif
                    @endforeach
                </td>
            </tr>
        @endforeach


        @foreach ($juduls4s as $juduls4)
            <tr>
                <td align="center" colspan="2" rowspan="6" style="padding: 0px 30px">
                    <b>{{ $juduls4->nama_judul ?? '-' }}
                    </b>
                </td>
                <td colspan="2" rowspan="4">
                    UTAMA
                </td>
                <td colspan="3">
                    https://docs.microsoft.com/en-us/visualstudio/get-started/csharp/?view=vs-2019
                </td>
            </tr>
            <tr>
                <td colspan="3">https://www.codecademy.com/</td>
            </tr>
            <tr>
                <td colspan="3">https://csharp.net-tutorials.com/</td>
            </tr>
            <tr>
                <td colspan="3">M.Reza Faisal dan Erick Kurniawan, 2019, Membangun Aplikasi Windows Forms Desktop
                    berbasis
                    .NET Core 3.1 & Visual Studio 2019, Indonesia .NET Developer Community
                </td>
            </tr>
            <tr>
                <td colspan="2" rowspan="2">
                    PENDUKUNG
                </td>
                <td colspan="3">Erick Kurniawan, Channel Youtube : Cloudemia</td>
            </tr>
            <tr>
                <td colspan="3">D Meidelfi, R Hidayat, F Wulandari, 2020, Perancangan Sistem Informasi Poliklinik
                    Politeknik Negeri
                    Padang, Prosiding Seminar Nasional Terapan Riset Inovatif (SENTRINOV) 6 (1), 1073-1078</td>
            </tr>
        @endforeach

        @foreach ($juduls5s as $juduls5)
            <tr>
                <td colspan="2" rowspan="3">{{ $juduls5->nama_judul ?? '-' }}</td>
                <td colspan="5" style="background-color: gainsboro">
                    TEAM TEACHING PENCAPAIAN :
                </td>
            </tr>
            @foreach ($subjuduls as $subjuduls5)
                @if ($subjuduls5->judul_id == $juduls5->id)
                    <tr>
                        <td colspan="5">
                            <ul>
                                <li>{{ $subjuduls5->nama_subjudul ?? '-' }}</li>
                            </ul>
                        </td>
                    </tr>
                @endif
            @endforeach
        @endforeach

    </table>

    <table class="table-body" style="width: 100%; border-collapse: collapse; border: 1px solid black">
        <tr style="background-color: gainsboro">
            <th rowspan="2">Minggu Ke</th>
            <th rowspan="2">Kemampuan</th>
            <th rowspan="2">Kajian/Materi</th>
            <th rowspan="2" width="10%">Metode</th>
            <th rowspan="2" width="10%">Waktu</th>
            <th colspan="3">Penilaian</th>
        </tr>
        <tr style="background-color: gainsboro">
            <th>Teknik</th>
            <th>Indikator</th>
            <th>Bobot (%)</th>
        </tr>
        @foreach ($targets as $target)
        <tr>
            <td align="center" style="border: 1px solid black">{{ $target->minggu ?? '-' }}</td>
            <td style="border: 1px solid black">{{ $target->kemampuan ?? '-' }}</td>
            <td style="border: 1px solid black">
                <ol>
                    @foreach ($kajians as $kajian)
                        @if ($kajian->target_id == $target->id)
                            <li>{{ $kajian->isi_kajian ?? '-' }}</li>
                        @endif
                    @endforeach
                </ol>
            </td>
            <td style="border: 1px solid black">
                <p>Bentuk : {{ $metodes->bentuk_metode }}</p>
                <p>Metode : {{ $metodes->kondisi_metode }}</p>
                <p>Pengalaman Belajar : {{ $metodes->pengalaman_metode }}</p>
            </td>
            <td style="border: 1px solid black">PTK: {{ $target->waktu ?? '-' }}</td>
            <td style="border: 1px solid black">{{ $target->teknik ?? '-' }}</td>
            <td style="border: 1px solid black">{{ $target->indikator ?? '-' }}</td>
            <td align="center" style="border: 1px solid black">{{ $target->bobot ?? '-' }}%</td>
        </tr>
        @endforeach
    </table>

</body>

</html>
