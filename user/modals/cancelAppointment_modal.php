<div class="modal fade show" id="cancelAppointment_modal" tabindex="-1" aria-modal="true" role="dialog">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Cancel Appointment</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <h5 class="card-title" id="appointment_title"></h5>
        <input type="hidden" name="appointment_id" value="0">
        <h6 class="card-subtitle">Are you sure do you want to cancel this Appointment?</h6>
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary btn-sm" id="btnCancelAppointment"><i class="align-middle fas fa-fw fa-check"></i> YES</button>
        <button class="btn btn-outline-danger btn-sm" data-dismiss="modal"><i class="align-middle fas fa-fw fa-times"></i> Close</button>
      </div>
    </div>
  </div>
</div>