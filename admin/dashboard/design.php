<?php include '../crud/dashboardTemplate.php'?>
<!--css style -->
<style>
   textarea {
      -webkit-box-sizing: border-box;
      -moz-box-sizing: border-box;
      box-sizing: border-box;
      width: 100%;
   }

   td,
   th {
      font-size: smaller;
      text-align: center;
   }

   #tableModalDetails td {
      text-align: left;
   }

   #tableModalHeadDetails th {
      font-size: larger;
      color: #5a95d9;
   }

   #detailCloseButton {
      border: #da4453 1px solid;
      border-radius: 4px;
      color: #da4453;
   }

   #EditModalLabel {
      color: #5a95d9;
   }

   #spanExport {
      font-size: larger;
   }

   .labelLinkDesign {
      text-align: center;
   }

   .filterToggle:hover {
      background-color: #E7E7E7;
   }
</style>
<?php nav(); ?>
<!--modal delete Design -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel"
   aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h3 class="modal-title" id="deleteModalLabel"><i class="fas fa-trash fa-1x"></i> Delete Design</h3>
         </div>
         <div class="modal-body">
            <div class="container">
               <h4><i class="fas fa-exclamation-triangle red"></i> Are You sure You Want To Delete This
                  Design ?</h4>
               <input type="text" id="deletedDesignCode" hidden>
            </div>
         </div>
         <div class="modal-footer">
            <button type="button" id="detailCloseButton" class="btn btn-secondary" data-dismiss="modal">
               Cancel
            </button>
            <input type="button" class="btn btn-danger" data-dismiss="modal" value="Delete" onclick="DeleteDesign()">
         </div>
      </div>
   </div>
</div>
<!--end modal delete Design  -->

<!-- success Modal -->
<div class="modal fade" id="successModal" tabindex="-1" role="dialog" aria-labelledby="successModalLabel"
   aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content grey">

         <div class="modal-body transparent">
            <div class="container">
               <div class="row">
                  <div class="col-md-3"></div>
                  <div class="col-md-6">
                     <div class="row">
                        <div class="col-md-3"></div>
                        <div class="col-md-6"><i class="icon-checkmark font-large-5 green"></i></div>
                        <div class="col-md-3"></div>
                     </div>
                  </div>
               </div>
               <div class="col-md-3"></div>
            </div>
            <div class="row">
               <div class="col-md-3"></div>
               <div class="col-md-6">
                  <h1 class="black">Added Successfully</h1>
               </div>
               <div class="col-md-3"></div>
            </div>
         </div>
      </div>
   </div>
</div>

<!-- main content _____________________________-->
<div class="main">
   <!--main here -->
   <!-- Button trigger modal -->
   <button type="button" hidden class="btn btn-primary" data-toggle="modal" id="SuccesAssign"
      data-target="#successModal">
   </button>

   <!-- add button * -->
   <div class="row">
      <button type="submit" class="btn btn-success btn-small mb-4 " data-toggle="modal" data-target="#addDesignModal"
         >
         <i class="icon-plus"></i>
         Add New Design
      </button>
      <br /><br />
   </div>


   <!--table Design *-->
   <table class="table table-striped" id="example">
      <thead>
         <tr>
            <th>Category</th>
            <th>Design Label</th>
            <th>Description</th>
            <th>Added At</th>
            <th>Image</th>
            <th>Edit</th>
            <th>Delete</th>
         </tr>
      </thead>
      <tbody id="tbodyInfos"></tbody>
   </table>
</div>
<!--end Main Content ____________________________-->


<!-- Modal Add new Design _____________________________________________________________________________-->
<div class="modal fade" id="addDesignModal" tabindex="-1" role="dialog" aria-labelledby="addDesignModalLabel"
   aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="addDesignModalLabel"><span><i class="icon-pencil2"></i> Add New Design </span></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <!-- add new Modal *********************-->
         <div class="modal-body">
            <!-- form-->
            <div class="container">
            <form method="post" action="phpFiles/Design.service.php" enctype="multipart/form-data">
                  <div class="row">
                  <div class="form-group col-md-12">
                <label style="cursor:pointer;" class="form-control" for="fileimagesAdd"> Add Pictures <sup>*</sup>&nbsp; <i class="icon-image"></i></label>
                                <div class="controls">
                                    <input type="file" hidden id="fileimagesAdd" name="image[]"   value="select 3 images"  multiple>
                                </div>
                </div>
                <div class="form-group col-md-12">
                <div class="controls">          
                                        <div class="col-md-4"><img class="form-control" src="" alt="" id="image1" 
                                        style="width: 100px; border: 1px dotted gray; padding-right: 10px;"></div>
                                        <div class="col-md-4"><img class="form-control" src="" alt="" id="image2" 
                                        style="width: 100px; border: 1px dotted gray; padding-right: 10px;"></div>
                                        <div class="col-md-4"><img class="form-control" src="" alt="" id="image3" 
                                        style="width: 100px; border: 1px dotted gray; padding-right: 10px;"></div>                               
                </div>
                </div>
                  </div>
                  <div class="row">
                     <div class="form-group col-md-6">
                        <label for="exampleInputEmail1">Design Label <span class="verified"><i class="icon-eye"></i></span></label>
                        <input type="text" class="form-control" name="DesignFNameSubscribe" id="DesignFNameSubscribe" aria-describedby="emailHelp"
                           required />
                     </div>

                     <div class="form-group col-md-6">
                     <label for="exampleInputEmail1">Design Category <span class="verified"><i class="icon-sina-weibo"></i></span></label>
                     <select name="designCategoryAdd" class="form-control" id="designCategoryAdd">
                        <!--categories here-->
                     </select>
                     </div>
                  </div>

                  <div class="row">
                   <div class="form-group">
                     <label for="exampleInputEmail1">Design Description <span class="verified"><i class="icon-paper"></i></span></label>
                     <br />
                     <textarea name="designDescriptionAdd" id="designDescriptionAdd" cols="83" rows="3" required></textarea>
                   </div>
                  </div>

                  <div class="row">
                     <div class="alertAddModal"></div>
                  </div>
                  <div class="modal-footer">
                     <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        Close
                     </button>
                     <button type="submit" class="btn btn-primary">
                        Validate
                     </button>
                  </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
<!--end Modal Add new Design___________________________________________________________________________-->

<!--modal2 Design details -->
<div class="modal modalD fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="designDetailsLabel"
   aria-hidden="true">
   <div class="modal-dialog">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="desinDetailsLabel">Design Details</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
               <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body">
            <div class="container">
               <div class="table-responsive">
                  <table class="table table-striped">
                     <thead id="tableModalHeadDetails">
                        <tr>
                           <th colspan="2">Informations</th>
                        </tr>
                     </thead>
                     <tbody id="tableModalDetails"></tbody>
                  </table>
               </div>
            </div>
         </div>
         <div class="modal-footer">
            <button type="button" id="detailCloseButton" class="btn btn-secondary" data-dismiss="modal modalD">
               Close
            </button>
         </div>
      </div>
   </div>
</div>
<!--end modal 2 Design details -->



   <!--scripts -->
   <script src="js/Design.js"></script>
   <?php footer() ?>