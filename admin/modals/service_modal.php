<div class="modal fade show" id="service_modal" tabindex="-1" aria-modal="true" role="dialog">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title"></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group mb-1">
          <label for="service">Service</label>
          <input name="service" id="service" type="text" class="form-control form-input">
        </div>
        <div class="form-group mb-1">
          <label for="description">Description</label>
          <textarea name="description" id="description" type="text" class="form-control form-input"></textarea>
        </div>
        <div class="form-group mb-1">
          <label for="duration">Duration</label> <small>(ex. 15 mins, 30 mins)</small>
          <input name="duration" id="duration" type="text" class="form-control form-input">
        </div>
        <div class="form-group mb-1">
          <label for="amount">Amount</label>
          <input name="amount" id="amount" type="text" class="form-control form-input">
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary btn-sm" id="btnSaveService">Save</button>
        <button class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>