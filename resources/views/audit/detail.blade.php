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
                            <h5 class="card-title">Detail Perencanaan Audit</h5>
                        </div>
                    </div>
    
                  <!-- General Form Elements -->
                  @foreach ($audit as $a)
                  <form action="/audit/update" method="post">
                      {{ csrf_field() }}
                      <input type="hidden" name="id" value="{{ $a->id }}">
                      <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Tujuan</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="tujuan_audit" placeholder="Masukan Tujuan Audit" value="{{ $a->tujuan_audit }}" readonly required>
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="inputEmail" class="col-sm-2 col-form-label">Ruang Lingkup</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="ruang_lingkup" placeholder="Masukan Ruang Lingkup" value="{{ $a->ruang_lingkup }}" readonly required>
                        </div>
                      </div>
                      <div class="row mb-3">
                          <label for="inputEmail" class="col-sm-2 col-form-label">Tim Audit</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" name="tim_audit" placeholder="Masukan Tim Audit" value="{{ $a->tim_audit }}" readonly required>
                          </div>
                        </div>
                      <div class="row mb-3">
                          <label for="inputDate" class="col-sm-2 col-form-label">Tanggal Mulai</label>
                          <div class="col-sm-10">
                            <input type="date" class="form-control" name="tgl_mulai" required value="{{ $a->tgl_mulai }}" readonly>
                          </div>
                      </div>
                      <div class="row mb-3">
                          <label for="inputDate" class="col-sm-2 col-form-label">Tanggal Selesai</label>
                          <div class="col-sm-10">
                            <input type="date" class="form-control" name="tgl_selesai" required value="{{ $a->tgl_selesai }}" readonly>
                          </div>
                      </div>
                      <div class="row mb-3">
                          <label for="inputEmail" class="col-sm-2 col-form-label">Sumber Daya</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" name="sumber_daya" placeholder="Masukan Sumber Daya" value="{{ $a->sumber_daya }}" readonly>
                          </div>
                      </div>
                      <div class="row mb-3">
                          <label for="inputEmail" class="col-sm-2 col-form-label">Teknik Audit</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" name="teknik_audit" placeholder="Masukan Teknik Audit" required value="{{ $a->teknik_audit }}" readonly>
                          </div>
                      </div>
                      <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">Status</label>
                        <div class="col-sm-10">
                          <select class="form-select" aria-label="Default select example" name="status" required readonly>
                            <option selected value="">Pilih Status</option>
                            <option {{$a->status == 'Belum Selesai'  ? 'selected' : ''}}>Belum Selesai</option>
                            <option {{$a->status == 'Sudah Selesai'  ? 'selected' : ''}}>Sudah Selesai</option>
                          </select>
                        </div>
                      </div>
                      <div class="row mb-3">
                          <label for="inputPassword" class="col-sm-2 col-form-label">Catatan</label>
                          <div class="col-sm-10">
                            <textarea class="form-control" style="height: 100px" name="catatan" required readonly>{{ $a->catatan }}</textarea>
                          </div>
                        </div>
                    </form><!-- End General Form Elements -->
                    @endforeach
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