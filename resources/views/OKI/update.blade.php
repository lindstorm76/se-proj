@extends('layouts.app')

@section('content')
<div class="header bg-gradient-danger pb-2 pt-3">
  <div class="container-fluid">
    <div class="header-body">
      <div class="row align-items-center py-4">
        <div class="col-lg-6 col-7">
          <h6 class="h2 text-white d-inline-block mb-0">ยินดีต้อนรับเข้าสู่ระบบการยื่นผลงาน OKI</h6>
          <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
            <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
              <li class="breadcrumb-item"><a href="{{ route('home') }}"><i class="fas fa-home text-danger"></i></a></li>
              <li class="breadcrumb-item">ยื่นผลงาน</li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="card px-4 px-md-6 py-5">
@if (Session::has("message") && Session::has("alertColor"))
  <div class="alert alert-{{ Session::get('alertColor') }}" role="alert">
    {{ Session::get("message") }}
  </div>
@endif
    <h2 class="mb-4"><i class="ni ni-bold-right text-danger"></i><i class="ni ni-bold-right text-danger"></i> เลือกหัวข้อตัวชี้วัด OKI ที่ต้องการยื่น</h2>
    <div class="table-responsive">
        <div>
        <table class="table align-items-center">
            <thead class="thead-light">
            <tr>
                <th scope="col">ลำดับ</th>
                <th scope="col">หัวข้อ</th>
                <th scope="col">หน่วยนับค่าเป้าหมาย</th>
                <th scope="col">สถานะ</th>
                <th scope="col"></th>
            </tr>
            </thead>
            <tbody>
              @foreach ($requests as $index => $val)
              <tr>
                  <td scope="col" class="sort">
                    <span>{{ $index + 1 }}</span>
                  </td>
                  <td scope="col" class="sort">{{ $okrModel->where("id", $val->okr_id)->first()->subject }}</td>
                  <td scope="col" class="sort">
                    <div class="form-group d-flex align-items-center mt-3">
                      <input class="form-control" style="width: 5rem" type="number" value="{{ $val->amount }}" id="example-number-input" disabled>
                      <span class="ml-2">{{ $okrModel->where("id", $val->okr_id)->first()->unit }}</span>
                    </div>
                  </td>
                  <td scope="col" class="sort">
                    <span class="badge badge-pill badge-lg @if ($val->is_approved) badge-warning @else badge-danger @endif" style="font-size: .8rem">
                    @if ($val->is_approved)
                      กำลังดำเนินการ
                    @else
                      รออนุมัติ
                    @endif
                    </span>
                  </td>
                  <td>
                  @if ($val->is_approved)
                    <button type="button" class="btn btn-outline-success" data-toggle="modal" data-target="#item-{{ $index + 1 }}">
                      เลือก
                    </button>
                    <!-- Modal -->
                    <form action="{{ route('update') }}" method="post">
                      @csrf
                      <div class="modal fade" id="item-{{ $index + 1 }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                          <div class="modal-content">
                            
                            <div class="modal-header">
                              <h5 class="modal-title" id="exampleModalLabel">{{ $okrModel->where("id", $val->okr_id)->first()->name }}</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <div class="modal-body pt-0">
                              <div class="progress-wrapper" style="padding-top: 0px !important">
                                <div class="progress-info">
                                  <div class="progress-label">
                                    <span style="font-size: .9rem">ความก้าวหน้า</span>
                                  </div>
                                  <div class="progress-percentage">
                                    <span>50%</span>
                                  </div>
                                </div>
                                <div class="progress w-100 mt-2 mb-4">
                                  <div class="progress-bar bg-success" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 50%;"></div>
                                </div>
                              </div>
                              <h2><i class="ni ni-send text-blue"></i> ยื่นผลงาน</h2>
                              <div class="form-group">
                                <label for="deatil">ระเอียดเป้าหมาย</label>
                                <input type="text" name="detail" class="form-control" id="deatil" placeholder="">
                              </div>
                              
                              <div class="form-group">
                                <label for="amount">ค่าเป้าหมาย</label>
                                <input type="number" name="amount" class="form-control" id="amount" placeholder="">
                              </div>

                              <div class="custom-file">
                                <input type="file" class="custom-file-input" id="file" lang="en">
                                <label class="custom-file-label" name="file" for="file">เอกสารยืนยัน</label>
                              </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
                              <button type="submit" class="btn btn-success">บันทึก</button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </form>
                  @else
                    <button style="cursor: no-drop" type="button" class="btn btn-outline-success" disabled>
                      เลือก
                    </button>
                  @endif
                  </td>
                </tr>
              @endforeach
            </tbody>
        </table>
        </div>
    </div>
</div>

<script>
  document.addEventListener("DOMContentLoaded", () => {
    setTimeout(() => {
      const alert = document.querySelector(".alert")
      if (alert) alert.remove()
    }, 5000)
  })
</script>

@include('layouts.footers.auth')
@endsection