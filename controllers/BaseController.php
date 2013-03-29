<?php

    class BaseController {

        private $_action = "";
        protected $url = array();
        protected $urlArray = array();
        protected $template_dir = "views/";
        protected $vars = array();

        public function __construct($action, $urlValues) {
            $this->_action = $action;
            $this->url = $urlValues["url"];
            $this->urlArray = explode("/", $urlValues["url"]);
        }

        public function executeAction() {
            return $this->{$this->_action}();
        }

        public function checkAction($action) {
            return (($this->_action == $action) ? true : false);
        }

        public function render($view_file) {
            $this->categories = CategoryModel::selectCategoriesAndPages();
            $this->view_file = $view_file;
            self::render_view("template.php");
        }

        public function render_view($view_file) {
            require_once(SITE_PATH . $this->template_dir . $view_file);
        }

        public function __set($name, $value) {
            $this->vars[$name] = $value;
        }
        public function __get($name) {
            return $this->vars[$name];
        }
    }