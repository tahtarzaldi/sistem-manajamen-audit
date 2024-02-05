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
                            <h5 class="card-title">Edit Pelaksanaan Audit</h5>
                        </div>
                    </div>
    
                  <!-- General Form Elements -->
            @foreach ($pelaksanaan as $a)
            <form action="/pelaksanaan/update" method="post">
              <input type="hidden" name="id" value="{{ $a->id }}">
                {{ csrf_field() }}
                <div class="row mb-3">
                  <label for="inputText" class="col-sm-2 col-form-label">Audit</label>
                  <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" name="id_perencanaan" required>
                      <option selected value="">Pilih Audit</option>
                     @foreach ($perencanaan as $p)
                      <option value="{{ $p->id }}" {{$a->id_perencanaan == $p->id  ? 'selected' : ''}}>{{ $p->tujuan_audit }}</option>
                     @endforeach
                    </select>
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputEmail" class="col-sm-2 col-form-label">Hasil Pemeriksaan</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="hasil_pemeriksaan" placeholder="Masukan Hasil Pemeriksaan" required value="{{ $a->hasil_pemeriksaan }}">
                  </div>
                </div>
                <div class="row mb-3">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Catatan</label>
                    <div class="col-sm-10">
                      <textarea class="form-control" style="height: 100px" name="catatan" required>{{ $a->catatan }}</textarea>
                    </div>
                  </div>
                <div class="row mb-3">
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Submit</button>
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