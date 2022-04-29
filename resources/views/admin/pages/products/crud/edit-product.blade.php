<!-- Modal -->
<div class="modal fade editProduct" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Update Product</h5>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>

        <form action="<?= route('update.product.details') ?>" method="post" id="update-product-form">
            @csrf

            <div class="modal-body">
                <div class="modal-body py-10 px-lg-27">
                  
                    <div class="row col-md-12">
                        <input type="hidden" name="p_id"/>

                        <div class="col-md-12">
                            <label class="fs-6 fw-bold mb-2">Product Name</label>

                            <input type="text" class="form-control form-control-solid" name="product_name" value=""/>
                            <span class="text-danger error-text product_name_error"></span>
                        </div>

                    
                    </div>

                    <br>
                    <div class="row col-md-12">
                        <!--begin::Label-->
                        <label class="fs-6 fw-bold mb-2">Select image:</label>
                        <!--end::Label-->
                        <input type="file" id="img" name="product_image" accept="image/*">
                       
                        <!--begin::Hint-->
                        <div class="form-text">Allowed file types: png, jpg, jpeg.</div>
                        <!--end::Hint-->
                        <br>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
      </div>
    </div>
  </div>
