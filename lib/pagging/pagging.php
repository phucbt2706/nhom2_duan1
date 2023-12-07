<?php
    //Admin client
    function get_pagging($num_page,$page,$cate_id){
        $str_html = '<nav aria-label="Page navigation example">
        <ul class="pagination">';
        if ($page>1) {
            $page_pre = $page -1;
            $str_html .= '<li class="page-item"><a class="page-link" href="?pages=shop&cate_id='.$cate_id.'&page='.$page_pre.'"><<</a></li>';
        }
        if ($page<=1) {
            $str_html .= '<li class="page-item disabled"><a class="page-link" href="#"><<</a></li>';
        }

        for ($i=1; $i <=$num_page; $i++) { 
            $active = '';
            if ($i == $page ) {
                $active = 'active';
            }
            $str_html .= '<li class="page-item '.$active.'"><a class="page-link" href="?pages=shop&cate_id='.$cate_id.'&page='.$i.'">'.$i.'</a></li>';
        }
        if ($page>=$num_page) {
            $str_html .= '<li class="page-item disabled"><a class="page-link" href="#">>></a></li>';
        }

        if ($page<$num_page) {
            $page_next = $page + 1;
            $str_html .= '<li class="page-item"><a class="page-link" href="?pages=shop&cate_id='.$cate_id.'&page='.$page_next.'">>></a></li>';
        }
        $str_html .= '</ul>
        </nav>';
        return $str_html;

    }
    function get_pagging_shop($num_page,$page){
        $str_html = '<nav aria-label="Page navigation example">
        <ul class="pagination">';
        if ($page>1) {
            $page_pre = $page -1;
            $str_html .= '<li class="page-item"><a class="page-link" href="?pages=shop&page='.$page_pre.'"><<</a></li>';
        }
        if ($page<=1) {
            $str_html .= '<li class="page-item disabled"><a class="page-link" href="#"><<</a></li>';
        }

        for ($i=1; $i <=$num_page; $i++) { 
            $active = '';
            if ($i == $page ) {
                $active = 'active';
            }
            $str_html .= '<li class="page-item '.$active.'"><a class="page-link" href="?pages=shop&page='.$i.'">'.$i.'</a></li>';
        }
        if ($page>=$num_page) {
            $str_html .= '<li class="page-item disabled"><a class="page-link" href="#">>></a></li>';
        }

        if ($page<$num_page) {
            $page_next = $page + 1;
            $str_html .= '<li class="page-item"><a class="page-link" href="?pages=shop&page='.$page_next.'">>></a></li>';
        }
        $str_html .= '</ul>
        </nav>';
        return $str_html;

    }


    //Admin
    function get_pagging_product($num_page,$page){
        $str_html = '<nav aria-label="Page navigation example">
        <ul class="pagination">';
        if ($page>1) {
            $page_pre = $page -1;
            $str_html .= '<li class="page-item"><a class="page-link" href="?pages=list_products&page='.$page_pre.'"><<</a></li>';
        }
        if ($page<=1) {
            $str_html .= '<li class="page-item disabled"><a class="page-link" href="#"><<</a></li>';
        }

        for ($i=1; $i <=$num_page; $i++) { 
            $active = '';
            if ($i == $page ) {
                $active = 'active';
            }
            $str_html .= '<li class="page-item '.$active.'"><a class="page-link" href="?pages=list_products&page='.$i.'">'.$i.'</a></li>';
        }
        if ($page>=$num_page) {
            $str_html .= '<li class="page-item disabled"><a class="page-link" href="#">>></a></li>';
        }

        if ($page<$num_page) {
            $page_next = $page + 1;
            $str_html .= '<li class="page-item"><a class="page-link" href="?pages=list_products&page='.$page_next.'">>></a></li>';
        }
        $str_html .= '</ul>
        </nav>';
        return $str_html;

    }

    function get_pagging_cate($num_page,$page){
        $str_html = '<nav aria-label="Page navigation example">
        <ul class="pagination">';
        if ($page>1) {
            $page_pre = $page -1;
            $str_html .= '<li class="page-item"><a class="page-link" href="?pages=list_cate&page='.$page_pre.'"><<</a></li>';
        }
        if ($page<=1) {
            $str_html .= '<li class="page-item disabled"><a class="page-link" href="#"><<</a></li>';
        }

        for ($i=1; $i <=$num_page; $i++) { 
            $active = '';
            if ($i == $page ) {
                $active = 'active';
            }
            $str_html .= '<li class="page-item '.$active.'"><a class="page-link" href="?pages=list_cate&page='.$i.'">'.$i.'</a></li>';
        }

        if ($page>=$num_page) {
            $str_html .= '<li class="page-item disabled"><a class="page-link" href="#">>></a></li>';
        }

        if ($page<$num_page) {
            $page_next = $page + 1;
            $str_html .= '<li class="page-item"><a class="page-link" href="?pages=list_cate&page='.$page_next.'">>></a></li>';
        }
        $str_html .= '</ul>
        </nav>';
        return $str_html;
    }

    function get_pagging_user($num_page,$page){
        $str_html = '<nav aria-label="Page navigation example">
        <ul class="pagination">';
        if ($page>1) {
            $page_pre = $page -1;
            $str_html .= '<li class="page-item"><a class="page-link" href="?pages=list_account&page='.$page_pre.'"><<</a></li>';
        }

        if ($page<=1) {
            $str_html .= '<li class="page-item disabled"><a class="page-link" href="#"><<</a></li>';
        }

        for ($i=1; $i <=$num_page; $i++) { 
            $active = '';
            if ($i == $page ) {
                $active = 'active';
            }
            $str_html .= '<li class="page-item '.$active.'"><a class="page-link" href="?pages=list_account&page='.$i.'">'.$i.'</a></li>';
        }

        if ($page>=$num_page) {
            $str_html .= '<li class="page-item disabled"><a class="page-link" href="#">>></a></li>';
        }

        if ($page<$num_page) {
            $page_next = $page + 1;
            $str_html .= '<li class="page-item"><a class="page-link" href="?pages=list_account&page='.$page_next.'">>></a></li>';
        }
        $str_html .= '</ul>
        </nav>';
        return $str_html;

    }

    function get_pagging_order($num_page,$page){
        $str_html = '<nav aria-label="Page navigation example">
        <ul class="pagination">';
        if ($page<=1) {
            $str_html .= '<li class="page-item disabled"><a class="page-link href="#" "><<</a></li>';
        }

        if ($page>1) {
            $page_pre = $page -1;
            $str_html .= '<li class="page-item"><a class="page-link "  href="?pages=orders&page='.$page_pre.'"><<</a></li>';
        }

        for ($i=1; $i <=$num_page; $i++) { 
            $active = '';
            if ($i == $page ) {
                $active = 'active';
            }
            $str_html .= '<li class="page-item '.$active.'"><a class="page-link" href="?pages=orders&page='.$i.'">'.$i.'</a></li>';
        }
        if ($page<$num_page) {
            $page_next = $page + 1;
            $str_html .= '<li class="page-item"><a class="page-link" href="?pages=orders&page='.$page_next.'">>></a></li>';
        }

        if ($page>=$num_page) {
            $str_html .= '<li class="page-item disabled"><a class="page-link" href="#">>></a></li>';
        }
        $str_html .= '</ul>
        </nav>';
        return $str_html;
    }

    function get_pagging_statistic_cmt($num_page,$page){
        $str_html = '<nav aria-label="Page navigation example">
        <ul class="pagination">';
        if ($page<=1) {
            $str_html .= '<li class="page-item disabled"><a class="page-link href="#" "><<</a></li>';
        }

        if ($page>1) {
            $page_pre = $page -1;
            $str_html .= '<li class="page-item"><a class="page-link "  href="?pages=statistic_comment&page='.$page_pre.'"><<</a></li>';
        }

        for ($i=1; $i <=$num_page; $i++) { 
            $active = '';
            if ($i == $page ) {
                $active = 'active';
            }
            $str_html .= '<li class="page-item '.$active.'"><a class="page-link" href="?pages=statistic_comment&page='.$i.'">'.$i.'</a></li>';
        }
        if ($page<$num_page) {
            $page_next = $page + 1;
            $str_html .= '<li class="page-item"><a class="page-link" href="?pages=statistic_comment&page='.$page_next.'">>></a></li>';
        }

        if ($page>=$num_page) {
            $str_html .= '<li class="page-item disabled"><a class="page-link" href="#">>></a></li>';
        }
        $str_html .= '</ul>
        </nav>';
        return $str_html;
    }


?>