<?php

// Available placeholders: :uc:vendor, :uc:package, :lc:vendor, :lc:package , :sc:package/
return [
    'src/MyPackage.php' => 'src/:uc:package.php',
    'config/mypackage.php' => 'config/:lc:package.php',
    'src/Facades/MyPackage.php' => 'src/Facades/:uc:package.php',
    'src/MyPackageServiceProvider.php' => 'src/:uc:packageServiceProvider.php',
    'resources/assets/js/MyComponent.js' => 'src/:component_name:MyComponent.js',
];