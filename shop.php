<?php
   function getLatest($i){
       include('config.php');
       $lastsel = mysqli_query($con, "SELECT * FROM dishes ORDER BY d_id DESC LIMIT 6 ");
       $result = array();
       while ($lastsel1 = mysqli_fetch_array($lastsel)) {
           $result[] = array(
            'id'=>$lastsel1['d_id'],
               'img' => $lastsel1['img'],
               'title' => $lastsel1['title'],
               'price' => $lastsel1['price']
           );
       }
       return $result[$i];
   }
   
   ?>
<section class="latest-product spad">
   <div class="container">
      <div class="row">
         <!--latest products start-->
         <div class="col-lg-4 col-md-6">
            <div class="latest-product__text">
               <h4>Latest Products</h4>
               <div class="latest-product__slider owl-carousel">
                  <div class="latest-prdouct__slider__item">
                     <?php for ($i = 0; $i < 3; $i++) { ?>
                     <a href="<?php echo getLatest($i)['id']; ?>" class="latest-product__item">
                        <div class="latest-product__item__pic">
                           <img src="<?php echo getLatest($i)['img']; ?>" alt="">
                        </div>
                        <div class="latest-product__item__text">
                           <h6><?php echo getLatest($i)['title']; ?></h6>
                           <span>$<?php echo getLatest($i)['price']; ?></span>
                        </div>
                     </a>
                     <?php } ?>
                  </div>
                  <div class="latest-prdouct__slider__item">
                     <?php for ($i = 3; $i < 6; $i++) { ?>
                     <a href="<?php echo getLatest($i)['id']; ?>" class="latest-product__item">
                        <div class="latest-product__item__pic">
                           <img src="<?php echo getLatest($i)['img']; ?>" alt="">
                        </div>
                        <div class="latest-product__item__text">
                           <h6><?php echo getLatest($i)['title']; ?></h6>
                           <span>$<?php echo getLatest($i)['price']; ?></span>
                        </div>
                     </a>
                     <?php } ?>
                  </div>
               </div>
            </div>
         </div>
         <!--latest products end-->
         <div class="col-lg-4 col-md-6">
            <div class="latest-product__text">
               <h4>Top Rated Products</h4>
               <div class="latest-product__slider owl-carousel">
                  <div class="latest-prdouct__slider__item">
                     <a href="#" class="latest-product__item">
                        <div class="latest-product__item__pic">
                           <img src="img/latest-product/lp-1.jpg" alt="">
                        </div>
                        <div class="latest-product__item__text">
                           <h6>Crab Pool Security</h6>
                           <span>$30.00</span>
                        </div>
                     </a>
                     <a href="#" class="latest-product__item">
                        <div class="latest-product__item__pic">
                           <img src="img/latest-product/lp-2.jpg" alt="">
                        </div>
                        <div class="latest-product__item__text">
                           <h6>Crab Pool Security</h6>
                           <span>$30.00</span>
                        </div>
                     </a>
                     <a href="#" class="latest-product__item">
                        <div class="latest-product__item__pic">
                           <img src="img/latest-product/lp-3.jpg" alt="">
                        </div>
                        <div class="latest-product__item__text">
                           <h6>Crab Pool Security</h6>
                           <span>$30.00</span>
                        </div>
                     </a>
                  </div>
                  <div class="latest-prdouct__slider__item">
                     <a href="#" class="latest-product__item">
                        <div class="latest-product__item__pic">
                           <img src="img/latest-product/lp-1.jpg" alt="">
                        </div>
                        <div class="latest-product__item__text">
                           <h6>Crab Pool Security</h6>
                           <span>$30.00</span>
                        </div>
                     </a>
                     <a href="#" class="latest-product__item">
                        <div class="latest-product__item__pic">
                           <img src="img/latest-product/lp-2.jpg" alt="">
                        </div>
                        <div class="latest-product__item__text">
                           <h6>Crab Pool Security</h6>
                           <span>$30.00</span>
                        </div>
                     </a>
                     <a href="#" class="latest-product__item">
                        <div class="latest-product__item__pic">
                           <img src="img/latest-product/lp-3.jpg" alt="">
                        </div>
                        <div class="latest-product__item__text">
                           <h6>Crab Pool Security</h6>
                           <span>$30.00</span>
                        </div>
                     </a>
                  </div>
               </div>
            </div>
         </div>
         <div class="col-lg-4 col-md-6">
            <div class="latest-product__text">
               <h4>Review Products</h4>
               <div class="latest-product__slider owl-carousel">
                  <div class="latest-prdouct__slider__item">
                     <a href="#" class="latest-product__item">
                        <div class="latest-product__item__pic">
                           <img src="img/latest-product/lp-1.jpg" alt="">
                        </div>
                        <div class="latest-product__item__text">
                           <h6>Crab Pool Security</h6>
                           <span>$30.00</span>
                        </div>
                     </a>
                     <a href="#" class="latest-product__item">
                        <div class="latest-product__item__pic">
                           <img src="img/latest-product/lp-2.jpg" alt="">
                        </div>
                        <div class="latest-product__item__text">
                           <h6>Crab Pool Security</h6>
                           <span>$30.00</span>
                        </div>
                     </a>
                     <a href="#" class="latest-product__item">
                        <div class="latest-product__item__pic">
                           <img src="img/latest-product/lp-3.jpg" alt="">
                        </div>
                        <div class="latest-product__item__text">
                           <h6>Crab Pool Security</h6>
                           <span>$30.00</span>
                        </div>
                     </a>
                  </div>
                  <div class="latest-prdouct__slider__item">
                     <a href="#" class="latest-product__item">
                        <div class="latest-product__item__pic">
                           <img src="img/latest-product/lp-1.jpg" alt="">
                        </div>
                        <div class="latest-product__item__text">
                           <h6>Crab Pool Security</h6>
                           <span>$30.00</span>
                        </div>
                     </a>
                     <a href="#" class="latest-product__item">
                        <div class="latest-product__item__pic">
                           <img src="img/latest-product/lp-2.jpg" alt="">
                        </div>
                        <div class="latest-product__item__text">
                           <h6>Crab Pool Security</h6>
                           <span>$30.00</span>
                        </div>
                     </a>
                     <a href="#" class="latest-product__item">
                        <div class="latest-product__item__pic">
                           <img src="img/latest-product/lp-3.jpg" alt="">
                        </div>
                        <div class="latest-product__item__text">
                           <h6>Crab Pool Security</h6>
                           <span>$30.00</span>
                        </div>
                     </a>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>