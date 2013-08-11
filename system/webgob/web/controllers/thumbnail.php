    <?php
    if(!file_exists('temp/thumbnail/IMG00966-20111209-1213.jpg')){
        $obj = new Thumbnail();
        $thumbnail = $obj->generateThumbnail("system/webgob/media/images/news/5112/IMG00966-20111209-1213.jpg", 'temp/thumbnail/IMG00966-20111209-1213.jpg', 83, 83);
    }else{
        $thumbnail='temp/thumbnail/IMG00966-20111209-1213.jpg';
    }
    if($thumbnail) {
        print '<img src="'.DOMAIN.$thumbnail.'">';
    }
    ?>