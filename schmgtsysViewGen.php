<?php
$views=[

  [
    'path' => '/var/www/schmgtsys/resources/views/accesscontrol/edit.blade.php',
    'name' => 'User Accounts',
    'fields' => [
      [
        'type'=>'text',
        'label'=>'Date Ordered',
        'value'=>'created_at',
        'init'=>'\'\'',
      ],
      [
        'type'=>'text-static',
        'label'=>'Date Ordered',
        'value'=>'created_at',
        'init'=>'\'\'',
      ],
      [
        'type'=>'text-area',
        'label'=>'Date Ordered',
        'value'=>'created_at',
        'init'=>'\'\'',
      ],
      [
        'type'=>'file',
        'label'=>'Date Ordered',
        'value'=>'created_at',
        'init'=>'\'\'',
      ],
      [
        'type'=>'checkbox',
        'label'=>'Patient Name',
        'value'=>'encounter_id',
        'init'=>'\'\'',
      ],
      [
        'type'=>'checkbox-inline',
        'label'=>'Specimen ID',
        'value'=>'specimen_id',
        'init'=>'\'\'',
      ],
      [
        'type'=>'radio-buttons',
        'label'=>'Test',
        'value'=>'test_type_id',
        'init'=>'\'\'',
      ],
      [
        'type'=>'inline-radio-buttons',
        'label'=>'Visit',
        'value'=>'encounter_id',
        'init'=>'\'\'',
      ],
      [
        'type'=>'select',
        'label'=>'Status',
        'value'=>'test_status_id',
        'init'=>'\'\'',
      ],
      [
        'type'=>'multiple-select',
        'label'=>'Status',
        'value'=>'test_status_id',
        'init'=>'\'\'',
      ],
    ],
  ],


];



foreach ($views as $view) {
    $template = '';
    $template.='@extends(\'layouts.authenticated\')

@section(\'content\')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">'.$view['name'].'</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>';
    if ($view['list']) {


    $template.='
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            '.$view['action'].'
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>Rendering engine</th>
                                        <th>Browser</th>
                                        <th>Platform(s)</th>
                                        <th>Engine version</th>
                                        <th>CSS grade</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="odd gradeX">
                                        <td>Trident</td>
                                        <td>Internet Explorer 4.0</td>
                                        <td>Win 95+</td>
                                        <td class="center">4</td>
                                        <td class="center">X</td>
                                    </tr>
                                    <tr class="even gradeC">
                                        <td>Trident</td>
                                        <td>Internet Explorer 5.0</td>
                                        <td>Win 95+</td>
                                        <td class="center">5</td>
                                        <td class="center">C</td>
                                    </tr>
                                    <tr class="odd gradeA">
                                        <td>Trident</td>
                                        <td>Internet Explorer 5.5</td>
                                        <td>Win 95+</td>
                                        <td class="center">5.5</td>
                                        <td class="center">A</td>
                                    </tr>
                                    <tr class="gradeA">
                                        <td>Gecko</td>
                                        <td>Mozilla 1.4</td>
                                        <td>Win 95+ / OSX.1+</td>
                                        <td class="center">1.4</td>
                                        <td class="center">A</td>
                                    </tr>
                                    <tr class="gradeA">
                                        <td>Gecko</td>
                                        <td>Mozilla 1.5</td>
                                        <td>Win 95+ / OSX.1+</td>
                                        <td class="center">1.5</td>
                                        <td class="center">A</td>
                                    </tr>
                                    <tr class="gradeA">
                                        <td>Gecko</td>
                                        <td>Mozilla 1.6</td>
                                        <td>Win 95+ / OSX.1+</td>
                                        <td class="center">1.6</td>
                                        <td class="center">A</td>
                                    </tr>
                                    <tr class="gradeA">
                                        <td>Gecko</td>
                                        <td>Mozilla 1.7</td>
                                        <td>Win 98+ / OSX.1+</td>
                                        <td class="center">1.7</td>
                                        <td class="center">A</td>
                                    </tr>
                                    <tr class="gradeA">
                                        <td>Gecko</td>
                                        <td>Mozilla 1.8</td>
                                        <td>Win 98+ / OSX.1+</td>
                                        <td class="center">1.8</td>
                                        <td class="center">A</td>
                                    </tr>
                                    <tr class="gradeA">
                                        <td>Gecko</td>
                                        <td>Seamonkey 1.1</td>
                                        <td>Win 98+ / OSX.2+</td>
                                        <td class="center">1.8</td>
                                        <td class="center">A</td>
                                    </tr>
                                    <tr class="gradeA">
                                        <td>Gecko</td>
                                        <td>Epiphany 2.20</td>
                                        <td>Gnome</td>
                                        <td class="center">1.8</td>
                                        <td class="center">A</td>
                                    </tr>
                                    <tr class="gradeA">
                                        <td>Webkit</td>
                                        <td>Safari 1.2</td>
                                        <td>OSX.3</td>
                                        <td class="center">125.5</td>
                                        <td class="center">A</td>
                                    </tr>
                                    <tr class="gradeA">
                                        <td>Webkit</td>
                                        <td>Safari 1.3</td>
                                        <td>OSX.3</td>
                                        <td class="center">312.8</td>
                                        <td class="center">A</td>
                                    </tr>
                                    <tr class="gradeA">
                                        <td>Webkit</td>
                                        <td>Safari 2.0</td>
                                        <td>OSX.4+</td>
                                        <td class="center">419.3</td>
                                        <td class="center">A</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>';



    }elseif($view['fields']){
                              $template.='
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    '.$view['action'].'
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form role="form">';

                            foreach ($view['fields'] as $key => $field) {
                                if ($field['type'] == 'text') {

                                $template.='
                                <div class="form-group">
                                    <label>'.$view['label'].'</label>
                                    <input class="form-control">
                                </div>';

                                }elseif($field['type'] == 'text-static'){

                                $template.='
                                <div class="form-group">
                                    <label>'.$view['label'].'</label>
                                    <p class="form-control-static">email@example.com</p>
                                </div>';

                                }elseif($field['type'] == 'file'){

                                $template.='
                                <div class="form-group">
                                    <label>'.$view['label'].'</label>
                                    <input type="file">
                                </div>';

                                }elseif($field['type'] == 'text-area'){

                                $template.='
                                <div class="form-group">
                                    <label>'.$view['label'].'</label>
                                    <textarea class="form-control" rows="3"></textarea>
                                </div>';

                                }elseif($field['type'] == 'checkbox'){

                                $template.='
                                <div class="form-group">
                                    <label>'.$view['label'].'</label>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" value="'.$view['init'].'">Checkbox 1
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" value="'.$view['init'].'">Checkbox 2
                                        </label>
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" value="'.$view['init'].'">Checkbox 3
                                        </label>
                                    </div>
                                </div>';

                                }elseif($field['type'] == 'checkbox-inline'){

                                $template.='
                                <div class="form-group">
                                    <label>Inline Checkboxes</label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox">1
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox">2
                                    </label>
                                    <label class="checkbox-inline">
                                        <input type="checkbox">3
                                    </label>
                                </div>';

                                }elseif($field['type'] == 'radio-buttons'){

                                $template.='
                                <div class="form-group">
                                    <label>Radio Buttons</label>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>Radio 1
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">Radio 2
                                        </label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="optionsRadios" id="optionsRadios3" value="option3">Radio 3
                                        </label>
                                    </div>
                                </div>';

                                }elseif($field['type'] == 'inline-radio-buttons'){

                                $template.='
                                <div class="form-group">
                                    <label>Inline Radio Buttons</label>
                                    <label class="radio-inline">
                                        <input type="radio" name="optionsRadiosInline" id="optionsRadiosInline1" value="option1" checked>1
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="optionsRadiosInline" id="optionsRadiosInline2" value="option2">2
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="optionsRadiosInline" id="optionsRadiosInline3" value="option3">3
                                    </label>
                                </div>';

                                }elseif($field['type'] == 'select'){

                                $template.='
                                <div class="form-group">
                                    <label>Selects</label>
                                    <select class="form-control">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>';

                                }elseif($field['type'] == 'multiple-select'){

                                $template.='
                                <div class="form-group">
                                    <label>Multiple Selects</label>
                                    <select multiple class="form-control">
                                        <option>1</option>
                                        <option>2</option>
                                        <option>3</option>
                                        <option>4</option>
                                        <option>5</option>
                                    </select>
                                </div>';

                                }
                            }
                                $template.='
                                <button type="submit" class="btn btn-default">Submit Button</button>
                                <button type="reset" class="btn btn-default">Reset Button</button>
                            </form>
                        </div>
                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>';
    }
                              $template.='
</div>
<!-- /#page-wrapper -->
@endsection';

    $componentFile = fopen($view['path'], "w") or die("Unable to open file!");
    fwrite($componentFile, $template);
    fclose($componentFile);

}




