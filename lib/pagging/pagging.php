<?php
    function get_pagging($num_page,$page){
        $str_html = '<nav aria-label="Page navigation example">
        <ul class="pagination">';
        if ($page>1) {
            $page_pre = $page -1;
            $str_html .= '<li class="page-item"><a class="page-link" href="?pages=shop&page='.$page_pre.'"><<</a></li>';
        }

        for ($i=1; $i <=$num_page; $i++) { 
            $active = '';
            if ($i == $page ) {
                $active = 'active';
            }
            $str_html .= '<li class="page-item '.$active.'"><a class="page-link" href="?pages=shop&page='.$i.'">'.$i.'</a></li>';
        }

        if ($page<$num_page) {
            $page_next = $page + 1;
            $str_html .= '<li class="page-item"><a class="page-link" href="?pages=shop&page='.$page_next.'">>></a></li>';
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

        for ($i=1; $i <=$num_page; $i++) { 
            $active = '';
            if ($i == $page ) {
                $active = 'active';
            }
            $str_html .= '<li class="page-item '.$active.'"><a class="page-link" href="?pages=list_cate&page='.$i.'">'.$i.'</a></li>';
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
            $str_html .= '<li class="page-item"><a class="page-link" href="?pages=list_user&page='.$page_pre.'"><<</a></li>';
        }

        for ($i=1; $i <=$num_page; $i++) { 
            $active = '';
            if ($i == $page ) {
                $active = 'active';
            }
            $str_html .= '<li class="page-item '.$active.'"><a class="page-link" href="?pages=list_user&page='.$i.'">'.$i.'</a></li>';
        }

        if ($page<$num_page) {
            $page_next = $page + 1;
            $str_html .= '<li class="page-item"><a class="page-link" href="?pages=list_user&page='.$page_next.'">>></a></li>';
        }
        $str_html .= '</ul>
        </nav>';
        return $str_html;

    }
?>