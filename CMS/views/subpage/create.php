<form action="<?=ABSOLUTE_PATH?>subpage/create" method="post" xmlns="http://www.w3.org/1999/html">
    <?php $this->render_view("subpage/form.php") ?>
<input type="submit" value="<?=_("Submit")?>" class="btn"/>
</form>

<script src="<?=ABSOLUTE_PATH?>ckeditor/ckeditor.js"></script>