<div class="table-responsive mb-6">
  <div>
    <table class="table align-items-center" style="width: 100%">
        <thead class="thead-light">
        <tr>
          <th scope="col">ลำดับ</th>
          <th scope="col">ชื่อ</th>
          <th scope="col">ตำแหน่ง</th>
          <th scope="col">สังกัด</th>
          <th scope="col"></th>
        </tr>
        </thead>
        <tbody>
        @foreach ($data as $index => $val)
          <tr>
            <td scope="col">{{ $index + 1 }}</td>
            <td scope="col">{{ $val["subject"] }}</td>
            <td scope="col">{{ $val["unit"] }}</td>
            <td scope="col">
              @include("OKI.forms.edit", ["id" => $val["id"], "category" => $val["category"], "subject" => $val["subject"], "detail" => $val["detail"], "unit" => $val["unit"] ])
              @include("OKI.confirm", ["name" => "ลบ", "id" => "remove-".$index, "color" => "danger"])
            </td>
          </tr>
        @endforeach
        </tbody>
    </table>
  </div>
</div>