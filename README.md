# Crontab Manager Bundle

## Installation

Composer install the package:
```
composer require acrnogor/crontab-manager-bundle 
```

### Symfony 3.4.*

Add configuration:
- ``` %PROJECT_DIR%/app/config/config.yml ```, i.e.
```yaml
acrnogor_crontab_manager:
    cron_jobs:
        - '*/8 * * * * /usr/bin/php /var/www/test/test.php > /dev/null 2>&1'
```

Include the bundle in your Kernel ``` %PROJECT_DIR%/app/Kernel.php```:

```php
<?php

$bundles = [
    // ... previous bundles
    new Acrnogor\CrontabManagerBundle\AcrnogorCrontabManagerBundle()
];
```

Add parameter to your ```parameters.yml```:
```yaml
parameters: 
    # ...
    crontab_user: www-data
``` 
and you're done. Skip to console.

### Symfony ^4.0
Create a symfony config yaml file:
 - ```%PROJECT_DIR% /config/packages/acrnogor_crontab_manager.yml```, in example:
```yaml
acrnogor_crontab_manager:
  cron_jobs:
    - '*/8 * * * * /usr/bin/php /var/www/test/test.php > /dev/null 2>&1'
    - '*/8 * * * * /usr/bin/php /var/www/sf4/bin/console debug:router > /dev/null 2>&1'
```

Add the bundle to the project - modify your ```config/bundles.php``` and add the bundle like this:
```php
<?php
return [
    Symfony\Bundle\FrameworkBundle\FrameworkBundle::class => ['all' => true],
    Acrnogor\CrontabManagerBundle\AcrnogorCrontabManagerBundle::class => ['all' => true]
];
```

Add parameter to your ```parameters.yml```:
```yaml
parameters: 
    # ...
    crontab_user: www-data
``` 

### Console
Check if your command for updating crontab works, inside your project folder:
```shell
$ bin/console list acrnogor
```
Should show your new command. Run this to update your crontab with the given cron-jobs defined in config.

```shell
$ bin/console acrnogor:crontab:update
```