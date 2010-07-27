<?php 

function box($header, $content, $width = 'full')
{
    $width = $width == 'full' ? 'box-100' : 'box-50';
    $html =<<<HTML
    <div class="box $width">
        <div class="boxin">
            <div class="header">
                <h3>$header</h3>
            </div>
        </div>
        <div class="content">
          $content
        </div>
    </div>
HTML;
    return $html;
}

function doctrine_tabular($header, $data, $fields = null, $width = 'full')
{
    $table = array();
    
    foreach ($data as $obj) 
    {
        $row = array();
        foreach ($fields as $column_name => $field_name) 
        {
            try 
            {
                $row[$column_name] = $obj->$field_name;
            }
            catch (Exception $e) 
            {
                $row[$column_name] = $obj->$field_name();
            }
        }
        $table[] = $row;
    }
    
    return tabluar_box($header, $table, $columns = array_keys($fields), $width);
}

function tabluar_box($header, $table = array(), $columns = array(), $width = 'full')
{
    $content = '<table cellspacing="0"><thead><tr>';
    foreach ($columns as $col) { $content .= '<th>'.$col.'</th>'; }
    $content .= '</tr></thead><tbody>';
    
    foreach ($table as $row) 
    {
        $content .= '<tr>';
        foreach ($columns as $col) 
        {
            $content .= '<td>'.$row[$col].'</td>';
        }
        $content .= '</tr>';
    }
    
    $content .= '</tbody></table>';
    
    return box($header, $content, $width);
}