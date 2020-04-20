<?php
    use Akaunting\Money\Currency;
    use Akaunting\Money\Money;
?>



<?php $__env->startSection('content'); ?>

<div class="bg-light py-3">
    <div class="container">
      <div class="row">
        <div class="col-md-12 mb-0"><a href="<?php echo e(url('/')); ?>">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">My Order</strong></div>
      </div>
    </div>
  </div>

  <div class="site-section">
    <div class="container">
        <h1>My Order</h1>
      <div class="row mb-5">
          <div class="site-blocks-table col-md-12">
            <ul class="list-unstyled">
                <?php $__currentLoopData = $transaction; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="media">
                    <img src="<?php echo e(URL::to($item->rl_product->product_image)); ?>" width="150" class="mr-3" alt="...">
                    <div class="media-body">
                        <h5 class="mt-0 mb-1"><?php echo e($item->rl_product->product_name); ?></h5>
                        <p>Quantity : <?php echo e($item->quantity); ?>

                            <?php if($item->rl_shipping->on_packaging == null): ?>
                            <br> On Packaging
                            <?php elseif($item->rl_shipping->on_packaging == 1): ?>
                            <br> On Delivery
                            <?php elseif( $item->rl_shipping->on_delivery == 1): ?>
                            <br> Success
                            <?php endif; ?>
                        </p>
                        <button class="btn btn-success">Price : <?php echo e(Money::IDN($item->price,true)); ?></button>
                    </div>
                </li>
                <br>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </ul>
          </div>
      </div>
    </div>
  </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('template1.template1', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ecomerce_laravel2\resources\views/pages/home/myOrderPage.blade.php ENDPATH**/ ?>