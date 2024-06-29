<form action="{{ route('add.subject') }}" method="post">
    @csrf
<div class="modal fade" id="add-subject" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Add subject</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <input type="number" id="course-id" name="course_id" hidden>
          <div class="row">
            <div class="col-8">
                <div class="mb-3">
                    <label for="" class="form-label">Subject Name</label>
                    <input
                        type="text"
                        class="form-control"
                        name="name"
                        id=""
                        aria-describedby="helpId"
                        placeholder=""
                    />
                  </div>
            </div>
            <div class="col-4">
                <div class="mb-3">
                    <label for="" class="form-label">Subject Code</label>
                    <input
                        type="text"
                        class="form-control"
                        name="subject_code"
                        id=""
                        aria-describedby="helpId"
                        placeholder=""
                    />
                  </div>
            </div>
          </div>
            <div class="mb-3">
                <label for="" class="form-label">Description</label>
                <textarea class="form-control" name="subject_description" id="" rows="4"></textarea>
            </div>
            <div class="row">
                <div class="col">
                    <div class="mb-3">
                        <label for="" class="form-label">Lecture units</label>
                        <input
                            type="number"
                            class="form-control"
                            name="lec_units"
                            id=""
                            aria-describedby="helpId"
                            placeholder=""
                        />
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3">
                        <label for="" class="form-label">Laboratory units</label>
                        <input
                            type="number"
                            class="form-control"
                            name="lab_units"
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
                        <label for="" class="form-label">Year</label>
                        <select class="form-control" name="availability">
                            <option>-- Choose --</option>
                            @foreach ($year as $row)
                                <option value="{{ $row->id }}">{{ $row->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3">
                        <label for="" class="form-label">Semester</label>
                        <select class="form-control" name="availability">
                            <option>-- Choose --</option>
                            @foreach ($semester as $value)
                                <option value="{{ $value->id }}">{{ $value->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-sm btn-info">Submit</button>
        </div>
      </div>
    </div>
  </div>
</form>
