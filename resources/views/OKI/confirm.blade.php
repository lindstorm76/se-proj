<button type="button" class="btn btn-outline-{{ $color }}" data-toggle="modal" data-target="#{{ $modalId }}">
  {{ $name }}
</button>

<div class="modal fade" id="{{ $modalId }}" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">{{ $name }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">ยกเลิก</button>
        <a href="{{ route('okr.delete', ['id' => $id]) }}" class="btn btn-{{ $color }} ">ยืนยัน</a>
      </div>
    </div>
  </div>
</div>