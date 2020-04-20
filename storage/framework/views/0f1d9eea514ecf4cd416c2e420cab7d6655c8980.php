<?php $__env->startSection('content'); ?>
<div class="header bg-primary pb-6">
    <div class="container-fluid">
      <div class="header-body">
        <div class="row align-items-center py-4">
          <div class="col-lg-6 col-7">
            <h6 class="h2 text-white d-inline-block mb-0">Product</h6>
            <nav aria-label="breadcrumb" class="d-none d-md-inline-block ml-md-4">
              <ol class="breadcrumb breadcrumb-links breadcrumb-dark">
                <li class="breadcrumb-item"><a href="<?php echo e(url('/admin-home')); ?>"><i class="fas fa-home"></i></a></li>
                <li class="breadcrumb-item"><a href="<?php echo e(url('/product-content')); ?>">Product</a></li>
              </ol>
            </nav>
          </div>
          <div class="col-lg-6 col-5 text-right">
            <a href="<?php echo e(url('/add-product')); ?>" class="btn btn-sm btn-neutral"><i class="fas fa-plus"></i> Add New</a>
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
            <h3 class="mb-0">Data Product</h3>
          </div>
          <!-- Light table -->
          <div class="table-responsive">
            <table class="table align-items-center table-flush data">
              <thead class="thead-light">
                <tr>
                  <th scope="col" class="sort" data-sort="name">Image</th>
                  <th scope="col" class="sort" data-sort="budget">Name</th>
                  <th scope="col" class="sort" data-sort="status">Price</th>
                  <th scope="col" class="sort" data-sort="status">Category</th>
                  <th scope="col" class="sort" data-sort="status">Status</th>
                  <th scope="col" class="sort" data-sort="completion">action</th>
                </tr>
              </thead>
              <tbody class="list">
                <?php $__currentLoopData = $product; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><img src="<?php echo e($row->product_image); ?>" alt="" width="100"></td>
                        <td><?php echo e($row->product_name); ?></td>
                        <td><?php echo e($row->product_price); ?></td>
                        <td><?php echo e($row->categorys->category_name); ?></td>
                        <td>
                            <?php if($row->status == 1): ?>
                            <span class="badge badge-success">Active</span>
                            <?php else: ?>
                            <span class="badge badge-danger">Unactive</span>
                            <?php endif; ?>
                        </td>
                        <td>
                            <?php if($row->status == 1): ?>
                            <a class="btn btn-success btn-sm" href="<?php echo e(URL::to('/unactive-product/'.$row->id)); ?>">
                                <i class="ni ni-button-power text-white"></i>
                            </a>
                            <?php else: ?>
                                <a class="btn btn-danger btn-sm" href="<?php echo e(URL::to('/active-product/'.$row->id)); ?>">
                                    <i class="ni ni-button-power text-white"></i>
                                </a>
                            <?php endif; ?>
                            <a href="<?php echo e(url('/delete-product/'.$row->id)); ?>" class="btn btn-danger btn-sm tombol-hapus"><i class="fas fa-trash-alt"></i></a>
                            <a href="<?php echo e(url('/edit-product/'.$row->id)); ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i></a>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('template2.template2', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\ecomerce_laravel2\resources\views/pages/admin/product.blade.php ENDPATH**/ ?>