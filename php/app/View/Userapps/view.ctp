<?php
//die(var_dump($userApp));
?>
<div class="page-header">
  <h1>#<?php echo $userApp['UserApp']['id']; ?> <small><?php echo $userApp['UserApp']['nome']; ?></small></h1>
</div>

<div></div>
<div>
  <ul class="nav nav-tabs" role="tablist">
    <li class="active TABS"><a href="#divObjetos">Objects</a></li>
    <li class="TABS"><a href="#divWidgets">Widgets</a></li>
    <li class="TABS"><a href="#divAppUsers">Users</a></li>
  </ul>
</div>

<!-- Tab panes -->
<div class="tab-content">
  <div class="tab-pane active" id="divObjetos">
    <div class="container">
      <h2>Objects</h2>
      <div>
        <button class="btn btn-primary" data-toggle="modal" data-target="#newObjModal">
          <span class="glyphicon glyphicon-plus"></span>
        </button>
      </div>
      <br>
      <div class="row">

        <?php
        foreach ($objetos as $objectItem) {
          
          ?>
          <div class="col-md-4">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title"><?php echo $objectItem['Objeto']['nome']; ?></h3>
              </div>
              <div class="panel-body">
                <span class="glyphicon glyphicon-cloud"></span>
                <?php
                echo $this->Html->link( 
                  $this->Html->url('/api/objs/' . $objectItem['Objeto']['id'] . '.json', true),
                  '/api/objs/' . $objectItem['Objeto']['id'] . '.json'
                );
                ?>
                <div class="media">
                  <div class="media-left">
                    <a href="#">
                      <img class="media-object" src="..." alt="Chart">
                    </a>
                  </div>
                  <div class="media-body">
                    <h4 class="media-heading">0</h4>
                  </div>
                </div>
              </div>

              <?php
              if (count($objectItem['Campo'])) {
                ?>
                <table class="table">
                <?php
                foreach ($objectItem['Campo'] as $campoItem) {
                  ?>
                  <tr>
                    <td><?php echo $campoItem['nome']; ?></td>
                    <td><?php echo $campoItem['tipo']; ?></td>
                  </tr>
                  <?php
                }
                ?>
                </table>
                <?php
              }
              ?>
                

              <div class="panel-footer">
                <button class="btn btn-default" type="button" onclick="addField(<?php echo $objectItem['Objeto']['id']; ?>);"><span class="glyphicon glyphicon-plus"></span>Field</button>
              </div>

            </div>
          </div>
          <?php
        }
        ?>


        

      </div>
    </div>

    <!-- Modal obj-->
    <div class="modal fade" id="newObjModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">New Object</h4>
          </div>
          <?php echo $this->Form->create('Objeto', array('url' => 'addObjeto')); ?>
          <input type="hidden" name="data[Objeto][app_id]" value="<?php echo $userApp['UserApp']['id']; ?>">
          <div class="modal-body">
            <div class="form-group">
              <label for="txtObjName">Obj name</label>
              <input type="text" class="form-control" id="txtObjName" placeholder="Enter object name" name="data[Objeto][nome]">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
          </form>
        </div>
      </div>
    </div>

    <div id="newFieldModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">New Field</h4>
          </div>
          <?php echo $this->Form->create('Campo', array('url' => 'addCampo')); ?>
          <input type="hidden" id="hdnFieldObjectId" name="data[Campo][objeto_id]" value="">
          <div class="modal-body">
            <div class="form-group">
              <label for="txtFieldName">Field name</label>
              <input type="text" class="form-control" id="txtFieldName" placeholder="Enter object name" name="data[Campo][nome]">
            </div>
            <div class="form-group">
              <label for="txtFieldType">Type</label>
              <select class="form-control" id="selFieldType" name="data[Campo][tipo]">
                <option value="<?php echo CAMPO_TIPO_NUMERO_INTEIRO; ?>">Number</option>
                <option value="<?php echo CAMPO_TIPO_STRING; ?>">String</option>
                <option value="<?php echo CAMPO_TIPO_TEXTO_LIVRE; ?>">Text</option>
              </select>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
          </form>
        </div>
      </div>
    </div>

  </div>
  <div class="tab-pane" id="divWidgets">
    <div class="container">
      <h2>Widgets</h2>
      <div>
        <button class="btn btn-primary" data-toggle="modal" data-target="#newWidgetModal">
          <span class="glyphicon glyphicon-plus"></span>
        </button>
      </div>

      <?php
      if (count($widgets)) {
        ?>
        <div class="row">
        <br>
        <?php
        foreach ($widgets as $widgetItem) {
          ?>
          <div class="col-md-6">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h3 class="panel-title"><?php echo $widgetItem['Widget']['nome']; ?></h3>
              </div>
              <div class="panel-body">
                
              </div>

              <div class="panel-footer">
                
              </div>

            </div>
          </div>
          <?php
        }
        ?>
        </div>
        <?php
      }
      ?>
    </div>

    <div id="newWidgetModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="newWidgetModalLabel">New Widget</h4>
          </div>
          <?php echo $this->Form->create('Widget', array('url' => 'addWidget')); ?>
          
          <div class="modal-body">
            <div class="form-group">
              <label for="txtWidgetName">Widget name</label>
              <input type="text" class="form-control" id="txtWidgetName" placeholder="Enter widget name" name="data[Widget][nome]">
            </div>
            <div class="form-group">
              <label for="txtWidgetType">Type</label>
              <select class="form-control" id="selWidgetType" name="data[Widget][tipo]">
                <option value="<?php echo WIDGET_TIPO_TABELA; ?>">Table</option>
                <option value="<?php echo WIDGET_TIPO_BUTTON_POPUP_INSERTER; ?>">Form</option>
              </select>
            </div>
            <div class="form-group">
              <label for="txtWidgetObject">Object</label>
              <select class="form-control" id="selWidgetObject" name="data[Widget][objeto_id]">
                <?php
                foreach ($objetos as $objectItem) {
                  ?>
                  <option value="<?php echo $objectItem['Objeto']['id']; ?>"><?php echo $objectItem['Objeto']['nome']; ?></option>
                  <?php
                }
                ?>
              </select>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
          </form>
        </div>
      </div>
    </div>

  </div>
  <div class="tab-pane" id="divAppUsers">
    <div class="container">
      <h2>Users</h2>
      <div>
        <button class="btn btn-primary btn-lg" data-toggle="modal" data-target="#newUserModal">
          <span class="glyphicon glyphicon-plus"></span>
        </button>
      </div>
    </div>
  </div>
</div>

<script>

function addField(objId) {
  $("#hdnFieldObjectId").val(objId);
  //open modal
  $('#newFieldModal').modal({
    keyboard: true
  });

}

$(document).ready(function(){
  $('.TABS a').click(function (e) {
    e.preventDefault()
    $(this).tab('show')
  });
});

</script>
