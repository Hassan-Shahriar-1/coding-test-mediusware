

<div id="withdraw-modal" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Withdraw</h5>
        <button type="button" class="close"  aria-label="Close" onclick="closeModal()">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <form action="/withdraw" method="POST">
            @csrf
         
            <div class="form-group sponsor_type_new">
                    <label>Withdraw Amount <span style="color:red;">*</span></label>
                    <input type="text" name="amount"  class="form-control">
            </div>
            
        
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary">Deposite</button>
        <button type="button" class="btn btn-secondary" onclick="closeModal()">Close</button>
      </div>
      </form>
    </div>
  </div>
</div>