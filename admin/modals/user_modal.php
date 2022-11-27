<div class="modal fade show" id="user_modal" tabindex="-1" aria-modal="true" role="dialog">
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
                    <label for="fname">First Name</label>
                    <input name="fname" id="fname" type="text" class="form-control form-input">
                </div>
                <div class="form-group mb-1">
                    <label for="mname">Middle Name</label>
                    <input name="mname" id="mname" type="text" class="form-control form-input">
                </div>
                <div class="form-group mb-1">
                    <label for="lname">Last Name</label>
                    <input name="lname" id="lname" type="text" class="form-control form-input">
                </div>
                <div class="form-group mb-1">
                    <label for="address">Address</label>
                    <input name="address" id="address" type="text" class="form-control form-input">
                </div>
                <div class="form-group mb-1">
                    <label for="contactno">Contact No.</label>
                    <input name="contactno" id="contactno" type="text" class="form-control form-input" placeholder="
                        Contact Number (ex. 09xxxxx)" minlength="11" maxlength="11" pattern="[0-9]{11}"
                        onCopy="return false" onDrag="return false" onDrop="return false" onPaste="return false"
                        autocomplete="off">
                </div>
                <div class=" form-group mb-1">
                    <label for="email">Email</label>
                    <input name="email" id="email" type="text" class="form-control form-input">
                </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-primary btn-sm" id="btnSaveUser"><i class="align-middle fas fa-fw fa-check"></i>
                    Save</button>
                <button class="btn btn-outline-danger btn-sm" data-dismiss="modal"><i
                        class="align-middle fas fa-fw fa-times"></i> Close</button>
            </div>
        </div>
    </div>
</div>