<div>
  <h2><?php echo $userApp['UserApp']['nome']; ?></h2>
</div>

<div>
  <ul class="nav nav-tabs" role="tablist">
    <li class="active TABS"><a href="#divObjetos">Objetos</a></li>
    <li class="TABS"><a href="#divWidgets">Widgets</a></li>
  </ul>
</div>

<!-- Tab panes -->
<div class="tab-content">
  <div class="tab-pane active" id="divObjetos">Objs</div>
  <div class="tab-pane" id="divWidgets">Widgs</div>
</div>

<script>

$(document).ready(function(){
  $('.TABS a').click(function (e) {
    e.preventDefault()
    $(this).tab('show')
  });
});

</script>
