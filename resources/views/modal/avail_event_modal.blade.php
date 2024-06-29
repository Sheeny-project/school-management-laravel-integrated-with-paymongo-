<form action="{{ route('payment.pay') }}" method="post">
    @csrf
<div class="modal fade" id="avail-event" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="staticBackdropLabel">Event details</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <input type="hidden" name="id" id="event-id">
        <div class="modal-body">
          <div class="mb-3">
            <label for="" class="form-label">Event Name</label>
            <input
                type="text"
                class="form-control"
                name="name"
                id="event-name"
                aria-describedby="helpId"
                placeholder=""
                readonly
            />
          </div>
            <div class="mb-3">
                <label for="" class="form-label">Description</label>
                <textarea class="form-control" name="description" id="event-desc" rows="4" readonly></textarea>
            </div>
            <div class="row mb-3">
                <div class="col">
                    <div class="mb-3">
                        <label for="" class="form-label">Event Price</label>
                        <input
                            type="number"
                            class="form-control"
                            name="amount"
                            id="event-price"
                            aria-describedby="helpId"
                            placeholder=""
                            readonly
                        />
                      </div>
                </div>
                <div class="col">
                    <div class="mb-3">
                        <label for="" class="form-label">Event Date</label>
                        <input
                            type="text"
                            class="form-control"
                            name=""
                            id="event-date"
                            aria-describedby="helpId"
                            placeholder=""
                            readonly
                        />
                      </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-sm btn-info">Purchase</button>
        </div>
      </div>
    </div>
  </div>
</form>
