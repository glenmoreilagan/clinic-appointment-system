<div class="modal fade show" id="newAppointment_modal" tabindex="-1" aria-modal="true" role="dialog">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">New Appointment</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group mb-1">
          <label for="complaint">Chief Complaint</label>
          <textarea name="complaint" id="complaint" type="text" class="form-control form-input"></textarea>
        </div>
        <div class="form-group mb-1">
          <label for="age">Age</label>
          <input name="age" id="age" type="text" class="form-control form-input">
        </div>
        <div class="form-group mb-1">
          <label for="date_schedule">Date</label>
          <input name="date_sched" id="date_schedule" type="date" class="form-control form-input" readonly>
        </div>
        <div class="form-group mb-1">
          <label>Selected Time</label><br>
          <input name="time_sched" id="time_schedule" type="time" class="form-control form-input mb-3" readonly>
        </div>
        <div class="form-group mb-1">
          <label>Available Time</label><br>
          <button class="btn btn-primary btn-sm mb-1 available-time" data-time='11:00'>11:00 am</button>
          <button class="btn btn-primary btn-sm mb-1 available-time" data-time='13:00'>1:00 pm</button>
          <button class="btn btn-primary btn-sm mb-1 available-time" data-time='12:00'>12:00 nn</button>
          <button class="btn btn-primary btn-sm mb-1 available-time" data-time='00:00'>12:00 am</button>
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary btn-sm" id="btnSaveNewAppointment">Save</button>
        <button class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>