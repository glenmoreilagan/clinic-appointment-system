<div class="modal fade show" id="viewMyAppointment_modal" tabindex="-1" aria-modal="true" role="dialog">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">My Appointment</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="card">
          <div class="card-header"><h3 id="complaint"></h3></div>
          <div class="card-body">
            <h5 class="card-title">Age</h5>
            <p class="card-text" id="age"></p>
            <h5 class="card-title">Date & Time</h5>
            <p class="card-text" id="schedule"></p>
            <h5 class="card-title">Service</h5>
            <p class="card-text" id="service"></p>
            <h5 class="card-title">Status</h5>
            <p class="card-text" id="status"></p>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <!-- <button class="btn btn-danger btn-sm" id="btnCancelAppointment">YES</button> -->
        <button class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>