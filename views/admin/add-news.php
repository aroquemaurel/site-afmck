<?php $breadcrumb->display()?>
<div class="container-fluid">
    <h1>Ajouter une newsletter</h1>
    <div class="col-xs-14 col-sm-10 col-md-11 col-sm-offset-1 col-md-offset-2">
        <form enctype="multipart/form-data"  role="form" method="post" action="<?php echo Visitor::getInstance()->getRootPage().'/admin/add-news.php';?>">
            <hr class="colorgraph">
            <div class="row">
                <div class="form-group">
                    <input required="required" type="text" name="title" id="title"
                           class="form-control input-lg" placeholder="Titre" tabindex="3"
                           value="<?php if(isset($news)) { echo $news->getTitle(); }?>"
                        >
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <input required="required" type="text" name="subtitle" id="subtitle"
                           class="form-control input-lg" placeholder="Sous-Titre (Facultatif)" tabindex="3"
                           value="<?php if(isset($news)) { echo $news->getSubtitle(); }?>"
                        >
                </div>
            </div>
            <div class="row">
                <div class="form-group">
                    <?php utils\Wysiwyg::display(isset($news) ? $news->getContent():""); ?>
                </div>
                </div>
            <hr class="colorgraph">
            <?php
            if(isset($news)) {
                echo '<input type="hidden" name="id" value="'.$news->getId().'"/>';
            }
            ?>
            <h2>Multiple Image Upload Form</h2>
                First Field is Compulsory. Only JPEG,PNG,JPG Type Image Uploaded. Image Size Should Be Less Than 100KB.
                <div id="filediv"><input name="file[]" type="file" id="file" multiple/></div>
                <input type="button" id="add_more" class="upload btn btn-info btn-xs" value="Add More Files"/>
            <button id="submit" type="submit" style="margin: auto; width: 250px; "
                    class="btn btn-primary btn-block btn-lg">
                <i class="glyphicon glyphicon-ok-sign"></i>
                <?php echo (isset($news) ? "Modifier" : "Ajouter")." la news"?>
            </button>

        </form>
    </div>
</div>

<?php
$script = utils\Wysiwyg::getScriptSrc();
//$script .= utils\Wysiwyg::getJsToolbar();
$script .= "
<script type=\"text/javascript\">
    $(function(){
        $('#submit').click(function () {
            var mysave = $('#editor').html();
            $('#hiddeninput').val(mysave);
        });
    });";


$script .= '
tinymce.init({
  selector: "textarea",
  height: 500,
  plugins: [
    "advlist autolink lists link image charmap print preview anchor",
    "searchreplace visualblocks code fullscreen",
    "insertdatetime media table contextmenu paste code",
    "paste"
  ],
  toolbar: "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image",
  content_css: [
    "//fast.fonts.net/cssapi/e6dc9b99-64fe-4292-ad98-6974f93cd2a2.css",
    "//www.tinymce.com/css/codepen.min.css"
  ],
  paste_auto_cleanup_on_paste : true,
    paste_preprocess : function(pl, o) {
        // Content string containing the HTML from the clipboard

    },
    paste_postprocess : function(pl, o) {
        // Content DOM node containing the DOM structure of the clipboard
 o.node.innerHTML = o.node.innerHTML;
    }
});
';
$script .= "

var abc = 0;      // Declaring and defining global increment variable.
//  To add new input file field dynamically, on click of Add More Files button below function will be executed.
$('#add_more').click(function() {
$(this).before($(\"<div/>\", {
id: 'filediv'
}).fadeIn('slow').append($(\"<input/>\", {
name: 'file[]',
type: 'file',
id: 'file'
}), $(\"<br/><br/>\")));
});
// Following function will executes on change event of file input to select different file.
$('body').on('change', '#file', function() {
if (this.files && this.files[0]) {
abc += 1; // Incrementing global variable by 1.
var z = abc - 1;
var x = $(this).parent().find('#previewimg' + z).remove();
$(this).before(\"<div id='abcd\" + abc + \"' class='abcd'><img id='previewimg\" + abc + \"' src=''/></div>\");
var reader = new FileReader();
reader.onload = imageIsLoaded;
reader.readAsDataURL(this.files[0]);
$(this).hide();
$(\"#abcd\" + abc).append($(\"<img/>\", {
id: 'img',
src: '".Visitor::getInstance()->getRootPage()."/style/img/x.png"."',
alt: 'delete'
}).click(function() {
    $(this).parent().parent().remove();
}));
}
});
// To Preview Image
function imageIsLoaded(e) {
    $('#previewimg' + abc).attr('src', e.target.result);
};
$('#upload').click(function(e) {
    var name = $(\":file\").val();
    if (!name) {
        alert(\"First Image Must Be Selected\");
        e.preventDefault();
    }
});

</script>";

