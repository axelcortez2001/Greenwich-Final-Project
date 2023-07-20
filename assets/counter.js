$(document).ready(function() {
    var result = <?php echo json_encode($_GET); ?>;
    console.log(result.data)
    if (result.success === 'true') {
        // Redirect to the success URL
        window.location.href = "<?php echo site_url('Order/Counter/save_transactionCard'); ?>" + result.data;
    } else if (result.success === 'false') {
        // Redirect to the error URL
        window.location.href = "<?php echo site_url('Order/Counter'); ?>";
    } else {
        // Handle other cases or perform necessary actions
        console.log('Invalid success value');
    }
});