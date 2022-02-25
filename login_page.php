<?php include 'header.php' ?>

<div id="loginModal"   aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" >Login to True Value</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form  <form action="login.php" method="post">
  <div class="mb-3">
    <label for="exampleInputId1" class="form-label">Email</label>
    <input type="text" class="form-control" id="exampleInputId1" aria-describedby="IdHelp" name="Email">
    <div id="IdHelp" class="form-text"></div>
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="Password">
  </div>
 
  <input type="submit" class="btn btn-primary" Value="LOGIN" name="submit" >
</form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>


  <?php  include 'footer.php' ?>