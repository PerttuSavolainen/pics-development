<?php 

namespace App\MyCustomClasses;

/**
 * 
 * A class for image handling.
 *   
 * @author Perttu Savolainen <h8289@student.jamk.fi>
 * 
 */
 
class ImageHandler {
     
     private static $landscapeWidths = array("thumb" => 560, "small" => 960, "medium" => 1280, "large" => 1920);
     private static $portraitHeights = array("thumb" => 200, "small" => 720, "medium" => 960, "large" => 1280);
     private static $allowedFiletypes = array("jpeg", "jpg", "png", "JPG", "PNG");
     
    /**
     * makes a constructor private so costructing an instance is not possible 
     */    
    private function __construct() {
    }
    
    /**
     * makes a clone private so cloning an instance is not possible 
     */    
    private function __clone() {
    }
    
    /**
     * scales and validates a profile image 
     */ 
    public static function profileImageResize($imgUrl) {
        
    }
     
    /**
     * scales, validates and generates an images from sent image 
     */ 
    public static function imageResize($img) {
        
        // validate image type
        $originalImg = self::validateImage($img);
        
        if (!$originalImg) {
            echo "Kuvatiedosto virheellinen";
        }

        else {

            list($width, $height) = $originalImg; 

            // check if image is portrait or landscape
            if ($width > $height) { // image is landscape

                foreach (self::$landscapeWidths as $widthName => $amount) {
                    if ($width > $amount) $widthCase = $widthName;
                    else break;
                }

                switch ($widthCase) {
                    case "large": self::generateImage($imgUrl, $width, $height, "large");
                    case "medium": self::generateImage($imgUrl, $width, $height, "medium");
                    case "small": self::generateImage($imgUrl, $width, $height, "small");
                    case "thumb": self::generateImage($imgUrl, $width, $height, "thumb");
                    break;    
                } 

            }

            else { // image is portrait

                foreach (self::$portraitHeights as $heightName => $amount) {
                    if ($height > $amount) $heightCase = $heightName;
                    else break;
                }
                
                switch ($heightCase) {
                    case "large": self::generateImage($imgUrl, $width, $height, "large");
                    case "medium": self::generateImage($imgUrl, $width, $height, "medium");
                    case "small": self::generateImage($imgUrl, $width, $height, "small");
                    case "thumb": self::generateImage($imgUrl, $width, $height, "thumb");
                    break;    
                }
                
            }
            
        }
         
    }
    
    /**
     * generates jpg images from given image 
     */
    private static function generateImage($imageUrl, $origWidth, $origHeight, $newType) {
        
        $parts = pathinfo($imageUrl);
        // if landscape
        if ($origWidth > $origHeight) {
            $newWidth = self::$landscapeWidths[$newType];
            $newHeight = $origHeight * ($newWidth / $origWidth);  
        }
        // if portrait
        else {
            $newHeight = self::$portraitHeights[$newType];
            $newWidth = $origWidth * ($newHeight / $origHeight);   
        }
        
        $newImage = imagecreatetruecolor($newWidth, $newHeight);
        
        // set extension to lowercase
        $ext = strtolower($parts["extension"]);
        
        if ($ext == "jpg" || $ext == "jpeg") $source = imagecreatefromjpeg($imageUrl);
        else if ($ext == "png") $source = imagecreatefrompng($imageUrl);
        else $source = false; // image type is not valid
        
        // resize and create jpeg image
        if (!$source) {
            return false;
        }
        
        else {
            imagecopyresized($newImage, $source, 0, 0, 0, 0, $newWidth, $newHeight, $origWidth, $origHeight);
            imagejpeg($newImage, "{$parts["filename"]}-{$newWidth}.jpg", 100); // 100 is image quality
            imagedestroy($newImage); // frees image from memory
        }

    } 
    
    /**
     * validates image type 
     */
    private static function validateImage($image) {
        
        $parts = pathinfo($image);
        
        // if file extension is valid
        if (array_search($parts["extension"], self::$allowedFiletypes)) {
            if (is_array($originalImg = getimagesize($image))) { // check if file is really an image file
                return $originalImg;
            }
            else return false;
        }
        
        else return false;
        
    } 
       
 }
 
 ?>