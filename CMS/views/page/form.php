    <label for="title"><?=_("Title")?></label>
    <input type="text" id="title" name="title" value="<?=$this->title?>" /> <br/>
    <textarea class="ckeditor" name="content"><?=$this->content?></textarea>
    <button id="showOptional" class="btn"><?=_("Options")?></button>
    <div id="pageOptions">
        <h2><?=_("Page setup")?></h2>
        <p>
            <label for="description"><?=_("Description")?></label>
            <textarea name="description" id="description" cols="50" rows="2"><?=$this->description?></textarea><br />
            <label for="keywords"><?=_("Keywords")?></label>
            <input name="keywords" id="keywords" value="<?=$this->keywords?>" /><br />
            <label for="module"><?=_("Module")?></label>
            <select name="module" id="module">
                <option value="1">Module 1</option>
            </select><br />
            <label for="category"><?=_("Category")?></label>
            <select name="category" id="category">
                <?php foreach($this->categories as $category): ?>
                <option value="<?=$category["id"]?>"
                    <?=($category["id"] == $this->category) ? "selected" : NULL?>>
                    <?=$category["title"]?></option>
                <?php endforeach; ?>
            </select>
        </p>
    </div>