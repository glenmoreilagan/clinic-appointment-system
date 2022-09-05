<div class="modal fade show" id="patient_modal" tabindex="-1" aria-modal="true" role="dialog">
  <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Patient Records</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <label class="card-title">Patient Name: <span id="pname"></span></label> 
        <table class="table table-striped">
          <thead>
            <tr>
              <th>Date & Time</th>
              <th>Chief Complaint</th>
              <th>Service</th>
            </tr>
          </thead>
          <tbody id="patient_history_list"></tbody>
        </table>
      </div>
      <div class="modal-footer">
        <!-- <button class="btn btn-primary btn-sm" id="btnSaveSchedule"><i class="align-middle fas fa-fw fa-check"></i> Save</button> -->
        <button class="btn btn-outline-danger btn-sm" data-dismiss="modal"><i class="align-middle fas fa-fw fa-times"></i> Close</button>
      </div>
    </div>
  </div>
</div>