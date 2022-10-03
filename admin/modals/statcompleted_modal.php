<div class="modal fade show" id="statcompleted_modal" tabindex="-1" aria-modal="true" role="dialog">
  <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Transaction</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group mb-1">
          <label for="pregnant">Pregnant</label>
          <select name="pregnant" id="pregnant" type="text" class="form-control form-input">
            <option value="Not Pregnant">Not Pregnant</option>
            <option value="Week 1 Pregnant">Week 1 Pregnant</option>
            <option value="Week 2 Pregnant">Week 2 Pregnant</option>
            <option value="Week 3 Pregnant">Week 3 Pregnant</option>
            <option value="Week 4 Pregnant">Week 4 Pregnant</option>
            <option value="Week 5 Pregnant">Week 5 Pregnant</option>
            <option value="Week 6 Pregnant">Week 6 Pregnant</option>
            <option value="Week 7 Pregnant">Week 7 Pregnant</option>
            <option value="Week 8 Pregnant">Week 8 Pregnant</option>
            <option value="Week 9 Pregnant">Week 9 Pregnant</option>
          </select>
          
          <label for="service">Service</label>
          <input name="service" id="service" type="text" class="form-control form-input" readonly>
          
          <label for="other_service">Other Service</label>
          <input name="other_service" id="other_service" type="text" class="form-control form-input">
          
          <label for="findings">Findings</label>
          <textarea name="findings" id="findings" type="text" class="form-control form-input"></textarea>
          
          <label for="cost">Cost</label>
          <input name="cost" id="cost" type="text" class="form-control form-input" readonly>
          
          <label for="other_charges">Other Charges</label>
          <input name="other_charges" id="other_charges" type="text" class="form-control form-input" value="0.00">

          <label for="total_cost">Total Cost</label>
          <input name="total_cost" id="total_cost" type="text" class="form-control form-input" readonly>

          <!-- <label>Payment Method</label>
          <label class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="payment_method" value="cash">
            <span class="form-check-label">Cash</span>
          </label>
          <label class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="payment_method" value="online">
            <span class="form-check-label">Online</span>
          </label> -->
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary btn-sm" id="btnPaid"><i class="align-middle fas fa-fw fa-check"></i> Pay</button>
        <button class="btn btn-outline-danger btn-sm" data-dismiss="modal"><i class="align-middle fas fa-fw fa-times"></i> Close</button>
      </div>
    </div>
  </div>
</div>