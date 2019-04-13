<?php if(count($sliders) > 0) : ?>
  <div id="myCarousel" class="carousel slide carousel-fade" data-ride="carousel">
    <div class="carousel-inner">
      <?php 
        foreach($sliders as $key => $product) :

        $active = ($key == 0) ? 'active' : '' ;
      ?>
        <div class="carousel-item <?php echo $active; ?>">
          <div class="mask flex-center">
            <div class="container">
              <div class="row align-items-center">
                <div class="col-md-7 col-12 pleft5rem">
                  <h4 class="w-max-480"><?php echo $product->title; ?></h4>
                    <p><?php echo $product->description; ?></p>
                    <a href="/product/<?php echo $product->slug; ?>">BUY NOW</a> 
                </div>
                <div class="col-md-5 col-12">
                  <img src="<?php echo $product->image; ?>" class="mx-auto" alt="slide">
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php endforeach; ?>

    </div>
      <a class="carousel-control-prev" href="#myCarousel" role="button" data-slide="prev"> 
        <span class="carousel-control-prev-icon" aria-hidden="true"></span> 
        <span class="sr-only">Previous</span> 
      </a> 
      <a class="carousel-control-next" href="#myCarousel" role="button" data-slide="next"> 
        <span class="carousel-control-next-icon" aria-hidden="true"></span> 
        <span class="sr-only">Next</span> 
      </a> 
  </div>
<?php endif; ?>
