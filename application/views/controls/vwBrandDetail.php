
    <? if (isset($products) && ! empty($products)){ ?>
     <?   foreach ($products as $key => $products): 
            ?>
                                        <section class="col-lg-4">
                                            <section class="industries-list1">
                                                <aside class="industries-list">
                                                    <figure class="first">
                                                        <aside class="industries-img"><img src="<? echo base_url($products['image']); ?>" alt=""<? echo $products['name']; ?>"></aside>
                                                    </figure>
                                                    <aside class="industries-main">
                                                        <aside class="industries-text">
                                                            <aside class="industries-te">
                                                            <? echo $this->common->GetshortString(($products['description']), 235); ?>
                                                            </aside>
                                                        </aside>
                                                    </aside>
                                                </aside>
                                                <span><? echo $products['name']; ?></span> </section>
                                        </section>
      <? endforeach; } 
    else { ?>
                <p class="text-center-no-products">Sorry,no product found.</p>
    <?  } ?>


