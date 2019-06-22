<?php
if ($page == 'artikel_list') {
    echo '<script type="text/javascript">

//alert("Haha");
    </script>
';
}

if ($page == 'artikel_detail') {
    echo '<script src="' . base_url('template/assets/artikel_detail.js') . '"></script>';
}