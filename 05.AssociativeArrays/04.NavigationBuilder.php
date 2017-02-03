<form action="">
    <div>
        <label for="categories">Categories: </label>
        <input type="text" title="categories" name="categories" id="categories">
    </div>
    <div>
        <label for="tags">Tags: </label>
        <input type="text" title="tags" name="tags" id="tags">
    </div>
    <div>
        <label for="months">Months: </label>
        <input type="text" title="months" name="months" id="months">
    </div>
    <div>
        <input type="submit" value="Generate">
    </div>
</form>
<?php
if (isValidRequest($_GET, ["categories", "tags", "months"], $res)) {
    $output = "";
    foreach ($res as $key => $val) {
        $key = ucfirst($key);
        $output .= "<h2>{$key}</h2><ul>";
        $output .= implode('', array_map(function ($item) {
            return "<li>{$item}</li>";
        }, explode(", ", $val)));
        $output .= "</ul>";
    }

    echo $output;
}

function isValidRequest($request, $inputFields, &$output)
{
    if (is_array($request)) {
        $validRequest = true;
        foreach ($inputFields as $field) {
            if (isset($request[$field]) && !empty(trim($request[$field]))) {
                $output[$field] = trim($request[$field]);
                continue;
            }

            $validRequest = false;
            break;
        }
    }

    return isset($validRequest) && $validRequest === true;
}
