<div class="modal fade show" id="newPeriod_modal" tabindex="-1" aria-modal="true" role="dialog">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">New Period</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group mb-1">
          <label for="title">Description</label>
          <textarea name="title" id="title" type="text" class="form-control form-input"></textarea>
        </div>
        <!-- <div class="form-group mb-1">
          <label for="description">Description</label>
          <textarea name="description" id="description" type="text" class="form-control form-input"></textarea>
        </div> -->
        <div class="form-group mb-1">
          <label for="start">Start Date</label>
          <input name="start" id="start" type="date" class="form-control form-input">
        </div>
        <div class="form-group mb-1">
          <label for="end">End Date</label>
          <input name="end" id="end" type="date" class="form-control form-input">
          <input name="end_hidden" id="end_hidden" type="date" class="form-control form-input">
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary btn-sm" id="btnSaveNewPeriod"><i class="align-middle fas fa-fw fa-check"></i> Save</button>
        <button class="btn btn-outline-danger btn-sm" data-dismiss="modal"><i class="align-middle fas fa-fw fa-times"></i> Close</button>
      </div>
    </div>
  </div>
</div>