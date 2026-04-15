<?php
    function basePath(string $path): string {
        return __DIR__ . '/' . $path;
    }

    /**
     * load a view
     * 
     * @param string $name
     * @param void
     * 
     */

    function loadView($name) {
        require basePath("views/{$name}.view.php");
    }

    /**
     * load a partial
     * 
     * @param string $name
     * @param void
     * 
     */
    
    function loadPartial($name) {
        $partialPath = basePath("views/partials/{$name}.php");
    }
?>