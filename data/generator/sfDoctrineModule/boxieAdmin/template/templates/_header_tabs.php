[?php if (count($fields) > 0): ?]
    <ul>
        [?php foreach ($fields as $fieldset => $fields): ?]
            <li><a rel="[?php echo slugString($fieldset) ?]" href="#" class="[?php echo ($active = !isset($active)) ? 'active' : '' ?]">[?php echo $fieldset ?></a></li>
        [?php endforeach?]
    </ul>
[?php endif ?]
