<?php

namespace H5\Controller;

class IndexController extends CommonController {

        public function index() {
                echo 'Hi '.session('nickname');
        }
}
