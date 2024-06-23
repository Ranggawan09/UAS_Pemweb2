<?php

function tampilan ($halaman, $data=[]){
    echo view('templates/template', $data);
    echo view($halaman, $data);
    echo view('templates/v_footer', $data);
}
