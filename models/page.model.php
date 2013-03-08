<?php

    require_once(ROOT_PATH . "models/base.model.php");

    class PageModel extends BaseModel {
        private static $table = "page";

        public static function selectAll() {
            return Database::selectAllElements(self::$table);
        }

        public static function insertPage($title, $content) {
            $page = array("title" => $title, "content" => $content);
            return Database::insertElement(self::$table, $page);
        }

        public static function selectPage($id) {
            $conditions = array("id" => $id);
            $result = Database::selectElements(self::$table, $conditions);
            return $result[0];
        }

    }
