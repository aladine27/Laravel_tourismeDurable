<script type="text/javascript">
    
    <?php if(Session::has('success')): ?>
    Swal.fire({
    icon: 'success',
    title: 'Done',
    text: '<?php echo e(Session::get("success")); ?>',
    confirmButtonColor: "#3a57e8"
    });
    <?php endif; ?>
    
    <?php if(Session::has('error')): ?>
    Swal.fire({
    icon: 'error',
    title: 'Opps!!!',
    text: '<?php echo e(Session::get("error")); ?>',
    confirmButtonColor: "#3a57e8"
    });
    <?php endif; ?>
    <?php if(Session::has('errors') || ( isset($errors) && is_array($errors) && $errors->any())): ?>
    Swal.fire({
    icon: 'error',
    title: 'Opps!!!',
    text: '<?php echo e(Session::get("errors")->first()); ?>',
    confirmButtonColor: "#3a57e8"
    });
    <?php endif; ?>
</script><?php /**PATH C:\Users\serin\Desktop\4TWIN\5TWIN\LARAVEL\Laravel_RescuFood\resources\views/partials/dashboard/_app_toast.blade.php ENDPATH**/ ?>