# PHP Bootstrap Renderer

**Under Development**

## Sample Code
```php
require 'BootstrapRenderer.php';
use \Armanco\BootstrapRenderer\Bootstrap;
$bootstrap = new Bootstrap();
$bootstrap->start();
$bootstrap->head();
$bootstrap->bodyOpen();
$bootstrap->containerOpen();
$bootstrap->rowOpen();
$bootstrap->columnOpen('lg', 6);
$bootstrap->alert('TEST');
$bootstrap->columnClose();
$bootstrap->rowClose();
$bootstrap->containerClose();
$bootstrap->bodyClose();
$bootstrap->end();
$bootstrap->render();
```
