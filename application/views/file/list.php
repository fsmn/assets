<?php
echo "&nbsp;<span class='button new small asset_file_new' id='f_$kAsset'>Attach File</span>";

echo "<br/><div id='fileLines_$kAsset'>";

if($files){
    foreach($files as $file){
            $data['file'] = $file;
            echo  "<p>";
            echo $this->load->view('file/view', $data, TRUE);
            echo "</p>";
    }
    
}
echo "</div>";
