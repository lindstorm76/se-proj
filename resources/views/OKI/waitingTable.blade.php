<div class="table-responsive mb-6">
  <div>
    <table class="table align-items-center">
        <thead class="thead-light">
        <tr>
            <th scope="col">ลำดับ</th>
            <th scope="col">ชื่อสกุล</th>
            <th scope="col">หัวข้อ</th>
            <th scope="col">จำนวนเป้าหมาย</th>
            <th scope="col">ไฟล์</th>
            <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @foreach ($data as $index => $val)
          <tr>
            <td scope="col">{{ $index + 1 }}</td>
            <td scope="col">{{ $val["name"] }}</td>
            <td scope="col">{{ $val["subject"] }}</td>
            <td scope="col">{{ $val["amount"] }}</td>
            <td scope="col">file goes here</td>
            <td scope="col">
              @include("OKI.confirm", ["name" => "ไม่อนุมัติ", "modalId" => "cancel-".$index, "color" => "danger", "url" => ""])
              @include("OKI.confirm", ["name" => "อนุมัติ", "modalId" => "confirm".$index, "color" => "success", "url" => ""])
            </td>
          </tr>
        @endforeach
        </tbody>
    </table>
  </div>
</div>