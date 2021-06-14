<?php
class Image{

    private function entity($entity)
    {
        if ($entity === 'product' || $entity === 'stuff') return $entity;

        exit("ERROR: Invalid Entity");       
    }

    private function filetype($filename)
    {
        $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "png" => "image/png");
        
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        if(!array_key_exists($ext, $allowed))   exit("ERROR: Invalid File type");

        return $filename;
    }

    private function filesize($filesize)
    {
        $filesize = round((filesize($filepath) * 0.001) / 1000, 2);
        if ($filesize > 5) exit("ERROR: File size it too large: (".$filesize."mb)");

        return $filesize;
    }

    public function __construct($entity, $filename, $filepath)
    {
        $this->entity = $this->entity($entity);
        $this->filename = $filename;
        $this->filepath = $filepath;
        $this->filetype($filename);
        $this->filesize($filesize);
    }
  
    // get file extention
    private function fileext()
    {
        return pathinfo($this->filename, PATHINFO_EXTENSION);
    }

    public function dimension()
    {
        $dimension = ['width'=>250, 'height'=>250];
        if ($this->entity === 'product') {
            $dimension['width'] = 300;
            $dimension['height'] = 200;
        }
       return $dimension;
    }

    public function crop_img()
    {
        $dimension = $this->dimension();        
        $new_name ="ESP_croped_img062021.".$this->fileext();
        
        if (in_array($this->fileext(), ['jpeg','jpg'])) {
            
            $src = imagecreatefromjpeg($this->filepath);
            $dest = imagecreatetruecolor($dimension['width'], $dimension['height']);
            imagecopy($dest, $src, 0, 0, 50, 50, $dimension['width'], $dimension['height']);
            imagejpeg($dest, "uploads/" . $new_name);

        } else if(in_array($this->fileext(),['png'])) {

            $src = imagecreatefrompng($this->filepath);
            $dest = imagecreatetruecolor($dimension['width'], $dimension['height']);
            imagecopy($dest, $src, 0, 0, 50, 50, $dimension['width'], $dimension['height']);
            imagepng($dest, "uploads/" . $new_name);
        }        
        imagedestroy($dest);
        imagedestroy($src);

        return true;
    }

    // Upload an Image and store it
    public function save()
    {  
        $new_name ="ESP_img062021.".$this->fileext();
        move_uploaded_file($this->filepath, "uploads/" . $new_name);
        return true;        
    }
}
