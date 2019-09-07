<aside class="left-sidebar">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                
                @if (session('user')['status_user'] == 'dosen')

                    <li><a href="{{ route('dashboard.dosen') }}" ><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Beranda </a></li>
                    <li><a href="{{ route('jadwal_mengajar') }}" ><i class="mdi mdi-calendar-clock"></i><span class="hide-menu">Jadwal Mengajar </span></a></li>
                    <li><a href="{{ route('dosen.absensi', ['state' => 'absensi']) }}" ><i class="mdi mdi-calendar-multiple-check"></i><span class="hide-menu">Absensi </span></a></li>
                    <li><a href="{{ route('dosen.nilai', ['state' => 'nilai']) }}" ><i class="mdi mdi-clipboard-text"></i><span class="hide-menu">Nilai </span></a></li>
                    <li><a href="{{ route('dosen.mahasiswa.semester') }}" ><i class="mdi mdi-account-multiple-outline"></i><span class="hide-menu">Daftar Mahasiswa </span></a></li>

                @elseif (session('user')['status_user'] == 'mahasiswa')
                     <li><a href="{{ route('dashboard.mahasiswa') }}" ><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">Beranda </span></a></li>
                     <li><a href="{{ route('mahasiswa.krs') }}" ><i class="mdi mdi-calendar-clock"></i><span class="hide-menu">Kartu Rencana Studi </span></a></li>
                     <li><a href="{{ route('mahasiswa.khs') }}" ><i class="mdi mdi-calendar-clock"></i><span class="hide-menu">Kartu Hasil Studi </span></a></li>
                     <li><a href="{{ route('mahasiswa.absensi') }}" ><i class="mdi mdi-book-open-variant"></i><span class="hide-menu">Daftar Absensi </span></a></li>
                @else
                    <li class="nav-small-cap">Menu</li>
                        <li> <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-book-open-variant"></i><span class="hide-menu">Data Master</span></a>
                            <ul aria-expanded="false" class="collapse">
                                <li><a href="{{ route('admin.dosen.index') }}"> Dosen </a></li>
                                <li><a href="{{ route('admin.mahasiswa.index') }}"> Mahasiswa</a></li>
                                <li><a href="{{ route('admin.program_studi.index') }}"> Program Studi</a></li>
                                <li><a href="{{ route('admin.matakuliah.index') }}"> Matakuliah </a></li>
                                <li><a href="{{ route('admin.tahun_akademik.index') }}"> Tahun Akademik </a></li>
                            </ul>
                        </li>
                    </li>
                    <li><a href="{{ route('admin.krs.index') }}" ><i class="mdi mdi-bulletin-board"></i><span class="hide-menu">Kartu Rencana Studi </span></a></li>
                    <li><a href="{{ route('admin.tahun_akademik_berjalan.index') }}" ><i class="mdi mdi-key"></i><span class="hide-menu">Tahun Akademik </span></a></li>
                    <li><a href="{{ route('admin.pengumuman.index') }}" ><i class="mdi mdi-bullhorn"></i><span class="hide-menu">Pengumuman </span></a></li>
                    <li><a href="{{ route('mahasiswa.repositori') }}" ><i class="mdi mdi-library"></i><span class="hide-menu">Repositori Skripsi </span></a></li>
                    <li><a href="{{ route('admin.pengaturan.index') }}" ><i class="mdi mdi-settings"></i><span class="hide-menu">Pengaturan </span></a></li>

                @endif
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>