  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Add Jewellery Main Category  </h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo $mainurl; ?>admin-deshboard">Home</a></li>
          <li class="breadcrumb-item">Forms</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->
    <section class="section">
      <div class="row">
        <div class="col-lg-8">

          <div class="card">`
            <div class="card-body">
              <h5 class="card-title">Add Jewellery Category here </h5>

              <!-- Horizontal Form -->
              <form method="post" id="frm1">
                <div class="row mb-3">
                  <label for="inputEmail3" class="col-sm-5 col-form-label">Jewellery Category Name</label>
                  <div class="col-sm-7">
                    <input type="text" name="catname" class="form-control" id="inputText" data-bvalidator="required,alpha">
                  </div>
                </div>
                <div class="row mb-3">
                  <label for="inputEmail3" class="col-sm-5 col-form-label">Added Date</label>
                  <div class="col-sm-7">
                    <input type="date"  name="adddate" class="form-control"data-bvalidator="required" id="inputEmail">
                  </div>
                </div>
                <div class="text-center">
                  <button type="submit" name="addjewellerycat" class="btn btn-primary">Add Jewellery Category</button>
                  <button type="reset" class="btn btn-secondary">Reset</button>
                </div>
              </form><!-- End Horizontal Form -->

            </div>
          </div>

          
  </main><!-- End #main -->

  <!-- bvalidator jquery call here -->
<script>
$(document).ready(function(){
    $("#frm1").bValidator();
});

</script>