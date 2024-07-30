<?php $this->load->view('pages/template/header', $this->data); ?>
<?php $this->load->view('pages/template/slider') ?>

<section>
  <div class="container">
    <div class="row">
      <div class="col-sm-3">
        <div class="left-sidebar">
          <h2>Category</h2>
          <div class="panel-group category-products" id="accordian"><!--category-productsr-->
            <?php foreach ($category as $key => $cate) { ?>
              <div class="panel panel-default">
                <div class="panel-heading">
                  <h4 class="panel-title">
                    <a href="<?php echo base_url('danh-muc/' . $cate->slug) ?>">
                      <span class="badge pull-right"><i class="fa fa-plus"></i></span>
                      <img src="<?php echo base_url('uploads/category/' . $cate->image) ?>" style="border-radius: 20px"
                        width="20" height="20" alt="$bra->title">
                      <?php echo $cate->title ?>
                    </a>
                  </h4>
                </div>
                <div id="<?php echo $cate->slug ?>" class="panel-collapse collapse">
                  <div class="panel-body">
                    <ul>
                      <li><a href="#">Fendi</a></li>
                      <li><a href="#">Guess</a></li>

                    </ul>
                  </div>
                </div>
              </div>
            <?php } ?>

          </div><!--/category-products-->

          <div class="brands_products"><!--brands_products-->
            <h2>Brands</h2>
            <div class="brands-name">
              <ul class="nav nav-pills nav-stacked">
                <?php foreach ($brand as $key => $bra) { ?>
                  <li>
                    <a href="<?php echo base_url('thuong-hieu/' . $bra->slug) ?>"> <span class="pull-right">(50)</span>
                      <img src="<?php echo base_url('uploads/brand/' . $bra->image) ?>" style="border-radius: 20px"
                        width="20" height="20" alt="$bra->title">
                      <?php echo $bra->title ?>
                    </a>
                  </li>
                <?php } ?>
              </ul>
            </div>
          </div><!--/brands_products-->

          <div class="price-range"><!--price-range-->
            <h2>Price Range</h2>
            <div class="well text-center">
              <input type="text" class="span2" value="" data-slider-min="0" data-slider-max="600" data-slider-step="5"
                data-slider-value="[250,450]" id="sl2"><br />
              <b class="pull-left">$ 0</b> <b class="pull-right">$ 600</b>
            </div>
          </div><!--/price-range-->

          <div class="shipping text-center"><!--shipping-->
            <img src="images/home/shipping.jpg" alt="" />
          </div><!--/shipping-->

        </div>
      </div>

      <div class="col-sm-9 padding-right">
        <div class="features_items"><!--features_items-->
          <h2 class="title text-center">Features Items</h2>

          <?php foreach ($products as $key => $pro) { ?>
            <div class="col-sm-4">
              <div class="product-image-wrapper">
                <div class="single-products">
                  <div class="productinfo text-center">
                    <?php if ($pro->image) { ?>
                      <img src="<?php echo base_url('/uploads/product/' . $pro->image) ?>" height="254" alt="no image" />
                    <?php } else { ?>
                      <img src="<?php echo base_url('/uploads/noimage.png') ?>" height="254" alt="no image" />
                    <?php } ?>
                    <h2>$56</h2>
                    <p><?php echo $pro->title ?></p>
                    <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                  </div>
                  <div class="product-overlay">
                    <div class="overlay-content">
                      <h2>$56</h2>
                      <p><?php echo $pro->description ?></p>
                      <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to cart</a>
                    </div>
                  </div>
                </div>
                <div class="choose">
                  <ul class="nav nav-pills nav-justified">
                    <li><a href="#"><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                    <li><a href="#"><i class="fa fa-plus-square"></i>Add to compare</a></li>
                  </ul>
                </div>
              </div>
            </div>
          <?php } ?>

        </div><!--features_items-->

        <div class="category-tab"><!--category-tab-->
          <div class="col-sm-12">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tshirt" data-toggle="tab">T-Shirt</a></li>
              <li><a href="#blazers" data-toggle="tab">Blazers</a></li>
              <li><a href="#sunglass" data-toggle="tab">Sunglass</a></li>
              <li><a href="#kids" data-toggle="tab">Kids</a></li>
              <li><a href="#poloshirt" data-toggle="tab">Polo shirt</a></li>
            </ul>
          </div>
          <div class="tab-content">
            <div class="tab-pane fade active in" id="tshirt">
              <div class="col-sm-3">
                <div class="product-image-wrapper">
                  <div class="single-products">
                    <div class="productinfo text-center">
                      <img src="images/home/gallery1.jpg" alt="" />
                      <h2>$56</h2>
                      <p>Easy Polo Black Edition</p>
                      <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to
                        cart</a>
                    </div>

                  </div>
                </div>
              </div>
              <div class="col-sm-3">
                <div class="product-image-wrapper">
                  <div class="single-products">
                    <div class="productinfo text-center">
                      <img src="images/home/gallery2.jpg" alt="" />
                      <h2>$56</h2>
                      <p>Easy Polo Black Edition</p>
                      <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to
                        cart</a>
                    </div>

                  </div>
                </div>
              </div>
              <div class="col-sm-3">
                <div class="product-image-wrapper">
                  <div class="single-products">
                    <div class="productinfo text-center">
                      <img src="images/home/gallery3.jpg" alt="" />
                      <h2>$56</h2>
                      <p>Easy Polo Black Edition</p>
                      <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to
                        cart</a>
                    </div>

                  </div>
                </div>
              </div>
              <div class="col-sm-3">
                <div class="product-image-wrapper">
                  <div class="single-products">
                    <div class="productinfo text-center">
                      <img src="images/home/gallery4.jpg" alt="" />
                      <h2>$56</h2>
                      <p>Easy Polo Black Edition</p>
                      <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to
                        cart</a>
                    </div>

                  </div>
                </div>
              </div>
            </div>

            <div class="tab-pane fade" id="blazers">
              <div class="col-sm-3">
                <div class="product-image-wrapper">
                  <div class="single-products">
                    <div class="productinfo text-center">
                      <img src="images/home/gallery4.jpg" alt="" />
                      <h2>$56</h2>
                      <p>Easy Polo Black Edition</p>
                      <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to
                        cart</a>
                    </div>

                  </div>
                </div>
              </div>
              <div class="col-sm-3">
                <div class="product-image-wrapper">
                  <div class="single-products">
                    <div class="productinfo text-center">
                      <img src="images/home/gallery3.jpg" alt="" />
                      <h2>$56</h2>
                      <p>Easy Polo Black Edition</p>
                      <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to
                        cart</a>
                    </div>

                  </div>
                </div>
              </div>
              <div class="col-sm-3">
                <div class="product-image-wrapper">
                  <div class="single-products">
                    <div class="productinfo text-center">
                      <img src="images/home/gallery2.jpg" alt="" />
                      <h2>$56</h2>
                      <p>Easy Polo Black Edition</p>
                      <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to
                        cart</a>
                    </div>

                  </div>
                </div>
              </div>
              <div class="col-sm-3">
                <div class="product-image-wrapper">
                  <div class="single-products">
                    <div class="productinfo text-center">
                      <img src="images/home/gallery1.jpg" alt="" />
                      <h2>$56</h2>
                      <p>Easy Polo Black Edition</p>
                      <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to
                        cart</a>
                    </div>

                  </div>
                </div>
              </div>
            </div>

            <div class="tab-pane fade" id="sunglass">
              <div class="col-sm-3">
                <div class="product-image-wrapper">
                  <div class="single-products">
                    <div class="productinfo text-center">
                      <img src="images/home/gallery3.jpg" alt="" />
                      <h2>$56</h2>
                      <p>Easy Polo Black Edition</p>
                      <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to
                        cart</a>
                    </div>

                  </div>
                </div>
              </div>
              <div class="col-sm-3">
                <div class="product-image-wrapper">
                  <div class="single-products">
                    <div class="productinfo text-center">
                      <img src="images/home/gallery4.jpg" alt="" />
                      <h2>$56</h2>
                      <p>Easy Polo Black Edition</p>
                      <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to
                        cart</a>
                    </div>

                  </div>
                </div>
              </div>
              <div class="col-sm-3">
                <div class="product-image-wrapper">
                  <div class="single-products">
                    <div class="productinfo text-center">
                      <img src="images/home/gallery1.jpg" alt="" />
                      <h2>$56</h2>
                      <p>Easy Polo Black Edition</p>
                      <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to
                        cart</a>
                    </div>

                  </div>
                </div>
              </div>
              <div class="col-sm-3">
                <div class="product-image-wrapper">
                  <div class="single-products">
                    <div class="productinfo text-center">
                      <img src="images/home/gallery2.jpg" alt="" />
                      <h2>$56</h2>
                      <p>Easy Polo Black Edition</p>
                      <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to
                        cart</a>
                    </div>

                  </div>
                </div>
              </div>
            </div>

            <div class="tab-pane fade" id="kids">
              <div class="col-sm-3">
                <div class="product-image-wrapper">
                  <div class="single-products">
                    <div class="productinfo text-center">
                      <img src="images/home/gallery1.jpg" alt="" />
                      <h2>$56</h2>
                      <p>Easy Polo Black Edition</p>
                      <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to
                        cart</a>
                    </div>

                  </div>
                </div>
              </div>
              <div class="col-sm-3">
                <div class="product-image-wrapper">
                  <div class="single-products">
                    <div class="productinfo text-center">
                      <img src="images/home/gallery2.jpg" alt="" />
                      <h2>$56</h2>
                      <p>Easy Polo Black Edition</p>
                      <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to
                        cart</a>
                    </div>

                  </div>
                </div>
              </div>
              <div class="col-sm-3">
                <div class="product-image-wrapper">
                  <div class="single-products">
                    <div class="productinfo text-center">
                      <img src="images/home/gallery3.jpg" alt="" />
                      <h2>$56</h2>
                      <p>Easy Polo Black Edition</p>
                      <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to
                        cart</a>
                    </div>

                  </div>
                </div>
              </div>
              <div class="col-sm-3">
                <div class="product-image-wrapper">
                  <div class="single-products">
                    <div class="productinfo text-center">
                      <img src="images/home/gallery4.jpg" alt="" />
                      <h2>$56</h2>
                      <p>Easy Polo Black Edition</p>
                      <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to
                        cart</a>
                    </div>

                  </div>
                </div>
              </div>
            </div>

            <div class="tab-pane fade" id="poloshirt">
              <div class="col-sm-3">
                <div class="product-image-wrapper">
                  <div class="single-products">
                    <div class="productinfo text-center">
                      <img src="images/home/gallery2.jpg" alt="" />
                      <h2>$56</h2>
                      <p>Easy Polo Black Edition</p>
                      <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to
                        cart</a>
                    </div>

                  </div>
                </div>
              </div>
              <div class="col-sm-3">
                <div class="product-image-wrapper">
                  <div class="single-products">
                    <div class="productinfo text-center">
                      <img src="images/home/gallery4.jpg" alt="" />
                      <h2>$56</h2>
                      <p>Easy Polo Black Edition</p>
                      <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to
                        cart</a>
                    </div>

                  </div>
                </div>
              </div>
              <div class="col-sm-3">
                <div class="product-image-wrapper">
                  <div class="single-products">
                    <div class="productinfo text-center">
                      <img src="images/home/gallery3.jpg" alt="" />
                      <h2>$56</h2>
                      <p>Easy Polo Black Edition</p>
                      <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to
                        cart</a>
                    </div>

                  </div>
                </div>
              </div>
              <div class="col-sm-3">
                <div class="product-image-wrapper">
                  <div class="single-products">
                    <div class="productinfo text-center">
                      <img src="images/home/gallery1.jpg" alt="" />
                      <h2>$56</h2>
                      <p>Easy Polo Black Edition</p>
                      <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to
                        cart</a>
                    </div>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div><!--/category-tab-->

        <div class="recommended_items"><!--recommended_items-->
          <h2 class="title text-center">recommended items</h2>

          <div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
              <div class="item active">
                <div class="col-sm-4">
                  <div class="product-image-wrapper">
                    <div class="single-products">
                      <div class="productinfo text-center">
                        <img src="images/home/recommend1.jpg" alt="" />
                        <h2>$56</h2>
                        <p>Easy Polo Black Edition</p>
                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to
                          cart</a>
                      </div>

                    </div>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="product-image-wrapper">
                    <div class="single-products">
                      <div class="productinfo text-center">
                        <img src="images/home/recommend2.jpg" alt="" />
                        <h2>$56</h2>
                        <p>Easy Polo Black Edition</p>
                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to
                          cart</a>
                      </div>

                    </div>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="product-image-wrapper">
                    <div class="single-products">
                      <div class="productinfo text-center">
                        <img src="images/home/recommend3.jpg" alt="" />
                        <h2>$56</h2>
                        <p>Easy Polo Black Edition</p>
                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to
                          cart</a>
                      </div>

                    </div>
                  </div>
                </div>
              </div>
              <div class="item">
                <div class="col-sm-4">
                  <div class="product-image-wrapper">
                    <div class="single-products">
                      <div class="productinfo text-center">
                        <img src="images/home/recommend1.jpg" alt="" />
                        <h2>$56</h2>
                        <p>Easy Polo Black Edition</p>
                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to
                          cart</a>
                      </div>

                    </div>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="product-image-wrapper">
                    <div class="single-products">
                      <div class="productinfo text-center">
                        <img src="images/home/recommend2.jpg" alt="" />
                        <h2>$56</h2>
                        <p>Easy Polo Black Edition</p>
                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to
                          cart</a>
                      </div>

                    </div>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="product-image-wrapper">
                    <div class="single-products">
                      <div class="productinfo text-center">
                        <img src="images/home/recommend3.jpg" alt="" />
                        <h2>$56</h2>
                        <p>Easy Polo Black Edition</p>
                        <a href="#" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Add to
                          cart</a>
                      </div>

                    </div>
                  </div>
                </div>
              </div>
            </div>
            <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
              <i class="fa fa-angle-left"></i>
            </a>
            <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
              <i class="fa fa-angle-right"></i>
            </a>
          </div>
        </div><!--/recommended_items-->

      </div>
    </div>
  </div>
</section>
<?php $this->load->view('pages/template/footer'); ?>