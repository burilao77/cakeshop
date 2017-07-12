<h3>Productos en venta</h3>
<div class="container">

<div class="row">
 <?php foreach ($products as $product): ?>
  <div class="col-sm-6 col-md-4">
    <div class="thumbnail">
 
     <?= $this->Html->image('../files/products/photo/' . $product->photo_dir . '/square_' . $product->photo, ['alt' => $product->name, 'class' => 'img-responsive img-thumbnail center-block']) ?>
          <p class="rat" data-id="<?= $product->id ?>">
         <?= $this->Form->control('score', ['id' => 'input-id',  'class' => 'rating', 'name' => 'input-name', 'min' => 1, 'max' => 5, 'data-size' => 'lg', 'data-rtl' => true, 'label' => false]); ?>
         </p>
     
      <div class="caption">
        <h3><strong>Nombre: </strong><?= $product->name ?></h3>
        <h3><strong>Precio: </strong><?= $this->Number->format($product->price) ?></h3>
      </div>
    </div>
  </div>
  <?php endforeach; ?>
</div>

</div>
<script>
  $('#input-id').on('rating.change', function(event, value, caption) {
        //alert(caption);
    // var row = $(this).parents('p');
     var id = $(".rat").attr('data-id');
     var data = {
       'id' : id,
       'score': value
     };
     var url = basePath + 'products/updateScore';
      console.log(data);
     $.post(url, data, function(result) {
            var obj = $.parseJSON(result);
     }).fail(function () {
            alert('Ocurrio un error :-(');
        });


});
</script>