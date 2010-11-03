<?php 

/**
 * Creates a box container.
 * @param  string $header The title of the box
 * @param  string $content The contents (a table, text, etc.)
 * @param string string $width 'full' makes a 100% width box, otherwise 50%
 * @param array $options Currently only looks for 'alt_color' to
 * make the box color change, and 'header_button' to inject arbitrary html after
 * the header (like a button)
 * @return string Box HTML
 */
function box($header, $content, $width = 'full', $options = array())
{
    $extra_classes = isset($options['alt_color']) ? 'altbox' : '';
    $button = isset($options['header_button']) ? $options['header_button'] : '';
    $width = $width == 'full' ? 'box-100' : 'box-50';
    $html = <<<HTML
    <div class="box $width $extra_classes">
        <div class="boxin">
            <div class="header">
                <h3>$header</h3>$button
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
 * column name as key and the field or object method to retrieve the column's value.
 * If the name starts with underscore (_) the value will be included in the column
 * as is. Text in the value can be replaced with the an object field using the %field_name% notation.
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
            if (preg_match('/^_/', $column_name))
            {
                $new_value = $field_name;
                if (preg_match('/%(\w+)%/', $field_name, $matches))
                {
                    array_shift($matches);
                    foreach($matches as $replace_field)
                    {
                        $new_value = str_replace("%$replace_field%", $obj->$replace_field, $new_value);
                    }
                }

                $row[$column_name] = $new_value;
                continue;
            }

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
    $content = '<table cellspacing="0" class="'.slugString($header).'"><thead><tr>';
    foreach ($columns as $col)
    {
        if (!preg_match('/^_/', $col))
        {
            $content .= '<th>' . $col . '</th>';
        }
        else
        {
            $content .= '<th>&nbsp;</th>';
        }
    }
    $content .= '</tr></thead><tbody>';

    foreach ($table as $row)
    {
        $content .= '<tr>';
        foreach ($columns as $col)
        {
            $content .= '<td>' . $row[$col] . '</td>';
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
