<?php 

/**
 * Creates a box container. 
 * @param  $header The title of the box
 * @param  $content The contents (a table, text, etc.)
 * @param string $width 'full' makes a 100% width box, otherwise 50%
 * @param array $options Currently only looks for 'alt_color' to
 * make the box color change
 * @return string Box HTML
 */
function box($header, $content, $width = 'full', $options = array())
{
    $extra_classes = isset($options['alt_color']) ? 'altbox' : '' ;
    $width = $width == 'full' ? 'box-100' : 'box-50';
    $html =<<<HTML
    <div class="box $width $extra_classes">
        <div class="boxin">
            <div class="header">
                <h3>$header</h3>
            </div>
            <div class="content">
              $content
            </div>
        </div>
    </div>
HTML;
    return $html;
}

/**
 * Creates tabular container from a Doctrine_Collection
 * @param  string $header Title of the container
 * @param  Doctrine_Collection $data
 * @param  array $fields array An assoc array with the container's table
 * column name as key and the field or object method to retrieve the column's value
 * @param  string $width 'full' for 100% with (default), 50% otherwise
 * @return string table HTML
 */
function doctrine_tabular($header, $data, $fields = null, $width = 'full', $options = array())
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
    
    return tabular_box($header, $table, $columns = array_keys($fields), $width, $options);
}

/**
 * Builds a box showing tabular data from an array
 * @param  $header Title of the container
 * @param array $table matrix with the table values
 * @param array $columns name of the columns
 * @param string $width 'full' for a 100% width-box (default) and 50% otherwise
 * @return string HTML for the table container
 */
function tabular_box($header, $table = array(), $columns = array(), $width = 'full', $options = array())
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
    
    return box($header, $content, $width, $options);
}

/**
 * Removes special characters and replaces spaces with underscores.
 * 
 * @param  $string The text to transform
 * @param string $replacement The replacement string
 * @return string Transformed string
 */
function slugString($string, $replacement = '_')
{
  $aux = preg_quote($replacement, '/');

  $map = array(
    '/à|á|ã|â/' => 'a',
    '/è|é|ê|ẽ|ë/' => 'e',
    '/ì|í|î/' => 'i',
    '/ò|ó|ô|õ|ø/' => 'o',
    '/ù|ú|ũ|û/' => 'u',
    '/ç/' => 'c',
    '/ñ/' => 'n',
    '/ä|æ/' => 'ae',
    '/ö/' => 'oe',
    '/ü/' => 'ue',
    '/Ä/' => 'Ae',
    '/Ü/' => 'Ue',
    '/Ö/' => 'Oe',
    '/ß/' => 'ss',
    '/[^\w\s]/' => ' ',
    '/\\s+/' => $replacement
  );

  return preg_replace(array_keys($map), array_values($map), $string);
}
