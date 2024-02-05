<!DOCTYPE html>
<html lang="en">


<body>

  <!-- ======= Header ======= -->
    @include('layouts/v_header')
  <!-- End Header -->

  <!-- ======= Sidebar ======= -->
  @include('layouts/v_sidebar')
  <!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Audit</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Audit</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-9">
                            <h5 class="card-title">Data Pelaksanaan Audit</h5>
                        </div>
                        <div class="col-md-3">
                            <a href="/pelaksanaan/tambah" class="btn btn-primary" style="margin-top: 15px; margin-left: 60px;">Tambah Data</a>
                        </div>
                    </div>
    
                  <!-- Table with hoverable rows -->
                  <table class="table table-hover">
                    <thead>
                      <tr>
                        <th scope="col">No.</th>
                        <th scope="col">Tujuan Audit</th>
                        <th scope="col">Tanggal Pemeriksaan</th>
                        <th scope="col">Hasil Pemeriksaan</th>
                        <th scope="col">Catatan</th>
                        <th scope="col">Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                        @foreach ($pelaksanaan as $index => $a)
                      <tr>
                        <th scope="row">{{ $index + 1 }}</th>
                        <td>{{ $a->tujuan }}</td>
                        <td>{{ date('d/m/Y', strtotime($a->tgl_pemeriksaan)) }}</td>
                        <td>{{ $a->hasil_pemeriksaan }}</td>
                        <td>{{ $a->catatan }}</td>
                        <td style="text-align: center">
                            <a href="/pelaksanaan/edit/{{ $a->id }}" class="btn btn-warning btn-sm">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <a href="/pelaksanaan/hapus/{{ $a->id }}" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin?')">
                                <i class="bi bi-trash"></i>
                            </a>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                  <!-- End Table with hoverable rows -->
    
                </div>
              </div>
          </div>
        </div>
    </section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  @include('layouts/v_footer')
  <!-- End Footer -->

</body>

</html>