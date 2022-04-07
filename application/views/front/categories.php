    <!--breadcrumbs-area start -->
    <div class="breadcrumbs-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ul>
                        <li><a href="<?php echo base_url();?>">Home</a> <span><i class="fa fa-angle-right"></i></span></li>
                        <li>Categories</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!--breadcrumbs-area end -->

    <!--shop-area start-->
    <div class="shop-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="shop-item-filter">
                        <div class="toolber-form  middle">
                           <p class="filter-title">Show: </p>
                            <div class="filter-form show-form">
                                <select  id="CategoiresOnPage">
                                    <option value="9">9</option>
                                    <option value="12">12</option>
                                    <option value="14">14</option>
                                    <option value="16">16</option>
                                </select>
                            </div>
                        </div>
                        <!--tab-list start-->
                        <div class="shop-tab">
                            <ul role="tablist">
                                <li role="presentation" class="active"  id="categoryTabGrid">
                                    <a href="#grid-view" aria-controls="grid-view" role="tab" data-toggle="tab"><i class="fa fa-th"></i>
                                    </a>
                                </li>
                                <li role="presentation" id="categoryTabList">
                                    <a href="#list-view" aria-controls="list-view" role="tab" data-toggle="tab"><i class="fa fa-th-list"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <!--tab-list end-->
                    </div>
                    
                    <div id="ajaxCategoiresFilter">
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--shop-area end-->
   