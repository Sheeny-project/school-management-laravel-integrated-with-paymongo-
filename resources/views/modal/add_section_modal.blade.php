<form action="{{ route('add.section') }}" method="post">
    @csrf
<div class="modal fade" id="added-section" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Add section</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="mb-3">
                <input
                    type="number"
                    class="form-control"
                    name="subject_id"
                    id="subject-id"
                    aria-describedby="helpId"
                    placeholder=""
                    hidden
                />
            </div>
            <div class="row">
                <div class="col">
                    <div class="mb-3">
                        <label for="" class="form-label">Section</label>
                        <select class="custom-select" id="inputGroupSelect01" name="section_id">
                        <option selected hidden>-- Choose --</option>
                        @foreach ($section as $row)
                            <option value="{{ $row->id }}">{{ $row->name }}</option>
                        @endforeach
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3">
                        <label for="" class="form-label">Slots</label>
                        <input
                            type="number"
                            class="form-control"
                            name="slot"
                            id=""
                            aria-describedby="helpId"
                            placeholder=""
                        />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="mb-3">
                        <label for="" class="form-label">Room</label>
                        <select class="custom-select" id="inputGroupSelect01" name="room_id">
                        <option selected hidden>-- Choose --</option>
                        @foreach ($room as $row)
                            <option value="{{ $row->id }}">{{ $row->room_number }} - {{ $row->get_type->name }}</option>
                        @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="mb-3">
                        <label for="" class="form-label">Time-in</label>
                        <input
                            type="time"
                            class="form-control"
                            name="time_in"
                            id=""
                            aria-describedby="helpId"
                            placeholder=""
                        />
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3">
                        <label for="" class="form-label">Time-out</label>
                        <input
                            type="time"
                            class="form-control"
                            name="time_out"
                            id=""
                            aria-describedby="helpId"
                            placeholder=""
                        />
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <div class="mb-3">
                        <label for="" class="form-label">Day</label>
                        <select class="custom-select" id="inputGroupSelect01" name="day_id">
                          <option selected hidden>-- Choose --</option>
                          @foreach ($day as $row)
                          <option value="{{ $row->id }}">{{ $row->name }}</option>
                          @endforeach
                        </select>
                      </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-sm btn-info add-subject">Add section</button>
        </div>
      </div>
    </div>
  </div>
</form>
