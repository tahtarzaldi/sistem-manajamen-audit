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
                            <h5 class="card-title">Tambah Perencanaan Audit</h5>
                        </div>
                    </div>
    
                  <!-- General Form Elements -->
            <form action="/audit/store" method="post">
                {{ csrf_field() }}
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Tujuan</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="tujuan_audit" placeholder="Masukan Tujuan Audit" required>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputEmail" class="col-sm-2 col-form-label">Ruang Lingkup</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="ruang_lingkup" placeholder="Masukan Ruang Lingkup" required>
                  </div>
                </div>
                <div class="row mb-3">
                    <label for="inputEmail" class="col-sm-2 col-form-label">Tim Audit</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="tim_audit" placeholder="Masukan Tim Audit" required>
                    </div>
                  </div>
                <div class="row mb-3">
                    <label for="inputDate" class="col-sm-2 col-form-label">Tanggal Mulai</label>
                    <div class="col-sm-10">
                      <input type="date" class="form-control" name="tgl_mulai" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputDate" class="col-sm-2 col-form-label">Tanggal Selesai</label>
                    <div class="col-sm-10">
                      <input type="date" class="form-control" name="tgl_selesai" required>
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputEmail" class="col-sm-2 col-form-label">Sumber Daya</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="sumber_daya" placeholder="Masukan Sumber Daya">
                    </div>
                </div>
                <div class="row mb-3">
                    <label for="inputEmail" class="col-sm-2 col-form-label">Teknik Audit</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control" name="teknik_audit" placeholder="Masukan Teknik Audit" required>
                    </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Status</label>
                  <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" name="status" required>
                      <option selected value="">Pilih Status</option>
                      <option>Belum Selesai</option>
                      <option>Sudah Selesai</option>
                    </select>
                  </div>
                </div>
                <div class="row mb-3">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Catatan</label>
                    <div class="col-sm-10">
                      <textarea class="form-control" style="height: 100px" name="catatan" required></textarea>
                    </div>
                  </div>
                <div class="row mb-3">
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </div>
                </div>

              </form><!-- End General Form Elements -->
    
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