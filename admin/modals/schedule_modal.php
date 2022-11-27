<div class="modal fade show" id="schedule_modal" tabindex="-1" aria-modal="true" role="dialog">
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
          <label for="date_schedule">Date</label></small>
          <input name="date_schedule" id="date_schedule" type="date" class="form-control form-input" onkeydown="return false">
        </div>
        <div class="form-group mb-1">
          <label for="time_schedule">Time</label>
          <input name="time_schedule" id="time_schedule" type="time" class="form-control form-input">
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary btn-sm" id="btnSaveSchedule"><i class="align-middle fas fa-fw fa-check"></i> Save</button>
        <button class="btn btn-outline-danger btn-sm" data-dismiss="modal"><i class="align-middle fas fa-fw fa-times"></i> Close</button>
      </div>
    </div>
  </div>
</div>