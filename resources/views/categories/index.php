<?php foreach($categoriesList as $category_id => $category): ?>
    <div>
        
        <h2><a href="<?=route('news.indexCategory', ['category' => $category, 'id' => $category_id])?>"><?=$category?></h2>
    </div><br>
<?php endforeach; ?>