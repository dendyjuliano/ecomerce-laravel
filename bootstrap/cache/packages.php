<?php return array (
  'akaunting/money' => 
  array (
    'providers' => 
    array (
      0 => 'Akaunting\\Money\\Provider',
    ),
  ),
  'darryldecode/cart' => 
  array (
    'providers' => 
    array (
      0 => 'Darryldecode\\Cart\\CartServiceProvider',
    ),
    'aliases' => 
    array (
      'Cart' => 'Darryldecode\\Cart\\Facades\\CartFacade',
    ),
  ),
  'facade/ignition' => 
  array (
    'providers' => 
    array (
      0 => 'Facade\\Ignition\\IgnitionServiceProvider',
    ),
    'aliases' => 
    array (
      'Flare' => 'Facade\\Ignition\\Facades\\Flare',
    ),
  ),
  'fideloper/proxy' => 
  array (
    'providers' => 
    array (
      0 => 'Fideloper\\Proxy\\TrustedProxyServiceProvider',
    ),
  ),
  'fruitcake/laravel-cors' => 
  array (
    'providers' => 
    array (
      0 => 'Fruitcake\\Cors\\CorsServiceProvider',
    ),
  ),
  'laravel/tinker' => 
  array (
    'providers' => 
    array (
      0 => 'Laravel\\Tinker\\TinkerServiceProvider',
    ),
  ),
  'lukepolo/laracart' => 
  array (
    'providers' => 
    array (
      0 => 'LukePOLO\\LaraCart\\LaraCartServiceProvider',
    ),
    'aliases' => 
    array (
      'LaraCart' => 'LukePOLO\\LaraCart\\Facades\\LaraCart',
    ),
  ),
  'nesbot/carbon' => 
  array (
    'providers' => 
    array (
      0 => 'Carbon\\Laravel\\ServiceProvider',
    ),
  ),
  'nunomaduro/collision' => 
  array (
    'providers' => 
    array (
      0 => 'NunoMaduro\\Collision\\Adapters\\Laravel\\CollisionServiceProvider',
    ),
  ),
);