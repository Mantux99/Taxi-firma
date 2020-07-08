<?php

//Definas Sukuria konstanta (tai funkcijos deklaraciju mechanizmas). Define- tai funkcija kuri sugeneruoja mums konstantas
//DIR tai direktorija, kurioje failas buvo sukurtas. ROOT musu atveju yra CA-FULLSTACK
//Sukuriame dvi konstantas, kuriu mums reikes ROOT ir DB_FILE
define('ROOT', __DIR__);
define('DB_FILE', ROOT . '/app/data/db.json');

// Core Functions
require_once ROOT . '/core/functions/html.php';
require_once ROOT . '/core/functions/validators.php';

//App functions
require_once ROOT . '/app/functions/validators.php';

//Composerio pagalba naudojames Autoload mechanizmu, kad automatiskai suloadintu musu klases, kuriu yra daug.
//kitaip tariant pasirequirinam VISAS klases, kurias turesime projekte
//Autoload all classes
require_once ROOT . '/vendor/autoload.php';

//Sukuriam App klases objekta
//App klases kurimo metu (bootloaderyje) pasileidzia konstruktorius taip pat
$app = new App\App(DB_FILE);

//Toliau griztame i indexa savo...