

<div id="deposite-modal" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Modal title</h5>
        <button type="button" class="close"  aria-label="Close" onclick="closeModal()">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
         <form action="/deposite" method="POST">
            @csrf
         
            <div class="form-group sponsor_type_new">
                    <label>Deposite Amount <span style="color:red;">*</span></label>
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