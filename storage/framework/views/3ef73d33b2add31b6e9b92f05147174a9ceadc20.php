<?php $__env->startSection('content'); ?>
<div class="header bg-primary pb-6">
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center py-4">
          <div class="col-lg-6 col-7">
            <h6 class="h2 text-white d-inline-block mb-0">Detail Shipping</h6>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                <li class="breadcrumb-item"><a href="<?php echo e(url('/admin-home')); ?>"><i class="fas fa-home"></i></a></li>
                <li class="breadcrumb-item"><a href="<?php echo e(url('/shipping-content')); ?>">Shipping</a></li>
                <li class="breadcrumb-item"><a href="<?php echo e(url('/detail-shipping')); ?>">Detail Shipping</a></li>
              </ol>
            </nav>
          </div>
          <div class="col-lg-6 col-5 text-right">
          </div>
        </div>
      </div>
    </div>
</div>
  <!-- Page content -->
  <div class="container-fluid mt--6">
    <div class="row">
      <div class="col">
        <div class="card">
          <!-- Card header -->
          <div class="card-header border-0">
            <h3 class="mb-0">Customer Information</h3>
          </div>
          <div class="card-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                            <label class="form-control-label" for="input-username">Name</label>
                            <input type="text" id="input-username" name="name" class="form-control" placeholder="Name" value="<?php echo e($shipping->name); ?>">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                            <label class="form-control-label" for="input-email">Email address</label>
                            <input type="email" id="input-email" name="email" class="form-control" placeholder="example@gmail.com" value="<?php echo e($shipping->email); ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                            <label class="form-control-label" for="input-username">Order Date</label>
                            <input type="text" id="input-username" name="name" class="form-control" placeholder="Name" value="<?php echo e($shipping->order_date); ?>">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                            <label class="form-control-label" for="input-email">Pay Limit</label>
                            <input type="email" id="input-email" name="email" class="form-control" placeholder="example@gmail.com" value="<?php echo e($shipping->pay_limit); ?>">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="cart-body">
                    <div class="text-center p-3">
                        <?php if($shipping->on_packaging == null): ?>
                        <a href="<?php echo e(url('/status-onPackaging/'.$shipping->id)); ?>" class="btn btn-danger btn-sm"><i class="ni ni-button-power text-white"></i> Not Packaging</a>
                        <?php else: ?>
                        <a href="<?php echo e(url('/status-notPackaging/'.$shipping->id)); ?>" class="btn btn-success btn-sm"> <i class="ni ni-bag-17 text-white"></i> On Packaging</a>
                        <?php endif; ?>
                        <?php if($shipping->on_delivery == null): ?>
                        <a href="<?php echo e(url('/status-onDelivery/'.$shipping->id)); ?>" class="btn btn-danger btn-sm"><i class="ni ni-button-power text-white"></i> Not Delivery</a>
                        <?php else: ?>
                        <a href="<?php echo e(url('/status-notDelivery/'.$shipping->id)); ?>" class="btn btn-success btn-sm"><i class="ni ni-delivery-fast text-white"></i> On Delivery</a>
                        <?php endif; ?>
                        <?php if($shipping->success == null): ?>
                        <a href="<?php echo e(url('/status-success/'.$shipping->id)); ?>" class="btn btn-danger btn-sm"><i class="ni ni-button-power text-white"></i> Not Success</a>
                        <?php else: ?>
                        <a href="<?php echo e(url('/status-notSuccess/'.$shipping->id)); ?>" class="btn btn-success btn-sm"><i class="ni ni-check-bold text-white"></i> Success</a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

        <div class="card">
          <!-- Card header -->
            <div class="card-header border-0">
                <h3 class="mb-0">Transacton</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table align-items-center table-flush data">
                      <thead class="thead-light">
                        <tr>
                          <th scope="col" class="sort" data-sort="budget">Image</th>
                          <th scope="col" class="sort" data-sort="budget">Product Name</th>
                          <th scope="col" class="sort" data-sort="status">Quantity</th>
                          <th scope="col" class="sort" data-sort="status">Size</th>
                        </tr>
                      </thead>
                      <tbody class="list">
                        <?php $__currentLoopData = $transaction; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <tr>
                                <td><img src="<?php echo e(URL::to($row->rl_product->product_image)); ?>" alt="" width="100"></td>
                                <td><?php echo e($row->rl_product->product_name); ?></td>
                                <td><?php echo e($row->quantity); ?></td>
                                <td><?php echo e($row->size); ?></td>
                            </tr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                      </tbody>
                    </table>
                  </div>
            </div>
        </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('template2.template2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ecomerce_laravel2\resources\views/pages/admin/detail_shipping.blade.php ENDPATH**/ ?>