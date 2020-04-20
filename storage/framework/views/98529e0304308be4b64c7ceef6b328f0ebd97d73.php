<?php
    use Akaunting\Money\Currency;
    use Akaunting\Money\Money;
?>



<?php $__env->startSection('content'); ?>
<div class="bg-light py-3">
    <div class="container">
      <div class="row">
        <div class="col-md-12 mb-0"><a href="<?php echo e(url('/')); ?>">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black"><?php echo e($title); ?></strong></div>
      </div>
    </div>
  </div>

  <div class="site-section">
    <div class="container">

      <div class="row mb-5">
        <div class="col-md-9 order-2">

          <div class="row">
            <div class="col-md-12 mb-5">
              <div class="float-md-left mb-4"><h2 class="text-black h5 text-uppercase"><?php echo e($title); ?></h2></div>
              <div class="d-flex">
                <div class="dropdown mr-1 ml-md-auto">
                  <button type="button" class="btn btn-secondary btn-sm dropdown-toggle" id="dropdownMenuOffset" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Latest
                  </button>
                  <div class="dropdown-menu" aria-labelledby="dropdownMenuOffset">
                    <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <a class="dropdown-item" href="<?php echo e($item->id); ?>"><?php echo e($item->category_name); ?></a>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row mb-5">

            <?php if(count($product) != 0): ?>
            <?php $__currentLoopData = $product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-sm-6 col-lg-4 mb-4" data-aos="fade-up">
              <div class="block-4 text-center border">
                <figure class="block-4-image">
                  <a href="<?php echo e(url('/product-detail/'.$item->id)); ?>"><img src="<?php echo e(URL::to($item->product_image)); ?>" class="img-fluid"></a>
                </figure>
                <div class="block-4-text p-4">
                  <h3><a href="<?php echo e(url('/product-detail/'.$item->id)); ?>"><?php echo e($item->product_name); ?></a></h3>
                  <p class="mb-0"><?php echo e($item->categorys->category_name); ?></p>
                  <p class="text-primary font-weight-bold"><?php echo e(Money::IDN($item->product_price,true)); ?></p>
                </div>
              </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php else: ?>
            <div class="col-sm-6 col-lg-12" data-aos="fade-up">
                <div class="text-center">
                  <h3>Soory, This Category No Result Product</h3>
                </div>
              </div>
            <?php endif; ?>

          </div>
        </div>

        <div class="col-md-3 order-1 mb-5 mb-md-0">
          <div class="border p-4 rounded mb-4">
            <h3 class="mb-3 h6 text-uppercase text-black d-block">Categories</h3>
            <ul class="list-unstyled mb-0">
                <?php $__currentLoopData = $category; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="mb-1"><a href="<?php echo e(url('/product-category/'.$item->id)); ?>" class="d-flex"><span class="text-uppercase"><?php echo e($item->category_name); ?></span> <span class="text-black ml-auto"></span></a></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
          </div>
        </div>
      </div>

    </div>
  </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('template1.template1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ecomerce_laravel2\resources\views/pages/home/categoryProductPage.blade.php ENDPATH**/ ?>