<?php
?>
<span id='fileline_<?=$file->kFile?>'>
<a href='<?php echo base_url(). "uploads/" . $file->fileName; ?>' target="_blank">
<?=$file->fileDescription?>
</a>
 <span class='button file_edit' id='file_<?=$file->kFile?>'>Edit</span>
            </span>