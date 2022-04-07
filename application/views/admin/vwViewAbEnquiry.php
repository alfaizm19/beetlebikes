<div class="m-subheader ">
  <div class="d-flex align-items-center">
    <div class="mr-auto">
      <h3 class="m-subheader__title"> <? echo $page_title ?></h3>
    </div>
   <a href="<? echo base_url('admin/abandoned_cart') ?>" class="btn btn-success m-btn m-btn--icon">
              <span> <i class="fa fa-arrow-circle-o-left"></i><span></span>Back</span>
            </a></div>
</div>

<div class="col-sm-12">
  <div class="m-portlet m-portlet--primary m-portlet--head-solid-bg m-portlet--head-sm" data-portlet="true" id="m_portlet_tools_2">

      <div class="m-portlet__body pb-2">
          <table class="table table-bordered tableformat" width="100%">
            <?php 
              if (!empty($cartData)):
                $i=1;
                foreach($cartData as $prod):
                  $price = $prod->mrp;
            ?>
              <tr>
                <th width="30%">Product <?= $i++ ?></th>
                <td width="70%">
                  <p>
                    <strong>Name:</strong> <?= $prod->product_name ?>
                  </p>
                  <p>
                    <strong>SKU:</strong> <?= $prod->sku_code ?>
                  </p>
                  <p>
                    <strong>Available Stock:</strong> <?= $prod->stock ?>
                  </p>
                  <p>
                    <strong>Quantity:</strong> <?= $prod->quantity ?>
                  </p>
                  <p>
                    <strong>MRP:</strong> <?= $price ?>
                  </p>
                  <p>
                    <strong>SP:</strong> <?= $prod->selling_price ?>
                  </p>
                </td>
              </tr>
            <?php endforeach; else: ?>
              <tr>
                <th class="text-center" width="100%">Cart data is empty.</th>
              </tr>
            <?php endif ?>
          </table>

      </div>
  </div>
</div>
