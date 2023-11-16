<?php
    function get_pagging($num_page,$page){
        $str_html = '<nav aria-label="Page navigation example">
        <ul class="pagination">';
        //Nếu $page >1 thì mới hiển thị button PREVIOUS
        if ($page>1) {
            $page_pre = $page -1;
            $str_html .= '<li class="page-item"><a class="page-link" href="?pages=list_products&page='.$page_pre.'"><<</a></li>';
        }

        //Show all tất cả số trang hiện có
        for ($i=1; $i <=$num_page; $i++) { 
            //Nếu đang ở số trang hiện tại thì bg blue
            //Thêm class = active để kích hoạt css trong boostrap
            $active = '';
            if ($i == $page ) {
                $active = 'active';
            }
            $str_html .= '<li class="page-item '.$active.'"><a class="page-link" href="?pages=list_products&page='.$i.'">'.$i.'</a></li>';
        }

        //Nếu $page < $num_page thì mới hiển thị button NEXt
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
        //Nếu $page >1 thì mới hiển thị button PREVIOUS
        if ($page>1) {
            $page_pre = $page -1;
            $str_html .= '<li class="page-item"><a class="page-link" href="?pages=list_cate&page='.$page_pre.'"><<</a></li>';
        }

        //Show all tất cả số trang hiện có
        for ($i=1; $i <=$num_page; $i++) { 
            //Nếu đang ở số trang hiện tại thì bg blue
            //Thêm class = active để kích hoạt css trong boostrap
            $active = '';
            if ($i == $page ) {
                $active = 'active';
            }
            $str_html .= '<li class="page-item '.$active.'"><a class="page-link" href="?pages=list_cate&page='.$i.'">'.$i.'</a></li>';
        }

        //Nếu $page < $num_page thì mới hiển thị button NEXt
        if ($page<$num_page) {
            $page_next = $page + 1;
            $str_html .= '<li class="page-item"><a class="page-link" href="?pages=list_cate&page='.$page_next.'">>></a></li>';
        }
        $str_html .= '</ul>
        </nav>';
        return $str_html;
    }
?>