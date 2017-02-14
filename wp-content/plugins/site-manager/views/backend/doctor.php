<?php
wp_nonce_field($post->ID, 'vuonxa_security');

?>
<div id="qhshop-content-general" class="qhshop-option">
    <input type="hidden" id="hidden_domain" value="<?php echo site_url(); ?>">
    <div class="qhshop-content-form-group display-table">
        <label>Video bệnh viêm da cơ địa : </label>
        <div class="select-video">
            <input type="hidden" name="doctor[video_viemdacodia]" value="<?php echo ($data['video_viemdacodia']) ? $data['video_viemdacodia'] : ""; ?>" class="small-text cstm_videourl-mp4">
            <button id="media-choosan" class="button media-button button-primary button-large media-button-select cstm-btn-select" data-format="mp4">Select video mp4</button>
            <span class="filename_video-mp4"><?php echo $data['video_viemdacodia']; ?></span>
			<?php if(!empty($data['video_viemdacodia'])){ ?>
			<a href="javascript:;" class="del_video" style="color: blue">Delete</a>
			<?php } ?>
        </div>
        <div class="select-video">
            <input type="hidden" name="doctor[video_viemdacodia_ogg]" value="<?php echo ($data['video_viemdacodia_ogg']) ? $data['video_viemdacodia_ogg'] : ""; ?>" class="small-text cstm_videourl-ogg">  
            <button id="media-choosan" class="button media-button button-primary button-large media-button-select cstm-btn-select" data-format="ogg">Select video ogg</button>
            <span class="filename_video-ogg"><?php echo $data['video_viemdacodia_ogg']; ?></span>
			<?php if(!empty($data['video_viemdacodia_ogg'])){ ?>
			<a href="javascript:;" class="del_video" style="color: blue">Delete</a>
			<?php } ?>
        </div> 

    </div>
    <div class="qhshop-content-form-group display-table">
        <label>Video cách điều trị : </label>
        <div class="select-video">
            <input type="hidden" name="doctor[video_cachdieutri]" value="<?php echo ($data['video_cachdieutri']) ? $data['video_cachdieutri'] : ""; ?>" class="small-text cstm_videourl-mp4">
            <button id="media-choosan" class="button media-button button-primary button-large media-button-select cstm-btn-select" data-format="mp4">Select video mp4</button>
            <span class="filename_video-mp4"><?php echo $data['video_cachdieutri']; ?></span>
			<?php if(!empty($data['video_cachdieutri'])){ ?>
			<a href="javascript:;" class="del_video" style="color: blue">Delete</a>
			<?php } ?>
        </div>
        <div class="select-video">
            <input type="hidden" name="doctor[video_cachdieutri_ogg]" value="<?php echo ($data['video_cachdieutri_ogg']) ? $data['video_cachdieutri_ogg'] : ""; ?>" class="small-text cstm_videourl-ogg">  
            <button id="media-choosan" class="button media-button button-primary button-large media-button-select cstm-btn-select" data-format="ogg">Select video ogg</button>
            <span class="filename_video-ogg"><?php echo $data['video_cachdieutri_ogg']; ?></span>
			<?php if(!empty($data['video_cachdieutri_ogg'])){ ?>
			<a href="javascript:;" class="del_video" style="color: blue">Delete</a>
			<?php } ?>
        </div> 
    </div>
    <div id="qhshop-content-attribute-form-group">
        <?php
        $count_post = count($data['content_post']);
        if ($count_post != 0) {
            for ($i = 0; $i < $count_post; $i++) {
                ?>
                <div class="qhshop-content-form-group display-table cstm_asdfg">
                    <label>Title Post : </label><input type="text" name="doctor[title_post][]" value="<?php echo $data['title_post'][$i]; ?>" class="small-text" rows="8" placeholder="Title">      
                </div>
                <div class="qhshop-content-form-group display-table">
                    <label>Content Post : </label><textarea name="doctor[content_post][]" class="small-text" rows="8" placeholder="Content"><?php echo $data['content_post'][$i]; ?></textarea>        
                </div>
            <?php
            }
        }
        ?>
    </div>
    <a href="javascript:;" id="addPost">Add Post</a>
</div>