<?php
include "./db.php";
if(isset($_POST["hidden"]))
{
    $title=$_POST["edittitle"];
    $description=$_POST["editdescription"];
    $id=$_POST["hidden"];
    $sql="UPDATE `notes` SET `sno`='$id',`title`='$title',`description`='$description' WHERE `sno`='$id'";
    $res=mysqli_query($con,$sql);
}

echo 
'
<!-- Button trigger modal -->
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content bg-dark bg-gradient shadow-lg text-light border-dark">
      <div class="modal-header bg-dark bg-gradient shadow-lg text-light border-dark">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Note</h1>
      </div>
      <div class="modal-body">
      <form class="form bg-dark bg-gradient shadow-lg text-light" action="" method="post">
        <input type="hidden" name="hidden" id="hidden">
      <div class="mb-3">
          <label for="title" class="form-label">Title</label>
          <input type="text" class="form-control" id="edittitle" placeholder="Enter Titel" name="edittitle">
      </div>
      <div class="mb-3">
          <label for="description" class="form-label">Description</label>
          <textarea class="form-control" id="editdescription" rows="3" placeholder="Enter Description..."
              name="editdescription"></textarea>
      </div>
      <button type="submit" class="btn btn-success" name="submit"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="26" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
      <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
      <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
      </svg></button>
  </form>
      </div>
      <div class="modal-footer bg-dark bg-gradient shadow-lg text-light border-dark">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="26" fill="currentColor" class="bi bi-x-square" viewBox="0 0 16 16">
        <path d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"/>
        <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
      </svg></button>
        
      </div>
    </div>
  </div>
</div>

';
?>