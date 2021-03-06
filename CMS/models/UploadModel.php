<?php

/**
 * kazkas cia parasytas
 */

require_once(CMS_PATH . "commons/class.upload.php");

class UploadModel extends BaseModel {

    protected static $table = "upload";

    public static function uploadImage($imageFile, $thumbSize, $sizeX = null, $sizeY = null) {
        $handle = new Upload($imageFile);
        if ($handle->uploaded) {
            if($sizeX || $sizeY) {
                $handle->image_resize = true;
                $sizeX ? $handle->image_x = $sizeX : null;
                $sizeY ? $handle->image_y = $sizeY : null;
            }
            $handle->process(SITE_PATH."upload/");
            if ($handle->processed) {
                $handle->image_resize = true;
                $handle->image_x = $thumbSize;
                $handle->image_ratio_y = true;
                $handle->process(SITE_PATH."upload/thumbnails");
                $fileName = $handle->file_dst_name;
                
                $id = Database::insertElement(self::$table, array("file" => $fileName));
                
                $handle->clean();
                
                return $id;
            } else {
                echo 'error : ' . $handle->error;
            }
        }
    }

    public static function selectFile($uploadId) {
        return Database::selectElement(self::$table, array("id" => $uploadId));
    }

    public static function selectAllFiles() {
        return Database::selectAllElements(self::$table);
    }

    public static function deleteFile($id) {
        $file = self::selectFile($id);
        unlink(SITE_PATH . "upload/" . $file["file"]);
        unlink(SITE_PATH . "upload/thumbnails/" . $file["file"]);
        Database::deleteElements(self::$table, array("id" => $id));
    }
}
